<?php
	
	// Start headers and sessions
	ob_start();
	session_start();
	
	// MySQL Connection
	mysql_connect("localhost", "root", "");
	mysql_select_db("lisa");
	
	// Include func files
	include("func/album.func.php");
	include("func/image.func.php");
	include("func/user.func.php");
	include("func/thumb.func.php");
	
?>