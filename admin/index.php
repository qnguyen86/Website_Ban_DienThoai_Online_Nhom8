<?php 
    session_start();
    //load file Connection.php
    include "../application/Connection.php";
    //load file Controller.php
    include "../application/Controller.php";
 ?>
 <?php  
    //lay bien controller truyen tu url
    $controller = isset($_GET["controller"])?$_GET["controller"]:"Home";
    $action = isset($_GET["action"])?$_GET["action"]:"index";
    //tao duong dan vat ly cua file controller trong MVC
    $controllerFile = "controllers/Controller".$controller.".php";
    if(file_exists($controllerFile)){
        include $controllerFile;
        $controllerClass = "Controller".$controller;
        //khoi tao object cua class
        $obj = new $controllerClass();
        //goi den action
        $obj->$action();
        
    }else die("File controller không tồn tại");
 ?>
 