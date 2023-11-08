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
            <section class="product_linked">
                    <a href="index.php">
                        <span class="linked">Trang Chủ</span>
                    </a>
                    <i class="fa-solid fa-angle-right"></i>
                    <a href="index.php?act=sanpham&id=<?php echo $danhmuc["id_danhmuc"] ?>">
                        <span class="linked"><?php echo $danhmuc["ten_danhmuc"] ?></span>
                    </a>
            </section>
                <section class="product">
                    <section class="product_item product_new">
                        <h1>Sản phẩm</h1>
                        <section class="row product-hot ">
                           <?php  foreach($products as $product): ?>
                            <section class="column">
                                <a href="./index.php?act=sanphamchitiet&id=<?php echo $product["id_sanPham"] ?>">
                                    <article class="product_not_sell">
                                        <section class="product_img">""
                                         
                                            <img src="./view/img/<?php echo $product["image"]?>"
                                                alt="">
                                        </section>
                                        <section class="product_name">

                                            <span><?php echo $product["ten_sanPham"] ?></span>
                                        </section>
                                        <section class="product_price">
                                        
                                            <span class="price"><?php echo number_format($product["price"],0,',',',')?>đ</span>
                                        </section>
                                        <form action="./index.php?act=cart" method="post" class="cart">
                                        <input type="text" name="id_sanPham" style="display: none;" value="<?php echo $product["id_sanPham"] ?>">
                                        <input type="text" name="image" style="display: none;" value="<?php echo $product["image"] ?>">
                                        <input type="text" name="ten_sanPham" style="display: none;" value="<?php echo $product["ten_sanPham"] ?>">
                                        <input type="text" style="display: none;" name="price" value="<?php echo $product["price"] ?>">
                                        <input type="text" style="display: none !important;" name="quantity" value="1">
                                        <button type="submit" name="buy">Mua Hàng</button>
                                        <button type="submit" name="addcart">Thêm giỏ hàng</button>
                                        </form>
                                    </article>

                            </section>
                            <?php endforeach ?>
                            <!-- <section class="column">
                                <a href="">
                                    <article class="product_not_sell">
                                        <section class="product_img">
                                            <img src="./view/img/prodcut/636863636051023338-ss-galaxy-s10-plus-den-1.webp" alt="">
                                        </section>
                                        <section class="product_name">
                                            <span>Điện thoại Samsung Galaxy S10+</span>
                                        </section>
                                        <section class="product_price">
                                            <span class="price">4.500.000d</span>
                                        </section>
                                        <a class="cart_buy" href="">
                                            <button>Mua Hàng</button>
                                        </a>
                                        <a class="add_buy" href="">
                                            <button>Thêm giỏ hàng</button>
                                        </a>
                                </article>
                            
                            </section>
                            <section class="column">
                                <a href="">
                                    <article class="product_not_sell">
                                        <section class="product_img">
                                            <img src="./view/img/prodcut/636863636051023338-ss-galaxy-s10-plus-den-1.webp" alt="">
                                        </section>
                                        <section class="product_name">
                                            <span>Điện thoại Samsung Galaxy S10+</span>
                                        </section>
                                        <section class="product_price">
                                            <span class="price">4.500.000d</span>
                                        </section>
                                        <a class="cart_buy" href="">
                                            <button>Mua Hàng</button>
                                        </a>
                                        <a class="add_buy" href="">
                                            <button>Thêm giỏ hàng</button>
                                        </a>
                                </article>
                            
                            </section>
                            <section class="column">
                                <a href="">
                                    <article class="product_not_sell">
                                        <section class="product_img">
                                            <img src="./view/img/prodcut/636863636051023338-ss-galaxy-s10-plus-den-1.webp" alt="">
                                        </section>
                                        <section class="product_name">
                                            <span>Điện thoại Samsung Galaxy S10+</span>
                                        </section>
                                        <section class="product_price">
                                            <span class="price">4.500.000d</span>
                                        </section>
                                        <a class="cart_buy" href="">
                                            <button>Mua Hàng</button>
                                        </a>
                                        <a class="add_buy" href="">
                                            <button>Thêm giỏ hàng</button>
                                        </a>
                                </article>
                            
                            </section>
                            <section class="column">
                                <a href="">
                                    <article class="product_not_sell">
                                        <section class="product_img">
                                            <img src="./view/img/prodcut/636863636051023338-ss-galaxy-s10-plus-den-1.webp" alt="">
                                        </section>
                                        <section class="product_name">
                                            <span>Điện thoại Samsung Galaxy S10+</span>
                                        </section>
                                        <section class="product_price">
                                            <span class="price">4.500.000d</span>
                                        </section>
                                        <a class="cart_buy" href="">
                                            <button>Mua Hàng</button>
                                        </a>
                                        <a class="add_buy" href="">
                                            <button>Thêm giỏ hàng</button>
                                        </a>
                                </article>
                            
                            </section>
                            
                            <section class="column">
                                <a href="">
                                    <article class="product_not_sell">
                                        <section class="product_img">
                                            <img src="./view/img/prodcut/636863636051023338-ss-galaxy-s10-plus-den-1.webp" alt="">
                                        </section>
                                        <section class="product_name">
                                            <span>Điện thoại Samsung Galaxy S10+</span>
                                        </section>
                                        <section class="product_price">
                                            <span class="price">4.500.000d</span>
                                        </section>
                                        <a class="cart_buy" href="">
                                            <button>Mua Hàng</button>
                                        </a>
                                        <a class="add_buy" href="">
                                            <button>Thêm giỏ hàng</button>
                                        </a>
                                </article>
                            
                            </section>
                            <section class="column">
                                <a href="">
                                    <article class="product_not_sell">
                                        <section class="product_img">
                                            <img src="./view/img/prodcut/636863636051023338-ss-galaxy-s10-plus-den-1.webp" alt="">
                                        </section>
                                        <section class="product_name">
                                            <span>Điện thoại Samsung Galaxy S10+</span>
                                        </section>
                                        <section class="product_price">
                                            <span class="price">4.500.000d</span>
                                        </section>
                                        <a class="cart_buy" href="">
                                            <button>Mua Hàng</button>
                                        </a>
                                        <a class="add_buy" href="">
                                            <button>Thêm giỏ hàng</button>
                                        </a>
                                </article>
                            
                            </section>
                            <section class="column">
                                <a href="">
                                    <article class="product_not_sell">
                                        <section class="product_img">
                                            <img src="./view/img/prodcut/636863636051023338-ss-galaxy-s10-plus-den-1.webp" alt="">
                                        </section>
                                        <section class="product_name">
                                            <span>Điện thoại Samsung Galaxy S10+</span>
                                        </section>
                                        <section class="product_price">
                                            <span class="price">4.500.000d</span>
                                        </section>
                                        <a class="cart_buy" href="">
                                            <button>Mua Hàng</button>
                                        </a>
                                        <a class="add_buy" href="">
                                            <button>Thêm giỏ hàng</button>
                                        </a>
                                </article>
                            
                            </section>
                             -->
                            
                        </section>
                    </section>
                    <section class="paging">
                          <?php 
                        
                            for($num = 1; $num <=$totalpage; $num++){
                                if($num != (int)($page)){
                                    echo "<a href=./index.php?act=sanpham&id=$id&page=$num&products=8>
                                    <button class='paging_item'>$num</button>
                                      </a>";
                                }
                                else {
                                    echo "<a href=./index.php?act=sanpham&id=$id&page=$num&products=8>
                                    <button class='paging_item active'>$num</button>
                                      </a>";
                                }
                                
                            }
                          ?>
                    </section>
                    
                </section>
            </section>
          
        </main>