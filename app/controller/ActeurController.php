<?php
    namespace Controller;
    use Model\Connect;

    /* On crée un contrôleur pour gérer les action en rapport aux acteurs */
    class ActeurController{

        public function listerActeurs(){
            $pdo = Connect::seConnecter();
            $requete = $pdo->query("SELECT p.prenom, p.nom, p.sexe, DATE_FORMAT(p.date_naissance, '%d/%m/%Y') AS date_naissance
                                    FROM personne p, acteur a
                                    WHERE p.id_personne = a.id_personne");
            require("view/Acteur/viewListeActeur.php");
        }

        public function detailsActeur(){
            $pdo = Connect::seConnecter();
            $requeteActeur = $pdo->query("SELECT p.prenom, p.nom, p.sexe, DATE_FORMAT(p.date_naissance, '%d/%m/%Y') AS date_naissance
                                          FROM acteur a, personne p
                                          WHERE a.id_personne = p.id_personne
                                          AND a.id_acteur = " . $_GET["id"]);
            
            $requeteFilms = $pdo->query("SELECT f.titre
                             FROM acteur a, film f, jouer j
                             WHERE a.id_acteur = j.id_acteur
                             AND j.id_film = f.id_film
                             AND a.id_acteur = " . $_GET["id"]);
            require("view/Acteur/viewDetailsActeur.php");
        }

        public function pageAjouterActeur(){
            require("view/Acteur/viewAjouterActeur.php");
        }

    }

?>