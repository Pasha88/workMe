<?php

	class NotFoundController{
	
	private $applictaion;
	private $message;
	
	
		public function __construct($applictaion){
			$this->applictaion = $applictaion;
			require_once("models/Members.php");
		}
		
		public function indexAction(){
			$this->applictaion->header();
			include("views/NotFound/index.php");
			$this->applictaion->footer();
		}

	}