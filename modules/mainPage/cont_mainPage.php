<?php
    include_once "modules/mainPage/model_mainPage.php";
    include_once "modules/mainPage/view_mainPage.php";
    class ContMainPage{
        public $model;
        public $view;
        public $action;
        public function __construct(){
            $this->model = new ModelMainPage();
            $this->view = new ViewMainPage();
            $this->action = isset($_GET['action']) ? $_GET['action'] : 'default';
        }
        public function default(){
            $this->view->displayMainPage();
        }
    }
?>