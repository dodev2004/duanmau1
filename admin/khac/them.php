<section class="admin-column_right">
    <h2 class="admin-column_right--title">Quản lý sản phẩm</h2>
    <span class="admin-column_right--linked"><b>Sản phẩm</b> - Danh sách sản phẩm</span>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-product">
            <label for="">Tên sản phẩm</label>
            <input type="text" name="ten_sanPham">
            <label for="">Giá</label>
            <input type="text" name="price">
            <label for="">Giảm giá</label>
            <input type="text" name="giamGia">

        </div>
        <div class="form-product">
            <label for="">image</label>
            <input type="file" name="image">

        </div>
        <div class="form-product">
            <label for="">ngay nhap</label>
            <input type="date" name="ngayNhap">

        </div>
        <div class="form-product">
            <label for="">So luot xem</label>
            <input type="text" name="soLuotXem">
        </div>
        <div class="form-product">
            <label for="">Ten danh muc</label>
            <select name="id_danhmuc" id="">
                <?php foreach ($danhmucs as $danhmuc) : ?>
                    <option value="<?php echo $danhmuc["id_danhmuc"] ?>"><?php echo $danhmuc["ten_danhmuc"] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-product">
            <label for="">Ten danh muc</label>
            <input type="text" name="dungLuong">
        </div>
        <div class="form-product">
            <label for="">color</label>
            <input type="text" name="color">
        </div>
        <div class="form-product">
            <label for="">anh slideShow</label>
            <input multiple="multiple" type="file" name="images">
        </div>
        <div class="form-product">
            <label for="">color</label>
            <textarea name="moTa" id="moTa" cols="30" rows="10"></textarea>

        </div>
        <div class="form-product">
            <label for="">Thông số kĩ thuật</label>
            <textarea name="thongSoSp" id="thongsosp" cols="30" rows="10"></textarea>
        </div>
        <input type="submit" name="submit">
    </form>
    <?php
        if(isset($_POST["submit"])){
            $ten_sanPham = $_POST["ten_sanPham"];
            $price = $_POST["price"];
            $giamGia = $_POST["giamGia"];
            $image = $_FILES["image"]["name"];
            $ngayNhap = $_POST["ngayNhap"];
            $soLuotXem = $_POST["soLuotXem"];
            $id_danhmuc = $_POST["id_danhmuc"];
            $dungLuong  = $_POST["dungLuong"];
            $color = $_POST["color"];
            $mota = $_POST["mota"];
            $thongSoSp = $_POST["thongSoSp"];
            
        }
    ?>
</section>
<script type="text/javascript">
    ClassicEditor.create(document.querySelector('#moTa'), {
            ckfinder: {
                // Upload the images to the server using the CKFinder QuickUpload command.
                uploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',

                // Define the CKFinder configuration (if necessary).
                options: {
                    resourceType: 'Images'
                }
            },
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'underline',
                    'strikethrough',
                    'subscript',
                    'superscript',
                    'alignment',
                    '|',
                    'fontFamily',
                    'fontSize',
                    'fontColor',
                    'fontBackgroundColor',
                    'highlight',
                    '|',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'outdent',
                    'indent',
                    '|',
                    'link',
                    'imageInsert',
                    'imageUpload',
                    'blockQuote',
                    'insertTable',
                    'mediaEmbed',
                    'code',
                    'specialCharacters',
                    '|',
                    'undo',
                    'redo',
                    '|',
                    'CKFinder'
                ],
                shouldNotGroupWhenFull: true,
            },
            language: 'en',
            image: {
                toolbar: [
                    'imageTextAlternative',
                    'imageStyle:full',
                    'imageStyle:side',
                    'linkImage'
                ]
            },
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells',
                    'tableCellProperties',
                    'tableProperties'
                ]
            },
            licenseKey: '',


        })
        .then(editor => {
            window.editor = editor;

            CKFinder.setupCKEditor(editor);
            console.log(Array.from(editor.ui.componentFactory.names()));
        })
        .catch(error => {

            console.error(error);
        });
    ClassicEditor.create(document.querySelector('#thongsosp'), {
            ckfinder: {
                // Upload the images to the server using the CKFinder QuickUpload command.
                uploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',

                // Define the CKFinder configuration (if necessary).
                options: {
                    resourceType: 'Images'
                }
            },
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'underline',
                    'strikethrough',
                    'subscript',
                    'superscript',
                    'alignment',
                    '|',
                    'fontFamily',
                    'fontSize',
                    'fontColor',
                    'fontBackgroundColor',
                    'highlight',
                    '|',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'outdent',
                    'indent',
                    '|',
                    'link',
                    'imageInsert',
                    'imageUpload',
                    'blockQuote',
                    'insertTable',
                    'mediaEmbed',
                    'code',
                    'specialCharacters',
                    '|',
                    'undo',
                    'redo',
                    '|',
                    'CKFinder'
                ],
                shouldNotGroupWhenFull: true,
            },
            language: 'en',
            image: {
                toolbar: [
                    'imageTextAlternative',
                    'imageStyle:full',
                    'imageStyle:side',
                    'linkImage'
                ]
            },
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells',
                    'tableCellProperties',
                    'tableProperties'
                ]
            },
            licenseKey: '',


        })
        .then(editor => {
            window.editor = editor;

            CKFinder.setupCKEditor(editor);
            console.log(Array.from(editor.ui.componentFactory.names()));
        })
        .catch(error => {

            console.error(error);
        });
</script>