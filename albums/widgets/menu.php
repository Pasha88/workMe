<a href="http://localhost/new/Lisa4/Lisa2/index.php" style="float: left">Work me</a>
<?php
if(!logged_in()) {
    ?>

    <!--<a href="register.php">Register</a>-->

<?php
} else {
    ?>

   <!-- <a href="logout.php">Log out</a>-->
    <a href="create_album.php">Create Album</a>
    <a href="albums.php">/Albums</a>
    <a href="upload_image.php">/ Upload image</a>

<div class="mainmenu" id="mainmenu">
    <ul class="nav nav-tabs nav-stacked span2" id="leftbar">
        <li> <a href="http://localhost/new/Lisa4/Lisa2/index.php?page=Message&action=seeinbox"">messages</a> </li>
        <li> <a href="http://localhost/new/Lisa4/Lisa2/index.php?page=item&action=seeAllItems">See all items </a> </li>
        <li> <a href="http://localhost/new/Lisa4/Lisa2/index.php?page=item&action=seeUserProducts">See Your items</a>  </li>
        <li> <a href="http://localhost/new/Lisa4/Lisa2/index.php?page=item&action=addProductForm">Add product</a>  </li>
        <li> <a href="http://localhost/new/Lisa4/Lisa2/index.php?page=member&action=seeUserProfile&id=<?php echo $_SESSION['member_id'] ?>">Your profile</a>  </li>
        <li> <a href="http://localhost/new/Lisa4/Lisa2/index.php?page=member&action=seeAllUsers">List of users</a>  </li>
        <li> <a href="http://localhost/new/Lisa4/Lisa2/index.php?page=member&action=lookingForTaxi">Looking for taxi</a> </li>
        <li> <a href="http://localhost/new/Lisa4/Lisa2/index.php?page=member&action=proffesion">Searching</a>  </li>
        <li> <a href="albums.php">albums </a></li>
        <li> <a href="http://localhost/new/Lisa4/Lisa2/index.php?page=member&action=edit">Edit your Data</a>  </li>
        <li> <a href="http://localhost/new/Lisa4/Lisa2/index.php?page=member&action=logout">Log out</a>  </li>
    </ul>
</div>


<?php
}
?>