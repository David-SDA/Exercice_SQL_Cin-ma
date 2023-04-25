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
            var_dump($_POST);
            if(isset($_POST["submitFilm"])){
                if(isset($_FILES["affiche"])){
                    $tmpNom = $_FILES["affiche"]["tmp_name"]; // Le nom temporaire du fichier qui sera chargé sur la machine serveur 
                    $nom = $_FILES["affiche"]["name"]; // Le nom original du fichier
                    $taille = $_FILES["affiche"]["size"]; // Sa taille en octets
                    $error = $_FILES["affiche"]["error"]; // Le code d'erreur associé au téléchargement
                }
                $tabExtension = explode('.', $nom); // on scinde la chaine en enlevant le point, ça devient un tableau
                $extension = strtolower(end($tabExtension)); // On met les caractères en minuscule
                $extensions = ['jpg', 'png', 'jpeg', 'gif']; // Un tableau d'extension que l'on accepte
                $maxTaille = 1000000; // Taille maximale que l'on autorise (1 Mo)
                /* Si le fichier a bien une des extensions accepter et a une taille autorisé */
                if(in_array($extension, $extensions) && $taille <= $maxTaille && $error == 0){
                    $uniqueName = uniqid('', true); // On crée un identifiant unique pour l'image
                    $fileUnique = $uniqueName . "." . $extension;
                    move_uploaded_file($tmpNom, './public/img/'.$fileUnique); // On déplace le fichier dans un dossier que l'on a créer
                    $cheminImage = "./public/img/" . $fileUnique; // On stocke le chemin de l'image
                }
                if(!isset($cheminImage)){
                    $cheminImage = NULL;
                }

                $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $annee_sortie = filter_input(INPUT_POST, "annee_sortie", FILTER_SANITIZE_NUMBER_INT);
                $duree = filter_input(INPUT_POST, "duree", FILTER_SANITIZE_NUMBER_INT);
                $synopsis = filter_input(INPUT_POST, "synopsis", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $note = filter_input(INPUT_POST, "note", FILTER_SANITIZE_NUMBER_INT);

                $realisateurFilm = filter_input(INPUT_POST, "realisateurFilm", FILTER_SANITIZE_NUMBER_INT);

                $genreFilm = filter_input(INPUT_POST, "genreFilm", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);

                $pdo = Connect::seConnecter();
                $requeteFilm = $pdo->query("INSERT INTO film (titre, annee_sortie, duree, synopsis, note, affiche, id_realisateur)
                                            VALUES ('$titre', " . intval($annee_sortie) . ", " . intval($duree) . ", '$synopsis', " . intval($note) . ", '$cheminImage', " . intval($realisateurFilm) . ")");
                                            
            }
            require("view/Accueil/viewAccueil.php");
        }

        public function pageAjouterCasting(){
            $pdo = Connect::seConnecter();
            $requeteFilm = $pdo->query("SELECT f.titre
                                    FROM film f");
            $requeteActeur = $pdo->query("SELECT p.prenom, p.nom
                                          FROM personne p, acteur a
                                          WHERE p.id_personne = a.id_personne");
            $requeteRole = $pdo->query("SELECT nom_role
                                        FROM role");
            require("view/Film/viewAjouterCasting.php");
        }

        public function ajouterCasting(){
            if($_POST["submitCasting"]){

                $film = filter_input(INPUT_POST, "film", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $acteur = filter_input(INPUT_POST, "acteur", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $role = filter_input(INPUT_POST, "role", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                
                if($film && $acteur && $role){
                    $pdo = Connect::seConnecter();
                    $requete = $pdo->query("INSERT INTO jouer (id_film, id_acteur, id_role)
                                            VALUES (" . $_POST["film"] . ", " . $_POST["acteur"] . ", " . $_POST["role"] . " )");
                }
            }
            require("view/Accueil/viewAccueil.php");
        }
    }

?>