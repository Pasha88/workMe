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
    <script>
        $(function () {
            $('form').on('submit', function (e) {
                $.ajax({
                    type: 'post',
                    url: 'post.php',
                    data: $('form').serialize(),
                    success: function () {
                        alert('form was submitted');
                    }
                });
                e.preventDefault();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#rating').on('change', do_something);
        });

        function do_something() {
            var rating = parseInt($('#rating').val());
            alert(rating);
            $.ajax({
                url:        'ajax/like_add.php',
                type:       'POST',
                dataType:   'json',
                data:       { value: rating },
                success:    function(data) {
                    alert("Success!");
                }
            });
        }
    </script>
</head>
<body>
<?php

/*function add_like($member_id) {
    $rating = $_POST['rating'];
    $member_id = (int)$member_id;
    mysql_query("UPDATE `members` SET `member_likes` = `member_likes` + '$rating' WHERE `member_id` ='$member_id'");
    mysql_query("INSERT INTO `likes` (`member_id`, `user_id`) VALUES (".$_SESSION['member_id'].", '$member_id') ");
}*/


    $members = get_members();
    if(count($members)==0) {
        echo 'Sorry, there are no members';
    } else {
        echo '<ul>';
        foreach($members as $member) {
            echo '<li><p>',$member['username'] ,'</p><p><a class="like" href="#" onclick="like_add(', $member['member_id'] ,')">Like </a><span id="member_', $member['member_id'], '_likes">', sprintf("%01.2f",$member['member_likes']/$member['hits']), '</span> like this </p></li>';
        }
        echo '</ul>';
    }
?>
<!--<form action="index.php?id=14" method="POST">
    <select name="rating">
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    <input type="submit" value="rate">-->

    <select id="rating" name="rating" onChange="do_something()">
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    <div id="some_div">

    </div>
</form>
</body>
</html>
