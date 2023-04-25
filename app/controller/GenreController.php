<?php
    namespace Controller;
    use Model\Connect;

    /* On crée un contrôleur pour gérer les actions en rapport aux genres */
    class GenreController{
        
        /* Fonction d'ajout d'un genre */
        public function listerGenres(){
            $pdo = Connect::seConnecter();
            $requete = $pdo->query("SELECT libelle FROM genre");
            require("view/Genre/viewListeGenre.php");
        }

        /* Fonction d'obtention des détails d'un genre */
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

        /* Fonction permettant d'aller à la page d'ajout d'un genre */
        public function pageAjouterGenre(){
            require("view/Genre/viewAjouterGenre.php");
        }

        /* Fonction d'ajout d'un genre */
        public function ajouterGenre(){
            if(isset($_POST["submitGenre"])){
                $genre = filter_input(INPUT_POST, "nom_genre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                if($genre){
                    $pdo = Connect::seConnecter();
                    $requete = $pdo->prepare("INSERT INTO genre (libelle) VALUES ('$genre')");
                    $requete->execute();
                }
            }
            require("view/Genre/viewAjouterGenre.php");
        }
    }

?>