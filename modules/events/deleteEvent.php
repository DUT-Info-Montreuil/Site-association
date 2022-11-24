<?php
    include_once "../../connection.php";
    class DelEvent extends Connection{
        public static function deleteEvent($id){
            $query = self::$db->prepare("DELETE FROM events WHERE id = :id");
            return $query->execute(array(
                ':id' => $id
            ));
        }
    }
    DelEvent::connect();
    if(DelEvent::deleteEvent($_POST['id'])){
        echo "<script>alert('deleted from db');</script>";
    } else{
        echo "<script>alert('sql error');</script>";
    }
?>

<script>alert("done");</script>