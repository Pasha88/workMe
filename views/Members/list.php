<div class="center">
<div class="centertable">
<table border="1" id="myTable" class="tablesorter">
     <thead class="headerSortUp">
        <tr>
            <th> member_id</th>
            <th>FirstName</th>
            <th> username</th>
            <th> job1 </th>
            <th> job2 </th>
            <th> job3 </th>
            <th> rating</th>
            <th> link </th>
	    </tr>
     </thead>
    <tbody>
	<?php for ($i = 0; $i<count ($allMembers); $i++){ ?>

        <tr>

			<td> <?php echo $allMembers[$i]->member_id ?></td>
			<td> <?php echo $allMembers[$i]->FirstName ?> </td>
			<td> <?php echo $allMembers[$i]->username ?> </td>
            <td> <?php echo $allMembers[$i]->job1 ?> </td>
            <td> <?php echo $allMembers[$i]->job2 ?> </td>
            <td> <?php echo $allMembers[$i]->job3 ?> </td>
            <td> <?php  if($allMembers[$i]->hits>0) {
                    echo sprintf("%01.2f",$allMembers[$i]->member_likes/$allMembers[$i]->hits);} else {
                    echo 0;
                }
                ?> </td>
			<td> <a href="index.php?page=member&action=seeUserProfile&id=<?php echo $allMembers[$i]->member_id ?>"> LInk to the profile</a> </td>
		</tr>

</div>

	<?php /*if($pages >=1 && $page<=$pages) {
            for ($x=1; $x<=$pages; $x++) {
                echo ($x == $page) ? '<strong><a href="?page='.$x.'">'.$x.'</a></strong>' : '<a href="?page='.$x.'">'.$x.'</a>';
            }
        } */
    } ?>
    </tbody>
    </table>
</div>
