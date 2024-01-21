<section class="admin-column_right">

    <span class="admin-column_right--linked"><b>Giỏ hàng</b> - Sửa giỏ hàng</span>
    <br>
    <a class="them" href="./index.php?act=lkgiohang"><input style="margin-bottom: 2rem;" type="button" name="them" value="Liệt kê bình luận"></a>
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
                <form  action="./index.php?act=suagioHang&id=<?php echo $bill["id"] ?>" method="post" >
                <div style="margin-bottom: 20px;" class="form_title">
                <span>Sửa giỏ hàng</span>
            </div>
                        <section class="form_signup">
                            <label for="">ID</label>
                            <input style="pointer-events: none;" disabled type="text" value="<?php echo ($bill["id"])? $bill["id"] :"" ?>" name="id_order" placeholder="ID">
                            <br>
                            <p class="error_message"></p>
                        </section>
                        <section class="form_signup">
                            <label style="pointer-events: none;"    for="">ID user</label>
                            <input style="pointer-events: none;" disabled type="text" name="id_user" value="<?php echo ($bill["id_user"])? $bill["id_user"] :"" ?>" placeholder="">
                            <br>
                            <p class="error_message"></p>
                        </section>
                        <section class="form_signup">
                            <label for="">Tên</label>
                            <input style="pointer-events: none;" type="text" name="bill_name" value="<?php echo ($bill["bill_name"])? $bill["bill_name"] :""?>" placeholder="Email" required>
                            <br>
                            <p class="error_message"></p>
                        </section>
                    
                        <section class="form_signup">
                            <label for="">Phone</label>
                            <input type="text" value="<?php echo isset($bill["bill_tel"]) ? $bill["bill_tel"] :"" ?>"  name="bill_tel" >
                            <br>
                            <p class="error_message"></p>
                        </section>
                        <section class="form_signup">
                            <label for="">Address</label>
                            <input type="text" value="<?php echo isset($bill["bill_address"]) ? $bill["bill_address"] :"" ?>"  name="bill_address" >
                            <br>
                            <p class="error_message"></p>
                        </section>
                        <section class="form_signup">
                            <label for="">Phương thức thanh toán</label>
                            <input disabled type="text" value="1"  name="bill_pttt" >
                            <br>
                            <p class="error_message"></p>
                        </section>
                        
                        <section class="form_signup">
                            <label for="">Trạng Thái</label>
                            <select name="status" id="">
                                <?php  ?>
                                <option  <?php  if($bill["status"] == 0){
                                    echo "selected" ;
                                }?>  value="0">Chờ xác nhận</option>
                                <option  <?php  if($bill["status"] == 1){
                                    echo "selected";
                                }?>  value="1">Chờ lấy hàng</option>
                                <option  <?php   if($bill["status"] == 2){
                                    echo "selected";
                                }?>  value="2">Đang giao</option>
                            </select>
                            <br>
                            <p class="error_message"></p>
                        </section>
                        
                        <section class="form_signup">
                            <input type="submit"  name="submit" value="Sửa">
                        </section>
            
                </form>
          
            </section>
        
</section>
