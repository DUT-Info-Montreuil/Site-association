<?php
    include_once "../../connection.php";
    class DelEvent extends Connection{
        public static function deleteEvent($id){
            $query = self::$db->prepare("DELETE FROM events WHERE id = :id");
            return $query->execute(array(
                ':id' => $id
            ));
        }

        public static function subToEvent($id){
            $query = self::$db->prepare("INSERT INTO eventSubscribers (idUser, idEvent, timeSaved) VALUES (:idUser, :idEvent, NOW())");
            return $query->execute(array(
                ':idUser' => $_SESSION['id'],
                ':idEvent' => $id
            ));
        }

        public static function unsubToEvent($id){
            $query = self::$db->prepare("DELETE FROM eventSubscribers WHERE idUser = :idUser AND idEvent = :idEvent");
            return $query->execute(array(
                ':idUser' => $_SESSION['id'],
                ':idEvent' => $id
            ));
        }
    }

    session_start();
    DelEvent::connect();
    if(isset($_POST['action'])){
        switch($_POST['action']){
            case "delete":
                DelEvent::deleteEvent($_POST['id']);
                break;
            case "subscribe":
                DelEvent::subToEvent($_POST['id']);
                break;
            case "unsubscribe":
                DelEvent::unsubToEvent($_POST['id']);
                break;
            default:
                break;
        }
    }
?>