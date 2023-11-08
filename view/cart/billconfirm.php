
<?php  ?>
<section class="header_bottom">
    <section class="container">
        <aside>
            <section class="header_bottom-category">
                <section class="catagory-title">
                    <i class="fa-solid fa-bars"></i>
                    Danh mục sản phẩm
                </section>
                <ul class="header_bottom-list active">
                    <?php foreach ($categories as $category) : ?>
                        <li class="header_bottom-item">

                            <a href="./index.php?act=sanpham&id=<?php echo $category["id_danhmuc"] ?>&page=1&products=8" class="header_bottom-link">
                                <?php if ($category["icon"]) {
                                    echo $category["icon"];
                                } ?>
                                <?php echo $category["ten_danhmuc"] ?>
                            </a>
                        </li>
                    <?php endforeach ?>
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
        <section class="cart_list">

            <section class="form-user">
                <section class="congratulations">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <g id="check--check-form-validation-checkmark-success-add-addition-tick">
                            <path id="Vector (Stroke)" fill="#186f65" fill-rule="evenodd" d="M13.637 1.198a1 1 0 0 1 .134 1.408l-8.04 9.73-.003.002a1.922 1.922 0 0 1-1.5.693 1.923 1.923 0 0 1-1.499-.748l-.001-.002L.21 9.045a1 1 0 1 1 1.578-1.228l2.464 3.167 7.976-9.652a1 1 0 0 1 1.408-.134Z" clip-rule="evenodd"></path>
                        </g>
                    </svg> <span>Cảm ơn bạn đã đặt hàng</span>
                </section>
                <section class="information_content">
                    <section class="infomation">
                        <span class="infomation_title">
                            Thông tin người đặt hàng
                        </span>
                        <table class="infomation_detail">
                            <tr>

                                <td>Tên:</td>
                                <td>
                                    <?php echo $bill["bill_name"] ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Số điện thoại:</td>
                                <td>
                                    <?php echo $bill["bill_tel"] ?>
                                </td>
                            </tr>
                            <tr>
                                <td> Địa chỉ : </td>
                                <td><?php echo $bill["bill_address"] ?></td>
                            </tr>

                        </table>
                    </section>
                    <section class="infomation">
                        <span class="infomation_title">
                            Thông tin hàng đã đặt
                        </span>
                        <table class="infomation_detail">
                            <tr>
                                <td>Mã đơn hàng</td>
                                <td>
                                    BND-<?php echo $bill["id"] ?>
                                </td>

                            </tr>
                            <tr>
                                <td>Tổng tiền</td>
                                <td> BND-<?php echo $bill["total"] ?></td>
                            </tr>
                            <tr>
                                <td>Ngày mua hàng</td>
                                <td>
                                    <?php

                                  
                                    echo date("h:i:s d-m-Y", time()) ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Trạng thái</td>
                                <td>
                                    <?php
                                    if ($bill["status"] == 0) {
                                        echo "Chờ xác nhận";
                                    } else if ($bill["status"] == 1) {
                                        echo "Chờ lấy hàng";
                                    } else {
                                        echo "Đang giao";
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Phương thức thanh toán</td>
                                <td>
                                    <?php
                                    if ($bill["bill_pttt"]   == 1) {
                                        echo "Trả tiền khi nhận hàng";
                                    } else if ($bill["bill_pttt"]   == 2) {
                                        echo "Chuyển khoản khi nhận hàng";
                                    } else {
                                        echo "Chuyển khoản bằng thẻ banking online";
                                    }
                                    ?>
                                </td>
                            </tr>

                        </table>
                    </section>
                </section>



                <table class="table_cart">
                    <tr>
                        <th class="cart_prodcut">Sản Phẩm</th>
                        <th class="cart_img">Hình</th>
                        <th class="">Đơn Giá</th>
                        <th>Số Lượng</th>
                        <th class="cart_total-price">Thành Tiền</th>

                    </tr>
                    <?php
                    $totalPrice = 0;
                    ?>
                    <?php

                    foreach ($_SESSION["gioHang"] as $index => $giohang) :
                        $totalPrice = $totalPrice + $giohang["thanhtien"];
                    ?>
                        <tr>
                            <th class="cart_prodcut"><?php echo $giohang["name"] ?></th>
                            <th class="cart_img"><img src="./view/img/<?php echo $giohang["image"] ?>" alt=""></th>
                            <th data-price="<?php echo $giohang["price"] ?>" class="cart_price"><?php echo number_format($giohang["price"], 0, ',', ',') ?></th>
                            <th class="cart_quantity"><input type="text" name="quantity[<?php echo $index ?>]" value="<?php echo $giohang["quantity"] ?>"></th>
                            <th class="cart_total-price"><?php echo number_format($giohang["thanhtien"], 0, ',', ',') ?></th>

                        </tr>
                    <?php endforeach ?>
                    <tr>
                        <th colspan="4">Tổng thành tiền</th>
                        <th class="total_price" colspan="2"><?php echo  number_format($totalPrice, 0, ',', ',') . "đ" ?>
                            <input style="display: none;" type="text" name="total" value="<?php echo $totalPrice ?>">
                        </th>

                    </tr>

                </table>

            </section>

        </section>

</main>