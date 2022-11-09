<?php
    include_once 'modules/events/view_events.php';
    include_once 'modules/events/model_events.php';
    class ContEvents{
        public $model;
        public $view;
        public $action;

        public function __construct(){
            isset($_GET['action']) ? $this->action = $_GET['action'] : $this->action = 'default';
            $this->model = new ModelEvents();
            $this->view = new ViewEvents();
        }
    }
?>