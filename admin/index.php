<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
ob_start();
require("./asite.php");
require("../dao/pdo.php");
require("../dao/loai.php");
require("../dao/hang-hoa.php");
require("../dao/khach-hang.php");
require("../dao/binh-luan.php");
include("../dao/cart.php");
require("../dao/thong-ke.php");
require("./home.php");  
if(!isset($_SESSION["user"])){
    header("Location:./login/index.php");
}
if (isset($_GET["act"])) {
    $act = $_GET["act"];
    switch ($act) {
        case 'lkdm':
            $lists = danhmuc_select_all();
            require("./danhmuc/lietke.php");
            break;
        case "themdm":
            require("./danhmuc/them.php");
            if (isset($_POST["submit"])) {
                $ten_danhmuc = $_POST["ten_danhmuc"];
                $icon = $_POST["icon_danhMuc"];
                $resuilts = danhmuc_exit_tendanhmuc($ten_danhmuc);
                if ($resuilts) {
                    echo "<script language='javascript'>window.location.href  ='./index.php?act=lkdm'</script>";
                } else if ((!empty($_POST["ten_danhmuc"]))) {
                    danhmuc_insert($ten_danhmuc,$icon);
                    echo "<script language='javascript'>window.location.href  ='./index.php?act=lkdm'</script>";
                }
            }
            break;
        case "xoadm":
            danhmuc_delete($_GET["id"]);
            header("Location:./index.php?act=lkdm");
            break;
        case "rmAlldm":
            $ids = explode(",", $_GET["id"]);
            $newIds = [];
            danhmuc_delete($ids);
            header("Location:./index.php?act=lkdm");


            break;
        case "suadm":
            $sql = "SELECT ten_danhmuc from danhmuc where id_danhmuc = $_GET[id] ";
            $list = pdo_query_one($sql);
            require("./danhmuc/sua.php");
            if (isset($_POST["submit"])) {
                $ten_danhmuc = $_POST["ten_danhmuc"];
                $sql = "SELECT * from danhmuc where ten_danhmuc = '$ten_danhmuc' and id_danhmuc = $_GET[id] limit 1";
                $resuilt = pdo_query($sql);
                if (!(count($resuilt) > 0)) {
                    danhmuc_update($_GET["id"], $ten_danhmuc);
                    echo "<script language='javascript'>window.location.href  ='./index.php?act=lkdm'</script>";
                }

                echo "<script language='javascript'>window.location.href  ='./index.php?act=lkdm'</script>";
            }

            break;
        case "themsp":
            $listDanhmuc = danhmuc_select_all();
            require("./sanpham/them.php");
            if (isset($_POST["submit"])) {
                if ($cheked) {
                    $ten_sanPham = !empty($_POST["ten_sanPham"]) ? $_POST["ten_sanPham"] : null;
                    $ten_danhmuc = !empty($_POST["id_danhmuc"]) ? $_POST["id_danhmuc"] : null;
                    $image = !empty($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : null;
                    $moTa = !empty($_POST["moTa"]) ? $_POST["moTa"] : null;
                    $luotXem = !empty($_POST["luotxem"]) ? $_POST["luotxem"] : null;
                    $price = !empty($_POST["price"]) ? $_POST["price"] : null;
                    $check = db_sanPham_exist($ten_sanPham);

                    if ($check <= 0) {
                        db_sanPham_insert($ten_sanPham, $price, $image, $ten_danhmuc, $luotXem, $moTa);
                    }
                }
            }
            break;
        case "lksp":
            $lists = db_sanPham_select_all_paging($_GET["page"],$_GET["per_page"]);
            $count = count($lists);
            $paggin = ceil(count(db_sanPham_select_all())/$_GET["per_page"]);
            $categorys = danhmuc_select_all();
            require("./sanpham/lietke.php");
            break;
        case "xoasp":
            $image = db_sanPham_select_by_id($_GET["id"]);
            unlink("../view/img/" . $image["image"]);
            db_sanPham_delete($_GET["id"]);
            header("Location:./index.php?act=lksp&page=1&per_page=10");
           
            break;
        case "rmAllsp":
            $ids = explode(",", $_GET["id"]);
            $newIds = [];
            db_sanPham_delete($ids);
            header("Location:./index.php?act=lksp&page=1&per_page=10");
            break;
        case "suasp":
            $listDanhmuc = danhmuc_select_all();
            $product =  db_sanPham_select_by_id($_GET["id"]);

            require("./sanpham/sua.php");
            if (isset($_POST["submit"])) {
                if ($cheked) 
                    $ten_sanPham = !empty($_POST["ten_sanPham"]) ? $_POST["ten_sanPham"] : null;
                    $ten_danhmuc = !empty($_POST["id_danhmuc"]) ? $_POST["id_danhmuc"] : null;
                    $image = !empty($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : null;
                    $moTa = !empty($_POST["moTa"]) ? $_POST["moTa"] : null;
                    $luotXem = !empty($_POST["luotxem"]) ? $_POST["luotxem"] : null;
                    $price = !empty($_POST["price"]) ? $_POST["price"] : null;
                    
                   if($image){
                    $target_dir = "../view/img/";
                    $target = $target_dir . $image;
                     move_uploaded_file($_FILES["image"]["tmp_name"],$target);
                    
                    db_sanPham_update($_GET["id"],$ten_sanPham,$price,$image,$ten_danhmuc,$luotXem,$moTa);
                    echo "<script language=javascript>alert('Sửa Thành Công')</script>";
                   }
                   else {
                    db_sanPham_update($_GET["id"],$ten_sanPham,$price,$product["image"],$ten_danhmuc,$luotXem,$moTa);
                   }
            }
            break;
        case "lkkh":
            $users = db_user_select_all();
            require("./thanhvien/lietke.php");
            break;
        case "suakh":
            $users = db_user_select_by_id($_GET["id"]);
            if(isset($_POST["submit"])){
                $name = $_POST["name"];
                $user = $_POST["user"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                echo "<script language=javascript>alert('Sửa thành công')</script>";
                db_user_update($_GET["id"],$user,$password,$name,$email,null,null);
                header("Location:index.php?act=lkkh");
            }
            require("./thanhvien/sua.php");
            break;
        case "themkh":
            $eror = [
                "email"=>"",
                "user" =>""
            ];
            if(isset($_POST["submit"])){
                $name = $_POST["name"];
                $user = $_POST["user"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                var_dump(db_column_user_exist($user,'user'));
                if(db_column_user_exist($user,'user')){
                    
                    $eror["user"] = "Tài khoản đã tồn tại";
                }
                else {
                    $eror["user"] = "";
                   
                }
                if(db_column_user_exist($email,'email')){
                    $eror["email"] = "Email đã đã được sử dụng";
                }
                else {
                    $eror["email"]  = "";
                }
                if(empty($eror["user"]) && empty($eror["email"])){
                    db_user_insert($user,$email,$password,$name);
                    echo "<script language=javascript>alert('Thêm thành công')</script>";
                    header("Location:index.php?act=lkkh");
                }
            
                
            }
            require("./thanhvien/them.php");
            break;
         case "rmAllkh":
                $ids = explode(",", $_GET["id"]);
                db_user_delete($ids);
                header("Location:./index.php?act=lkkh");
                break;
        case "bl":
            $comments = db_binhLuan_select_all();

            require("./binhluan/lietke.php");
            break;
        case "suabl" :
            $id  = $_GET["id"];
            $comment = db_binhLuan_select_by_id($id);
            if(isset($_POST["submit"])){
                $id_bl = $_POST["id_bl"];
                $id_user = $_POST["user"];
                $id_sanPham = $_POST["id_sanPham"];
                $content = $_POST["content"];
                $date = date("Y-m-d H:i:s");
                db_binhLuan_update($id_bl,$id_user,$id_sanPham,$content,$date);
                header("Location:index.php?act=bl");
            }
            require("./binhluan/sua.php");
          
          
            break;
        case "rembl":
            db_binhLuan_delete($_GET["id"]);
            header("Location:./index.php?act=bl");
            break;
        case "rmAllbl" :
            $ids = explode(",", $_GET["id"]);
            db_binhLuan_delete($ids);
            header("Location:./index.php?act=bl");
            require("./home.php");
            break;
        case "lkgiohang" :
                
                $bills = bill_select_all();
            include "./giohang/lietke.php";
            break;
        case "xoagiohang":
            bill_delete_by_id($_GET["id"]);
            header("Location:index.php?act=lkgiohang");
            break;
        case "rmAllgiohang" :
            $ids = explode(",", $_GET["id"]);
            bill_delete_by_id($ids);
            header("Location:index.php?act=lkgiohang");
            break;
        case "suagioHang"  :
            $id = $_GET["id"];
      
            $bill = bill_select_by_id($id);
            if(isset($_POST["submit"])){
                $name = $_POST["bill_name"];
                $address = $_POST["bill_address"];
                $phone = $_POST["bill_tel"];
                $status = $_POST["status"];
                bill_update($id,$name,$phone,$address,time(),$status);
            }
            include "./giohang/sua.php";
            break;
        case "thongke" : 
            $tksps = thong_ke_hang_hoa();
            require("./thongke/thongke.php");
            break;
        case "dangxuat" :
            unset($_SESSION["user"]);
            header("Location:index.php");
            break;
        default:
            break;
    }
} else {
    require("./home.php");
}
require("./footer.php");
