<?php
    include_once "modules/account/cont_account.php";
    class ModAccount{
        public $cont;
        public function __construct(){
            $this->cont = new ContConnection;
            switch(strtolower($this->cont->action)){ // cases are all in lowercase
                case 'default':
                    $this->cont->formSignIn();
                    break;
                case 'connect':
                    $this->cont->connect();
                    break;
                case 'formsignup':
                    $this->cont->formSignUp();
                    break;
                case 'signup':
                    $this->cont->signUp();
                    break;
                case 'connected':
                    $this->cont->profilePage();
                    break;
                case 'logout':
                    $this->cont->logOut();
                    break;
                default:
                    $this->cont->formSignIn();
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