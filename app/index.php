<?php
    session_start();
    require_once("controller/Accueil/AccueilController.php");
    require_once("controller/Genre/GenreController.php");

    $controleurAccueil = new AccueilController();
    $controleurGenre = new GenreController();

    if(isset($_GET['action'])){

        switch($_GET['action']){

            /* POUR GENRE */
            case "listerGenre":
                $controleurGenre->listerGenres();
                
        }
    }
    else{
        $controleurAccueil->allerAccueil();
    }
?>