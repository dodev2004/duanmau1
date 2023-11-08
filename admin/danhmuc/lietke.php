<section class="admin-column_right">
                        <h2 class="admin-column_right--title">Danh Mục</h2>
                        <span class="admin-column_right--linked"><b>Danh Mục</b> - Danh sách loại dang mục</span>
                        <div class="table table-category">
                        <a href="./index.php?act=themdm"><input style="margin-bottom: 2rem;" type="button" name="them" value="Thêm danh mục sản phẩm"></a>
                            <table>
                                <tr>
                                    <th colspan="2">Mã Loại</th>
                                    <th>Tên Loại</th>
                                    <th>Hành Động</th>
                                </tr>
                                <?php 
                                 foreach($lists as $list):
                                ?>
                                <tr>
                                    <th><input type="checkbox" value="<?php echo $list["id_danhmuc"] ?>" name="check_ml"></th>
                                    <th class="id"><?php echo $list["id_danhmuc"] ?></th>
                                    <th><?php echo $list["ten_danhmuc"]?></th>
                                    <th>
                                        <a  href="./index.php?act=suadm&id=<?php echo $list["id_danhmuc"]?>"><input type="button" name="sua" value="Sửa"></a>
                                        <a  class="remove" href="./index.php?act=lkdm"><input type="button" name="xoa" value="Xóa"></a>
                                    </th>
                                </tr>
                                <?php endforeach ?>

                                
                            </table>
                        
                        </div>
                         <input style="margin-bottom: 2rem;" type="button" class="check_all" name="them" value="Tích toàn bộ">
                       <input style="margin-bottom: 2rem;" type="button" name="them" class="checked_remove" value="Bỏ toàn bộ đã tích">
                        <a class="removeAll" href="./index.php?act=rmall"><input style="margin-bottom: 2rem;" type="button" name="them" value="Xóa toàn bộ đã tích"></a>
    <script>
        const checkall = document.querySelector(".check_all");
        const removeAll = document.querySelector(".removeAll");
        const checkboxs =Array.from(document.querySelectorAll("input[type=checkbox]"));
        const removes = document.querySelectorAll(".remove");
        const elementas = document.querySelectorAll("a");
        if(elementas){
        removes.forEach((remove) =>{
            remove.onclick = function(){
            event.preventDefault();
            const  id  = remove.parentElement.parentElement.querySelector(".id").textContent.trim();
            let resuilt = confirm("Bạn chắc chắn muốn xóa chứ");
            if(resuilt == true){
                window.location.href = `./index.php?act=xoadm&id=${id}`;
            }     
        }
        })
        }
       
       
        checkall.onclick = function(){
            
        checkboxs.forEach(function(cb){
         cb.checked = "true";
        })
        }
        const checked_remove = document.querySelector(".checked_remove");
        checked_remove.onclick = function(){
            console.log(checked_remove);
            
             checkboxs.forEach(function(cb){
             cb.checked = "";
          
        })
       
        }
        removeAll.onclick = function(e){
            e.preventDefault();
            let pramator = [];
            checkboxs.forEach((checkbox) =>{
                if(checkbox.checked){
                    pramator.push(checkbox.value);
                }

            })
            if(pramator.length > 0){
                window.location.href = `./index.php?act=rmAlldm&id=${pramator}`;
            }
            
        }
       
        
    </script>     
 </section>