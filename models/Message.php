<?php
	class Message{
		private $DataBase;
		
		public $id;
		public $receiver;
		public $sender;
		public $subject;
		public $body;
		public $date_sent;
		public $status;
	
		public function __construct($DataBase){
			$this->DataBase = $DataBase;
		}
		
		public function send (){
			$sql = "INSERT INTO  messages (receiver, sender, subject, body, date_sent, status )
					VALUES ( '{$this->receiver}',
							'{$this->sender}',
							'{$this->subject}',
							'{$this->body}',
							'{$this->date_sent}',
							'unread')";
							
			$result = mysql_query($sql, $this->DataBase) ;
			ECHO MYSQL_ERROR ();
		}
		
		public function getAll($id){
			$sql = "SELECT * FROM messages WHERE receiver ='$id'  ORDER BY date_sent DESC";
			$result =  mysql_query($sql, $this->DataBase);
			$allMessages = array();
			
			if (mysql_num_rows($result) > 0){
				while ($message_row = mysql_fetch_array ($result)) {
				$message = new Message ($this->DataBase);
				
				$message->id = $message_row['id'];
				$message->sender = $message_row['sender'];
				$message->subject = $message_row['subject'];
				$message->date_sent = $message_row['date_sent'];
				$message->status = $message_row['status'];
				
				$allMessages[] = $message;
				}
				return $allMessages;
			} else {
				return false;
			}			
		
		}
		
		public function read($message_id){
			$sql = "UPDATE messages SET status = 'read' WHERE id = '$message_id'";
			mysql_query($sql, $this->DataBase);
		}

        public function rate($member_id){
            $sql = "UPDATE messages SET rating = 'read' WHERE id = '$message_id'";
            mysql_query($sql, $this->DataBase);
        }
		
		public function get($message_id){
			$sql = "SELECT * FROM messages WHERE id='$message_id'";
			$result = mysql_query($sql, $this->DataBase);
			
			$message_row = mysql_fetch_array ($result);
			
			$this->id = $message_row['id'];
			$this->sender = $message_row['sender'];
			$this->subject = $message_row['subject'];
			$this->body = $message_row['body'];
			$this->date_sent = $message_row['date_sent'];
			$this->receiver = $message_row['receiver'];
		}
		
		public function delete($message_id){
		$sql = "DELETE FROM messages WHERE id='$message_id'";
		mysql_query($sql, $this->DataBase);
		echo "message is deleted";
		}
		
	}

?>


















