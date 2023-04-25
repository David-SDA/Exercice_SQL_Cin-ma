<?php
    namespace Controller;
    use Model\Connect;

    /* On crée un contrôleur pour gérer les actions en rapport aux rôles */
    class RoleController{
        /* Fonction de listage des rôles */
        public function listerRoles(){
            $pdo = Connect::seConnecter();
            $requete = $pdo->query("SELECT nom_role FROM role");
            require("view/Role/viewListeRole.php");
        }

        /* Fonction d'obtention des détails d'un rôle */
        public function detailsRole($id){
            $pdo = Connect::seConnecter();
            $requeteRole = $pdo->prepare("SELECT nom_role FROM role WHERE id_role = :id");
            $requeteRole->execute(["id" => $id]);
            
            $requeteActeur = $pdo->prepare("SELECT f.titre, p.prenom, p.nom
                            FROM film f, jouer j, role r, acteur a, personne p
                            WHERE f.id_film = j.id_film
                            AND j.id_role = r.id_role
                            AND j.id_acteur = a.id_acteur 
                            AND a.id_personne = p.id_personne
                            AND r.id_role = :id");
            $requeteActeur->execute(["id" => $id]);
            require("view/Role/viewDetailsRole.php");
        }

        /* Fonction permettant d'aller à la page d'ajout d'un rôle */
        public function pageAjouterRole(){
            require("view/Role/viewAjouterRole.php");
        }

        /* Fonction d'ajout d'un rôle */
        public function ajouterRole(){
            if(isset($_POST["submitRole"])){
                $role = filter_input(INPUT_POST, "nom_role", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                if($role){
                    $pdo = Connect::seConnecter();
                    $requete = $pdo->prepare("INSERT INTO role (nom_role) VALUES (:role)");
                    $requete->execute(["role" => $role]);
                }
            }
            require("view/Accueil/viewAccueil.php");
        }

    }
?>