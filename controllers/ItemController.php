<?php
	class ItemController {
	
	
	private $application;
	private $message;

	
		public function __construct($application){
		
		require_once("models/Products.php"); // produtc wich are in the store
		//require_once("models/Offers.php");
		//require_once("models/Trade.php"); // sold items
		require_once("models/Members.php");
		
		
		$this->application = $application;
		
		}

		public function indexAction (){
			$this->listAction();
		}
		
		public function listAction(){
			$this->application->header();
			$products = new Products ($this->application->DataBase);
			$allProducts =	$products->getAllJoined();
			
			include ("views/products/list.php");
			$this->application->footer();
		}

		public function addProductFormAction (){
			$this->application->header();
			
			if($this->application->loggedIn === true){
				include("views/Products/addProductForm.php");
			}	else{
				echo "you are not logged in";
			}
			
			$this->application->footer();
		}
		
		public function addProductAction (){
			if ($_POST['chapta'] == $_SESSION['secure'] ){
			$this->application->header();
			
			$product = new Products ($this->application->DataBase);
			
			$product->owner_id = $this->application->loginMember->member_id;
			
			$product->title = htmlentities(mysql_real_escape_string($_POST['title']));
			$product->subtitle = htmlentities(mysql_real_escape_string($_POST['subtitle']));
			$product->description = htmlentities(mysql_real_escape_string($_POST['description']));
			$product->category = htmlentities(mysql_real_escape_string($_POST['category']));
			$product->price = htmlentities(mysql_real_escape_string($_POST['price']));
			
			$product->save();
			
			$this->application->footer();
			} else {
				$_SESSION['secure'] = rand (1000,9999);
				$this->application->header();
				include("views/Products/addProductForm.php");
				echo "WRONG CHAPTA PLEASE TRY AGAIN";
				$this->application->footer();
			}
		}
		
		public function EditProductAction (){
			$this->application->header();
			
			$product_id = $_GET['product_id'];
			$product = new Products ($this->application->DataBase);
			$product = get($product_id);
			include("views/editProductForm.php");
		
			$this->application->footer();
		}
		
		
		public function deleteProductAction (){
			$this->application->header();
			
			$product_id = (int)$_GET['product_id'];
			$product = new Products ($this->application->DataBase);
			$product = get($product_id);
			$product = delete($product_id);
			
			$this->application->footer();
		}


		public function viewProductAction (){
			$this->application->header();
			
			$product_id =(int) $_GET['id'];
			$product = new Products ($this->application->DataBase);
			$product->get($product_id);
			include("views/products/ProductProfile.php");
		
			$this->application->footer();
		}	
		
		public function seeUserProductsAction (){
			$this->application->header();
			
			$product = new Products ($this->application->DataBase);
			$owner_id = $this->application->loginMember->member_id;
			$allProducts = $product->getUserItems($owner_id);
			
			include("views/products/AllItems.php");
			
			$this->application->footer();
			
		}
		
		public function  seeAllItemsAction(){
			$this->application->header();
			$product = new Products ($this->application->DataBase);
			
			$allProducts = $product->getAllItems();
			
			include ("views/products/allItems.php");
			
			$this->application->footer();
		}
		
		public function buyProductAction (){
			$this->application->header();
			
			$product_id= $_GET['product_id'];
			$product = new Products ($this->application->DataBase);
			$product->get($product_id);
			$buyer = new Members ($this->application->DataBase);
			$buyer->get($this->application->loginMember->member_id);
			
			if ($buyer->credits >= $product->price){
				
				$buyer->credits = $buyer->credits -  $product->price;
				$buyer->save($buyer->member_id);
			
				$seller = new Members ($this->application->DataBase);
				$seller->get($product->owner_id);
				$seller->credits = $seller->credits +  $product->price;
				$seller->save($seller->member_id);
				
				$new_owner = $this->application->loginMember->member_id ;
				$product->buyProduct($new_owner, $product_id);
				echo "you brought this item";
			} else{
				echo "you do not hace enought credits";
			}
		
			
			$this->application->footer();
		}	
	
		public function saveProductAction(){
			$product = new Products ($this->application->DataBase);
			$product_id = (int)$_POST['product_id'];
			
			$product->save();
			
			$this->application->header();
			echo"product is added";
			$this->application->footer();
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	