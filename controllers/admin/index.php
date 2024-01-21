<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
ob_start();
if (!(isset($_SESSION["user"]))) {
    header("Location:../../Views/admin/login/index.php");
}
if ($_SESSION["user"]["role"] == 0) {
    echo "Chức năng không tồn tại";
    die();
}
require("../../Views/admin/asite.php");
require("../../Model/pdo.php");
require("../../Model/loai.php");
require("../../Model/hang-hoa.php");
require("../../Model/khach-hang.php");
require("../../Model/binh-luan.php");
include("../../Model/cart.php");
require("../../Model/thong-ke.php");
require("../../Views/admin/home.php");

if (isset($_GET["act"])) {
    $act = $_GET["act"];
    switch ($act) {
        case 'lkdm':
            $lists = danhmuc_select_all();
            require("../../Views/admin/danhmuc/lietke.php");
            break;
        case "themdm":
            require("../../Views/admin/danhmuc/them.php");
            if (isset($_POST["submit"])) {
                $ten_danhmuc = $_POST["ten_danhmuc"];
                $icon = $_POST["icon_danhMuc"];
                $resuilts = danhmuc_exit_tendanhmuc($ten_danhmuc);
                if ($resuilts) {
                    echo "<script language='javascript'>alert('Thêm thành công') ;window.location.href  ='./index.php?act=lkdm'</script>";
                   
                } else  {
                    danhmuc_insert($ten_danhmuc, $icon);
                    echo "<script language='javascript'>alert('Thêm thành công');window.location.href  ='./index.php?act=lkdm'</script>";
                   
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
            require("../../Views/admin/danhmuc/sua.php");
            if (isset($_POST["submit"])) {
                $ten_danhmuc = $_POST["ten_danhmuc"];
                $sql = "SELECT * from danhmuc where ten_danhmuc = '$ten_danhmuc' and id_danhmuc = $_GET[id] limit 1";
                $resuilt = pdo_query($sql);
                if (!(count($resuilt) > 0)) {
                    danhmuc_update($_GET["id"], $ten_danhmuc);
                    echo "<script language='javascript'>alert('Sửa thành công');window.location.href  ='./index.php?act=lkdm'</script>";
                }

                echo "<script language='javascript'>alert('Sửa thành công');window.location.href  ='./index.php?act=lkdm'</script>";
            }

            break;
        case "themsp":
            $listDanhmuc = danhmuc_select_all();
            require("../../Views/admin/sanpham/them.php");
            if (isset($_POST["submit"])) {
                $eror = [
                    "ten_sanPham" => [
                        "color" => "red",
                        "content" => ""
                    ],
                    "price" => [
                        "color" => "red",
                        "content" => ""
                    ],
                    "luotXem" => [
                        "color" => "red",
                        "content" => ""
                    ],
                    "image" => [
                        "color" => "red",
                        "content" => ""
                    ],
                    "moTa" => [
                        "color" => "red",
                        "content" => ""
                    ],
                    "ten_danhmuc" => [
                        "color" => "red",
                        "content" => ""
                    ]
                ];

                $cheked = true;

                if (isset($_POST["submit"])) {
                    $ten_sanPham = !empty($_POST["ten_sanPham"]) ? $_POST["ten_sanPham"] : null;
                    $ten_danhmuc = !empty($_POST["id_danhmuc"]) ? $_POST["id_danhmuc"] : null;
                    $image = !empty($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : null;
                    $moTa = !empty($_POST["moTa"]) ? $_POST["moTa"] : null;
                    $luotXem = !empty($_POST["luotxem"]) ? $_POST["luotxem"] : null;
                    $price = !empty($_POST["price"]) ? $_POST["price"] : null;

                    if (!$ten_danhmuc) {
                        $eror["ten_danhmuc"]["content"] = "Phải nhập vào trường này";
                    } else {
                        $eror["ten_danhmuc"]["content"] = "";
                    }
                    if (!$ten_sanPham) {
                        $eror["ten_sanPham"]["content"] = "Phải nhập vào trường này";
                    } else {
                        $eror["ten_sanPham"]["content"] = "";
                    }
                    if (!$image) {
                        $eror["image"]["content"] = "Phải nhập vào trường này";
                    } else {
                        $target_dir = "img/";
                        $target_file = $target_dir . basename($_FILES["image"]["name"]);
                        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                        if (
                            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                            && $imageFileType != "gif"
                        ) {
                            $eror["image"]["content"] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed";
                        } else {
                            $eror["image"]["content"] = "";
                        }
                    }
                    if (!$price) {
                        $eror["price"]["content"] = "Phải nhập vào trường này";
                    } else {
                        $eror["price"]["content"] = "";
                    }
                    if (!$moTa) {
                        $eror["moTa"]["content"] = "Phải nhập vào trường này";
                    } else {
                        $eror["moTa"]["content"] = "";
                    }
                    foreach ($eror as $values) {

                        if (trim($values["content"]) != "") {
                            $cheked = false;
                        }
                    }
                    if ($cheked) {
                        $target_dir = "../../img/";
                        $target = $target_dir . $image;
                        move_uploaded_file($_FILES["image"]["tmp_name"], $target);
                        $check = db_sanPham_exist($ten_sanPham);
                        if ($check <= 0) {
    
                            db_sanPham_insert($ten_sanPham, $price, $image, $ten_danhmuc, $luotXem, $moTa);
                            echo "<script language=javascript>alert('Them thanh cong');
                                window.location.href = './index.php?act=lksp&page=1&per_page=10';
                            </script>";
                        }
                        else {
                            echo "<script language=javascript>alert('Them thanh cong');
                                window.location.href = './index.php?act=lksp&page=1&per_page=10';
                            </script>";
                        }
                        
                    }
                  
                }
                
            }
            break;
        case "lksp":
            $lists = db_sanPham_select_all_paging($_GET["page"], $_GET["per_page"]);
            $count = count($lists);
            $paggin = ceil(count(db_sanPham_select_all()) / $_GET["per_page"]);
            $categorys = danhmuc_select_all();
            require("../../Views/admin/sanpham/lietke.php");
            break;
        case "xoasp":
            $image = db_sanPham_select_by_id($_GET["id"]);
            unlink("../../img/" . $image["image"]);
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

            require("../../Views/admin/sanpham/sua.php");
            if (isset($_POST["submit"])) {
                if ($cheked)
                    $ten_sanPham = !empty($_POST["ten_sanPham"]) ? $_POST["ten_sanPham"] : null;
                $ten_danhmuc = !empty($_POST["id_danhmuc"]) ? $_POST["id_danhmuc"] : null;
                $image = !empty($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : null;
                $moTa = !empty($_POST["moTa"]) ? $_POST["moTa"] : null;
                $luotXem = !empty($_POST["luotxem"]) ? $_POST["luotxem"] : null;
                $price = !empty($_POST["price"]) ? $_POST["price"] : null;

                if ($image) {
                    $target_dir = "../view/img/";
                    $target = $target_dir . $image;
                    move_uploaded_file($_FILES["image"]["tmp_name"], $target);

                    db_sanPham_update($_GET["id"], $ten_sanPham, $price, $image, $ten_danhmuc, $luotXem, $moTa);
                    echo "<script language=javascript>alert('Sửa Thành Công')</script>";
                } else {
                    db_sanPham_update($_GET["id"], $ten_sanPham, $price, $product["image"], $ten_danhmuc, $luotXem, $moTa);
                    echo "<script language=javascript>alert('Sửa thành công')
                    window.Location.href = './index.php?act=lksp
                </script>";
                }
            }
            break;
        case "lkkh":
            $users = db_user_select_all();
            require("./thanhvien/lietke.php");
            break;
        case "suakh":
            $users = db_user_select_by_id($_GET["id"]);
            if (isset($_POST["submit"])) {
                $name = $_POST["name"];
                $user = $_POST["user"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                echo "<script language=javascript>alert('Sửa thành công')</script>";
                db_user_update($_GET["id"], $user, $password, $name, $email, null, null);
                header("Location:index.php?act=lkkh");
            }
            require("./thanhvien/sua.php");
            break;
        case "themkh":
            $eror = [
                "email" => "",
                "user" => ""
            ];
            if (isset($_POST["submit"])) {
                $name = $_POST["name"];
                $user = $_POST["user"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                var_dump(db_column_user_exist($user, 'user'));
                if (db_column_user_exist($user, 'user')) {

                    $eror["user"] = "Tài khoản đã tồn tại";
                } else {
                    $eror["user"] = "";
                }
                if (db_column_user_exist($email, 'email')) {
                    $eror["email"] = "Email đã đã được sử dụng";
                } else {
                    $eror["email"]  = "";
                }
                if (empty($eror["user"]) && empty($eror["email"])) {
                    db_user_insert($user, $email, $password, $name);
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
        case "dangxuat":
            unset($_SESSION["user"]);
            header("Location:index.php");
            break;
        default:
            break;
    }
} else {
    require("../../Views/admin/home.php");
}
require("../../Views/admin/footer.php");
