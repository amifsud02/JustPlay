<?php
    session_start();

    if(isset($_POST['username'])){

        sleep(0.5);

        $connect = new PDO('mysql:host=localhost;dbname=justplay', 'root', '');

        $message = '';

        $username = $_POST['username'];
        $password = $_POST['password'];

        if(empty($username) || empty($password)){
            $message = "Please fill in all fields.";
        }
        else {
            $query = $connect->prepare("SELECT * FROM users WHERE username = :username");
            $query->bindParam(':username', $username, PDO::PARAM_STR);
            $query->execute();
            $user = $query->fetch(PDO::FETCH_ASSOC);

            if($user){
                if($password == $user['password']){
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['role'] = $user['role'];
                    $_SESSION['loggedIn'] = true;

                    $message = "Login Successful";
                }
                else {
                    $message = "Username or Password is incorrect.";
                }
            }
            else {
                $message = "Username or Password is incorrect.";
            }
        }

        $output = array(
            'message' => $message,
            'username' => $user['username'],
            'role' => $user['role'],
            'userId' => $user['id']

        );

        echo json_encode($output);
    }