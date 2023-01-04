<?php

    if(isset($_POST['newgamename'])){

        sleep(0.5);

        $connect = new PDO('mysql:host=localhost;dbname=justplay', 'root', '');

        $message = '';
        $success = 0;

        $gameName = $_POST['newgamename'];
        $gameImagePath = "upload/testimage.jpg";
        $gameCategory = $_POST['newgamecategory'];

        if(empty($gameCategory) || empty($gameImagePath)){
            $message = "Please fill in all fields.";
        }
        else {
            $query = $connect->prepare("INSERT INTO games (name, icon, cat) VALUES (:gameName, :gameImagePath, :gameCategory)");

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

        // $target_dir = "/justplay/upload/";
        // $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        // $uploadOk = 1;
        // $imageFileType = pathinfo($target_file , PATHINFO_EXTENSION);

        // // Checking if the image file is an image and not a different file format

        // $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        // if($check !== false) {
        //     $uploadOk = 1;
        // } else {
        //     // ERROR MESSAGE HERE
        //     $uploadOk = 0;
        // }
        

        // if(file_exists($target_file)) {
        //     // ERROR MESSAGE HERE
        //     $uploadOk = 0;
        // }

        // if ($_FILES["fileToUpload"]["size"] > 1000000) {
        //     // ERROR MESSAGE HERE
        //     $uploadOk = 0;
        // }

        // if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "webp") {
        //     //echo "Sorry, only JPG, JPEG, PNG & WEBP files are allowed.";
        //     $uploadOk = 0;
        // }

        // if($uploadOk == 0){ 
        //     $success = 0;
        //     $message = 'Error Uploading Image';
        // } else {
        //     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //         $pictureName = "/justplay/upload/". basename( $_FILES["fileToUpload"]["name"]);
        //     }
        // }

        
        
    }
    else
    {
        $message = "Game could not be uploaded.";

        $output = array(
            'message' => $message
        );
 
        echo json_encode($output);
    }