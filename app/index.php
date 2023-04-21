<?php
    require_once("controller/Accueil/AccueilController.php");

    $controleurAccueil = new AccueilController();

    if(isset($_GET['action'])){

        switch($_GET['action']){
        }
    }
    else{
        $controleurAccueil->allerAccueil();
    }

    ob_start();
    $contenu = ob_get_clean();
?>