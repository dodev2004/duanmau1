<section class="admin-column_right">
    <h2 class="admin-column_right--title">Giỏ hàng</h2>
    <span class="admin-column_right--linked"><b>Giỏ hàng</b> - Danh sách giỏ hàng</span>
    <div class="table table-category">
        <a href="./index.php?act=themkh"><input style="margin-bottom: 2rem;" type="button" name="them" value="Thêm giỏ hàng"></a>
        <form style="margin: 0;" class="form_1" action="./index.php?act=lkgiohang" method="post">"
            <section style="padding-right:8px;" class="form_group">
                <input type="text" name="seach_Madh" placeholder="Tìm kiếm đơn hàng" value="<?php echo !empty($_POST["seach_Madh"]) ? $_POST["seach_Madh"] : "" ?>">
            </section>
                <input style="display: inline; border-radius:4px; margin-left:5px" type="submit" value="seach" name="seach">
            </select>
        </form>
        <table>
            <tr>
                <th></th>
                <th>Mã hàng</th>
                <th>Khách hàng</th>
                <th>Số lượng</th>
                <th>Chi phí</th>
                <th>Tình trạng</th>
                <th>Ngày đặt</th>
               
                <th>Hành Động</th>
            </tr>
            <?php
            foreach ($bills as $bill) :
                $sl = order_detail_count_by_id($bill["id"]);
                $tt = get_ttdh($bill["status"]);
            ?>
                <tr>
                    <th style=" vertical-align: middle !important; width: 10%;"> <input type="checkbox" value="<?php echo $bill["id"] ?>" name="check_ml"></th>
                    <th class="id" style=" vertical-align: middle !important; width: 5%;">BND-<?php echo $bill["id"] ?></th>
                    <th style=" vertical-align: middle !important; width: 20%;">
                    <p><?php echo $bill["bill_name"] ?></p>
                    <p><?php echo $bill["bill_address"] ?></p>
                    <p><?php echo $bill["bill_tel"] ?></p>
                
                </th>
                    <th style=" vertical-align: middle !important; width: 3%;"><?php echo $sl ?></th>
                    <th style=" vertical-align: middle !important; width: 15%;"><?php echo number_format($bill["total"],0) . "đ"?></th>
                    <th style="vertical-align: middle !important;">
                    <?php  echo $tt;?>
                    </th> 
                    <th style="vertical-align: middle !important;
                    white-space: break-spaces;">
                    <?php 
                        echo date("H:i:s Y-m-d",$bill["bill_datecreated"]);
                    ?>
                    </th>  
                   
                    <th style="vertical-align: middle;">
                        <a href="./index.php?act=suagioHang&id=<?php echo $bill["id"] ?>"><input type="button" name="sua" value="Sửa"></a>
                        <a class="remove" href="./index.php?act=lkgiohang"><input type="button" name="xoa" value="Xóa"></a>
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
        const checkboxs = Array.from(document.querySelectorAll("input[type=checkbox]"));
        const removes = document.querySelectorAll(".remove");
        const elementas = document.querySelectorAll("a");
        if (elementas) {
            removes.forEach((remove) => {
                remove.onclick = function() {
                    event.preventDefault();
                    const id = remove.parentElement.parentElement.querySelector("input[type=checkbox]").value.trim();
                    let resuilt = confirm("Bạn chắc chắn muốn xóa chứ");
                    if (resuilt == true) {
                        window.location.href = `./index.php?act=xoagiohang&id=${id}`;
                    }
                }
            })
        }


        checkall.onclick = function() {

            checkboxs.forEach(function(cb) {
                cb.checked = "true";
            })
        }
        const checked_remove = document.querySelector(".checked_remove");
        checked_remove.onclick = function() {
            console.log(checked_remove);

            checkboxs.forEach(function(cb) {
                cb.checked = "";

            })

        }
        removeAll.onclick = function(e) {
            e.preventDefault();
            let pramator = [];
            checkboxs.forEach((checkbox) => {
                if (checkbox.checked) {
                    pramator.push(checkbox.value);
                }

            })
            if (pramator.length > 0) {
                console.log(pramator)
                window.location.href = `./index.php?act=rmAllgiohang&id=${pramator}`;
            } else {
                alert("Vui lòng tích những trường cần xóa");
            }
        }
    </script>
</section>