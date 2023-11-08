<main class="">
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