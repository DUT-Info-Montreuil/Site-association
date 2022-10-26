<?php
    class GenericView{
        public $display;
        public function __construct(){
            ob_start();
        }

        public function setDisplay(){
            $this->display = ob_get_clean();
        }
    }
?>