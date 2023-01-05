<?php
    try{
        $connect = new PDO('mysql:host=localhost;dbname=justplay', 'root', '');

        if(isset($_POST['query'])) {
            $output = '';
            
            $query = $connect->prepare("SELECT * FROM games WHERE name LIKE :id");
            $query->execute(array(':id' => '%' . $_POST["query"] . '%'));
            $result = $query->fetchAll();
            $output = '<ul class="list-unstyled">';
            
            if (count($result) > 0) {
            foreach ($result as $game) {
                $output .= '<li><a class="search-links" href="/justplay/games/' . $game['id'] . '">' . $game["name"] . '</a></li>';
            }
            } else {
            $output .= '<li>No Games Found</li>';
            }
            
            $output .= '</ul>';
            echo $output;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }