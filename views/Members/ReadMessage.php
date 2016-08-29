<a href ="index.php?page=Message&action=sendMessageForm&id=<?php echo $message->sender  ?>"> reply </a> <br><br>
<table border="1">
	<tr>  <td>sender_id </td> <td> <?php echo $message->sender ?>  </td> </tr>
	<tr> <td>Subject: </td> <td> <?php echo $message->subject ?>  </td> </tr>
	<tr> <td>Message </td> <td> <?php echo $message->body ?>  </td> </tr>
	<tr> <td>date </td> <td> <?php echo $message->date_sent ?>  </td> </tr>
	
	
</table>
<br><br>
<a href="index.php?page=Message&action=deleteMessage&id=<?php echo $message->id ?>"> delete</a>