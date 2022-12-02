<?php
    class ModelMainPage extends Connection{
        public function __construct(){
        }

        public function getEvents(){
            $query = self::$db->prepare("SELECT * FROM events ORDER BY creationDate ASC");
            $query->execute();
            return $query->fetchAll();;
        }
    }
?>