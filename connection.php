<?php
    class Connection{
        // enter in terminal before modifying so that you don't commit variables : git update-index --skip-worktree connection.php 
        // enter in terminal after modifying so that you can commit variables : git update-index --no-skip-worktree connection.php
        private static $host = "host";
        private static $user = "user";
        private static $pass = "password";
        public static $db;
        
        public static function connect(){
            self::$db= new PDO(
                'mysql:dbname=' . self::$user . ';host=' . self::$host,
                self::$user,
                self::$pass
            );
        }
    }
?>