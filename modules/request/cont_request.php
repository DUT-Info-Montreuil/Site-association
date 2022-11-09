<?php
    include_once "modules/request/view_request.php";
    include_once "modules/request/model_request.php";
    class ContRequest{
        public $model;
        public $view;
        public $action;

        public function __construct(){
            isset($_GET['action']) ? $this->action = $_GET['action'] : $this->action = 'default';
            $this->model = new ModelRequest();
            $this->view = new ViewRequest();
        }

        public function displayRequest(){
            $row = $this->model->getRequests();
            $user = $this->model->getUser();
            $this->view->displayRequestPage($row, $user);
        }

        public function submit(){
            if(isset($_POST['title']) && isset($_POST['description'])){
                $title = $_POST['title'];
                $description = $_POST['description'];
                $this->model->submitRequest($title, $description);
                $this->view->displaySubmit();

            }
        }
    }
?>