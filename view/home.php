<section class="header_bottom">
                <section class="container">
                    <aside>
                        <section class="header_bottom-category">
                            <section class="catagory-title">
                                <i class="fa-solid fa-bars"></i>
                                Danh mục sản phẩm
                            </section>
                            <ul class="header_bottom-list">
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
                        <!-- Slideshow container -->
                        <div class="slideshow-container">

                            <!-- Full-width images with number and caption text -->
                            <div class="mySlides fade">
                                <div class="numbertext">1 / 3</div>
                                <img src="./view/img/banner/slider_1.webp" style="width:100%">
                                <div class="text">Caption Text</div>
                            </div>

                            <div class="mySlides fade">
                                <div class="numbertext">2 / 3</div>
                                <img src="./view/img/banner/mau-banner-dien-may-dep-va-chuyen-nghiep_024310892.jpg" style="width:100%">
                                <div class="text">Caption Two</div>
                            </div>

                            <div class="mySlides fade">
                                <div class="numbertext">3 / 3</div>
                                <img src="./view/img/banner/anh-thiet-ke-banner-dien-may_033704372.jpg" style="width:100%">
                                <div class="text">Caption Three</div>
                            </div>

                            <!-- Next and previous buttons -->
                            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                            <a class="next" onclick="plusSlides(1)">&#10095;</a>
                        </div>
                        <br>

                        <!-- The dots/circles -->
                        <div style="text-align:center">
                            <span class="dot" onclick="currentSlide(1)"></span>
                            <span class="dot" onclick="currentSlide(2)"></span>
                            <span class="dot" onclick="currentSlide(3)"></span>
                        </div>
                    </section>
                </section>

            </section>
        </header>
<main>
            <section class="container">
                <section class="product">
                    <section class="product_item product_new">
                        <h1>Sản phẩm mới nhất</h1>
                        <section class="row product-hot ">
                           <?php  foreach($news as $new): ?>
                            <section class="column">
                                <a href="./index.php?act=sanphamchitiet&id=<?php echo $new["id_sanPham"] ?>">
                                    <article class="product_not_sell">
                                        <section class="product_img">
                                            <img src="./view/img/<?php echo $new["image"]?>"
                                                alt="">
                                        </section>
                                        <section class="product_name">
                                            <span><?php echo $new["ten_sanPham"] ?></span>
                                        </section>
                                        <section class="product_price">
                                            <span class="price"><?php echo number_format($new["price"],0,',',',')?>đ</span>
                                        </section>
                                        <form action="./index.php?act=cart" method="post" class="cart">
                                        <input type="text" name="id_sanPham" style="display: none;" value="<?php echo $new["id_sanPham"] ?>">
                                        <input type="text" name="image" style="display: none;" value="<?php echo $new["image"] ?>">
                                        <input type="text" style="display: none !important" name="quantity" value="1">
                                        <input type="text" name="ten_sanPham" style="display: none;" value="<?php echo $new["ten_sanPham"] ?>">
                                        <input type="text" style="display: none;" name="price" value="<?php echo $new["price"] ?>">
                                    
                                        <button type="submit" name="buy">Mua Hàng</button>
                                        <button type="submit" name="addcart">Thêm giỏ hàng</button>
                                        </form>
                           </a>
                                      
                                    </article>

                            </section>
                            <?php endforeach ?>

                           
                           
                            <!-- <section class="column">
                                <a href="">
                                    <article class="product_not_sell">
                                        <section class="product_img">
                                            <img src="./view/img/prodcut/636863636051023338-ss-galaxy-s10-plus-den-1.webp"
                                                alt="">
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
                                            <img src="./view/img/prodcut/636863636051023338-ss-galaxy-s10-plus-den-1.webp"
                                                alt="">
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
                                            <img src="./view/img/prodcut/636863636051023338-ss-galaxy-s10-plus-den-1.webp"
                                                alt="">
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

                            </section> -->
                        </section>
                    </section>
                    <section class="product_item product_new">
                        <h1>Nhiều lượt xem nhất</h1>
                        <section class="row product-hot ">
                            <?php foreach($views as $view) : ?>
                                <section class="column">
                                <a href="./index.php?act=sanphamchitiet&id=<?php echo $view["id_sanPham"] ?>">
                                <article class="product_not_sell">
                                        <section class="product_img">""
                                            <img src="./view/img/<?php echo $view["image"]?>"
                                                alt="">
                                        </section>
                                        <section class="product_name">
                                            <span><?php echo $view["ten_sanPham"] ?></span>
                                        </section>
                                        <section class="product_price">
                                            <span class="price"><?php echo number_format($view["price"],0,',',',') ?> đ</span>
                                        </section>
                                        <form action="./index.php?act=cart" method="post" class="cart">
                                        <input type="text" name="id_sanPham" style="display: none;" value="<?php echo $view["id_sanPham"] ?>">
                                        <input type="text" name="image" style="display: none;" value="<?php echo $view["image"] ?>">
                                        <input type="text" name="ten_sanPham" style="display: none;" value="<?php echo $view["ten_sanPham"] ?>">
                                        <input type="text" style="display: none;" name="price" value="<?php echo $view["price"] ?>">
                                        <button type="submit" name="buy">Mua Hàng</button>
                                        <button type="submit" name="addcart">Thêm giỏ hàng</button>
                                        </form>
                                    </article>

                            </section>
                            <?php endforeach ?>
                 
                       


                        </section>
                    </section>
                </section>
            </section>

        </main>