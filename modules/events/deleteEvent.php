<?php
    class DelEvent extends Connection{
        public function deleteEvent($id){
            $query = self::$db->prepare("DELETE FROM events WHERE id = :id");
            return $query->execute(array(
                ':id' => $id
            ));
        }
    }

    $delEvent = new DelEvent();
    $delEvent->deleteEvent($_POST['id']);
?>

<script>alert("done");</script>