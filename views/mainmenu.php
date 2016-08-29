

<div id="mainmenu" class="mainmenu">

    <?php
    if($this->loggedIn === true and $this->loginMember->role ==('member')){
        ?>
        <ul class="nav nav-tabs nav-stacked span2" id="leftbar">
            <li> <a href="index.php?page=Message&action=seeinbox"">messages</a> </li>
            <li> <a href="index.php?page=item&action=seeAllItems">See all items </a> </li>
            <li> <a href="index.php?page=item&action=seeUserProducts">See Your items</a>  </li>
            <li> <a href="index.php?page=item&action=addProductForm">Add product</a>  </li>
            <li> <a href="index.php?page=member&action=seeUserProfile&id=<?php echo $_SESSION['member_id'] ?>">Your profile</a>  </li>
            <li> <a href="index.php?page=member&action=seeAllUsers">List of users</a>  </li>
            <li> <a href="index.php?page=member&action=lookingForTaxi">Looking for taxi</a> </li>
            <li> <a href="index.php?page=member&action=proffesion">Searching</a>  </li>
            <li> <a href="albums/albums.php">albums </a></li>
            <li> <a href="index.php?page=member&action=edit">Edit your Data</a>  </li>
            <li> <a href="index.php?page=member&action=logout">Log out</a>  </li>
        </ul>
    <?php } else if ($this->loggedIn === true and $this->loginMember->role === ('admin')){
         ?>
        <ul class="nav nav-tabs nav-stacked span2" id="leftbar">
            <li> <a href="index.php?page=Message&action=seeinbox"">messages</a> </li>
            <li> <a href="index.php?page=item&action=seeAllItems">See all items</a> </li>
            <li> <a href="index.php?page=item&action=seeUserProducts">See Your items</a> </li>
            <li> <a href="index.php?page=item&action=addProductForm">Add product</a> </li>
            <li> <a href="index.php?page=member&action=seeUserProfile">Your profile</a> </li>
            <li> <a href="index.php?page=member&action=seeAllUsers2">List of users.</a></li>
            <li> <a href="index.php?page=member&action=edit">Edit your Data</a></li>
            <li> <a href="index.php?page=member&action=proffesion">Searching</a></li>
            <li> <a href="albums.php">albums</a></li>
            <li> <a href="index.php?page=member&action=logout">Log out</a> </li>
        </ul>
    <?php
    } else {
        echo "<div class='message'>You are not logged in </div>";
        ?>
         <ul class="nav nav-tabs nav-stacked span2" id="leftbar">
            <li> <a href="index.php?page=item&action=seeAllItems">see all items</a>   </li>
            <li> <a href="index.php?page=member&action=loginForm">log in</a>  </li>
            <li> <a href="index.php?page=member&action=registrationForm"> register </a>  </li>
            <li> <a href="index.php?page=member&action=seeAllUsers">list of users.</a>  </li>
         </ul>
    <?php
    }


    ?> </div>