<?php 
  session_start();
  date_default_timezone_set('Asia/Ho_Chi_Minh');
  ob_start();
  if(!isset($_SESSION["gioHang"])){
    $_SESSION["gioHang"] = [];
  }
  
  require("./dao/hang-hoa.php");
  include "./dao/cart.php";
  require("./dao/loai.php");
  require("./dao/khach-hang.php");
  $news = db_sanPham_select_all("new");
  $views = db_sanPham_select_all("luotXem");
  $categories = danhmuc_select_all();
  if(isset($_POST["seach"])){
    $danhmuc = danhmuc_select_by_id($_POST["seach_idDanhMuc"]);
  }
  require("./view/header.php");
  if(isset($_GET["act"]) && $_GET["act"] !=""){
      $act = $_GET["act"];
      switch ($act) {
        case 'lienhe':
          # code...
          break;
        case "sanphamchitiet" : 
          $id = $_GET["id"];
          $detail = db_sanPham_select_by_id($id);
          $product = danhmuc_select_by_id($detail["id_danhmuc"]);
          $products = db_sanPham_select_by_danhmuc($detail["id_danhmuc"]);
          db_sanPham_tang_so_luot_xem($id);
          require("./view/sanphamchitiet.php");
          break;
        case "sanpham" :
          if(isset($_GET["id"])){
            $id = $_GET["id"];
            $page = $_GET["page"];
            $products = $_GET["products"];
            $totalpage = ceil(count(db_sanPham_select_all())/$products);
            $products = db_sanPham_paging($id, $page, $products);
            $danhmuc = danhmuc_select_by_id($id);
            require("./view/sanpham.php");
            break;
          }
          case "seachsp" :
            if(isset($_POST["seach"])){
              $danhmuc = danhmuc_select_by_id($_POST["seach_idDanhMuc"]);
              $seach = $_POST["seach_sanPham"];
              $products =db_sanPham_select_all();
              $count =  count($products,0);
            }
            require("./view/seachsanpham.php");

            break;
          case "dangnhap":
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
                  window.location.href = 'index.php';
                }
                </script>";
              }
              else {
                $eror["password"] = "Thông tin đăng nhập sai";
                $eror["username"] = "Thông tin đăng nhập sai";
              }
            

            }
            require("./view/sign/dangnhap.php");
            break;
          case "dangky" :
            $eror = "";
            if(isset($_POST["submit"])){
              $username = $_POST["user"];
              $name = $_POST["name"];
              $password = $_POST["password"];
              $email = $_POST["email"];
              $countemail = db_column_user_exist($email,'email');
              var_dump($email);
              var_dump($countemail);
              if($countemail){
                $eror  = "Email đã được sử dụng ";

              }
              else {
                echo "<script language=javascript>alert('Đăng ký thành công')</script>";
                db_user_insert($username,$email,$password,$name);
                header("Location:index.php?act=dangnhap");
              }
            }
            require("./view/sign/dangky.php");
            break;
            case  "dangxuat":
                unset($_SESSION["user"]);
                
                echo "<script language=javascript>
                sessionStorage.removeItem('user');
                window.location.href = 'index.php'</script>";
              
              break;
            case "quenmk" :
              $eror = "";
              if(isset($_POST["submit"])){
                
                $email = $_POST["email"];
                if(db_column_user_exist($email,'email')){  
                    $ids = db_user_id_select_by_email($email);

                    header("Location:index.php?act=mkmoi&id=".$ids["id"]);
                }
                else {
                    $eror = "Email không tồn tại";
                }
              }
              require("./view/sign/forgetpw.php");
              break;
            case "taikhoan":
              require("./view/taikhoan.php");

              break;
              case"mkmoi":
                $eror = "";
                if(isset($_POST["submit"])){
                  $password = $_POST["password"];
                  $id = $_GET["id"];
                  db_user_change_password($id,$password);
                  echo "<script language=javascript>alert('Thay đổi thành công')</script>";
                  header("Location:index.php?act=dangnhap");
                }
                require("./view/sign/newpw.php");
                break;
              case "cart" :
                if(isset($_POST["addcart"]) || isset($_POST["buy"])){
                  $id = $_POST["id_sanPham"];
                  $image  = $_POST["image"];
                  $name = $_POST["ten_sanPham"];
                  $price = $_POST["price"];
                  $quantity = $_POST["quantity"];
                  $thanhtien = $quantity * $price;
                  $newcart = array(
                    "id" => $id,
                    'image' => $image,
                    'name' =>$name,
                    'price' => $price,
                    'quantity' =>$quantity,
                    "thanhtien" => $thanhtien
                  );  
                  array_push($_SESSION["gioHang"],$newcart);
                }
                if(isset($_POST["update_cart"])){
                  foreach($_POST["quantity"] as $index =>$quantity){
                    $_SESSION["gioHang"][$index]["quantity"] = $quantity;
                    $_SESSION["gioHang"][$index]["thanhtien"] = $quantity * $_SESSION["gioHang"][$index]["price"];
                  }
                
                }
             
                require("./view/cart/viewcart.php");
                break;
            case "rmcart":
              if(isset($_GET["id"])){
                unset($_SESSION["gioHang"][$_GET["id"]]);
             
              }
              header("Location:index.php?act=cart");
              
              break;
            case "bill":
              require("./view/cart/bill.php");
              break;
            case "billconfirm":
         
                if(isset($_POST["buy_cart"])){
                  $name = $_POST["name"];
                  $address = $_POST["address"];
                  $phone = $_POST["phone"];
                  $ptt = $_POST["pay"];
                  $total   = $_POST["total"];
                  $id_user = $_SESSION["user"]["id"];
                  $iddh =  bill_insert($id_user,$name,$phone,$ptt,$address,time(),time(),$total);
                  foreach($_SESSION["gioHang"] as $giohang){
                      order_detail_insert($iddh,$giohang["id"],$giohang["name"],$giohang["quantity"],$giohang["price"]);
                  }
                  $bill = bill_select_by_id($iddh);
                  $prodcutcart = cart_select_all_by_id($iddh);
                }
                include "./view/cart/billconfirm.php";
                $_SESSION["gioHang"] = [];

              break;
              case "mybill":
                $id = $_SESSION["user"]["id"];
                $bills = mycart_select_all_by_id($id);
                include "view/cart/mybill.php";
                break;
        default:

        require("./view/home.php");
     
          break;
      }
  }
  else {
    require("./view/home.php");
  }
  
  require("./view/footer.php");
