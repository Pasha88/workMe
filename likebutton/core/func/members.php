<?php
    function get_members() {
        $members = array();
        $member_current_id = $_GET['id'];

        $query = mysql_query("SELECT member_id, username, member_likes,hits FROM members WHERE member_id='$member_current_id'");
        while(($row = mysql_fetch_assoc($query)) !==false) {
            $members[] = array(
                'member_id' => $row['member_id'],
                'username' => $row['username'],
                'hits' => $row['hits'],

                'member_likes' => $row['member_likes']
            );
        }
       //echo '<pre>' ,print_r($members, true), '</pre>';
        return $members;
    }

?>