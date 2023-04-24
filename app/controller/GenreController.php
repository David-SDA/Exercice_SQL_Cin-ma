<?php
    namespace Controller;
    use Model\Connect;

    /* On crée un contrôleur pour gérer les action en rapport aux genres */
    class GenreController{
        
        public function listerGenres(){
            $pdo = Connect::seConnecter();
            $requete = $pdo->query("SELECT libelle FROM genre");
            require("view/Genre/viewListeGenre.php");
        }

        public function detailsGenre(){
            $pdo = Connect::seConnecter();
            $requeteGenre = $pdo->query("SELECT libelle FROM genre WHERE id_genre = ". $_GET["id"]);
            
            $requeteFilm = $pdo->query("SELECT f.titre
                            FROM posseder p, film f, genre g
                            WHERE p.id_film = f.id_film
                            AND p.id_genre = g.id_genre
                            AND g.id_genre = " . $_GET["id"]);
            require("view/Genre/viewDetailsGenre.php");
        }

        public function pageAjouterGenre(){
            require("view/Genre/viewAjouterGenre.php");
        }
    }

?>