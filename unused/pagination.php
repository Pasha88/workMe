<?php
include 'db.inc.php';
$per_page = 5;

$pages_query = mysql_query("SELECT COUNT(`name_id`) FROM `names`");
$pages = ceil(mysql_result($pages_query, 0) / $per_page);

$page = (isset($_GET['page'])) ? (int)$_GET['page'] :1;
$start = ($page -1) * $per_page;
$query = mysql_query("SELECT `name` FROM `names` LIMIT $start, $per_page ");
while($query_row = mysql_fetch_assoc($query)) {
    echo '<p>', $query_row['name'], '</p>';
}

if($pages >=1 && $page<=$pages) {
    for ($x=1; $x<=$pages; $x++) {
        echo ($x == $page) ? '<strong><a href="?page='.$x.'">'.$x.'</a><</strong>' : '<a href="?page='.$x.'">'.$x.'</a>';
    }
}



?>