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

        public function defaultPage(){
            ?>
                <div id="eventContainer">
            <?php
            foreach($this->model->getEvents() as $event){
                $this->view->displayEvent($event);
            }
            ?>
                </div>
            <?php
        }
    }
?>