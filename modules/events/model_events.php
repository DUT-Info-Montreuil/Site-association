<?php
    class modelEvents extends Connection{
        public function getEvents(){
            $query = self::$db->prepare("SELECT * FROM events ORDER BY creationDate ASC");
            $query->execute();
            return $query->fetchAll();;
        }

        public function createEvent($title, $description, $startDate, $endDate, $min, $max, $promo){
            $query = self::$db->prepare("INSERT INTO events (title, description, creatorId, minParticipants, maxParticipants, startDate, endDate, creationDate, promotion) VALUES (:title, :description, :creatorId, :partMin, :partiMax,:startDate, :endDate, NOW(), :promo)");
            $tabExec = array(
                ':title' => $title,
                ':description' => $description,
                ':creatorId' => $_SESSION['id'],
                ':startDate' => $startDate,
                ':endDate' => $endDate,
                ':partMin' => $min,
                ':partiMax' => $max,
                ':promo' => $promo
            );
            var_dump($tabExec);
            return $query->execute($tabExec);
        }

        public function getEventsOnPromotion($promo){
            $query = self::$db->prepare("SELECT * FROM events WHERE promotion = :promo OR promotion = 'TOUS' ORDER BY creationDate ASC");
            $query->execute(array(
                ':promo'=> $promo
            ));
            return $query->fetchAll();;
        }
    }
?>