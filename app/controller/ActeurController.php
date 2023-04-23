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

        public function detailsActeur(){
            $donnee = new Model();
            $requeteActeur = "SELECT p.prenom, p.nom, p.sexe, DATE_FORMAT(p.date_naissance, '%d/%m/%Y') AS date_naissance
                                   FROM acteur a, personne p
                                   WHERE a.id_personne = p.id_personne
                                   AND a.id_acteur = " . $_GET["id"];
            $acteur = $donnee->executerRequeteUneLigne($requeteActeur);
            
            $requeteFilms = "SELECT f.titre
                             FROM acteur a, film f, jouer j
                             WHERE a.id_acteur = j.id_acteur
                             AND j.id_film = f.id_film
                             AND a.id_acteur = " . $_GET["id"];
            $filmsDansActeur = $donnee->executerRequete($requeteFilms);
            require("view/Acteur/viewDetailsActeur.php");
        }

    }

?>