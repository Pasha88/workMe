<form name="sendMessage" id="sendMessage" action="index.php?page=Message&action=SendMessage&reciver=<?php echo $reciver ?>" method="post">
		
		
		<p>	<input name="subject" id="subject" required> subject </input> </p>
		
		
		
		<p>	<textarea  id="message" name="message"> write your message here</textarea> </p>
		
		<img src="views/chapta.php" /> <br>
		<input type="text" name="chapta" id="chapta" onKeyPress="return numbersonly(this, event)"required /> 
	
		<button type="submit"> submit </button> <br/>
</form>