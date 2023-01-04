<?php

    if(isset($_POST['newUsername'])){

        sleep(0.5);

        $connect = new PDO('mysql:host=localhost;dbname=justplay', 'root', '');

        $message = '';
        $success = 0;

        if(!isset($_POST['newPassword'])){
            $message = "Please fill in all fields.";

            $output = array(
                'message' => $message
            );
    
            echo json_encode($output);
        }
        else {

            $newUsername = $_POST['newUsername'];
            $newPassword = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);

            // Checking if the username is taken or not

            $query = $connect->prepare("SELECT * FROM `users` WHERE `username` LIKE :newUsername");
            $query->bindParam(':newUsername', $newUsername, PDO::PARAM_STR);
            $query->execute();
            
            if(!$query->fetch(PDO::FETCH_ASSOC)) // IF THERE ARE NO ROWS
            {
                $query = $connect->prepare("INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES (NULL, :newUsername, :newPassword, 'user')");

                $query->bindParam(':newUsername', $newUsername, PDO::PARAM_STR);
                $query->bindParam(':newPassword', $newPassword, PDO::PARAM_STR);
                
                $success = $query->execute();

                if($success){
                    $message = "Signup Successful";
                }
                else {
                    $message = "Signup Unsuccessful";
                }
        
                $output = array(
                    'message' => $message
                );
        
                echo json_encode($output);
            }
            else {
                $message = "Username is taken";

                $output = array(
                    'message' => $message
                );
        
                echo json_encode($output);
            }
        }

       
    }
    else
    {
        $message = "Please fill in all fields.";
        
        $output = array(
            'message' => $message
        );

        echo json_encode($output);
    }