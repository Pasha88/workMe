<?php
	
	// Start headers and sessions
	ob_start();

    ini_set('session.cookie_httponly', true);
    session_start();
    if(!isset($_POST['chapta'])){
        $_SESSION['secure'] = rand (1000,9999);
    }
    if(isset($_SESSION['last_ip']) === false) {
        $_SESSION['last_ip'] = $_SERVER['REMOTE_ADDR'];
    }
    if($_SESSION['last_ip'] !== $_SERVER['REMOTE_ADDR']) {
        session_unset();
        session_destroy();
    }

	// MySQL Connection
	mysql_connect("localhost", "root", "");
	mysql_select_db("lisa");
	
	// Include func files
	include("func/album.func.php");
	include("func/image.func.php");
	include("func/user.func.php");
	include("func/thumb.func.php");
	
?>