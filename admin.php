<?php
    require_once __DIR__."/utils/bootstrap.php";
    require __DIR__."/utils/dbHandler.php";
    
    $template = $twig->load('admin.twig');
   
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