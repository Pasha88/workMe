<?php
    function upload_image($image_temp, $image_ext, $album_id) {
        $album_id = (int) $album_id;

        mysql_query("INSERT INTO images VALUES ('', '".$_SESSION['member_id']."', '$album_id', UNIX_TIMESTAMP(), '$image_ext')");

        $image_id = mysql_insert_id();
        $image_file = $image_id.'.'.$image_ext;
        move_uploaded_file($image_temp, 'uploads/'.$album_id.'/'.$image_file);

        create_thumb('uploads/'.$album_id.'/', $image_file, 'uploads/thumbs/'.$album_id.'/');


    }

    function get_images($album_id) {
        $album_id = (int)$album_id;

        $images = array();

        $image_query = mysql_query("SELECT image_id, album_id, timestamp, ext FROM images WHERE album_id='$album_id' AND member_id='".$_GET['id']."'");
        while($images_row = mysql_fetch_assoc($image_query)) {
            $images[] = array(
                    'id' => $images_row['image_id'],
                    'album' => $images_row['album_id'],
                    'timestamp' => $images_row['timestamp'],
                    'ext' => $images_row['ext']
            );
        }
        return $images;

    }

    function image_check($image_id) {
        $image_id = (int)$image_id;
        $query = mysql_query("SELECT COUNT(image_id) FROM images WHERE image_id='$image_id' AND member_id=".$_GET['id']." ");
        return (mysql_result($query, 0) == 0) ? false : true;
    }

    function delete_image($image_id) {
        $image_id = (int) $image_id;

        $image_query = mysql_query("SELECT album_id, ext FROM images WHERE image_id ='$image_id'  AND member_id=".$_SESSION['member_id']." ");
        $image_result = mysql_fetch_assoc($image_query);

        $album_id = $image_result['album_id'];
        $image_ext = $image_result['ext'];

        unlink('uploads/'.$album_id.'/'.$image_id.'.'.$image_ext);
        unlink('uploads/thumbs'.$album_id.'/'.$image_id.'.'.$image_ext);

        mysql_query("DELETE FROM images WHERE image_id ='$image_id'  AND member_id=".$_SESSION['member_id']." ");

    }
?>