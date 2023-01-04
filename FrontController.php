<?php
    require_once __DIR__ . "/utils/bootstrap.php";
    session_start();

    $homeURI  = '/justplay\/$/';
    $gameURI  = '/justplay\/games\/(\d+)$/';
    $gamesURI = '/justplay\/games$/';
    $adminURI = '/justplay\/admin\/$/';

    $homeRE = preg_match($homeURI, $_SERVER['REQUEST_URI']);
    $gameRE = preg_match($gameURI, $_SERVER['REQUEST_URI'], $gameid);
    $gamesRE = preg_match($gamesURI, $_SERVER['REQUEST_URI']);
    $adminRE =  preg_match($adminURI, $_SERVER['REQUEST_URI']);

    if ($homeRE) 
    {
        include 'index.php';
    } 
    elseif ($adminRE) 
    {
        include 'admin.php';
    } 
        elseif ($gameRE) 
    {
        $id = $gameid[1];
        include 'game.php';
    } 
    elseif ($gamesRE) 
    {
        if (!isset($_SESSION['user_id'])) 
        {
            echo 'No Sessions';
        } else 
        {
            echo 'Sessions are being used';
        }
    } 
    else 
    {
        include '404.php';
    }

?>