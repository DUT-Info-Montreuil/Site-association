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

        public function findIfLiked($idReq){
            $query = self::$db->prepare("SELECT COUNT(*) FROM likedRequests WHERE idReq = :idReq AND idUser = :idUser");
            $query->execute(array(":idUser"=>$_SESSION['id'], ":idReq"=>$idReq));
            $count = $query->fetch();
            return $count;
        }

        public function likeReq($idReq, $value){
            $query = self::$db->prepare("UPDATE request SET nbLike = nbLike + :value WHERE ID = :idReq");
            $query->execute(array(":idReq"=>$idReq, ":value"=>$value));
        }

        public function addLiked($idReq){
            $query = self::$db->prepare("INSERT INTO likedRequests VALUES (:idUser, :idReq)");
            $query->execute(array(":idUser"=>$_SESSION['id'], ":idReq"=>$idReq));
        }

        public function removeLiked($idReq){
            $query = self::$db->prepare("DELETE FROM likedRequests WHERE idReq = :idReq");
            $query->execute(array(":idReq"=>$idReq));
        }

        public function compareRequestToUser($id){
            $query = self::$db->prepare("SELECT COUNT(*) FROM request LEFT JOIN users ON request.idUser = users.id WHERE request.ID = :id AND request.idUser = :iduser");
            $query->execute(array(":id"=>$id, ":iduser" => $_SESSION['id']));
            $req = $query->fetch();
            return $req;
        }

        public function alterRequest($id, $title, $desc){
            $query = self::$db->prepare("UPDATE request SET title = :title, description = :desc WHERE id = :id");
            $query->execute(array(":title"=>$title, ":desc"=>$desc, ":id"=>$id));
        }

        public function approve($id){
            $query = self::$db->prepare("UPDATE request SET state = 'Approuvé' WHERE id = :id");
            $query->execute(array(":id"=>$id));
        }

        public function discard($id){
            $query = self::$db->prepare("UPDATE request SET state = 'Rejeté' WHERE id = :id");
            $query->execute(array(":id"=>$id));
        }
    }
?>