<?php
    namespace Controller;
    use Model\Connect;

    /* On crée un contrôleur pour gérer les action en rapport aux rôles */
    class RoleController{

        public function listerRoles(){
            $pdo = Connect::seConnecter();
            $requete = $pdo->query("SELECT nom_role FROM role");
            require("view/Role/viewListeRole.php");
        }

        public function detailsRole(){
            $pdo = Connect::seConnecter();
            $requeteRole = $pdo->query("SELECT nom_role FROM role WHERE id_role = ". $_GET["id"]);
            
            $requeteActeur = $pdo->query("SELECT f.titre, p.prenom, p.nom
                            FROM film f, jouer j, role r, acteur a, personne p
                            WHERE f.id_film = j.id_film
                            AND j.id_role = r.id_role
                            AND j.id_acteur = a.id_acteur 
                            AND a.id_personne = p.id_personne
                            AND r.id_role = " . $_GET["id"]);
            require("view/Role/viewDetailsRole.php");
        }
    }
?>