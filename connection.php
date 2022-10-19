<?php
    class Connection{
        // enter in terminal before modifying so that you don't commit variables : git update-index --skip-worktree connection.php 
        private $host = "host";
        private $user = "user";
        private $pass = "password";
        public static $db;
        
        public static function initConnexion(){
            self::$db= new PDO(
                'mysql:dbname=' . $this->user . ';host=' . $this->host,
                $this->user,
                $this->pass
            );
        }
    }
?>