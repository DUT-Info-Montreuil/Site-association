<?php
    include_once "../../connection.php";
    class AccountActions extends Connection{
        public static function getUserEvents(){ // returns all events done by user
            $query = self::$db->prepare("SELECT * FROM events WHERE creatorId = :id");
            $query->execute(array(
                ':id' => $_SESSION['id']
            ));
            return $query->fetchAll();
        }

        public static function getUserRequests(){ // returns all requests done by user
            $query = self::$db->prepare("SELECT * FROM requests WHERE idUser = :id");
            $query->execute(array(
                ':id' => $_SESSION['id']
            ));
            return $query->fetchAll();
        }

        public static function getUserSubEvents(){
            $query = self::$db->prepare("SELECT * FROM eventSubscribers WHERE idUser = :id");
            $query->execute(array(
                ':id' => $_SESSION['id']
            ));
            return $query->fetchAll();
        }
    }

    
    header("Content-Type: application/json; charset=utf-8");
    session_start();
    AccountActions::connect();

    if(isset($_POST['action'])){
        switch($_POST['action']){
            case "getEvents":
                echo json_encode(AccountActions::getUserEvents());
                break;
            case "getRequests":
                echo json_encode(AccountActions::getUserRequests());
                break;
            case "getSubEvents":
                echo json_encode(AccountActions::getUserSubEvents());
                break;
            default:
                break;
        }
    }
?>