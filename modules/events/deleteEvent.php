<?php
    class DelEvent extends Connection{
        public function deleteEvent($id){
            $query = self::$db->prepare("DELETE FROM events WHERE id = :id");
            echo "<script>console.log('test')</script>";
            return $query->execute(array(
                ':id' => $id
            ));
        }
    }

    echo "<script>console.log('test')</script>";
    $delEvent = new DelEvent();
    $delEvent->deleteEvent($_POST['id']);
?>

<script>alert("done");</script>