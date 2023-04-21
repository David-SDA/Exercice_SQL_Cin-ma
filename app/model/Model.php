<?php
    
    /* On crée le modèle pour gérer l'accès à la base de données */
    class Model{
        private $bdd; // La variable qui contiendra la base de données

        /* Méthode __construct de la classe (créer le lien avec la base de données) */
        public function __construct(){
            $this->bdd = new PDO(
                "mysql:host=localhost;dbname=cinema;charset=utf8",
                "root",
                "",
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
            );
        }

        /* Getter de la base de donnée */
        public function getBdd(){
            return $this->bdd;
        }

        /* Fonction servant à executer une requête SQL avec plusieurs lignes */
        public function executerRequete($sqlQuery){
            $statement = $this->bdd->prepare($sqlQuery);
            $statement->execute();
            return $statement->fetchAll();
        }

        /* Fonction servant à executer une requête SQL une ligne */
        public function executerRequeteUneLigne($sqlQuery){
            $statement = $this->bdd->prepare($sqlQuery);
            $statement->execute();
            return $statement->fetch();
        }
    }
    
?>