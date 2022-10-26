<?php
    include_once "connection.php";
    include_once "modules/connection/mod_connection.php";
    Connection::connect();
    session_start();
?>

<HTML>
    <HEAD>
		<META CHARSET = 'UTF - 8'/>
		<TITLE> Site association </TITLE>
        <link href='style.css' rel='stylesheet' type='text/css'>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi' crossorigin='anonymous'>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3' crossorigin='anonymous'></script>
	</HEAD>

    <BODY>
        <HEADER>
            <H1> Site association </H1>
        </HEADER>
        <MAIN>
        
<?php
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
?>
        
        </MAIN>
        <FOOTER>
            <H2> wow </H2>
        </FOOTER>
    </BODY>
</HTML>