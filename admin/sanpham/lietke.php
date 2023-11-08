<section class="admin-column_right">
    <h2 class="admin-column_right--title">Sản phẩm</h2>
    <span class="admin-column_right--linked"><b>Sản phẩm</b> - Danh sách sản phẩm</span>
    <div class="table table-category">
        <a href="./index.php?act=themsp"><input style="margin-bottom: 2rem;" type="button" name="them" value="Thêm sản phẩm"></a>
        <form style="margin: 0;" class="form_1" action="./index.php?act=lksp&page=1&per_page=10" method="post">"
            <section style="padding-right:8px;" class="form_group">
                <input type="text" name="seach_sanPham" placeholder="Tìm kiếm sản phẩm" value="<?php echo !empty($_POST["seach_sanPham"]) ? $_POST["seach_sanPham"] : "" ?>">
            </section>
            <select name="seach_idDanhMuc" id="">
                <option value="">Tất cả</option>
                <?php
                foreach ($categorys as $category) :
                ?>
                    <option <?php
                            $ten_danhmuc = !empty($_POST["seach_idDanhMuc"]) ? $_POST["seach_idDanhMuc"] : null;
                            if ($ten_danhmuc) {
                                if ($ten_danhmuc == $category["id_danhmuc"]) {
                                    echo "selected";
                                }
                            }
                            ?> value="<?php echo $category["id_danhmuc"] ?>"><?php echo $category["ten_danhmuc"] ?></option>
                <?php endforeach ?>
                    <input style="display: inline; border-radius:4px; margin-left:5px" type="submit" value="seach" name="seach">
            </select>
            <section class="tk_sp">Có <span><?php echo $count ?></span> sản phẩm trong trang số <?php echo $_GET["page"] ?></section>
        </form>
       
        <table>
       
            <tr>
                <th>Mã Loại</th>
                <th>ID</th>
                <th>Tên Sản phẩm</th>
                <th>Tên Danh Mục</th>
                <th>Giá</th>
                <th>Image</th>
                <th>Hành Động</th>
            </tr>
            <?php
            foreach ($lists as $list) :
            ?>
                <tr>
                    <th style=" vertical-align: middle !important; width: 10%;"> <input type="checkbox" value="<?php echo $list["id_sanPham"] ?>" name="check_ml"></th>
                    <th class="id" style=" vertical-align: middle !important; width: 5%;"><?php echo $list["id_sanPham"] ?></th>
                    <th style=" vertical-align: middle !important; width: 15%;"><?php echo $list["ten_sanPham"] ?></th>
                    <th style=" vertical-align: middle !important; width: 15%;"><?php echo $list["id_danhmuc"] ?></th>
                    <th style=" vertical-align: middle !important; width: 15%;"><?php echo $list["price"] ?></th>
                    <th> <img style="width: 100px;
                                    height:50px" src="../view/img/<?php echo $list["image"] ?>" alt=""></th>

                    <th style="vertical-align: middle;">
                        <a href="./index.php?act=suasp&id=<?php echo $list["id_sanPham"] ?>"><input type="button" name="sua" value="Sửa"></a>
                        <a class="remove" href="./index.php?act=lkdm"><input type="button" name="xoa" value="Xóa"></a>
                    </th>
                </tr>
            <?php endforeach ?>


        </table>
        <section class="pagin">
        <?php  get_paging($paggin)?>
        </section>
          
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
                window.location.href = `./index.php?act=rmAllsp&id=${pramator}`;
            } else {
                alert("Vui lòng tích những trường cần xóa");
            }
        }
    </script>
</section>