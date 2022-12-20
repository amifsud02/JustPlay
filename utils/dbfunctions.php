<?php

function fetchUser($userId) {
    try {        
        // DATABASE CONNECTION
        $pdo = new PDO('mysql:host=localhost;dbname=justplay', 'root', '');

        // SQL QUERY TO FETCH THE USER
        $query = $pdo->prepare('SELECT * FROM users WHERE id = :id');

        // BIND USER ID PARAM TO USERID VAR
        $query->bindParam(':id', $userId, PDO::PARAM_INT);

        // EXECUTE THE QUERY
        $query->execute();

        // FETCH THE USER DATA
        $user = $query->fetch(PDO::FETCH_ASSOC);

        // RETURN THE USER DATA
        return $user;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function isAdmin($userId) {
    try {

        $pdo = new PDO('mysql:host=localhost;dbname=justplay', 'root', '');
  
        $query = $pdo->prepare('SELECT role FROM users WHERE id = :id');
  
        $query->bindParam(':id', $userId, PDO::PARAM_INT);
    
        $query->execute();
    
        // Fetch the user role
        $role = $query->fetchColumn();
    
        // Check if the user is an admin
        return $role == 'admin';

        } catch (PDOException $e) {
            echo $e->getMessage();
    }
  }