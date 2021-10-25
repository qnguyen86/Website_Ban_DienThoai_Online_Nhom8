<?php 
	include "models/ModelCategories.php";
	class ControllerCategories extends Controller{
		//ke thua
		use ModelCategories;
		public function index(){
			$this->loadView("ViewCategories.php");
		}
	}
 ?>