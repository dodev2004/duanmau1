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
                <section class="product_linked">
                    <a href="">
                        <span class="linked">Trang Chủ</span>
                    </a>
                    <i class="fa-solid fa-angle-right"></i>
                    <a href="">
                        <span class="linked">Danh Sách Sản Phẩm</span>
                    </a>
                </section>
                <section class="cart_list">
                    <span class="cart_list-title">Giỏ hàng của tôi</span>
                    <section class="form-user">

                        <table class=" mybill">
                            <tr>
                                <th class="">Mã đơn hàng</th>
                                <th class="">Ngày đặt</th>
                                <th class="">Số lượng mặt hàng</th>
                                <th >Tổng giá trị đơn hàng </th>
                                <th class="">Tình trạng</th>
                                <td ></td>
                               
                            </tr>
                            <?php foreach($bills as $bill):
                                  $sl = order_detail_count_by_id($bill["id"]);
                                  $tt = get_ttdh($bill["status"]);
                                ?>
                              
                            <tr>
                                <th  class="mybill_name">BND-<?php echo $bill["id"] ?></th>
                          
                                <th class="mybill_date"><?php echo date("H:i:s d-m-Y",$bill["bill_datecreated"]) ?></th>
                    
                                <th class="mybill_quantity" ><?php echo  $sl ?></th>

                                <th class="mybill_price"><?=number_format($bill["total"],0,',',',') . "đ"?></th>
                              
                                <th class="mybill_status"><?=$tt?></th>
                                <th><a href="">Chi tiết</a></th>
                        
                            </tr>
                            <?php endforeach ?>
                        </table>
                        
                    </section>
                    
                     </section>
           
          </main>