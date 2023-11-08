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
                                    
                                    <a href="./index.php?act=sanpham&id=<?php echo $category["id_danhmuc"] ?>" class="header_bottom-link">
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
        <section class="container ">
            <section class="product_linked">
                <a href="">
                    <span class="linked">Trang Chủ</span>
                </a>
                <i class="fa-solid fa-angle-right"></i>
                <a href="">
                    <span class="linked">Đăng ký</span>
                </a>
            </section>  
            <?php
                
            ?>
            <section class="sign_up">
                <form data-action="dangky" action="./index.php?act=dangky" method="post" >
                        <h1>Đăng ký</h1>
                        <section class="description_signin">
                            <span>Nếu có tài khoản bạn có thể</span>
                            <a href="./index.php?act=dangnhap">Đăng nhập tại đây</a>
                        </section>
                        <section class="form_signup">
                            <input type="text" value="<?php echo isset($_POST["name"])? $_POST["name"] :"" ?>" name="name" placeholder="Họ và tên">
                            <br>
                            <p class="error_message"></p>
                        </section>
                        
                        <section class="form_signup">
                            <input type="text" name="user" value="<?php echo isset($_POST["user"])? $_POST["user"] :"" ?>" placeholder="Username">
                            <br>
                            <p class="error_message"></p>
                        </section>
                        <section class="form_signup">
                            <input type="text" name="email" value="<?php echo isset($_POST["email"])? $_POST["email"] :""?>" placeholder="Email" required>
                            <br>
                            <p class="error_message"><?php echo $eror ?></p>
                        </section>
                        <section class="form_signup">
                            <input type="password" name="password" placeholder="Password">
                            <br>
                            <p class="error_message"></p>
                        </section>
                        <section class="form_signup">
                            <input type="submit"  name="submit" value="Đăng ký">
                        </section>
            
                </form>
          
            </section>
          </main>
        