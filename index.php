<?php
    include_once "connection.php";
    include_once "genericView.php";

    include_once "modules/mainPage/mod_mainPage.php";
    include_once "modules/connection/mod_connection.php";

    Connection::connect();
    session_start();
    
    $module;
    if(isset($_GET['module'])){
        $moduleVar = $_GET['module'];
        switch($moduleVar){
            case 'connection':
                include_once "modules/connection/mod_connection.php";
                $module = new ModConnection();
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
        include_once "modules/connection/mod_connection.php";
        $module = new ModMainPage();
    }
    $module->saveDisplay();

    require_once "template.php";
?>