<?php
    class ModelRequest extends Connection{
        public function __construct(){}
        
        public function submitRequest($title, $description){
            $query = self::$db->prepare("INSERT INTO request(title, description) VALUES (:title, :description");
            $query->execute(array(":title" => $title, ":description" => $description));
        }
    }
?>