<?php
    namespace Controller;
    use Model\Connect;

    /* On crée un contrôleur pour gérer les action en rapport aux films */
    class FilmController{

        public function listerFilms(){
            $pdo = Connect::seConnecter();
            $requete = $pdo->query("SELECT f.titre, f.annee_sortie, TIME_FORMAT(SEC_TO_TIME(f.duree*60), '%H h %i') AS duree, f.synopsis, f.note, p.prenom, p.nom
                        FROM film f, realisateur r, personne p
                        WHERE f.id_realisateur = r.id_realisateur
                        AND r.id_personne = p.id_personne");
            require("view/Film/viewListeFilm.php");
        }
        
        public function detailsFilm(){
            $pdo = Connect::seConnecter();
            $requeteFilm = $pdo->query("SELECT f.titre, f.annee_sortie, TIME_FORMAT(SEC_TO_TIME(f.duree*60), '%H h %i') AS duree, f.synopsis, f.note, f.affiche, p.prenom, p.nom
                            FROM film f, realisateur r, personne p
                            WHERE f.id_realisateur = r.id_realisateur
                            AND r.id_personne = p.id_personne
                            AND f.id_film = ". $_GET["id"]);

            $requeteGenre = $pdo->query("SELECT f.titre, g.libelle
                             FROM film f, posseder p, genre g
                             WHERE f.id_film = p.id_film
                             AND p.id_genre = g.id_genre
                             AND f.id_film = " . $_GET["id"]);

            $requeteActeur = $pdo->query("SELECT r.nom_role, p.prenom, p.nom
                              FROM film f, jouer j, role r, acteur a, personne p
                              WHERE f.id_film = j.id_film
                              AND j.id_role = r.id_role
                              AND j.id_acteur = a.id_acteur
                              AND a.id_personne = p.id_personne
                              AND f.id_film = " . $_GET["id"]);
            
            require("view/Film/viewDetailsFilm.php");
        }

        public function pageAjouterFilm(){
            $pdo = Connect::seConnecter();
            $requeteRealisateur = $pdo->query("SELECT r.id_realisateur, p.prenom, p.nom
                                               FROM realisateur r, personne p
                                               WHERE r.id_personne = p.id_personne");

            $requeteGenre = $pdo->query("SELECT *
                                         FROM genre g");
            require("view/Film/viewAjouterFilm.php");
        }

        public function ajouterFilm(){
            require("view/Film/viewAjouterFilm.php");
        }

    }

?>