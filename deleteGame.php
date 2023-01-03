<?php
    
    try{

        $connect = new PDO('mysql:host=localhost;dbname=justplay', 'root', '');
    
        $gameID = $_POST['gameId'];

        $query = $connect->prepare("DELETE FROM games WHERE games.id = :gameid");
    
        $query->bindParam(':gameid', $gameID, PDO::PARAM_STR);
        $output = $query->execute();
                
        echo json_encode($output);


    } catch (PDOException $e) {
        echo json_encode($e->getMessage());
    }
?>