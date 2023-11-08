<?php 
session_start();
    require("../../dao/khach-hang.php");
    include ("./header.php");
    if(isset($_GET["act"]) && $_GET["act"] !=""){
        $act = $_GET["act"];
        switch ($act) {
            case 'dangky':
                $eror = "";
                if(isset($_POST["submit"])){
                  $username = $_POST["user"];
                  $name = $_POST["name"];
                  $password = $_POST["password"];
                  $email = $_POST["email"];
                  $countemail = db_column_user_exist($email,'email');
                  if($countemail){
                    $eror  = "Email đã được sử dụng ";
    
                  }
                  else {
                    echo "<script language=javascript>alert('Đăng ký thành công')</script>";
                    db_user_role_insert($username,$email,$password,$name,1);
                    header("Location:index.php?act=dangnhap");
                  }
                }
                    include("./register.php");
                break;
            
            default:
            $eror = [
                "username" =>"",
                "password" =>""
              ];
              if(isset($_POST["submit"])){
                $user = $_POST["user"];
                $password = $_POST["password"];
                $checked = db_user_signin($user,$password);
             
                if(is_array($checked)){
                  $_SESSION["user"] = $checked;
                  
                  echo "<script language=javascript>
                  window.onload = function(){
                   
                    sessionStorage.setItem('user','true');
                    window.location.href = '../index.php';
                  }
                  </script>";
                }
                else {
                  $eror["password"] = "Thông tin đăng nhập sai";
                  $eror["username"] = "Thông tin đăng nhập sai";
                }
              }
                include "./login.php";
                break;
        }
    }
    else {
       
        include "./login.php";
    }
    include "./footer.php";
?>