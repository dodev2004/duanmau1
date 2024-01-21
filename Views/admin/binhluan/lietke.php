<section class="admin-column_right">
    <h2 class="admin-column_right--title">Bình luận</h2>
    <span class="admin-column_right--linked"><b>Bình luận</b> - Danh sách bình luận</span>
    <div class="table table-category">
        <a href="./index.php?act=themkh"><input style="margin-bottom: 2rem;" type="button" name="them" value="Thêm danh thành viên"></a>
        <table>
            <tr>
                <th></th>
                <th>ID</th>
                <th>User</th>
                <th>Prodcut</th>
                <th>Comment</th>
                <th>Ngày bình luận</th>
                <th>Ngày cập nhật</th>
                
                <th>Hành Động</th>
            </tr>
            <?php
            foreach ($comments as $comment) :
            ?>
                <tr>
                    <th style=" vertical-align: middle !important; width: 5%;"> <input type="checkbox" value="<?php echo $comment["id_bl"] ?>" name="check_ml"></th>
                    <th class="id" style=" vertical-align: middle !important; width: 5%;"><?php echo $comment["id_bl"] ?></th>
                    <th style=" vertical-align: middle !important; width: 5%;"><?php echo $comment["id_user"] ?></th>
                    <th style=" vertical-align: middle !important; width: 5%;"><?php echo $comment["id_sanPham"] ?></th>
                    <th style=" vertical-align: middle !important; width: 25%;"><?php echo $comment["content"] ?></th>
                    <th style=" vertical-align: middle !important; width: 15%;"><?php echo $comment["date"] ?></th>
                    <th style=" vertical-align: middle !important; width: 15%;"><?php echo $comment["ngay_capNhat"] ?></th>
                  
                    <th style="vertical-align: middle;">
                        <a href="./index.php?act=suabl&id=<?php echo $comment["id_bl"] ?>"><input type="button" name="sua" value="Sửa"></a>
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
                        window.location.href = `./index.php?act=rembl&id=${id}`;
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
                window.location.href = `./index.php?act=rmAllbl&id=${pramator}`;
            } else {
                alert("Vui lòng tích những trường cần xóa");
            }
        }
    </script>
</section>