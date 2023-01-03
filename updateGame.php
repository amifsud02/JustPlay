<?php

    if(isset($_POST['gameName'])){

        sleep(0.5);

        $connect = new PDO('mysql:host=localhost;dbname=justplay', 'root', '');

        $message = '';
        $success = 0;

        $gameID = $_POST['gameId'];
        $gameName = $_POST['gameName'];
        $gameImagePath = $_POST['gameImagePath'];
        $gameCategory = $_POST['gameCategory'];

        if(empty($gameCategory) || empty($gameImagePath)){
            $message = "Please fill in all fields.";
        }
        else {
            $query = $connect->prepare("
                UPDATE games 
                SET 
                    name = :gameName,
                    icon = :gameImagePath,
                    cat = :gameCategory
                
                WHERE games.id = :gameId
            ");

            $query->bindParam(':gameId', $gameID, PDO::PARAM_STR);
            $query->bindParam(':gameName', $gameName, PDO::PARAM_STR);
            $query->bindParam(':gameImagePath', $gameImagePath, PDO::PARAM_STR);
            $query->bindParam(':gameCategory', $gameCategory, PDO::PARAM_STR);
            $success = $query->execute();
        }

        if($success){
            $message = "Game updated successfully.";
        }
        else {
            $message = "Game could not be updated.";
        }

        $output = array(
            'message' => $message
        );

        echo json_encode($output);
    }