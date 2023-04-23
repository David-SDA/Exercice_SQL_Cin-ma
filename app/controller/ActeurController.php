<?php
    require_once("model/Model.php");

    /* On crée un contrôleur pour gérer les action en rapport aux acteurs */
    class ActeurController{

        public function listerActeurs(){
            $donnee = new Model();
            $requete = "SELECT p.prenom, p.nom, p.sexe, DATE_FORMAT(p.date_naissance, '%d/%m/%Y') AS date_naissance
                        FROM personne p, acteur a
                        WHERE p.id_personne = a.id_personne";
            $acteurs = $donnee->executerRequete($requete);
            require("view/Acteur/viewListeActeur.php");
        }

    }

?>