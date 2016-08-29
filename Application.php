<?php
include("albums/func/album.func.php");
include("albums/func/image.func.php");
include("albums/func/user.func.php");
include("albums/func/thumb.func.php");

class Application{
	
	public $action;
	public $page;
	public $ControllerName;
	public $Controller;
	public $ActionMethod;
	public $loggedIn; // wtich this instance we are check "IS the user logged in or not";
	public $loginMember; // whit "loginMember" we are checking "WHICH ONE user is logged in";
	public $DataBase; //this insance we are useing for comunication whit our database;
		
		//<form name="" id="" action="index.pgp?page=member&action="login">
		
		public function init($DataBase){
			$this->DataBase = $DataBase;
			if(isset($_GET['page']) ){
				$this->page = $_GET['page'];
			}
			
			if(isset($_GET['action']) ){
				$this->action = $_GET['action'];
			}
			
			$this->ControllerName = strtoupper($this->page[0]) . substr($this->page, 1 , strlen($this->page)-1 ). "CONTROLLER";
			$this->ActionMethod = $this->action . "Action";
			
		}
		
		
		public function run(){
			if($this->page == ''){
			$this->ControllerName = DEFAULT_CONTROLLER;
			require_once(__DIR__ ."/controllers/". DEFAULT_CONTROLLER . ".php");
			
			$this->Controller = new $this->ControllerName($this);
			$this->Controller->indexAction();
			return true;
			}
	
			if (file_exists (__DIR__ ."/controllers/". $this->ControllerName . ".php")){
				require_once(__DIR__ ."/controllers/". $this->ControllerName . ".php");
				$this->Controller = new $this->ControllerName($this);
			
			
				if (method_exists ($this->Controller,  $this->ActionMethod)){
					$controller = $this->Controller;
					$ActionMethod = $this->ActionMethod;
					$controller->$ActionMethod();
					return true;
				}else{
					$this->Controller->indexAction();
					return true;
				} 
			
			}else{ 
				$this->ControllerName = NOT_FOUND_CONTROLLER ;
				require_once(__DIR__ ."/controllers/". NOT_FOUND_CONTROLLER . ".php" );
				$this->Controller = new $this->ControllerName($this);
				$this->Controller->indexAction();
				return true;
			}
		}
		
		public function header(){

			
			$this->CheckLogin(); 
			$this->LoginStatus();// whit this function we are cheking is the user logged in ot not
			
			include ("views/mainmenu.php");
		}
		
		public function footer(){
			include ('views/footer.php');
		}
		
		public function loginForm(){
			include ('views/loginForm.php');
		}
		
		public function registerForm(){
			include ('views/registrationForm.php');
		}

        public function searchingForm(){
             include ('views/Members/SearchingForm.php');
        }

        public function rateForm(){
            include ('views/Members/rateForm.php');
        }

        public function editionForm(){
            include ('views/Members/editionForm.php');
        }
		
		public function LoginStatus(){
			if ($this->loggedIn === true){
				include ("views/LoginStatus.php");

			}else {
				echo "you are not logged in";
			}
		}
		
		public function login(){
		
			$username = $_POST['username'];
			$password = $_POST['password'];
			
			$member = new Members($this->DataBase);
			
			if ($member->CheckLogin($username, $password) === true){
				$this->loginMember = $member;
				
				if ($this->loginMember->role == 'banned'){
					echo "your account is banned <br>";
					
					$_SESSION['logged_in'] = false;
					$this->loggedIn = false;
					$this->loginMember = null;
					
					include "views/loginstatus.php";
					include "views/mainmenu.php";
				} else {
					echo $this->loginMember->role;
					
					$this->loggedIn = true;
					$_SESSION['logged_in'] = true;
					$_SESSION['member_id'] = $member->member_id;
					
					include "views/loginstatus.php";
					include "views/mainmenu.php";
				}

			} else {
				$this->loginMember= null;
				$this->loggedIn= false;
				unset($_SESSION['logged_in']);
				unset($_SESSION['member_id']);
				
				include "views/loginstatus.php";
				include "views/mainmenu.php";
			}
		}
		
		public function  logout(){
			unset($_SESSION['logged_in']);
			unset($_SESSION['member_id']);	
			$this->loginMember= null;
			$this->loggedIn= false;
			
			$this->header();
			echo "<div> You are logged out. </div>";
			$this->footer();
		
		}
		
		public function CheckLogin(){
			if( isset ($_SESSION['logged_in']) and ($_SESSION['logged_in']) == true ){
					$this->loggedIn=true;
					$member_id = ($_SESSION['member_id']);
					$member = new Members($this->DataBase);
					$member -> get($member_id);
					$this->loginMember  = $member;
			} else {
				$this->loggedIn=false;
				$this->loginMember  = null  ;
				
			}
		}
	}


?>