<?php
    class ViewMainPage extends GenericView{
        public function __construct(){
            parent::__construct();
        }
        
        public function displayMainPage(){
            ?>
            <h1>Home</h1>
            <?php
        }
    }
?>