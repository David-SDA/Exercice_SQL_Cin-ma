<?php
    namespace Controller;
    use Model\Connect;

    /* On crée un contrôleur pour gérer les actions en rapport aux acteurs */
    class ActeurController{
        /* Fonction de listage des acteurs */
        public function listerActeurs(){
            $pdo = Connect::seConnecter();
            $requete = $pdo->query("SELECT p.prenom, p.nom, p.sexe, DATE_FORMAT(p.date_naissance, '%d/%m/%Y') AS date_naissance
                                    FROM personne p, acteur a
                                    WHERE p.id_personne = a.id_personne");
            require("view/Acteur/viewListeActeur.php");
        }

        /* Fonction d'obtention des détails d'un acteur */
        public function detailsActeur($id){
            $pdo = Connect::seConnecter();
            $requeteActeur = $pdo->prepare("SELECT p.prenom, p.nom, p.sexe, DATE_FORMAT(p.date_naissance, '%d/%m/%Y') AS date_naissance
                                          FROM acteur a, personne p
                                          WHERE a.id_personne = p.id_personne
                                          AND a.id_acteur = :id");
            $requeteActeur->execute(["id" => $id]);
            
            $requeteFilms = $pdo->prepare("SELECT f.titre
                             FROM acteur a, film f, jouer j
                             WHERE a.id_acteur = j.id_acteur
                             AND j.id_film = f.id_film
                             AND a.id_acteur = :id");
            $requeteFilms->execute(["id" => $id]);
            require("view/Acteur/viewDetailsActeur.php");
        }

        /* Fonction permettant d'aller à la page pour ajouter un acteur */
        public function pageAjouterActeur(){
            require("view/Acteur/viewAjouterActeur.php");
        }

        /* Fonction d'ajout un acteur */
        public function ajouterActeur(){
            if(isset($_POST["submitActeur"])){

                $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $sexe = filter_input(INPUT_POST, "sexe", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $date_naissance = filter_input(INPUT_POST, "date_naissance", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $estRealisateur = filter_input(INPUT_POST, "estRealisateur", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                if($prenom && $nom && $sexe && $date_naissance && $estRealisateur){
                    $pdo = Connect::seConnecter();
                    $requetePersonne = $pdo->prepare("INSERT INTO personne (prenom, nom, sexe, date_naissance)
                                              VALUES (:prenom, :nom, :sexe, :date_naissance)");
                    $requetePersonne->execute([
                        'prenom' => $prenom,
                        'nom' => $nom,
                        'sexe' => $sexe,
                        'date_naissance' => $date_naissance
                    ]);

                    $idLast = $pdo->lastInsertId();
                    $requeteActeur = $pdo->prepare("INSERT INTO acteur (id_personne)
                                                         VALUES (:idLast)");
                    $requeteActeur->execute(['idLast' => $idLast]);

                    if($estRealisateur == "Oui"){
                        $requete = $pdo->prepare("INSERT INTO realisateur (id_personne)
                                                  VALUES (:idLast)");
                        $requete->execute(['idLast' => $idLast]);
                    }
                }
            }
            require("view/Accueil/viewAccueil.php");
        }
    }

?>