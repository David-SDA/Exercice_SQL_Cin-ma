<?php
    namespace Controller;
    use Model\Connect;

    /* On crée un contrôleur pour gérer les action en rapport aux genres */
    class GenreController{
        
        public function listerGenres(){
            $donnee = new Connect();
            $requete = "SELECT libelle FROM genre";
            $genres = $donnee->executerRequete($requete);
            require("view/Genre/viewListeGenre.php");
        }

        public function detailsGenre(){
            $donnee = new Connect();
            $requeteGenre = "SELECT libelle FROM genre WHERE id_genre = ". $_GET["id"];
            $genre = $donnee->executerRequeteUneLigne($requeteGenre);
            
            $requeteFilm = "SELECT f.titre
                            FROM posseder p, film f, genre g
                            WHERE p.id_film = f.id_film
                            AND p.id_genre = g.id_genre
                            AND g.id_genre = " . $_GET["id"];
            $filmsDansGenre = $donnee->executerRequete($requeteFilm);
            require("view/Genre/viewDetailsGenre.php");
        }
    }

?>