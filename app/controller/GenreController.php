<?php
    require_once("model/Model.php");

    /* On crée un contrôleur pour gérer les action en rapport aux genres */
    class GenreController{
        
        public function listerGenres(){
            $donnee = new Model();
            $requete = "SELECT libelle FROM genre";
            $genres = $donnee->executerRequete($requete);
            require("view/Genre/viewListeGenre.php");
        }
    }

?>