<?php

// Start headers and sessions
ob_start();

ini_set('session.cookie_httponly', true);
session_start();

include 'db/connect.php';
include 'func/members.php';
include 'func/like.php';



?>