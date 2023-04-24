<?php
    namespace Controller;
    /* On crée un contrôleur pour gérer l'arrivée en page d'acceuil */
    class AccueilController{
        public function allerAccueil(){
            require("view/Accueil/viewAccueil.php");
        }
    }

?>