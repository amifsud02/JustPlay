<?php 

function fetchAllGames() {

    $connect = new PDO('mysql:host=localhost;dbname=justplay', 'root', '');

    $query = $connect->prepare("SELECT * FROM games");
    $query->execute();
    $games = $query->fetchAll(PDO::FETCH_ASSOC);

    return $games;
}

function fetchGame($id) {
    $connect = new PDO('mysql:host=localhost;dbname=justplay', 'root', '');

    $query = $connect->prepare("SELECT * FROM games WHERE id=:id");
    $query->bindParam(':id', $id);
    $query->execute();
    $game = $query->fetch(PDO::FETCH_ASSOC);

   // echo json_encode($game);

    return $game;
}

if(isset($_GET['modalgame']) && $_GET['modalgame'] == 'modalgame') {
    $gameid = isset($_GET['id']) ? (int) $_GET['id'] : 0;
    modalgame($gameid);
    exit;
}

function modalgame($id) {

    $connect = new PDO('mysql:host=localhost;dbname=justplay', 'root', '');

    $query = $connect->prepare("SELECT * FROM games WHERE id=:id");
    $query->bindParam(':id', $id);
    $query->execute();
    $game = $query->fetch(PDO::FETCH_ASSOC);

    echo json_encode($game);
}