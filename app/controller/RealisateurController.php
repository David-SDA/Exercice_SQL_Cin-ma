<?php
    require_once("model/Model.php");

    /* On crée un contrôleur pour gérer les action en rapport aux réalisateurs */
    class RealisateurController{

        public function listerRealisateurs(){
            $donnee = new Model();
            $requete = "SELECT p.prenom, p.nom, p.sexe, DATE_FORMAT(p.date_naissance, '%d/%m/%Y') AS date_naissance
                        FROM personne p, realisateur r
                        WHERE p.id_personne = r.id_personne";
            $realisateurs = $donnee->executerRequete($requete);
            require("view/Realisateur/viewListeRealisateur.php");
        }

    }

?>