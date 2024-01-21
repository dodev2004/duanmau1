<section class="admin-column_right">

    <span class="admin-column_right--linked"><b>Thành viên</b> - Sửa thành viên</span>
    <br>
    <a class="them" href="./index.php?act=lkkh"><input style="margin-bottom: 2rem;" type="button" name="them" value="Liệt kê thành viên"></a>
    <!-- <div class="table table-category">
                            <table>
                                <tr>
                                    <th colspan="2">Mã Loại</th>
                                    <th>Tên Loại</th>
                                    <th>Hành Động</th>
                                </tr>
                                <tr>
                                    <th><input type="checkbox" name="check_ml"></th>
                                    <th>1</th>
                                    <th>Giay Dep</th>
                                    <th>
                                        <a href=""><input type="button" name="sua" value="Sửa"></a>
                                        <a href=""><input type="button" name="xoa" value="Xóa"></a>
                                    </th>
                                </tr>
                            </table>
                            <a href=""><input type="button" name="them" value="Thêm danh mục sản phẩm"></a>
                        </div> -->
                    <section class="sign_up">
                <form  action="./index.php?act=themkh" method="post" >
                       
                <div style="margin-bottom: 20px;" class="form_title">
                <span>Thêm thành viên</span>
            </div>
                        <section class="form_signup">
                            <input type="text" value="<?php echo isset($_POST["name"])? $_POST["name"] :"" ?>" name="name" placeholder="Họ và tên">
                            <br>
                            <p class="error_message"></p>
                        </section>
                        
                        <section class="form_signup">
                            <input type="text" name="user" value="<?php echo isset($_POST["user"])? $_POST["user"] :"" ?>" placeholder="Username">
                            <br>
                            <p class="error_message"><?php echo $eror["user"] != "" ? $eror["user"] : ""?></p>
                        </section>
                        <section class="form_signup">
                            <input type="text" name="email" value="<?php echo isset($_POST["email"])? $_POST["email"] :""?>" placeholder="Email" required>
                            <br>
                            <p class="error_message"><?php echo $eror["email"] != "" ? $eror["email"] : ""?></p>
                        </section>
                    
                        <section class="form_signup">
                            <input type="password"  name="password" placeholder="Password">
                            <br>
                            <p class="error_message"></p>
                        </section>
                        <section class="form_signup">
                            <input type="password" name="r_password" placeholder="Password Repeat">
                            <br>
                            <p class="error_message"></p>
                        </section>
                        <section class="form_signup">
                            <input type="submit"  name="submit" value="Thêm">
                        </section>
            
                </form>
          
            </section>
        
</section>
