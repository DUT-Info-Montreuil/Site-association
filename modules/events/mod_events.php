<?php
    include_once 'modules/events/cont_events.php';
    class ModEvents{
        public $cont;

        public function __construct(){
            $this->cont = new ContEvents;
            
        }
     
        public function saveDisplay(){
            $this->cont->view->setDisplay();
        }

        public function getDisplay(){
            return $this->cont->view->getDisplay();
        }
    }
?>