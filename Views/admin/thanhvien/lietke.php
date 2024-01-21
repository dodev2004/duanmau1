<section class="admin-column_right">
    <h2 class="admin-column_right--title">Thành viên</h2>
    <span class="admin-column_right--linked"><b>Thành viên</b> - Danh sách thành viên</span>
    <div class="table table-category">
        <a href="./index.php?act=themkh"><input style="margin-bottom: 2rem;" type="button" name="them" value="Thêm danh thành viên"></a>
        <table>
            <tr>
                <th></th>
                <th>ID</th>
                <th>Tài khoản</th>
                <th>Mật khẩu</th>
                <th>Email</th>
                <th>Họ và tên</th>
                <th>Quyền Hạn</th>
                <th>Hành Động</th>
            </tr>
            <?php
            foreach ($users as $user) :
            ?>
                <tr>
                    <th style=" vertical-align: middle !important; width: 10%;"> <input type="checkbox" value="<?php echo $user["id"] ?>" name="check_ml"></th>
                    <th class="id" style=" vertical-align: middle !important; width: 5%;"><?php echo $user["id"] ?></th>
                    <th style=" vertical-align: middle !important; width: 15%;"><?php echo $user["user"] ?></th>
                    <th style=" vertical-align: middle !important; width: 15%;"><?php echo $user["password"] ?></th>
                    <th style=" vertical-align: middle !important; width: 15%;"><?php echo $user["email"] ?></th>
                    <th style="vertical-align: middle !important;">
                    <?php echo $user["name"] ?>
                    </th> 
                    <th style="vertical-align: middle !important;">
                    <?php if($user["role"] == 1 && $user["role"] !=0){
                        echo "Admin";
                    } else{
                        echo "Khách hàng";
                    }
                    ?>
                    </th>   
                    <th style="vertical-align: middle;">
                        <a href="./index.php?act=suakh&id=<?php echo $user["id"] ?>"><input type="button" name="sua" value="Sửa"></a>
                        <a class="remove" href="./index.php?act=lkdm"><input type="button" name="xoa" value="Xóa"></a>
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
                    const id = remove.parentElement.parentElement.querySelector(".id").textContent.trim();
                    let resuilt = confirm("Bạn chắc chắn muốn xóa chứ");
                    if (resuilt == true) {
                        window.location.href = `./index.php?act=xoasp&id=${id}`;
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
                window.location.href = `./index.php?act=rmAllkh&id=${pramator}`;
            } else {
                alert("Vui lòng tích những trường cần xóa");
            }
        }
    </script>
</section>