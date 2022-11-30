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
            
            $author = $this->model->compareRequestToUser($_GET['id']);
            $req = $this->model->getRequestOnId($_GET['id']);
            $user = $this->model->getUserDataFromId($_SESSION['id']);
            $comments = $this->model->getCommentsFromId($_GET['id']);

            $this->view->displayRequestDetails($req,$comments,$author);
        }

        public function postComment(){
            if(isset($_GET['id'])){
                $comment = $_POST['comment'];
                $idReq = $_GET['id'];
                $this->model->postComment($comment, $idReq);

                $this->requestDetails();
            }
        }

        public function likeReq(){
            if(isset($_GET['id'])){
                $liked = $this->model->findIfLiked($_GET['id']);
                if($liked['COUNT(*)'] == 0){
                    $this->model->likeReq($_GET['id'], 1);
                    $this->model->addLiked($_GET['id']);
                }

                else{
                    $this->model->likeReq($_GET['id'], -1);
                    $this->model->removeLiked($_GET['id']);
                }

                $this->requestDetails();
            }
        }

        public function edit(){
            $req = $this->model->getRequestOnId($_GET['id']);
            $this->view->edit($req);    
        }

        public function submitEdit(){
            if(isset($_POST['title']) && isset($_POST['description'])){
                $title = $_POST['title'];
                $desc = $_POST['description'];
                $this->model->alterRequest($_GET['id'],$title,$desc);

                $this->view->submitEdit();
            }
        }

    }
?>