<?php
    require_once("model/Model.php");

    /* On crée un contrôleur pour gérer les action en rapport aux rles */
    class RoleController{

        public function listerRoles(){
            $donnee = new Model();
            $requete = "SELECT nom_role FROM role";
            $roles = $donnee->executerRequete($requete);
            require("view/Role/viewListeRole.php");
        }
    }
?>