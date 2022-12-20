<?php
    require_once __DIR__."/utils/bootstrap.php";
    include __DIR__."/utils/dbfunctions.php";

    session_start();

    $_SESSION['isLogged'] = false; // Will be initially set to false
    $isLogged = $_SESSION['isLogged'];
    
    if(isset($_SESSION['user_id'])) {
        $_SESSION['isLogged'] = true;
        $isLogged = $_SESSION['isLogged'];
    }

    if($isLogged) {
        $userId = $_SESSION['user_id'];
        $user = fetchUser($_SESSION['user_id']);

        if(isAdmin($user['id'])) {
            $user['role'] = 'admin';
        }
        else {
            $user['role'] = 'user';
        }

        $template = $twig->load('index.twig');
        echo $template->render(['app' => ['user' => $user]]);
    }
    else {
        $template = $twig->load('index.twig');
        echo $template->render(['app' => ['user' => null]]);
    }



