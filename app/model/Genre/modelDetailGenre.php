<?php
    session_start();
    $db = new PDO(
        "mysql:host=localhost;dbname=cinema;charset=utf8",
        "root",
        "",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );

    $sqlQuery = "SELECT libelle FROM genre";
    $statement = $db->prepare($sqlQuery);
    $statement->execute();

    $genres = $statement->fetchAll();
    
?>