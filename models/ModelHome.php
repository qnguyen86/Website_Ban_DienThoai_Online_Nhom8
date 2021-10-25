<?php 
	trait ModelHome{
		//lay cac san pham noi bat
		public function modelHotProduct(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where hot=1 order by id desc limit 0,6");
			return $query->fetchAll();
		}
		//lay cac danh muc co san pham thuoc danh muc (nhung danh muc chua co san pham thi chua hien thi len)
		public function modelCategories(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from categories where id in (select category_id from products) order by id desc limit 0,4");
			return $query->fetchAll();
		}
		//lay cac san pham thuoc danh muc
		public function modelProducts($category_id){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where category_id=$category_id order by id desc limit 0,6");
			return $query->fetchAll();
		}
		//lay cac tin tuc noi bat
		public function modelHotNews(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from news where hot=1 order by id desc limit 0,6");
			return $query->fetchAll();
		}
		public function modelSales(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where discount >= 15 order by discount desc limit 0,6");
			$result = $query->fetchAll();
			return $result;
		}
		public function modelNewProducts(){
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products  limit 0,3");
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