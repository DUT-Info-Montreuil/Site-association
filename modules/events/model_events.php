<?php
    class modelEvents extends Connection{
        public function getEvents(){
            $query = self::$db->prepare("SELECT * FROM events ORDER BY creationDate ASC");
            $query->execute();
            return $query->fetchAll();;
        }
    }
?>