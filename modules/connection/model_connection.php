<?php
    class ModelConnection extends Connection{
        public function __construct(){}
        
        public function getConnexionData($username){
            $query = self::$bdd->prepare("SELECT * FROM users WHERE username = :username");
            $query->execute(array(":username" => $username));
            $row = $query->fetch();
            return $row;
        }

        public function signUp($username, $unHashedPassword){
            $hash = password_hash($unHashedPassword, PASSWORD_DEFAULT);
            $query = self::$bdd->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
            $query->execute(array(":username" => $username, ":password" => $hash));
        }
    }
?>