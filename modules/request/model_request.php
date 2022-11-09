<?php
    class ModelRequest extends Connection{
        public function __construct(){}
        
        public function submitRequest($title, $description){
            $query = self::$db->prepare("INSERT INTO request (title, description, nbLike, idUser) VALUES (:title, :description, 0, :id)");
            $query->execute(array(":title" => $title, ":description" => $description, ":id"=>$_SESSION['id']));
        }

        public function getRequests(){
            $query = self::$db->prepare("SELECT * FROM request LEFT JOIN users ON request.idUser = users.id");
            $query->execute();
            $row = $query->fetchAll();
            return $row;
        }

        public function getRequestOnId($id){
            $query = self::$db->prepare("SELECT * FROM request LEFT JOIN users ON request.idUser = users.id WHERE request.ID = :id");
            $query->execute(array(":id"=>$id));
            $req = $query->fetch();
            return $req;
        }

        public function postComment($content, $idReq){
            $query = self::$db->prepare("INSERT INTO commentReq(idReq, idUser, content, date, time) VALUES (:idReq, :idUser, :content, CURRENT_DATE(), CURRENT_TIME())");
            $query->execute(array(":idReq"=>$idReq, ":idUser"=>$_SESSION['id'], ":content"=>$content));
        }

        public function getCommentsFromId($id){
            $query = self::$db->prepare("SELECT * FROM commentReq LEFT JOIN users ON commentReq.idUser = users.id WHERE idReq = :id");
            $query->execute(array(":id"=>$id));
            $row = $query->fetchAll();
            return $row;
        }
    }
?>