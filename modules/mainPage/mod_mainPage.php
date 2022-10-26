<?php
    class ModMainPage{
        public $cont;
        public function __construct(){
            $this->cont = new ContMainPage;
            switch(strtolower($this->cont->action)){ // cases are all in lowercase
                case 'default':
                    $this->cont->default();
                    break;
                default:
                    $this->cont->default();
                    break;
            }
        }
 
        public function saveDisplay(){
            echo $this->cont->view->setDisplay();
        }
 
        public function getDisplay(){
            return $this->cont->view->display;
        }
    }
?>