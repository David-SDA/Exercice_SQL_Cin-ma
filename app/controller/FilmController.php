<?php
    require_once("model/Model.php");

    /* On crée un contrôleur pour gérer les action en rapport aux films */
    class FilmController{

        public function listerFilms(){
            $donnee = new Model();
            $requete = "SELECT f.titre, f.annee_sortie, TIME_FORMAT(SEC_TO_TIME(f.duree*60), '%H h %i') AS duree, f.synopsis, f.note, p.prenom, p.nom
                        FROM film f, realisateur r, personne p
                        WHERE f.id_realisateur = r.id_realisateur
                        AND r.id_personne = p.id_personne";
            $films = $donnee->executerRequete($requete);
            require("view/Film/viewListeFilm.php");
        }

    }

?>