<?php
	class MessageController {
		private $application;
		
		public function __construct($application){
			require_once ("models/Message.php");
			require_once ("models/Members.php");
			$this->application= $application;
		}
	
		public function sendMessageFormAction() {
			$this->application->header();
			
			if (isset ($this->application->loginMember->member_id)){
				$reciver = $_GET['id'];
				include ("views/Members/SendMessage.php");
			}
			
			$this->application->footer();
		}
	
		public function SendMessageAction(){
			if (isset($_POST['subject']) and isset($_POST['message']) and isset($_POST['chapta']) and isset ($_GET['reciver']) ){
				
				if ($_POST['chapta'] == $_SESSION['secure'] ){
					$this->application->header();
					
					$reciver = (int)$_GET['reciver'];
					
					$message = new Message ($this->application->DataBase);
					
					$message->receiver = $reciver;
					$message->sender =  $this->application->loginMember->member_id;
					$message->subject = htmlentities(mysql_real_escape_string($_POST['subject']));
					$message->body = htmlentities(mysql_real_escape_string($_POST['message']));
					$message->date_sent = date("Y-m-d h:i:s");
					
					$message->send();
					//echo "your message is sent";
					
					$this->application->footer();
				} else {
					echo "wrong chapta";
				}
				
			}	
		}
		
		public function seeInboxAction(){
			$this->application->header();
			
			if (isset ($this->application->loginMember->member_id)){
				$id = $this->application->loginMember->member_id;
				$message = new Message ($this->application->DataBase);
				$allMessages = $message->getAll($id);
				
					if ($allMessages === false) {
						echo "you do not have any messages";
					} else {
						include ("views/Members/inbox.php");
					}
			}
			$this->application->footer();
		}
		
		public function readMessageAction(){
			$this->application->header();
			
			if (isset ($this->application->loginMember->member_id) and isset ($_GET['id'])){
				$message = new Message ($this->application->DataBase);
				$message_id = $_GET['id'];
				$message->get($message_id);
				
				if ($this->application->loginMember->member_id == $message->receiver ){
					$message->read($message_id); // where we will chage status to "unread";
					
					include ("views/Members/ReadMessage.php");
				}
			}
			
			$this->application->footer();
		
		}
		
		public function deleteMessageAction(){
		$this->application->header();
			
		if (isset ($this->application->loginMember->member_id) and isset ($_GET['id'])){
			$message_id = $_GET['id'];
			$message = new Message ($this->application->DataBase);
			$message->get($message_id);
			if ($this->application->loginMember->member_id == $message->receiver){
				$message->delete($message_id);
			}
		}
		
		$this->application->footer();
		}
	}


?>




















