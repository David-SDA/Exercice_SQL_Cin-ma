<?php
    require_once("model/Connect.php");

    /* On crée un contrôleur pour gérer les action en rapport aux réalisateurs */
    class RealisateurController{

        public function listerRealisateurs(){
            $donnee = new Connect();
            $requete = "SELECT p.prenom, p.nom, p.sexe, DATE_FORMAT(p.date_naissance, '%d/%m/%Y') AS date_naissance
                        FROM personne p, realisateur r
                        WHERE p.id_personne = r.id_personne";
            $realisateurs = $donnee->executerRequete($requete);
            require("view/Realisateur/viewListeRealisateur.php");
        }

        public function detailsRealisateur(){
            $donnee = new Connect();
            $requeteRealisateur = "SELECT p.prenom, p.nom, p.sexe, DATE_FORMAT(p.date_naissance, '%d/%m/%Y') AS date_naissance
                                   FROM realisateur r, personne p
                                   WHERE r.id_personne = p.id_personne
                                   AND r.id_realisateur = " . $_GET["id"];
            $realisateur = $donnee->executerRequeteUneLigne($requeteRealisateur);
            
            $requeteFilms = "SELECT f.titre
                             FROM realisateur r, film f
                             WHERE r.id_realisateur = f.id_realisateur
                             AND r.id_realisateur = " . $_GET["id"];
            $filmsDansRealisateur = $donnee->executerRequete($requeteFilms);
            require("view/Realisateur/viewDetailsRealisateur.php");
        }
    }

?>