<section class="c-9">
    <section class="sign_up">
        <form action="./index.php?act=taikhoan&page=matkhau" method="post">
            <div style="margin-bottom: 20px;" class="form_title">
                <span>Thay đổi mật khẩu</span>
            </div>
            <section class="form_signup">
                <input type="password" name="old_password" placeholder="Mật khẩu cũ">
                <br>
                <p class="error_message"><?php echo $eror ?></p>
            </section>

            <section class="form_signup">
                <input type="password" name="password" placeholder="Mật khẩu mới">
                <br>
                <p class="error_message"></p>
            </section>
            <section class="form_signup">
                <input type="password" name="r_password" placeholder="Nhập lại mật khẩu cũ">
                <br>
                <p class="error_message"></p>
            </section>
            <section class="form_signup">
                <input type="submit" name="submit" value="Thay đổi">
            </section>

        </form>

    </section>
</section>
</section>
</section>
</main>