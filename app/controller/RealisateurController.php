<?php
    namespace Controller;
    use Model\Connect;

    /* On crée un contrôleur pour gérer les action en rapport aux réalisateurs */
    class RealisateurController{

        public function listerRealisateurs(){
            $pdo = Connect::seConnecter();
            $requete = $pdo->query("SELECT p.prenom, p.nom, p.sexe, DATE_FORMAT(p.date_naissance, '%d/%m/%Y') AS date_naissance
                        FROM personne p, realisateur r
                        WHERE p.id_personne = r.id_personne");
            require("view/Realisateur/viewListeRealisateur.php");
        }

        public function detailsRealisateur(){
            $pdo = Connect::seConnecter();
            $requeteRealisateur = $pdo->query("SELECT p.prenom, p.nom, p.sexe, DATE_FORMAT(p.date_naissance, '%d/%m/%Y') AS date_naissance
                                   FROM realisateur r, personne p
                                   WHERE r.id_personne = p.id_personne
                                   AND r.id_realisateur = " . $_GET["id"]);
            
            $requeteFilms = $pdo->query("SELECT f.titre
                             FROM realisateur r, film f
                             WHERE r.id_realisateur = f.id_realisateur
                             AND r.id_realisateur = " . $_GET["id"]);
            require("view/Realisateur/viewDetailsRealisateur.php");
        }
    }

?>