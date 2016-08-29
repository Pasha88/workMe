<?php
	class MemberController{
	
		private $application;
		private $members;
		private $message;
		private $id;
		
		public function __construct($application){
			require_once("models/Members.php");
			require_once("models/Products.php");
			$this->application = $application;
			$this->member = new Members($this->application->DataBase);
		}
		
		public function indexAction(){
			$this->application->header();
			$this->application->footer();
		}
	
		public function registrationFormAction(){
			$this->application->header();
			$this->application->registerForm();
			$this->application->footer();
		}

        public function searchingFormAction(){
            $this->application->header();
            $this->application->searchingForm();
            $this->application->footer();
        }

        public function ratingFormAction(){
            $this->application->header();
            $this->application->rateForm();
            $this->application->footer();
        }

        public function editionFormAction(){
            $this->application->header();
            $this->application->editionForm();
            $this->application->footer();
        }
		
		public function registerAction(){
			if (isset($_POST['Firstname']) and isset($_POST['LastName']) and isset($_POST['username']) and isset($_POST['email'])  and isset($_POST['password'])
                and isset($_POST['job1']) and isset($_POST['subway'])
            ){
				if ($_POST['chapta'] == $_SESSION['secure'] ){
					$_SESSION['secure'] = rand (1000,9999);
					$this->member->FirstName = htmlentities(mysql_real_escape_string($_POST['Firstname']));
					$this->member->LastName = htmlentities(mysql_real_escape_string($_POST['LastName']));
					$this->member->username = htmlentities(mysql_real_escape_string($_POST['username']));
					$this->member->email = htmlentities(mysql_real_escape_string($_POST['email']));
                    $this->member->password = htmlentities(mysql_real_escape_string($_POST['password']));
                    $this->member->job1 = htmlentities(mysql_real_escape_string($_POST['job1']));
                    $this->member->job2 = htmlentities(mysql_real_escape_string($_POST['job2']));
                    $this->member->job3 = htmlentities(mysql_real_escape_string($_POST['job3']));
                    $this->member->subway = htmlentities(mysql_real_escape_string($_POST['subway']));
					
					// PUT INFORMATION FROM FORM TO LOWER CASE
					$username = strtolower($this->member->username);
					$email  = strtolower($this->member->email);
					
					if ($this->member->checkMemberExist($username, $email) === true){
                        $randnumber =  mt_rand(). mt_rand();
                        $this->member->activationKey = md5($randnumber);
                        //chaneg link
                        $message1 = "Thank you for joining our small community to complete your registration please click on following link http://localhost/new/Lisa4/Lisa2/index.php?page=member&action=confirmRegistration&username". $this->member->username. "&code=". $this->member->activationKey ;
                        //mail($this->member->email, 'Verify of registration', $message1);
					$this->member->username = $username; 
					$this->member->email = $email;
					$this->member->role = 'Unconfirmed';
					$this->member->credits = '0';
                        $member_id = 0;
                        $this->member->save($member_id);



                        echo"<div> Hello {$this->member->username} you are added to  to databe whit and we sent you a email whit activation code please go to your email and click on your activation code to complete registration. Click <a href=http://localhost/new/Lisa4/Lisa2/index.php>here </a> to return to index page</div>";
				 } else {
					$_SESSION['secure'] = rand (1000,9999);
					echo "Username or password already exists in database";
				 
				 }
				} else {
					$_SESSION['secure'] = rand (1000,9999);
					$this->application->header();
					$this->application->registerForm();
					echo "WRONG CHAPTA PLEASE TRY AGAIN";
					$this->application->footer();
				
				}
		}
		}
        public function confirmRegistrationAction (){
            /*
                1. get activatrion code and username form link and
            */
            if ( isset($_GET['code']) and  isset($_GET['username'])){
                $ActivationKey= $_GET['code'];
                $username = $_GET['username'];

                $this->application->header();
                $this->member->registrationFinal($ActivationKey,$username) ;
                $this->application->footer();

            }else{
                $this->application->header();
                $this->application->footer();

            }

        }
		
		public function deleteAction(){
                $member_id = $_GET['member_id'];
                $this->member->get($member_id); // GET FORM DATABASE WHERE member_id = $member_id
                $this->member->delete($member_id);
                $this->message = "<div> User {$this->member->username} is deleted form database </div>";

                $this->listAction;

            }



        public function proffesionAction(){
            $this->application->header();
            $member = new Members ($this->application->DataBase);
            include ("views/Members/SearchingForm.php");

            $this->application->footer();
        }

            public function listAction(){
			$this->application->header();
			if(($this->application->loggedIn == true) and ($this->application->loginMember->role == 'admin')){
				$member = new Members ($this->application->DataBase);
				$allmembers = $member->getAll();
				
				include ("views/member/list.php");
			}	else{
				echo "<div> admin is not logged in </div>";
			}
		}
		
		public function seeAllUsersAction(){
			$this->application->header();

				$member = new Members ($this->application->DataBase);
				$allMembers = $member->getAll();
				
				include ("views/Members/list.php");
            $this->application->footer();

		}

        public function seeAllUsers2Action(){
            $this->application->header();
            $member = new Members ($this->application->DataBase);
            $allMembers = $member->getAll();




            include ("views/Members/list.php");

            $this->application->footer();
        }


        public function lookingForTaxiAction(){
            $this->application->header();

            $member = new Members ($this->application->DataBase);
            $allMembers = $member->getTaxi();

            include ("views/Members/list.php");

            $this->application->footer();
        }

        public function lookingForHelpAction(){
            $this->application->header();

            $member = new Members ($this->application->DataBase);
            $job1 = htmlentities(mysql_real_escape_string($_POST['job1']));
            $subway = htmlentities(mysql_real_escape_string($_POST['subway']));
            $allMembers = $member->getHelp($job1, $subway);

            include ("views/Members/list.php");

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
                    $message->subject = $_POST['subject'];
                    $message->body = $_POST['message'];
                    $message->date_sent = date("Y-m-d h:i:s");

                    $message->send();
                    //echo "your message is sent";

                    $this->application->footer();
                } else {
                    echo "wrong chapta";
                }

            }
        }

		
		public function seeUserProfileAction(){
			$this->application->header();
				
			if (isset($_GET['id'])){
				$member_id = $_GET['id'];
				} else {
				$member_id= $this->application->loginMember->member_id;
				
				}
				$this->member->get($member_id);
				
				/*$product = new Products ($this->application->DataBase);
				$allProducts = $product->getUserItems($member_id);*/
				
				
				include("views/Members/Profile.php");
				//include("views/Products/AllItems.php");
				
				$this->application->footer();
			}
			//$this->application->footer();

		
		
		

		public function editPasswordAction(){
			$this->application->header();
			if ($this->application->loggedIn === true){
				$member_id = $this->application->member_id;
				include ("views/member/editPasswordForm.php");
			} else {
				echo "<div>You are not logged in </div>";
			}
			
			$this->application->footer();
		}
		/*
		public function savePasswordAction(){
			$this->member->member_id = $_POST['member_id'];
			$this->member->password = $_POST['password'];
			$confirm = $_POST['confirm'];
			
			if ($confirm == $this->member->password){
				$this->application->header();
				$this->member->savePassword();
			}	else{
				$this->message = "<div> PASSWORDS ARE NOT MATCH</div>";
			}
			
		}*/
		
		
		public function saveAction(){
			$this->member->member_id = $_POST['member_ID'];
			$this->member->FirstName = htmlentities(mysql_real_escape_string($_POST['FirstName']));
			$this->member->LastName = htmlentities(mysql_real_escape_string($_POST['LastName']));
			$this->member->username = htmlentities(mysql_real_escape_string($_POST['username']));
			$this->member->email = htmlentities(mysql_real_escape_string($_POST['email']));
			$this->member->password = htmlentities(mysql_real_escape_string($_POST['password']));
			$this->member->role = htmlentities(mysql_real_escape_string($_POST['role']));
            $this->member->job1 = htmlentities(mysql_real_escape_string($_POST['job1']));
            $this->member->job2 = htmlentities(mysql_real_escape_string($_POST['job2']));
            $this->member->job3 = htmlentities(mysql_real_escape_string($_POST['job3']));
            $this->member->subway = htmlentities(mysql_real_escape_string($_POST['subway']));
			$this->member->credits = htmlentities(mysql_real_escape_string($_POST['credits']));
		
		$this->member->save($_POST['member_ID']);
		
		$this->message = "<div> User {$this->member->username} has changed</div>";
		}
		
		public function loginFormAction(){
			$this->application->header();
			$this->application->loginForm();
			$this->application->footer();
		}
		
		public function loginAction(){
			$this->application->login();
		}
		
		public function logoutAction(){
			$this->application->logout();
		}
		
		public function banUserAction(){
			$this->application->header();
			
			if ( isset ($_GET['id']) and ( $this->application->loginMember->role === 'admin') ){
				$id=$_GET['id'];
				$this->member->get($id);
				
				if ($this->member->role === 'member'){
					$this->member->banUser($id);
				}				
			}
		
		}

        public function unbanUserAction(){
            $this->application->header();

            if ( isset ($_GET['id']) and ( $this->application->loginMember->role === 'admin') ){
                $id=$_GET['id'];
                $this->member->get($id);

                if ($this->member->role === 'banned'){
                    $this->member->unbanUser($id);
                }
            }

        }

        public function rateFormAction() {
            $this->application->header();

            if (isset($_GET['id'])){
                $member_id = $_GET['id'];
            } else {
                $member_id= $this->application->loginMember->member_id;

            }
            $this->member->get($member_id);

            include("views/Members/rateForm.php");


            $this->application->footer();
        }


        public function rateUserAction(){
            $this->application->header();

            $member_id = (int)$_POST['member_id'];
            $rating = htmlentities(mysql_real_escape_string($_POST['rating']));
            $this->member->rateUser($member_id, $rating);

            include("views/Members/rateForm.php");

            $this->application->footer();
        }


        public function editAction(){
            $this->application->header();

            if (isset($_GET['id'])){
                $member_id = $_GET['id'];
            } else {
                $member_id= $this->application->loginMember->member_id;

            }
            $this->member->get($member_id);

            include("views/Members/editionForm.php");

            $this->application->footer();
        }

        public function editconfirmAction(){
            if (isset($_POST['Firstname']) and isset($_POST['LastName'])  and isset($_POST['email'])  and isset($_POST['password'])
                and isset($_POST['job1']) and isset($_POST['job2'])  and isset($_POST['job3']) and isset($_POST['subway'])
            ){
                if ($_POST['chapta'] == $_SESSION['secure'] ){
                    $_SESSION['secure'] = rand (1000,9999);
                    $this->member->FirstName = htmlentities(mysql_real_escape_string($_POST['Firstname']));
                    $this->member->LastName = htmlentities(mysql_real_escape_string($_POST['LastName']));
                    $this->member->email = htmlentities(mysql_real_escape_string($_POST['email']));
                    $this->member->password = htmlentities(mysql_real_escape_string($_POST['password']));
                    $this->member->job1 = htmlentities(mysql_real_escape_string($_POST['job1']));
                    $this->member->job2 = htmlentities(mysql_real_escape_string($_POST['job2']));
                    $this->member->job3 = htmlentities(mysql_real_escape_string($_POST['job3']));
                    $this->member->subway = htmlentities(mysql_real_escape_string($_POST['subway']));

                    // PUT INFORMATION FROM FORM TO LOWER CASE
                    $email  = strtolower($this->member->email);

                    //  $member_id = $_GET['id'];
                    $member_id = (int)$_POST['member_id'];
                    $this->member->editsave($member_id);
                    include("views/Members/editionForm.php");


                        echo "Your Data was updated";
                    } else {
                        $_SESSION['secure'] = rand (1000,9999);
                        echo "Username or password already exists in database";

                    }
            }
         }

		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	