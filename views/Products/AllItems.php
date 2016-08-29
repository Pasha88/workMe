<table border="1">

	<tr>
	<th>item number</th>  <th> product_id</th> <th>owner_id </th><th> title</th> <th> subtitle</th> <th>description </th> <th> category</th> <th> link to the profile of item</th>
	</tr>
	
	<?php for ($i = 0; $i<count ($allProducts); $i++){ ?>
		
		<tr>
			<td> <?php echo $i+1  ?> </td>
			<td> <?php echo $allProducts[$i]->product_id ?></td>
			<td> <?php echo $allProducts[$i]->owner_id ?> </td>
			<td> <?php echo $allProducts[$i]->title ?> </td>
			<td> <?php echo $allProducts[$i]->subtitle ?> </td>
			<td> <?php echo $allProducts[$i]->description ?></td>
			<td> <?php echo $allProducts[$i]->category ?> </td>
			<td> <a href="index.php?page=item&action=viewProduct&id=<?php echo $allProducts[$i]->product_id ?>"> link to the profile of item</a> </td>
			
		</tr>
		
	
	<?php } ?>