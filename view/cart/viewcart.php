<section class="header_bottom">
                <section class="container">
                    <aside>
                        <section class="header_bottom-category">
                            <section class="catagory-title">
                                <i class="fa-solid fa-bars"></i>
                                Danh mục sản phẩm
                            </section>
                            <ul class="header_bottom-list active">
                                <?php foreach($categories as $category) : ?>
                                    <li class="header_bottom-item">
                                    
                                    <a href="./index.php?act=sanpham&id=<?php echo $category["id_danhmuc"] ?>&page=1&products=8" class="header_bottom-link">
                                        <?php if($category["icon"]){
                                           echo $category["icon"];
                                        } ?>
                                        <?php echo $category["ten_danhmuc"] ?>
                                    </a>
                                </li>
                                <?php endforeach ?>
                             
                                <!-- <li class="header_bottom-item">
                                    <a href="" class="header_bottom-link">
                                        <img src="./view/img/icon/ico_2.webp" alt="">
                                        Laptop - Laptop Gaming
                                    </a>
                                </li>
                                <li class="header_bottom-item">
                                    <a href="" class="header_bottom-link">
                                        <img src="./view/img/icon/ico_3.webp" alt="">
                                        Máy giặt - Máy sấy
                                    </a>
                                </li>
                                <li class="header_bottom-item">
                                    <a href="" class="header_bottom-link">
                                        <img src="./view/img/icon/ico_4.webp" alt="">
                                        Tivi - Loa âm thanh
                                    </a>
                                </li>
                                <li class="header_bottom-item">
                                    <a href="" class="header_bottom-link">
                                        <img src="./view/img/icon/ico_h_5.webp" alt="">
                                        Điều hòa nhiệt độ
                                    </a>
                                </li>
                                <li class="header_bottom-item">
                                    <a href="" class="header_bottom-link">
                                        <img src="./view/img/icon/ico_6.webp" alt="">
                                        Gia dụng - Thiết bị bếp
                                    </a>
                                </li>
                                <li class="header_bottom-item">
                                    <a href="" class="header_bottom-link">
                                        <img src="./view/img/icon/ico_7.webp" alt="">
                                        Thiết bị văn phòng
                                    </a>
                                </li>
                                <li class="header_bottom-item">
                                    <a href="" class="header_bottom-link">
                                        <img src="./view/img/icon/ico_8.webp" alt="">
                                        Kĩ thuật số
                                    </a>
                                </li>
                                <li class="header_bottom-item">
                                    <a href="" class="header_bottom-link">
                                        <img src="./view/img/icon/ico_9.webp" alt="">
                                        Phụ kiện
                                    </a>
                                </li> -->
                            </ul>
                        </section>
                    </aside>
                    <section class="header_banner">
                        <ul class="header_banner-policy">
                            <li class="header_banner-policy-item"><a class="header_banner-policy-text" href="">
                                    <img src="./view/img/icon/gift.png" alt="">
                                    Sản phẩm khuyễn mãi</a>
                            </li>
                            <li class="header_banner-policy-item"><a class="header_banner-policy-text" href="">
                                    <img src="./view/img/icon/sync.png" alt="">
                                    Sản phẩm khuyễn mãi</a>
                            </li>
                            <li class="header_banner-policy-item">
                                <a class="header_banner-policy-text" href="">
                                    <img src="./view/img/icon/delivery-truck.png" alt="">
                                    Miễn phí giao hàng toàn quốc
                                </a>
                            </li>
                            <li class="header_banner-policy-item"><a class="header_banner-policy-text" href="">
                                    <img src="./view/img/icon/hand (1).png" alt="">
                                    Thanh toán khi nhận hàng </a>
                            </li>
                        </ul>

                    </section>
                </section>

            </section>
        </header>
        <main>
        <section class="container">
            <section class="cart">
                <h1 class="cart_title">Giỏ Hàng</h1>
    
            </section>
            <section class="cart_list">
                <form method="post" action="index.php?act=cart">
                <table class="table_cart">
                    <tr>
                        <th class="cart_prodcut">Sản Phẩm</th>
                        <th class="cart_img">Hình</th>
                        <th class="">Đơn Giá</th>
                        <th >Số Lượng</th>
                        <th class="cart_total-price">Thành Tiền</th>
                        <th class="cart_action">Thao Tác</th>
                    </tr>
                    <?php 
                        $totalPrice = 0;
                    ?>
                    <?php 
                  
                        foreach($_SESSION["gioHang"] as $index =>$giohang):
                            $totalPrice = $totalPrice + $giohang["thanhtien"];
                    ?>
                    <tr>
                        <th  class="cart_prodcut"><?php echo $giohang["name"] ?></th>
                        <th class="cart_img"><img src="./view/img/<?php echo $giohang["image"] ?>" alt=""></th>
                        <th data-price="<?php echo $giohang["price"] ?>" class="cart_price"><?php echo number_format($giohang["price"],0,',',',') ?></th>
                        <th class="cart_quantity"><input type="text" name="quantity[<?php echo $index ?>]" value="<?php echo $giohang["quantity"] ?>"></th>
                        <th class="cart_total-price"><?php echo number_format($giohang["thanhtien"],0,',',',') ?></th>
                        <th  class="cart_action">
                            <a href="./index.php?act=rmcart&id=<?=$index?>">
                                Xóa
                            </a>
                           
                        </th>
                       
                    </tr>
                    <?php endforeach ?>
                    <tr>
                            <th colspan="4">Tổng thành tiền</th>
                            <th class="total_price" colspan="2"><?php  echo  number_format($totalPrice,0,',',',') ."đ"?></th>
                        </tr>
                    
                </table>
                <section class="cart--update">
                <input type="submit" name="update_cart" value="Cập nhật">
                </section>
                <section class="cart_buy">
                    <a href="./index.php?act=bill">  <input type="button" name="buy_cart" value="Tiến hành thanh toán"></a>
              
                </section>

               
            
                </form>
              
                
            </section>
           
         </section>
       
      </main>
