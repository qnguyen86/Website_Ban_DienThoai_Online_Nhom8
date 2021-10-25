<?php 
  include "models/ModelAccount.php";
  class ControllerAccount extends Controller{
    use ModelAccount;
    public function register(){
      $this->loadView("ViewRegister.php");
    }
    public function registerPost(){
      $this->modelRegister();     
    }
    public function login(){
      $this->loadView("ViewLogin.php");
    }
    public function loginPost(){
      $this->modelLogin();
    }
    public function logout(){
      $this->modelLogout();
    }
    //xem danh sach cac don hang da mua   
    public function orders(){
      //quy dinh so ban ghi tren mot trang
      $recordPerPage = 25;
      //tinh so trang
      $numPage = ceil($this->modelTotal()/$recordPerPage);
      //goi ham de lay du lieu
      $listRecord = $this->modelRead($recordPerPage);
      //load view
      $this->loadView("ViewOrders1.php",["listRecord"=>$listRecord,"numPage"=>$numPage]);
    }
    //huy don hang
    public function removeOrders(){
      $id = isset($_GET["id"]) ? $_GET["id"] : 0;
      $this->modelRemoveOrders();
      header("location:index.php?controller=account&action=orders");
    }
  }
 ?>