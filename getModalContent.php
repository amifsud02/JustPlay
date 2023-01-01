<?php 

    $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

    $connect = new PDO('mysql:host=localhost;dbname=justplay', 'root', '');

    $query = $connect->prepare("SELECT * FROM games WHERE id=:id");
    $query->bindParam(':id', $id);
    $query->execute();
    $game = $query->fetch(PDO::FETCH_ASSOC);

    
    echo json_encode($game);