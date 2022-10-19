<?php
    class Connection{
        // enter in terminal before modifying so that you don't commit variables : git update-index --skip-worktree connection.php 
        private $host = "database-etudiants.iut.univ-paris8.fr";
        private $user = "dutinfopw201646";
        private $pass = "bygyjyjy";
        public static $db;
        
        public static function connect(){
            self::$db= new PDO(
                'mysql:dbname=' . $this->user . ';host=' . $this->host,
                $this->user,
                $this->pass
            );
        }
    }
?>