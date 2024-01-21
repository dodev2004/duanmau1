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
                                    <img src="../../img/icon/gift.png" alt="">
                                    Sản phẩm khuyễn mãi</a>
                            </li>
                            <li class="header_banner-policy-item"><a class="header_banner-policy-text" href="">
                                    <img src="../../img/icon/sync.png" alt="">
                                    Sản phẩm khuyễn mãi</a>
                            </li>
                            <li class="header_banner-policy-item">
                                <a class="header_banner-policy-text" href="">
                                    <img src="../../img/icon/delivery-truck.png" alt="">
                                    Miễn phí giao hàng toàn quốc
                                </a>
                            </li>
                            <li class="header_banner-policy-item"><a class="header_banner-policy-text" href="">
                                    <img src="../../img/icon/hand (1).png" alt="">
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
                    <span class="linked">Quên mật khẩu</span>
                </a>
            </section>  
            <section class="sign_up">
                <form data-action="dangnhap" action="./index.php?act=xndmk&id=<?php echo $_GET['id'] ?>" method="post" >
                        <h1>Quên mật khẩu</h1>
                        <section class="description_signin">
                            <span>Nếu chưa có tài khoản bạn có thể</span>
                            <a href="./index.php?act=dangky">Đăng ký tại đây</a>                   
                        </section>
                        <section class="form_signup">
                            <p style="padding-bottom:5px; margin-left:5px; font-size:13px" for="">Vui lòng nhập mã </p>
                            <br>
                            <input type="text" class="active_user" name="vetification_user"  placeholder="******">
                            <br>
                            <p class="error_message"> <?php  echo $eror?></p>
                        </section>
                        <section class="code_message">
                            <p>Code đã được gửi đến tới địa chỉa email của bạn vui lòng kiểm tra </p>
                            <p class="coundown_code">Hiệu lực của code còn : <span class="coundown_code-action "></span></p>
                            <p><span>Bạn chưa nhận được code về gmail có thể ấn : </span><span class="repeat_active "><a class="" href="">Gửi lại</a></span></p>
                            
                             
                        </section>
                        <section class="form_signup">
                            <input type="submit" name="submit" value="Gửi">
                        </section>
                       
                </form>
            </section>
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script >
                const repeatCode = document.querySelector(".repeat_active > a");
                const CoundownCode = document.querySelector(".coundown_code-action")
                var form = document.querySelector("form[data-action = dangnhap]");
                sessionStorage.setItem("time",<?php echo $timer ?>);                 
                if(coundownCode() <=0){
                    
                    CoundownCode.innerHTML = `00 : 00`;
                }
                else {
                    var counDountInterval =setInterval(function() {
                           const timer = <?php echo $timer ?>;
                           let countdown = coundownCode(timer);
                           
                           if(countdown < 10){
                              countdown = countdown <= 0 ? 0 : countdown ;
                              CoundownCode.innerHTML = `00 : 0${countdown}`
                              
                           }
                           else  {
                              CoundownCode.innerHTML = `00 : ${countdown} `
                           }
                            if(countdown <= 0){
                               clearInterval(counDountInterval);
                           }
              },1000);

                }
                
                repeatCode.onclick = function(e){
                    let check = false;
                    let time = "";
                    var timer = new Date(),
                     years = timer.getFullYear(),
                     months = timer.getMonth(),
                     days = timer.getDate(),
                     houses = timer.getHours(),
                     minutes = timer.getMinutes(),
                     seconds = timer.getSeconds();
                    

                    e.preventDefault();
                    $.ajax({
                        method: "POST",
                        url: "../../Model/xulycodephp.php",
                        data :{
                            id : <?php echo $id ?>,
                            code : Math.round(Math.random()*999999),
                            // time : new Date("Y-m-d H:i:s")
                            time : `${years}-${months+1}-${days} ${houses}:${minutes}:${seconds}`
                        },
                      
                    }).done(data =>{   
                        sessionStorage.setItem("time",data);    
                        alert("Code đã được gửi đến gmail của bạn vui lòng kiểm tra"); 
                        clearInterval(counDountInterval)
                        clearInterval(counDountInterval2);
                    var counDountInterval2 =setInterval(function() {
                            let countdown = coundownCode(data);
                            if(countdown<10){
                             countdown = countdown <= 0 ? 0 : countdown ;
                             console.log(countdown);
                              CoundownCode.innerHTML = `00 : 0${countdown}`
                             }
                             else {
                                CoundownCode.innerHTML = `00 : ${countdown} `
                             }
                             if(countdown  <= 0){
                                clearInterval(counDountInterval2);
                            }
                        },1000)
                        
                    })
                   
                }

                function coundownCode(time){
                const now = new Date().getTime();
                const end = new Date(`${time}`).getTime()+ 59*1000;
                const countdown = Math.round((end - now)/1000)
               
           
                return countdown;
                }
                
              
            </script>
          </main>