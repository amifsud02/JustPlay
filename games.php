<?php
    require_once __DIR__."/utils/bootstrap.php";
    require __DIR__."/utils/dbHandler.php";
    session_start();

    $template = $twig->load('games.twig');
    echo $template->render(['game' => fetchAllGames()]);