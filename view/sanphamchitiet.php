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
                    <a href="index.php?act=sanpham&id=<?php echo $product["id_danhmuc"] ?>">
                        <span class="linked"><?php echo $product["ten_danhmuc"] ?></span>
                    </a>
                    <i class="fa-solid fa-angle-right"></i>
                    <a href="">
                        <span class="linked"><?php echo $detail["ten_sanPham"] ?></span>
                    </a>
            </section>
                <section class="product">
                    <section class="product_detail">
                        <section class="product_detail-img">
                            <section class="product_detail-primary">
                                <img src="./view/img/<?php echo $detail["image"] ?>" alt="">
                            </section>

                            <section class="product_detail-slider">
                                <section class="product_detail-slider-item">
                                    <img src="./view/img/<?php echo $detail["image"] ?>" alt="">
                                </section>

                            </section>
                        </section>
                        <section class="prodcut_detail-content">
                            <form id="form-1" action="index.php?act=cart" method="post">
                            <section class="product_detail-name">
                                    <input type="text" name="image" value="<?php  echo $detail["image"] ?>">
                                    <input type="text" name="id_sanPham" id="product_name" value="<?php echo $detail["id_sanPham"] ?>">
                                </section>
                                <section class="product_detail-name">
                                    <label for="product_name"><?php echo $detail["ten_sanPham"] ?></label>
                                    <input  name="ten_sanPham" type="text" id="product_name" value="<?php echo $detail["ten_sanPham"] ?>">
                                </section>
                                <section class="product_detail-price">
                                    <label for="">Giá tiền: <span><?php echo number_format($detail["price"],0,',',',') ?></span></label>
                                    <input name="price" style="display: none;" type="text" id="product_price" value="<?php echo $detail["price"] ?>">
                                </section>
                                <section class="product_quantity"  >
                                    <span>Số lượng</span>
                                    <section class="product_detail-quantity">
                                        <button type="button" class="quantity_reducer">-</button>
                                        <input type="text" name="quantity" value="1">
                                        <button type="button" class="quantity_increase">+</button>
                                    </section>
                                </section>
                               
                                <section class="product_detail-buy">
                                    <button type="submit" name="addcart" class="btn_cart">
                                        <span>Thêm vào giỏ hàng</span>
                                    </button>
                                    <button type="submit" name="buy" class="btn_buy">
                                        <span>Mua ngay</span>
                                    </button>
                                </section>
                            </form>

                        </section>
                    </section>
                    <section class="product_detail-midle">
                        <span class="task_midle"></span>
                        <section class="product_detail-midle-left">
                            <section class="product_detail-item">
                                <section data-index="1" class="product_content">
                                    <span>Mô Tả Sản Phẩm</span>
                                </section>
                                <section data-index="2" class="product_content">
                                    <span>Điều Khoản Bảo Hành</span>
                                </section>
                            </section>
                            <section data-index="1" class="product_midle-content">
                                <p>
                                <?php echo trim($detail["mota"]) ? $detail["mota"] : "Đang cập nhật" ?>
                                </p>
                            </section>
                            <section data-index="2" class="product_midle-content active">
                                <p>
                                    Đang cập nhật
                                </p>
                            </section>

                        </section>
                        <section class="product_detail-midle-right">
                                <h3>THÔNG SỐ KĨ THUẬT</h3>
                                <span>Đang Cập Nhật</span>
                        </section>
                    </section>
                </section>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
                <script>
                    $(document).ready(function(){              
                            $("#comment").load("./view/binhluan/formbinhluan.php", {
                                "product" :{
                                 idpro : "<?php  echo $detail["id_sanPham"] ?>",
                                 name :"<?php echo $detail["ten_sanPham"] ?>"
                                }
                            });
                    });
                </script>
                <section id="comment" class="comment">
                   
                </section>
                <section class="product_item product_new">
                    <h1>Sản Phẩm Tương Tự</h1>
                    <section class="row product-hot ">
                    <?php  foreach($products as $product): ?>
                            <section class="column">
                                <a href="./index.php?act=sanphamchitiet&id=<?php echo $product["id_sanPham"] ?>">
                                    <article class="product_not_sell">
                                        <section class="product_img">
                                            <img src="./view/img/<?php echo $product["image"]?>"
                                                alt="">
                                        </section>
                                        <section class="product_name">
                                            <span><?php echo $product["ten_sanPham"] ?></span>
                                        </section>
                                        <section class="product_price">
                                            <span class="price"><?php echo number_format($product["price"],0,',',',')?>đ</span>
                                        </section>
                                        <form action="" method="post" class="cart">
                                        <input type="text" name="id_sanPham" style="display: none;" value="<?php echo $product["id_sanPham"] ?>">
                                        <input type="text" name="image" style="display: none;" value="<?php echo $product["image"] ?>">
                                        <input type="text" name="ten_sanPham" style="display: none;" value="<?php echo $product["ten_sanPham"] ?>">
                                        <input type="text" style="display: none;" name="price" value="<?php echo $product["price"] ?>">
                                        <button type="submit" name="buy">Mua Hàng</button>
                                        <button type="submit" name="addcart">Thêm giỏ hàng</button>
                                        </form>
                                    </article>

                            </section>
                            <?php endforeach ?>
                    </section>
                </section>
            </section>
           
        </main>
        <script src="./asset/js/chitietsp.js">

</script>