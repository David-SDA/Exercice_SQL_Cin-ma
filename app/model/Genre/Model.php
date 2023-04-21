<?php
    
    class Model{
        private $bdd;

        public function __construct(){
            $this->bdd = new PDO(
                "mysql:host=localhost;dbname=cinema;charset=utf8",
                "root",
                "",
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
            );
        }

        public function getBdd(){
            return $this->bdd;
        }

        public function executerRequete($sqlQuery){
            $statement = $this->bdd->prepare($sqlQuery);
            $statement->execute();
        }
    }
    
?>