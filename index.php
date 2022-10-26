<?php
    include_once "connection.php";
    include_once "genericView.php";
    include_once "modules/connection/mod_connection.php";
    Connection::connect();
    session_start();
    if(isset($_GET['module'])){
        $module = $_GET['module'];
        switch($module){
            case 'connection':
                include_once "modules/connection/mod_connection.php";
                $modConnection = new ModConnection();
                break;
            default:
                include_once "modules/connection/mod_connection.php";
                $modConnection = new ModConnection();
                break;
        }
    }else{
        include_once "modules/connection/mod_connection.php";
        $modConnection = new ModConnection();
    }
    $modConnection->saveDisplay();


    require_once "template.php";
?>