<?php
    function get_members() {
        $members = array();

        $query = mysql_query("SELECT member_id, username, member_likes FROM members");
        while(($row = mysql_fetch_assoc($query)) !==false) {
            $members[] = array(
                'member_id' => $row['member_id'],
                'username' => $row['username'],
                'member_likes' => $row['member_likes']
            );
        }
       //echo '<pre>' ,print_r($members, true), '</pre>';
        return $members;
    }

?>