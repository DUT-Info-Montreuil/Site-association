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
            ?>
                <div id="eventHomePage">
                <a href="index.php?module=events" class="noDeco">
                    <h3>Voici quelques événements : </h3>
            <?php
            $i=1;
            foreach($this->model->getEvents() as $event){
                $this->view->displayEvent($event);
                $i++;
                if ($i>3){
                    break;
                }
            }
            ?>
                </a>
                </div>
            <?php
        }

        public function defaultPage(){
            $this->view->displayMainPage();
        }
    }
?>