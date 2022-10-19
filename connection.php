<?php
    class Connection{
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