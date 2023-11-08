<main class="">
        <section class="sign_up">
            <form data-action="dangnhap" action="./index.php?act=dangnhap" method="post" >
                    <h1>Đăng nhập</h1>
                    <section class="description_signin">
                        <span>Nếu chưa có tài khoản bạn có thể</span>
                        <a href="./index.php?act=dangky">Đăng ký tại đây</a>

                        
                    </section>
                    <section class="form_signup">
                        <input type="text" name="user" placeholder="Username">
                        <br>
                        <p class="error_message"><?php echo !empty($eror["username"]) ? $eror["username"] : "" ?></p>
                    </section>
                  
                    <section class="form_signup">
                        <input type="password" name="password" placeholder="Password">
                        <br>
                        <p class="error_message"><?php echo !empty($eror["username"]) ? $eror["username"] : "" ?></p>
                    </section>
                    <section class="form_signup">
                        <input type="submit" name="submit" value="Đăng nhập">

                    </section>
                    <a href="./index.php?act=quenmk">Quên mật khẩu</a>
            </form>
        </section>
    </main>