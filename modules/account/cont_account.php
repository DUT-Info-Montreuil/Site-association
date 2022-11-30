<?php
    include_once "modules/account/view_account.php";
    include_once "modules/account/model_account.php";
    class ContConnection{
        public $model;
        public $view;
        public $action;

        public function __construct(){
            isset($_GET['action']) ? $this->action = $_GET['action'] : $this->action = 'default';
            if(isset($_SESSION['id']) && $this->action != 'logout'){
                $this->action = 'alreadyConnected';
            }
            $this->model = new ModelAccount();
            $this->view = new ViewAccount();
        }

        public function formSignIn(){
            $this->view->formSignIn();
        }

        public function connect(){
            if(isset($_POST['username']) && isset($_POST['password'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $row = $this->model->getUserData($username);
                if($row){
                    if(password_verify($password, $row['password'])){
                        $_SESSION['id'] = $row['id'];
                        header('Location: index.php');
                    }else{
                        echo "Incorrect information";
                    }
                }
            }else{
                echo "Missing information";
            }
        }

        public function formSignUp(){
            $this->view->formSignUp();
        }

        public function signUp(){
            if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['promotion'])){
                $this->model->signUp($_POST['username'], $_POST['password'], $_POST['email'], $_POST['promotion']);
                header('Location: index.php');
            }else{
                echo "Missing information";
            }
        }

        public function logOutVisuals(){
            echo "You are already connected
            <br><br>
            <a href='index.php?action=logout&module=connection'>Log out</a>";
        }

        public function logOut(){
            echo "You are now disconnected";
            session_destroy();
            header('Location: index.php');
        }
    }
?>