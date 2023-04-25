<?php
    namespace Controller;
    use Model\Connect;

    /* On crée un contrôleur pour gérer les actions en rapport aux réalisateurs */
    class RealisateurController{
        /* Fonction de listage des réalisateurs */
        public function listerRealisateurs(){
            $pdo = Connect::seConnecter();
            $requete = $pdo->query("SELECT p.prenom, p.nom, p.sexe, DATE_FORMAT(p.date_naissance, '%d/%m/%Y') AS date_naissance
                        FROM personne p, realisateur r
                        WHERE p.id_personne = r.id_personne");
            require("view/Realisateur/viewListeRealisateur.php");
        }

        /* Fonction d'obtention des détails d'un réalisateur */
        public function detailsRealisateur(){
            $pdo = Connect::seConnecter();
            $requeteRealisateur = $pdo->query("SELECT p.prenom, p.nom, p.sexe, DATE_FORMAT(p.date_naissance, '%d/%m/%Y') AS date_naissance
                                   FROM realisateur r, personne p
                                   WHERE r.id_personne = p.id_personne
                                   AND r.id_realisateur = " . $_GET["id"]);
            
            $requeteFilms = $pdo->query("SELECT f.titre
                             FROM realisateur r, film f
                             WHERE r.id_realisateur = f.id_realisateur
                             AND r.id_realisateur = " . $_GET["id"]);
            require("view/Realisateur/viewDetailsRealisateur.php");
        }

        /* Fonction permettant d'aller à la page d'ajout d'un réalisateur */
        public function pageAjouterRealisateur(){
            require("view/Realisateur/viewAjouterRealisateur.php");
        }

        /* Fonction permettant d'ajouter un réalisateur */
        public function ajouterRealisateur(){
            if(isset($_POST["submitRealisateur"])){

                $prenom = filter_input(INPUT_POST, "prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $sexe = filter_input(INPUT_POST, "sexe", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $date_naissance = filter_input(INPUT_POST, "date_naissance", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $estActeur = filter_input(INPUT_POST, "estActeur", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                if($prenom && $nom && $sexe && $date_naissance && $estActeur){
                    $pdo = Connect::seConnecter();
                    $requetePersonne = $pdo->prepare("INSERT INTO personne (prenom, nom, sexe, date_naissance)
                                              VALUES ('$prenom', '$nom', '$sexe', '$date_naissance')");
                    $requetePersonne->execute();

                    $id = $pdo->lastInsertId();
                    $requeteRealisateur = $pdo->prepare("INSERT INTO realisateur (id_personne)
                                                         VALUES ($id)");
                    $requeteRealisateur->execute();

                    if($estActeur == "Oui"){
                        $requete = $pdo->prepare("INSERT INTO acteur (id_personne)
                                                  VALUES ($id)");
                        $requete->execute();
                    }
                }
            }
            require("view/Realisateur/viewAjouterRealisateur.php");
        }
    }

?>