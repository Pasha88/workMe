<?php
//Function for likes button

include_once "../core/init.php";

if(isset($_POST['member_id'], $_SESSION['member_id']) && member_exists($_POST['member_id'])) {
    echo like_count($_POST['member_id']);
}

//верно
?>