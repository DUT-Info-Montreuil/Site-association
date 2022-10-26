<?php
    include_once "modules/connection/cont_connection.php";
    class ModConnection{
        public $cont;
        public function __construct(){
            $this->cont = new ContConnection;
            switch($this->cont->action){
                case 'default':
                    $this->cont->formSignIn();
                    break;
                case 'connect':
                    $this->cont->connect();
                    break;
                case 'formSignUp':
                    $this->cont->formSignUp();
                    break;
                case 'signUp':
                    $this->cont->signUp();
                    break;
                default:
                    $this->cont->formSignIn();
                    break;
            }
        }
    }
?>