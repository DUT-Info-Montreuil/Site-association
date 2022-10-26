<?php
    include_once "modules/connection/view_connection.php";
    include_once "modules/connection/model_connection.php";
    class ContConnection{
        public $model;
        public $view;
        public $action;

        public function __construct(){
            isset($_GET['action']) ? $this->action = $_GET['action'] : $this->action = 'default';
            $this->model = new ModelConnection();
            $this->view = new ViewConnection();
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
                        $_SESSION['username'] = $username;
                        $_SESSION['id'] = $row['id'];
                        //header('Location: index.php');
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
                //header('Location: index.php');
            }else{
                echo "Missing information";
            }
        }
    }
?>