<?php
    include_once "connection.php";
    include_once "genericView.php";


    Connection::connect();
    session_start();
    
    $module;
    if(isset($_GET['module'])){
        switch($_GET['module']){
            case 'connection':
                include_once "modules/connection/mod_connection.php";
                $module = new ModConnection();
                break;
            case 'request':
                include_once "modules/request/mod_request.php";
                $module = new ModRequest();
                break;
            case 'events':
                include_once "modules/events/mod_events.php";
                $module = new ModEvents();
                break;
            default:
                // error
                break;
        }
    }else{
        include_once "modules/mainPage/mod_mainPage.php";
        $module = new ModMainPage();
    }
    $module->saveDisplay();

    require_once "template.php";
?>