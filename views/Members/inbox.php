<div class="center">

<table border="1">

	<tr>
	<th>Message number</th>  <th> Message_id</th> <th>sender_id </th><th> subject</th> <th>date_sent </th> <th> status</th> <th>read</th> <th>delete </th>
	</tr>

	
	<?php for ($i = 0; $i<count ($allMessages); $i++){ ?>
		
		<tr>
			<td> <?php echo $i+1  ?> </td>
			<td> <?php echo $allMessages[$i]->id ?></td>
			<td> <a href="index.php?page=member&action=seeUserProfile&id=<?php echo $allMessages[$i]->sender ?> "> <?php echo $allMessages[$i]->sender ?> </a></td>
			<td> <?php echo $allMessages[$i]->subject ?> </td>
			<td> <?php echo $allMessages[$i]->date_sent ?> </td>
			<td> <?php echo $allMessages[$i]->status ?></td>

            <td> <a href="index.php?page=Message&action=readMessage&id=<?php echo $allMessages[$i]->id ?>"> read</a> </td>
			<td> <a href="index.php?page=Message&action=deleteMessage&id=<?php echo $allMessages[$i]->id ?>"> delete</a></td>
		</tr>

	<?php } ?>
	</table>
</div>