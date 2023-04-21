<?php
    session_start();

    if(isset($_GET['action'])){

        switch($_GET['action']){
        }
    }
    else{
        require "view/Accueil/viewAccueil.php";
    }

    ob_start();
    $contenu = ob_get_clean();
?>