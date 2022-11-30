<?php
    include_once 'modules/events/cont_events.php';
    class ModEvents{
        public $cont;

        public function __construct(){
            $this->cont = new ContEvents;
            switch(strtolower($this->cont->action)){
                case 'default':
                    $this->cont->defaultPage();
                    break;
                case 'publish':
                    $this->cont->formEvent();
                    break;
                case 'filter' :
                    $this->cont->filteredPage();
                    break;
                case 'published' :
                    $this->cont->createEvent();
                default:
                    $this->cont->defaultPage();
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