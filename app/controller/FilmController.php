<?php
    require_once("model/Connect.php");

    /* On crée un contrôleur pour gérer les action en rapport aux films */
    class FilmController{

        public function listerFilms(){
            $donnee = new Connect();
            $requete = "SELECT f.titre, f.annee_sortie, TIME_FORMAT(SEC_TO_TIME(f.duree*60), '%H h %i') AS duree, f.synopsis, f.note, p.prenom, p.nom
                        FROM film f, realisateur r, personne p
                        WHERE f.id_realisateur = r.id_realisateur
                        AND r.id_personne = p.id_personne";
            $films = $donnee->executerRequete($requete);
            require("view/Film/viewListeFilm.php");
        }
        
        public function detailsFilm(){
            $donnee = new Connect();
            $requeteFilm = "SELECT f.titre, f.annee_sortie, TIME_FORMAT(SEC_TO_TIME(f.duree*60), '%H h %i') AS duree, f.synopsis, f.note, f.affiche, p.prenom, p.nom
                            FROM film f, realisateur r, personne p
                            WHERE f.id_realisateur = r.id_realisateur
                            AND r.id_personne = p.id_personne
                            AND f.id_film = ". $_GET["id"];
            $film = $donnee->executerRequeteUneLigne($requeteFilm);

            $requeteGenre = "SELECT f.titre, g.libelle
                             FROM film f, posseder p, genre g
                             WHERE f.id_film = p.id_film
                             AND p.id_genre = g.id_genre
                             AND f.id_film = " . $_GET["id"];
            $genres = $donnee->executerRequete($requeteGenre);

            $requeteActeur = "SELECT r.nom_role, p.prenom, p.nom
                              FROM film f, jouer j, role r, acteur a, personne p
                              WHERE f.id_film = j.id_film
                              AND j.id_role = r.id_role
                              AND j.id_acteur = a.id_acteur
                              AND a.id_personne = p.id_personne
                              AND f.id_film = " . $_GET["id"];
            $acteurs = $donnee->executerRequete($requeteActeur);
            
            require("view/Film/viewDetailsFilm.php");
        }

    }

?>