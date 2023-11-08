<!DOCTYPE html>
<html  lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../asset/reset.css">
    <link rel="stylesheet" href="../asset/style.css">
</head>
<body style="background-color: #f5f6f8;">
    <div class="container">
    <section class="admin">
            <section class="admin-content">
                <section class="admin-row">
    <section class="admin-colum_left">
                        <section class="column-left_content">
                            <h3 class="admin-name">
                                WellCome Dasbord
                            </h3>
                            <section class="admin-personal">
                                <section class="admin-personal_img">
                                    <img src="./img/th.jfif" alt="">
                                </section>
                                <section class="admin-personal_detail">
                                    <p class="detail_name"><?php echo $_SESSION["user"]["name"] ?></p>
                                    <p class="detail_locator">Quản trị trang web</p>
                                </section>
                            </section>
                            <section>
                                <nav class="admin-component">
                                    <ul class="admin-component_list">
                                        <li class="admin-component_item">
                                           <a href="./index.php">Trang Chủ</a>  
                                        </li>
                                        <li class="admin-component_item">
                                            <a href="./index.php?act=lksp&page=1&per_page=10">Sản phẩm</a>  
                                         </li>
                                         <li class="admin-component_item">
                                            <a href="./index.php?act=lkdm">Danh mục</a>  
                                         </li>
                                         <li class="admin-component_item">
                                            <a href="./index.php?act=lkkh">Khách hàng</a>  
                                         </li>

                                         <li class="admin-component_item">
                                            <a href="./index.php?act=lkgiohang">Giỏ hàng</a>  
                                         </li>
                                         <li class="admin-component_item">
                                            <a href="./index.php?act=bl">Bình luận</a>  
                                         </li>
                                         <li class="admin-component_item">
                                            <a href="./index.php?act=thongke">Thống kê</a>  
                                         </li>
                                         <li class="admin-component_item">
                                            <a href="../index.php">Vào website</a>  
                                         </li>

                                    </ul>
                                  
                                </nav>
                            </section>
                            <a class="logout" href="./index.php?act=dangxuat">Đăng xuất</a>
                        </section>
                       
 </section>