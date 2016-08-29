<?php
    function album_data($album_id) {
        $album_id =(int)$album_id;

        $args = func_get_args();
        unset($args[0]);
        $fields = '`'.implode('`, `', $args).'`';
        $query = mysql_query("SELECT $fields FROM `albums` WHERE album_id='$album_id' AND `member_id`=".$_SESSION['member_id']);
        $query_result = mysql_fetch_assoc($query);
        foreach($args as $field) {
            $args[$field] = $query_result[$field];
        }
        return $args;
    }

    function album_check($album_id) {
            $album_id = (int)$album_id;
            $query = mysql_query("SELECT COUNT(album_id) FROM albums WHERE album_id='$album_id' AND `member_id`=".$_SESSION['member_id']);
            return (mysql_result($query, 0) == 1) ? true : false;
    }

    function get_albums() {
        $albums = array();

        $albums_query = mysql_query("SELECT albums.album_id, albums.timestamp, albums.name, LEFT(albums.description, 50) AS description, COUNT(images.image_id) AS image_count
        FROM albums albums
        LEFT JOIN images
        ON albums.album_id = images.album_id
        WHERE albums.member_id = ".$_SESSION['member_id']."
        GROUP BY albums.album_id
         ");

        while($albums_row = mysql_fetch_assoc($albums_query)) {
            $albums[] = array(
                'id' => $albums_row['album_id'],
                'timestamp' => $albums_row['timestamp'],
                'name' => $albums_row['name'],
                'description' => $albums_row['description'],
                'count' => $albums_row['image_count']
            );
        }
        return $albums;
    }

    function get_user_albums() {
        $albums = array();

        $albums_query = mysql_query("SELECT albums.album_id, albums.timestamp, albums.name, LEFT(albums.description, 50) AS description, COUNT(images.image_id) AS image_count
            FROM albums albums
            LEFT JOIN images
            ON albums.album_id = images.album_id
            WHERE albums.member_id = ".$_GET['id']."
            GROUP BY albums.album_id
             ");

        while($albums_row = mysql_fetch_assoc($albums_query)) {
            $albums[] = array(
                'id' => $albums_row['album_id'],
                'timestamp' => $albums_row['timestamp'],
                'name' => $albums_row['name'],
                'description' => $albums_row['description'],
                'count' => $albums_row['image_count']
            );
        }
        return $albums;
    }

    function create_album($album_name, $album_description) {
        $album_name = mysql_real_escape_string(htmlentities($album_name));
        $album_description = mysql_real_escape_string(htmlentities($album_description));

        mysql_query("INSERT INTO albums VALUES('','".$_SESSION['member_id']."',UNIX_TIMESTAMP(),'$album_name','$album_description')");
        mkdir('uploads/'.mysql_insert_id(), 0744);
        mkdir('uploads/thumbs/'.mysql_insert_id(), 0744);
    }

    function edit_album($album_id, $album_name, $album_description) {
        $album_id = (int)$album_id;
        $album_name = mysql_real_escape_string($album_name); //у себя тоже поменять для избежании sql-injection
        $album_description = mysql_real_escape_string($album_description);

        mysql_query("UPDATE albums SET name='$album_name', description='$album_description' WHERE album_id='$album_id' AND member_id='".$_SESSION['member_id']."'");

    }

    function delete_album($album_id) {
          $album_id = (int)$album_id;
        //To do: use a method to delete all files from album folder and thumbs folder, then the directory

        mysql_query("DELETE FROM albums WHERE album_id='$album_id' AND member_id='".$_SESSION['member_id']."'");
        mysql_query("DELETE FROM images WHERE album_id='$album_id' AND member_id='".$_SESSION['member_id']."'");
    }

?>