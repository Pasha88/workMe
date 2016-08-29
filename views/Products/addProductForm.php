	start of add product form <br/>
<form name="addProduct" id="addProduct" action="index.php?page=item&action=addProduct" method="post">
		
		
		<p>	<input name="title" id="title" required>title </input> </p>
		
		<p>	<input name="subtitle" id="subtitle" required>subtitle  </input> </p>
		
		description
		<p>	<textarea namedescription id="description" name="description"></textarea> </p>
		
		<p>	<input name="price" id="price" onKeyPress="return numbersonly(this, event)" required> price </input> </p>
		
		<select name="category" id="category">
			<option value="sword">sword</option>
			<option value="bow">bow</option>
			<option value="staff">staff</option>
			<option value="armor">armor</option>
			<option value="shield">shield</option>
			<option value="boots">boots</option>
		</select>
		
		<img src="views/chapta.php" /> <br>
		<input type="text" name="chapta" id="chapta" onKeyPress="return numbersonly(this, event)"required /> 
	
		<button type="submit"> submit </button> <br/>
		end of add product form
</form>