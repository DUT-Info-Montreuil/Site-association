<?php
    class ModelConnection extends Connection{
        public function __construct(){}
        
        public function getUserData($username){
            $query = self::$db->prepare("SELECT * FROM users WHERE username = :username");
            $query->execute(array(":username" => $username));
            $row = $query->fetch();
            return $row;
        }

        public function signUp($username, $unHashedPassword, $email, $promotion){
            $hash = password_hash($unHashedPassword, PASSWORD_DEFAULT);
            $query = self::$db->prepare("INSERT INTO users (username, password, email, promotion) VALUES (:username, :password, :email, :promotion)");
            $query->execute(array(":username" => $username, ":password" => $hash, ":email" => $email, ":promotion" => $promotion));
        }
    }
?>