<?php
    class GenericView{
        protected $display;
        public function __construct(){
            ob_start();
        }

        public function setDisplay(){
            $this->display = ob_get_clean();
        }

        public function getDisplay(){
            return $this->display;
        }
    }
?>