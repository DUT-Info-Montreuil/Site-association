<?php
    class ModelRequest extends Connection{
        public function __construct(){}
        
        public function submitRequest($title, $description){
            $query = self::$db->prepare("INSERT INTO request (title, description, nbLike, idUser) VALUES (:title, :description, 0, :id)");
            $query->execute(array(":title" => $title, ":description" => $description, ":id"=>$_SESSION['id']));
        }

        public function getRequests(){
            $query = self::$db->prepare("SELECT * FROM request");
            $query->execute();
            $row = $query->fetchAll();
            return $row;
        }

        public function getRequestOnId($id){
            $query = self::$db->prepare("SELECT * FROM request WHERE ID = :id");
            $query->execute(array(":id"=>$id));
            $req = $query->fetch();
            return $req;
        }
    }
?>