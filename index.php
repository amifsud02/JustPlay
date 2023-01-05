<?php
    require_once __DIR__."/utils/bootstrap.php";
    include __DIR__."/utils/dbhandler.php";
   

    $template = $twig->load('index.twig');

    if(!isset($_SESSION['user_id'])) {
        echo $template->render(
            [
                'user' => null,
                'app' => ['games' =>fetchAllGames()]
            ]);
    }
    else
    {
        echo $template->render(
            ['app' => 
                [
                    'loggedIn' => $_SESSION['loggedIn'],
                    'user' => 
                        [
                            'userID' => $_SESSION['user_id'],
                            'username' => $_SESSION['username'],
                            'role' => $_SESSION['role']
                        ],
                    'games' => fetchAllGames()
                ]
            ]);
    }
   
