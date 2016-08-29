<?php
    include 'core/init.php'
?>

<!doctype html>
<html lang="ru" >
<head >
<link type="text/css" rel="stylesheet" href="css/style.css"/>
<title>members</title>
    <script type="text/javascript" src="js/jquery-latest.js"></script>
    <script type="text/javascript" src="js/like.js"></script>
</head>
<body>
<?php
    $members = get_members();
    if(count($members)==0) {
        echo 'Sorry, there are no members';
    } else {
        echo '<ul>';
        foreach($members as $member) {
            echo '<li><p>',$member['username'] ,'</p><p><a class="like" href="#" onclick="like_add(', $member['member_id'] ,')">Like </a><span id="member_', $member['member_id'], '_likes">', $member['member_likes'], '</span> like this </p></li>';
        }
        echo '</ul>';
    }
?>
</body>
</html>
