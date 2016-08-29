<?php

include_once "../core/init.php"; // likes functions
//Start
if (isset($_POST['member_id'], $_SESSION['member_id']) && member_exists($_POST['member_id'])){
    $member_id = $_POST['member_id']; //(int)
    $rating = $_POST['rating'];
    if (previously_liked($member_id) == true){ //изменил ==
        echo 'You`ve already liked this!';
    } else{
        add_like($member_id, $rating);
        echo 'success';
    }
}
?>