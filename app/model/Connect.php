<?php
    namespace Model;
    /* On crée le modèle pour gérer l'accès à la base de données */
    abstract class Connect{
        const HOST = "localhost"; // La variable qui contiendra la base de données
        const DB = "cinema";
        const USER = "root";
        const PASS = "";

        /* Fonction permettant de se connecter à la base de donnée */
        public static function seConnecter(){
            try{
                return new \PDO("mysql:host=" . self::HOST . ";dbname=" . self::DB . ";charset=utf8", self::USER, self ::PASS);
            }catch(\PDOException $ex){
                return $ex->getMessage();
            }
        }
    }
    
?>