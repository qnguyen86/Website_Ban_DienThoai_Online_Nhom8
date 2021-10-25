<?php 
//include file model vao day
include "models/ModelUsers.php";
class ControllerUsers extends Controller{
	//ke thua class model
	use ModelUsers;
	public function index(){
		//quy dinh so ban ghi tren mot trang
		$recordPerPage=4;
		//tinh so trang
		$numPage=ceil($this->modelTotalRecord()/$recordPerPage);
		//lay du lieu tu model
		$data=$this->modelRead($recordPerPage);
		//goi view, truyen du lieu ra view
		$this->loadView("ViewUsers.php",array("data"=>$data,"numPage"=>$numPage));
	}
	public function update(){
		$id=isset($_GET["id"])&&$_GET["id"]>0 ? $_GET["id"]: 0;
		//lay mot ban ghi
		$record=$this->modelGetRecord();
		//tao bien $action de biet dc khi an nut submit se dan den dau
		$action="index.php?controller=users&action=updatePost&id=$id";
		//goi view, truyen du lieu ra view
		$this->loadView("ViewFormUsers.php", array("record"=>$record,"action"=>$action));
	}
	public function updatePost(){
		$id=isset($_GET["id"])&&$_GET["id"]>0 ? $_GET["id"] : 0;
		//goi ham modelUpdate de update ban ghi
		$this->modelUpdate();
		//quay tro lai trang users
		header("location:index.php?controller=users");
	}
	public function create(){
            // tạo biến action để biết được khi ấn nút submit sẽ dẫn đến đâu
            $action = "index.php?controller=users&action=createPost";
            // gọi view, truyền dữ liệu ra view
            $this->loadView("ViewFormUsers.php", array("action"=>$action));
        }
        public function createPost(){
            // gọi hàm modelCreate để create bản ghi
            $this->modelCreate();
            // quay trở lại trang users
            header("location:index.php?controller=users");
        }
        public function delete(){
        	$id=isset($_GET["id"])&&$_GET["id"]>0 ? $_GET["id"]: 0;
            // gọi hàm modelCreate để create bản ghi
            $this->modelDelete();
            // quay trở lại trang users
            header("location:index.php?controller=users");
        }
    // public function create1(){
    //         // tạo biến action để biết được khi ấn nút submit sẽ dẫn đến đâu
    //         $action1 = "index.php?controller=users&action1=createPost1";
    //         // gọi view, truyền dữ liệu ra view
    //         $this->loadView("ViewRegister.php", array("action1"=>$action1));
    //     }
    //     public function createPost1(){
    //         // gọi hàm modelCreate để create bản ghi
    //         $this->modelCreate1();
    //         // quay trở lại trang users
    //         header("location:index.php?controller=users");
    //     }
	// public function create(){
	// 	//tao bien $action de biet dc khi an nut submit se dan den dau
	// 	$action="index.php?controller=users&action=createPost";
	// 	//goi view, truyen du lieu ra view
	// 	$this->loadView("ViewFormUsers.php", array("action"=>$action));
	// }
	// public function createPost(){
	// 	//goi ham modelCreate de update ban ghi
	// 	$this->modelCreate();
	// 	//quay tro lai trang users
	// 	header("location:index.php?controller=users");
	// }
} ?>