<?php
function logged_in() {
    return isset($_SESSION['member_id']);
}
/*
function login_check($email, $password) {
    //  $email = mysql_real_escape_string($email);
    //  $login_query = mysql_query("SELECT COUNT(`user_id`) as `count` FROM `users` WHERE `email`='$email' AND `password` ='".md5($password)."'");
    //  return (mysql_result($login_query, 0) == 1) ? mysql_result($login_query, 0, 'user_id') : false;
    $email = mysql_real_escape_string($email);
    $query = mysql_query("SELECT COUNT(member_id) FROM members WHERE email='$email'");
    return (mysql_result($query, 0) == 1) ? true : false;
}

function user_data() {
    $args = func_get_args();
    $fields = '`'.implode('`, `', $args).'`';
    $query = mysql_query("SELECT $fields FROM `members` WHERE `member_id`=".$_SESSION['member_id']);
    $query_result = mysql_fetch_assoc($query);
    foreach($args as $field) {
        $args[$field] = $query_result[$field];
    }
    return $args;
}

function user_register($email, $name, $password) {
    $email = mysql_real_escape_string($email);
    $name = mysql_real_escape_string($name);
    mysql_query("INSERT INTO `members` VALUES('','$email','$name','".md5($password)."')");
    return mysql_insert_id();

}

function user_exists($email) {
    $email = mysql_real_escape_string($email);
    $query = mysql_query("SELECT COUNT(member_id) FROM members WHERE email='$email'");
    return (mysql_result($query, 0) == 1) ? true : false;
}*/
?>