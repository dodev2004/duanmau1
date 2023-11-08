<section class="admin-column_right">

    <span class="admin-column_right--linked"><b>Giỏ hàng</b> - Thêm giỏ hàng</span>
    <br>
    <a class="them" href="./index.php?act=bl"><input style="margin-bottom: 2rem;" type="button" name="them" value="Liệt kê bình luận"></a>
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
                <form  action="./index.php?act=suabl&id=<?php echo $users["id"] ?>" method="post" >
                       
                <div style="margin-bottom: 20px;" class="form_title">
                <span>Thêm Giỏ hàng</span>
            </div>
                        <section class="form_signup">
                            <label style="pointer-events: none;"   for="">ID user</label>
                            <input style="pointer-events: none;" type="text" name="user" value="<?php echo ($comment["id_user"])? $comment["id_user"] :"" ?>" placeholder="">
                            <br>
                            <p class="error_message"></p>
                        </section>
                        <section class="form_signup">
                            <label for="">ID Sản Phẩm</label>
                            <input style="pointer-events: none;" type="text" name="id_sanPham" value="<?php echo ($comment["id_sanPham"])? $comment["id_sanPham"] :""?>" placeholder="Email" required>
                            <br>
                            <p class="error_message"></p>
                        </section>
                    
                        <section class="form_signup">
                            <label for="">Content</label>
                            <input type="text" value="<?php echo isset($comment["content"]) ? $comment["content"] :"" ?>"  name="content" >
                            <br>
                            <p class="error_message"></p>
                        </section>
                        
                        <section class="form_signup">
                            <input type="submit"  name="submit" value="Sửa">
                        </section>
            
                </form>
          
            </section>
        
</section>
