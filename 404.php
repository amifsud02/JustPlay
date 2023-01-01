<?php
    require_once __DIR__."/utils/bootstrap.php";
    $template = $twig->load('404.twig');
    echo $template->render();
?>