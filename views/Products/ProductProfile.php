<table>
	<tr><td>Product details</td></tr>
	
	<tr><td>product_id</td> <td> <?php echo "{$product->product_id}" ;?></td></tr>
	
	<tr><td>owner_id</td> <td> <?php echo"{$product->owner_id}" ?></td></tr>
	
	<tr><td>owner name</td> <td> <?php echo"{$product->title}"?></td></tr>
	
	<tr><td>subtitle</td> <td> <?php echo "{$product->subtitle}" ?></td></tr>
	
	<tr><td>Product details</td>  <td> <?php echo"{$product->description}" ?></td></tr>
	
	<tr><td>Product details</td>  <td> <?php echo "{$product->category}" ?></td></tr>
	<tr><td>Price</td>  <td> <?php echo "{$product->price}" ?></td></tr>
	</table>
	
	
	<?php if (!isset ($this->application->loginMember->member_id)){	?>
		
		You are not logged in
	
	<?php }elseif($product->owner_id != $this->application->loginMember->member_id ){ ?>
		
		<button type="button" onclick="document.location='index.php?page=item&action=buyProduct&product_id=<?php echo $product->product_id; ?>'"> Buy Item </button>
	
	<?php } else { echo "you are owner or this item"; } ?>
	
	

	