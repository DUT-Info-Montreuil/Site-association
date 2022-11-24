<?php
    class DelEvent extends Connection{
        public static function deleteEvent($id){
            $query = self::$db->prepare("DELETE FROM events WHERE id = :id");
            return $query->execute(array(
                ':id' => $id
            ));
        }
    }

    DelEvent::deleteEvent($_POST['id']);
?>

<script>alert("done");</script>