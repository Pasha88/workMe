<?php
	class Products{
	
	private $DataBase;
	
	public $product_id;
	public $owner_id;
	public $title;
	public $subtitle;
	public $description;
	public $category;
	public $price;
	
	
		public function __construct($DataBase) {
			$this->DataBase = $DataBase;
		}
		
		public function getAllJoined() {
		
		}
		
		public function get($product_id) {
			$sql = "SELECT * FROM items_available WHERE product_id = '$product_id'";
			$reslut = mysql_query($sql, $this->DataBase);
			$product_row = mysql_fetch_array($reslut);
			$this->product_id = $product_row['product_id'];
			$this->owner_id = $product_row['owner_id'];
			$this->title = $product_row['title'];
			$this->subtitle = $product_row['subtitle'];
			$this->description = $product_row['description'];
			$this->category = $product_row['category'];
			$this->price = $product_row['price'];
		}
		
		public function getUserItems($owner_id){
			$sql = "SELECT * FROM items_available WHERE owner_id=$owner_id";
			$reslut = mysql_query($sql, $this->DataBase);
			$allProducts = array();
			
				while ($product_row =  mysql_fetch_array($reslut)){
					
					$product = new Products ($this->DataBase);
					
					$product->product_id = $product_row['product_id'];
					$product->owner_id = $product_row['owner_id'];
					$product->title = $product_row['title'];
					$product->subtitle = $product_row['subtitle'];
					$product->description = $product_row['description'];
					$product->category = $product_row['category'];
					
					$allProducts[] = $product;
				}
				return $allProducts;
		}
		
		public function getAllItems(){
			$sql = "SELECT * FROM items_available";
			$reslut = mysql_query($sql, $this->DataBase);
			$allProducts = array();
			
				while ($product_row =  mysql_fetch_array($reslut)){
					
					$product = new Products ($this->DataBase);
					
					$product->product_id = $product_row['product_id'];
					$product->owner_id = $product_row['owner_id'];
					$product->title = $product_row['title'];
					$product->subtitle = $product_row['subtitle'];
					$product->description = $product_row['description'];
					$product->category = $product_row['category'];
					
					$allProducts[] = $product;
				}
				return $allProducts;
		}
	
		public function delete() {
			$sql = "DELETE FROM items_available WHERE product_id = '$product_id'";
			mysql_query($sql, $this->database);
		
		}
		
		public function save() {//  fix that product id ...
			if ($this->product_id > 0){
					$sql = "UPDATE items_available set
						title = '{$this->title}',
						subtitle = '{$this->subtitle}',
						description = '{$this->description}',
						category = '{$this->category}',
					WHERE product_id = '$product_id'";
			} else {//  fix that owner_id ...
				$sql = "INSERT INTO items_available (owner_id, title,subtitle, description ,category, price)
							VALUES ('{$this->owner_id}',
									'{$this->title}',
									'{$this->subtitle}',
									'{$this->description}',
									'{$this->category}',
									'{$this->price}') ";
									echo "product is added";

			}
			mysql_query($sql, $this->DataBase);
		}
		
		public function buyProduct($new_owner, $product_id){
			$sql ="UPDATE items_available set owner_id = '$new_owner' where product_id= '$product_id'";
			mysql_query($sql, $this->DataBase);
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	


