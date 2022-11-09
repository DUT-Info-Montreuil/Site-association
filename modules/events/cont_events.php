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
            $this->view->displayCreateEventButton();
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

        public function formEvent(){
            if(isset($_SESSION['id'])){
                $this->view->displayFormEvent();
            }
            else{
                header('Location: index.php?module=connection');
            }
        }

        public function createEvent(){
            if(isset($_SESSION['id'])){
                if($this->model->createEvent($_POST['title'], $_POST['description'], $_POST['startDate'], $_POST['endDate']))
                    header('Location: index.php?module=events');
                else
                    echo 'Error';
            }
            else{
                header('Location: index.php?module=connection');
            }
        }
    }
?>