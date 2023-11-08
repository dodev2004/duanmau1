<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./asset/reset.css">
    <link rel="stylesheet" href="./asset/base.css">
    <link rel="stylesheet" href="./asset/home.css">
</head>

<body>
    <section class="wrapper">
        <header>
            <section class="header-top">
                <img src="./view/img/header_top_banner.PNG" alt="">
            </section>
            <nav>
                <ul class="header_menu">
                    <li class="header_menu-list"><a href="./index.php">Trang chủ</a></li>
                    <li class="header_menu-list"><a href="">Liên hệ</a></li>
                    <li class="header_menu-list"><a href="">Giới thiệu</a></li>
                    <li class="header_menu-list"><a href="">Điều khoản</a></li>
                  
                </ul>
            </nav>
            <section class="header_middle">
                <section class="container">
                    <section class="header_middle-content">
            
                        <section class="logo">
                            <a href="./index.php">
                                <span>Đông Đô </span>
                            </a>
                        </section>
                        <form action="index.php?act=seachsp" method="post" class="header_middle-seach">
                        <section class="seach_category">
                                <div class="show_category">
                                    <span>
                                        <?php echo  isset($danhmuc["ten_danhmuc"] )? $danhmuc["ten_danhmuc"] :"Lựa chọn danh  mục"?>
                                    </span>
                                </div>
                                <input  value="" placeholder="Bạn tìm danh mục nào ?" name="seach_idDanhMuc">
                                <i class="fa-solid fa-caret-down"></i>
                               
                            </section>
                            <section class="list_danhMuc">
                            <?php foreach($categories as $category) : ?>
                                <li data-id="<?php echo $category["id_danhmuc"]?>" data-category="<?php echo $category["ten_danhmuc"] ?>"><?php echo $category["ten_danhmuc"] ?></li>
                            <?php endforeach ?>
                            </section>
                            <section class="header_seach-text">
                                <input type="text" name="seach_sanPham" value="<?php echo !empty($_POST["seach_sanPham"]) ? $_POST["seach_sanPham"] : "" ?>" placeholder="Bạn cần tìm gì hôm nay...">
                            </section>
                            <label for="submit" class="header_seach-icon">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </label>
                            <input style="display: none;" id="submit" type="submit" name="seach">
                        </form>
                        <section class="header_middle-right">
                            <section class="header_middle-contact">
                                <i class="fa-solid fa-phone"></i>
                                <strong>03368465119</strong>
                            </section>
                            <?php 
                                if(isset($_SESSION["user"])){   
                          ?>
                             <section class="header_middle-user">
                                <i class="fa-solid fa-user"></i>
                                <span>User</span>
                                <section class="user_drowdown">
                                    <nav>
                                        <a href="index.php?act=taikhoan">Cập nhật thông tin</a>
                                        <?php if($_SESSION["user"]["role"] == "1"){
                                            echo ' <a href="./admin/index.php">Truy cập Admin</a>';
                                        }
                                         ?>
                                       
                                        <a href="index.php?act=dangxuat">Đăng xuất</a>
                                        <a href="index.php?act=mybill">Đơn hàng của tôi</a>
                                    </nav>
                                </section>
                            </section>
                            <?php 
                                }
                                else {
                            ?>
                            <section class="header_middle-user">
                                <a href="./index.php?act=dangnhap">

                                    <i class="fa-solid fa-user"></i>
                                    <span>Đăng nhập</span>
                                </a>
                              
                            </section>
                            <?php 
                                }
                            ?>
                            <section class="header_middle-cart">
                                <a href="./index.php?act=cart">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    <span>Giỏ hàng</span>
                                </a>
                            
                               
                            </section>
                        </section>
                    </section>
                </section>
            </section>
            
        