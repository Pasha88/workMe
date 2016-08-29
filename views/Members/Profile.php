<?php
    include "likebutton/core/init.php"
?>

<div class="centerinfo">
    <table class="profile">

        <tr> <td>ID:  </td> <td> <?php echo $this->member->member_id ?> </td> </tr>
        <tr> <td>FirstName </td> <td><?php echo $this->member->FirstName ?>  </td> </tr>
        <tr> <td>username: </td> <td><?php echo $this->member->member_id ?>  </td> </tr>
        <tr> <td> job1:</td> <td><?php echo $this->member->job1 ?>  </td> </tr>
        <tr> <td> job2:</td> <td><?php echo $this->member->job2 ?>  </td> </tr>
        <tr> <td> job3:</td> <td><?php echo $this->member->job3 ?>  </td> </tr>
        <tr> <td> Rating:</td> <td> <?php

                if($this->member->hits>0) {
                    echo sprintf("%01.2f",$this->member->member_likes/$this->member->hits);} else {
                    echo 0;
                }
                ?> </td> </tr>
        <tr> <td> Credits:</td> <td> <?php echo $this->member->credits ?> </td> </tr>

        <?php
        $member= $this->member->member_id;
        ?>


        <?php
        if (isset($this->application->loginMember->member_id)){
            if ($this->application->loginMember->member_id == $this->member->member_id){ ?>
                <a href="index.php?page=Message&action=seeinbox"> see inbox</a>
            <?php
            } else { ?>
                <a href="index.php?page=Message&action=sendMessageForm&id=<?php echo $this->member->member_id ;?>"> send message to this user  <br> <br> </a>

                <?php
                if ( ($this->application->loginMember->role === 'admin' ) and ($this->member->role === 'member') ){ ?>
                    <input type='button' onClick="location.href='index.php?page=member&action=banUser&id=<?php echo $this->member->member_id; ?>'" value='ban this user'>
                <?php }
                elseif ( ($this->application->loginMember->role === 'admin' ) and ($this->member->role === 'banned') ){ ?>
                    <input type='button' onClick="location.href='index.php?page=member&action=unbanUser&id=<?php echo $this->member->member_id; ?>'" value='unban this user'>

                <?php
                }
            }
        }
        ?>
    </table>
</div>
<div class="rightbar">
<?php
$albums = get_user_albums();

if(empty($albums)) {
    echo '<p>No any albums</p>';
} else {
    echo '<p>User Albums</p>';
    foreach($albums as $album) {
        echo '<p><a href="http://localhost/new/Lisa4/Lisa2/view_album.php?album_id=',$album['id'],'&id='.$_GET['id'], '">',$album['name'] ,'</a>(',$album['count'], ' images) <br/>
        ', $album['description'], '...<br />

        <a href="http://localhost/new/Lisa4/Lisa2/albums/view_album.php?album_id=',$album['id'],'&id='.$_GET['id'],'">View</a>

        </p>';
    }
}
/*
 <a href="http://localhost/new/Lisa4/Lisa2/edit_album.php?album_id=',$album['id'],'">Edit</a><a href="http://localhost/new/Lisa4/Lisa2/delete_album.php?album_id=',$album['id'],'">\ Delete</a>
$album_id = 8;
$album_data = album_data($album_id, 'name', 'description');

echo '<h3>',$album_data['name'] ,'</h3>';


$images = get_images($album_id);

if(empty($images)) {
    echo 'There are no images in this album';
} else {
    foreach($images as $image) {
        // echo '<a href="uploads/', $image['album'], '/', $image['id'], '.', $image['ext'],'"><img src="uploads/thumbs/', $image['album'], '/', $image['id'], '.', $image['ext'], '" title="Uploaded ', date('D M Y / h:i', $image['timestamp']) ,'" alt="" data-lightbox="roadtrip"/> </a>[<a href="delete_image.php?image_id=', $image['id'] ,'">x</a>]';
        echo '<div>
		<div style="float: left">
			<div class="image-set">
			    <a class="example-image-link" href="http://localhost/new/Lisa4/Lisa2/uploads/', $image['album'], '/', $image['id'], '.', $image['ext'],'" data-lightbox="example-set"><img class="example-image" src="http://localhost/new/Lisa4/Lisa2/uploads/thumbs/', $image['album'], '/', $image['id'], '.', $image['ext'], '" data-lightbox="example-set" alt="thumb-1" width="120" height="100"/></a>
                </a>[<a href="delete_image.php?image_id=', $image['id'] ,'">x</a>]
            </div>
		</div>
</div>';
    }
}*/

?>
<?php

$members = get_members();
if(count($members)==0) {
    echo 'Sorry, there are no members';
} else {
    echo '<ul>';
    foreach($members as $member) {
        echo '<li><p>',$member['username'] ,'</p><p><a class="like" href="#" onclick="like_add(', $member['member_id'] ,')">Like </a><span id="member_', $member['member_id'], '_likes">', $member['member_likes'], '</span> times </p></li>';
        echo '<p><a href="http://localhost/new/Lisa4/Lisa2/likebutton/index.php?id='.$_GET['id'],'">Rate user</a>

        </p>';
    }
    echo '</ul>';
}
?>
</div>

<script>
    var idcomments_acct = 'c8e3e8d811f914aadcdafc8e7a9b5e4f';
    var idcomments_post_id;
    var idcomments_post_url;

</script>
<span id="IDCommentsPostTitle" style="display:none"></span>
<script type='text/javascript' src='http://www.intensedebate.com/js/genericCommentWrapperV2.js'></script>



