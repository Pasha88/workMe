<?php
function member_exists($member_id) {
    $member_id = (int)$member_id;
    return (mysql_result(mysql_query("SELECT COUNT(member_id) FROM members WHERE  member_id='$member_id'"),0) ==  0) ? false : true;
}

function previously_liked($member_id) {
    $member_id = (int)$member_id;
    return (mysql_result(mysql_query("SELECT COUNT(`like_id`) FROM likes WHERE `user_id` ='$member_id'  AND `member_id` = ".$_SESSION['member_id']." "), 0) == 0) ? false : true;
}

function like_count($member_id) {
    $member_id = (int)$member_id;
    return (int)mysql_result(mysql_query("SELECT member_likes FROM members WHERE member_id = '$member_id'"), 0, 'member_likes');
}

function add_like($member_id) {
    $member_id = (int)$member_id;
    mysql_query("UPDATE `members` SET `member_likes` = `member_likes` + 1 WHERE `member_id` ='$member_id'");
    mysql_query("INSERT INTO `likes` (`member_id`, `user_id`) VALUES (".$_SESSION['member_id'].", '$member_id') ");
}

?>

