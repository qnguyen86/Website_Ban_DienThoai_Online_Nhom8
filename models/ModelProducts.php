<?php 
	trait ModelProducts{
		//lay ve danh sach cac ban ghi
		public function modelRead($recordPerPage){
			$category_id = isset($_GET["id"]) ? $_GET["id"] : 0;
			//lay bien page truyen tu url
			$page = isset($_GET["page"])&&$_GET["page"]>0 ? $_GET["page"]-1 : 0;
			//lay tu ban ghi nao
			$from = $page * $recordPerPage;
			//---
			$order=isset($_GET["order"])? $_GET["order"] : "";
			$sqlOrder="order by id desc";
			switch ($order) {
				case "priceAsc":
					$sqlOrder="order by priceDiscount asc";
					break;
				case "priceDesc":
				    $sqlOrder="order by priceDiscount desc";
				    break;
				case "nameAsc":
				    $sqlOrder="order by name asc";
				    break;
				case "nameDesc":
				    $sqlOrder="order by name desc";
				    break;

			}
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select *,(price-(price*discount)/100) as priceDiscount from products where category_id in (select id from categories where id=$category_id or parent_id=$category_id)  $sqlOrder  limit $from, $recordPerPage");
			//tra ve nhieu ban ghi
			return $query->fetchAll();
			//--- 
		}
		//tinh tong so ban ghi
		public function modelTotalRecord(){
			$category_id = isset($_GET["id"]) ? $_GET["id"] : 0;
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select id from products where category_id in (select id from categories where id=$category_id or parent_id=$category_id)");
			//tra ve so ban ghi
			return $query->rowCount();
		}
		//lay mot ban ghi tuong ung voi id truyen vao
		public function modelGetRecord(){
			$id = isset($_GET["id"])&&$_GET["id"] > 0 ? $_GET["id"] : 0;
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from products where id=$id");
			//tra ve mot ban ghi
			return $query->fetch();
		}
		//rating
		public function modelRating(){
			$id = isset($_GET["id"])&&$_GET["id"] > 0 ? $_GET["id"] : 0;
			$star = isset($_GET["star"])&&$_GET["star"] > 0 ? $_GET["star"] : 0;
			if($id > 0 && $star > 0){
				//lay bien ket noi csdl
				$conn = Connection::getInstance();
				//thuc hien truy van
				$query = $conn->query("insert into rating set product_id=$id,star=$star");
			}
		}
		//
		public function getCategory($category_id){
			//lay bien ket noi
			$conn = Connection::getInstance();
			$query = $conn->query("select name from categories where id=$category_id");
			$record = $query->fetch();
			return $query->rowCount() > 0 ? $record->name : "";
		}
		//lay so sao
		public function modelGetStar($product_id,$star){
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select id from rating where product_id=$product_id and star=$star");
			return $query->rowCount();
		}
		public function modelHotNews(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from news where hot=1 order by id desc limit 0,2");
			return $query->fetchAll();
		}
		
		public function getProductsParent($id){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where category_id = (select category_id from products where id=$id)");
			$result = $query->fetchAll();
			return $result;
		}
		public function modelGetSlide1($position){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from slides where position=$position order by id desc");
			$result = $query->fetchAll();
			return $result;
		}
	}
 ?>