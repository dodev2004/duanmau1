<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../vendor/autoload.php';
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
ob_start();
if (!isset($_SESSION["gioHang"])) {
  $_SESSION["gioHang"] = [];
}

require("../../Model/hang-hoa.php");
include "../../Model/cart.php";
require("../../Model/loai.php");
require("../../Model/khach-hang.php");
$news = db_sanPham_select_all("new");
$views = db_sanPham_select_all("luotXem");
$categories = danhmuc_select_all();

if (isset($_POST["seach"])) {
  $danhmuc = danhmuc_select_by_id($_POST["seach_idDanhMuc"]);
}
require("../../Views/user/header.php");
if (isset($_GET["act"]) && $_GET["act"] != "") {
  $act = $_GET["act"];
  if($act != "active"){
    db_user_delete_none_active();
  }
  switch ($act) {
    case 'lienhe':
      # code...
      break;
    case "sanphamchitiet":
      $id = $_GET["id"];
      $detail = db_sanPham_select_by_id($id);
      $product = danhmuc_select_by_id($detail["id_danhmuc"]);
      $products = db_sanPham_select_by_danhmuc($detail["id_danhmuc"]);
      db_sanPham_tang_so_luot_xem($id);
      require("../../Views/user/sanphamchitiet.php");
      break;
    case "sanpham":
      if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $page = $_GET["page"];
        $products = $_GET["products"];
        $totalpage = ceil(count(db_sanPham_select_all()) / $products);
        $products = db_sanPham_paging($id, $page, $products);
        $danhmuc = danhmuc_select_by_id($id);
        require("./view/sanpham.php");
        break;
      }
    case "seachsp":
      if (isset($_POST["seach"])) {
        $danhmuc = danhmuc_select_by_id($_POST["seach_idDanhMuc"]);
        $seach = $_POST["seach_sanPham"];
        $products = db_sanPham_select_all();
        $count =  count($products, 0);
      }
      require("./view/seachsanpham.php");

      break;
    case "dangnhap":
      $eror = [
        "username" => "",
        "password" => ""
      ];
      if (isset($_POST["submit"])) {
        $user = $_POST["user"];
        $password = $_POST["password"];
        $checked = db_user_signin($user, $password);
        if (is_array($checked)) {
          $_SESSION["user"] = $checked;

          echo "<script language=javascript>
                window.onload = function(){
                  sessionStorage.setItem('user','true');
                  window.location.href = 'index.php';
                }
                </script>";
        } else {
          $eror["password"] = "Thông tin đăng nhập sai";
          $eror["username"] = "Thông tin đăng nhập sai";
        }
      }
      require("../../Views/user/sign/dangnhap.php");
      break;
    case "dangky":
      $eror = "";
      if (isset($_POST["submit"])) {
        $username = $_POST["user"];
        $name = $_POST["name"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $countemail = db_column_user_exist($email, 'email');
        $vetifycation = rand(000000, 999999);
        $date =  date("Y-m-d H:i:s");
        if ($countemail) {
          $eror  = "Email đã được sử dụng ";
        } else {
          echo "<script language=javascript>alert('Đăng ký thành công')</script>";
          $mail = new PHPMailer(true);

          try {
              //Server settings
              $mail->SMTPDebug = 0;                      //Enable verbose debug output
              $mail->isSMTP();                                            //Send using SMTP
              $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
              $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
              $mail->Username   = 'dobnph33400@fpt.edu.vn';                     //SMTP username
              $mail->Password   = 'bxwvayijurekjqcj';                               //SMTP password
              $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
              $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
          
              //Recipients
              $mail->setFrom('dobnph33400@fpt.edu.vn', 'DongDoShop');
              $mail->addAddress($email, $name);     //Add a recipient
              //Content
              $mail->isHTML(true);                                  //Set email format to HTML
              $mail->Subject = 'Account registration confirmation code';
              $mail->Body    = '<span style="font-size:20px">Mã xác nhận đăng ký tài khoản :</span><span style="font-size:20px"> ' . $username . "</span><br/>  <b>" . $vetifycation ."</b>";
              $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
          
              $mail->send();
              $id = db_user_insert($username,$email,$password,$name,$vetifycation,date("Y-m-d H:i:s"),time());
              header("Location:./index.php?act=active&id=".$id);
          } catch (Exception $e) {
              echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
          }
          
        }
      }
      require("../../Views/user/sign/dangky.php");
      break;
    case "xndk": 

    break;
    case "active":
      $eror= "";
      if (isset($_POST["submit"])) {
        
        if (db_column_user_exist($_POST["vetification_user"], 'vetification_user')) {
          
            db_user_set_active(1,$_GET["id"]);
            echo "<script language='javascript'>
            alert('Tài khoản đã được đăng ký');
            window.location.href = 'index.php?act=dangnhap';
            </script>";
        
        } else {
          $eror = "Mã không đúng";
        }
      }
      require ("../../Views/user/sign/active.php");
      break;
    case  "dangxuat":
      unset($_SESSION["user"]);

      echo "<script language=javascript>
                sessionStorage.removeItem('user');
                window.location.href = 'index.php'</script>";

      break;
    case "codequenmk":
      
      break;
    case "quenmk":
      $eror = "";
      if (isset($_POST["submit"])) {

        $email = $_POST["email"];
        if (db_column_user_exist($email, 'email')) {
          $ids = db_user_id_select_by_email($email);
          $vetifycation = rand(000000,999999);
          db_user_update_vevification($vetifycation,$ids["id"]);
          $mail = new PHPMailer(true);
          $db_user = db_user_select_by_id($ids["id"]);

          try {
              //Server settings
              $mail->SMTPDebug = 0;                      //Enable verbose debug output
              $mail->isSMTP();                                            //Send using SMTP
              $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
              $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
              $mail->Username   = 'dobnph33400@fpt.edu.vn';                     //SMTP username
              $mail->Password   = 'bxwvayijurekjqcj';                               //SMTP password
              $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
              $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
          
              //Recipients
              $mail->setFrom('dobnph33400@fpt.edu.vn', 'DongDoShop');
              $mail->addAddress($email, $db_user["name"]);     //Add a recipient
              //Content
              $mail->isHTML(true);                                  //Set email format to HTML
              $mail->Subject = 'Account registration confirmation code';
              $mail->Body    = '<span style="font-size:20px">Mã xác nhận bạn muốn thay đổi password :</span><span style="font-size:20px"> ' . $db_user["username"] . "</span><br/>  <b>" . $vetifycation ."</b>";
              $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
          
              $mail->send();
           
              header("Location:index.php?act=xndmk&id=" . $ids["id"]);
          } catch (Exception $e) {
              echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
          }
          
        } else {
          $eror = "Email không tồn tại";
        }
      }
      require("../../Views/user/sign/forgetpw.php");
      break;
    case "taikhoan":
      require("./view/taikhoan.php");
      break;
    case "xndmk" :
      $eror= "";
      $id = $_GET["id"];
      $user = db_user_select_by_id($id);
      $timer = json_encode($user["created_time"]);
      if (isset($_POST["submit"])) {
        
        if (db_column_user_exist($_POST["vetification_user"], 'vetification_user')) {
          header("Location: ./index.php?act=mkmoi&id=".$_GET["id"]);
        
        } else {
          $eror = "Mã không đúng";
        }
      }
      require("../../Views/user/sign/codenewpassword.php");
      break;
    case "mkmoi":
      $eror = "";
      if (isset($_POST["submit"])){
        $password = $_POST["password"];
        $id = $_GET["id"];
        db_user_change_password($id, $password);
        echo "<script language=javascript>alert('Thay đổi thành công')</script>";
        header("Location:index.php?act=dangnhap");

      }
      require("../../Views/user/sign/newpw.php");
      break;
    
   
    
    default:

      require("../../Views/user/home.php");

      break;
  }
} else {
  require("../../Views/user/home.php");
}

require("../../Views/user/footer.php");
