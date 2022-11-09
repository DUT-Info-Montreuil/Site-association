<?php
    class modelEvents extends Connection{
        public function getEvents(){
            $query = self::$db->prepare("SELECT * FROM events ORDER BY creationDate ASC");
            $query->execute();
            return $query->fetchAll();;
        }

        public function createEvent($title, $description, $startDate, $endDate){
            $query = self::$db->prepare("INSERT INTO events (title, description, creatorId, minParticipants, startDate, endDate, creationDate) VALUES (:title, :description, :creatorId, 1, :startDate, :endDate, NOW())");
            return $query->execute(array(
                ':title' => $title,
                ':description' => $description,
                ':creatorId' => $_SESSION['id'],
                ':startDate' => $startDate,
                ':endDate' => $endDate
            ));
        }
    }
?>