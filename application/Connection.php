<?php 
    //class ket noi csdl
    class Connection{
        //ket noi csdl, tra ket qua ve bien ket noi
        public static function getInstance(){
            //ket noi csdl, tra ket qua ve bien ket noi
            $conn = new PDO("mysql:host=localhost; dbname=project_data;","root","");
            //mac dinh kieu duyet cac ban ghi
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
            //lay du lieu theo kieu unicode
            $conn->exec("set names utf8");
            return $conn;
        }
    }
  ?>