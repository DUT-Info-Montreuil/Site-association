<?php
    class ModelMainPage extends Connection{
        public function __construct(){
        }

        public function getEvents(){
            $query = self::$db->prepare("SELECT * FROM events ORDER BY creationDate ASC");
            $query->execute();
            return $query->fetchAll();;
        }

        public function getRequests(){
            $query = self::$db->prepare("SELECT * FROM request LEFT JOIN users ON request.idUser = users.id");
            $query->execute();
            $row = $query->fetchAll();
            return $row;
        }
    }

    
?>