<?php
    include_once 'modules/mainPage/cont_mainPage.php';
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
            $this->cont->view->setDisplay();
        }
 
        public function getDisplay(){
            return $this->cont->view->getDisplay();
        }
    }
?>