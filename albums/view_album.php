<?php
include 'init.php';

if(!logged_in()) {
    header('Location:index.php');
    exit();
}
/*
if(!isset($_GET['album_id']) || empty($_GET['album_id']) || album_check($_GET['album_id']) ===false) {
    header('Location:albums.php');
    exit();
}*/

include 'template/header.php';

$album_id = $_GET['album_id'];
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
			    <a class="example-image-link" href="uploads/', $image['album'], '/', $image['id'], '.', $image['ext'],'" data-lightbox="example-set"><img class="example-image" src="uploads/thumbs/', $image['album'], '/', $image['id'], '.', $image['ext'], '" data-lightbox="example-set" alt="thumb-1" width="120" height="100"/></a>
                </a>[<a href="delete_image.php?image_id=', $image['id'] ,'">x</a>]
            </div>
		</div>
</div>';
    }
}


include 'template/footer.php';

?>