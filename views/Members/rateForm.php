<?php
/*
$id = $_GET['id'];
if($_POST['submit']) {
    //get data
    $id_post = mysql_real_escape_string(htmlentities($_POST['id']));
    $rating = htmlentities($_POST['rating']);
    $get=mysql_query("SELECT * FROM members WHERE member_id='$id_post'");
    $get=mysql_fetch_assoc($get);
    $get = $get['rating'];

    if($get ==0) {
        $newrating = $get + $rating;}
    else {
    $newrating = ($get + $rating)/2;}

    //$update = mysql_query("UPDATE members SET rating='$newrating' WHERE id='$id_post'");
    header("Location: index.php?page=member&action=seeUserProfile&id=<?php echo  $this->member->member_id ?>");
}
*/

?>



<form  name="rateUser" id="rateUser" action='index.php?page=member&action=rateUser&id=<?php echo  $this->member->member_id ?>' method ='POST'>
    Choose rating:
    <input type='hidden' name="member_id" value='<?php echo $this->member->member_id ?>'>
    <?php echo $this->member->member_id ?>
    <select name='rating'>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
    </select>
    <input type='hidden' name="id" value='3'>
    <p/>
    <input name='submit' type='submit' value='Rate'> Current Rating:

</form>
