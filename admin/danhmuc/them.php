<section class="admin-column_right">
    <h2 class="admin-column_right--title">Danh Mục</h2>
    <span class="admin-column_right--linked"><b>Danh Mục</b> - Thêm danh mục</span>
    <br>
    <a class="them" href="./index.php?act=lkdm"><input style="margin-bottom: 2rem;" type="button" name="them" value="Liệt kê danh mục sản phẩm"></a>
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
    <?php
    $eror = [
        "content" => "",
        "color" => "",
    ];
    if (isset($_POST["submit"])) {
        $ten_danhmuc = !empty($_POST["ten_danhmuc"]) ? $_POST["ten_danhmuc"] : null;
        if (!$ten_danhmuc) {
            $eror["content"] = "Vui lòng nhập tên danh mục";
            $eror["color"] = "red";
        } else {
            $eror["content"] = "";
            $eror["color"] = "";
        }
    }
    ?>
    <div class="form">
        <form action="" method="post">
            <div class="form_title">
                <span>Thêm Danh Mục Sản Phẩm</span>
            </div>
            <div class="form_group">
                <label for="">Tên danh mục</label>
                <input type="text" name="ten_danhmuc">

                <span style="color: red;
                                    font-size:0.7rem">
                    <?php echo $eror["content"] ?>
                </span>
            </div>
            <br>
            <div class="form_group">
                <label for="">Icon danh muc</label>
                <textarea style="width: 258px;
                     height: 46px;" name="icon_danhMuc" id="" cols="30" rows="5">
                </textarea>
                <br>
                <span></span>
            </div>
            <br>

            <div class="submit">
                <input type="submit" name="submit">
            </div>

        </form>
    </div>

</section>