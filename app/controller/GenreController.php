<?php
    require_once("model/Model.php");

    class GenreController{
        
        public function listerGenres(){
            $donnee = new Model();
            $requete = "SELECT libelle FROM genre";
            $genres = $donnee->executerRequete($requete);
            require("view/Genre/viewListeGenre.php");
        }
    }

?>