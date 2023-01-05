<?php
    require_once __DIR__."/utils/bootstrap.php";
    require __DIR__."/utils/dbHandler.php";

    $template = $twig->load('game.twig');

    // echo '<pre>';
    // var_dump($_SESSION);
    // echo '</pre>';

    if(isset($_SESSION['loggedIn']))
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
                    'game' => fetchGame($id)
                ]
            ]);
    }
    else
    {
       echo $template->render(
            ['app' => 
                [
                    'game' => fetchGame($id),
                ]
            ]);
    }
    
