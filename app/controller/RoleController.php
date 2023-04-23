<?php
    require_once("model/Model.php");

    /* On crée un contrôleur pour gérer les action en rapport aux rôles */
    class RoleController{

        public function listerRoles(){
            $donnee = new Model();
            $requete = "SELECT nom_role FROM role";
            $roles = $donnee->executerRequete($requete);
            require("view/Role/viewListeRole.php");
        }

        public function detailsRole(){
            $donnee = new Model();
            $requeteRole = "SELECT nom_role FROM role WHERE id_role = ". $_GET["id"];
            $role = $donnee->executerRequeteUneLigne($requeteRole);
            
            $requeteActeur = "SELECT f.titre, p.prenom, p.nom
                            FROM film f, jouer j, role r, acteur a, personne p
                            WHERE f.id_film = j.id_film
                            AND j.id_role = r.id_role
                            AND j.id_acteur = a.id_acteur 
                            AND a.id_personne = p.id_personne
                            AND r.id_role = " . $_GET["id"];
            $acteursDansRole = $donnee->executerRequete($requeteActeur);
            require("view/Role/viewDetailsRole.php");
        }
    }
?>