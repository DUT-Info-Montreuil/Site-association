<?php
    include_once "modules/request/cont_request.php";
    class ModRequest{
        public $cont;
        public function __construct(){
            $this->cont = new ContRequest;
            switch(strtolower($this->cont->action)){ // cases are all in lowercase
                case 'default':
                    $this->cont->displayRequest();
                    break;
                
                case 'submit':
                    $this->cont->submit();
                    break;

                default:
                    $this->cont->displayRequest();
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