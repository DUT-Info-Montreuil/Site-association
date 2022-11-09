<?php
    include_once "modules/request/view_request.php";
    include_once "modules/request/model_request.php";
    class ContRequest{
        public $model;
        public $view;
        public $action;

        public $id;

        public function __construct(){
            isset($_GET['action']) ? $this->action = $_GET['action'] : $this->action = 'default';
            $this->model = new ModelRequest();
            $this->view = new ViewRequest();
        }

        public function displayRequest(){
            $row = $this->model->getRequests();
            $user = $this->model->getUserDataFromId($_SESSION['id']);
            $this->view->displayRequestPage($row);
        }

        public function submit(){
            if(isset($_POST['title']) && isset($_POST['description'])){
                $title = $_POST['title'];
                $description = $_POST['description'];
                $this->model->submitRequest($title, $description);
                $this->view->displaySubmit();

            }
        }

        public function requestDetails(){
            $req = $this->model->getRequestOnId($_GET['id']);
            $user = $this->model->getUserDataFromId($_SESSION['id']);
            $comments = $this->model->getCommentsFromId($_GET['id']);

            $this->view->displayRequestDetails($req,$comments);
        }

        public function postComment(){
            if(isset($_GET['id'])){
                $comment = $_POST['comment'];
                $idReq = $_GET['id'];
                $this->model->postComment($comment, $idReq);

                $this->requestDetails();
            }
        }

    }
?>