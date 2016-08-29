
<?php
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
    include("views/header.php");
	define('DEFAULT_CONTROLLER','MemberController'); // itemcontroler...
	define('NOT_FOUND_CONTROLLER','NotFoundController');
	
	require_once('db_connection.php');
	
	$DataBase = mysql_connect(DB_HOST, DB_USER, DB_PASS);
	mysql_select_db (DB_NAME , $DataBase);
	
	require_once('Application.php');
	$application = new Application();
	$application->init($DataBase);
	$application->run();


?>