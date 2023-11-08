<section class="admin-column_right">
    <h2 class="admin-column_right--title">Danh Mục</h2>
    <span class="admin-column_right--linked"><b>Danh Mục</b> - Thêm danh mục</span>
    <br>
    <a class="them" href="./index.php?act=lksp&page=1&per_page=10"><input style="margin-bottom: 2rem;" type="button" name="them" value="Liệt kê danh mục sản phẩm"></a>
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
       "ten_sanPham" => [
        "color" => "red",
        "content" =>""
       ], 
       "price" => [
        "color" =>"red",
        "content" =>""
       ],
       "luotXem" => [
        "color" =>"red",
        "content" =>""
       ],
       "image" => [
        "color" =>"red",
        "content" =>""
       ],
       "moTa" => [
        "color" =>"red",
        "content" =>""
       ],
       "ten_danhmuc"=>[
        "color" => "red",
        "content" =>""
       ]
    ];

    $cheked = true;
    
    if (isset($_POST["submit"])) {
        $ten_sanPham = !empty($_POST["ten_sanPham"]) ? $_POST["ten_sanPham"] : null;
        $ten_danhmuc = !empty($_POST["id_danhmuc"]) ? $_POST["id_danhmuc"] : null;
        $image = !empty($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : null;
        $moTa = !empty($_POST["moTa"]) ? $_POST["moTa"] : null;
        $luotXem = !empty($_POST["luotxem"]) ? $_POST["luotxem"] : null;
        $price = !empty($_POST["price"]) ? $_POST["price"] : null;
    
        if (!$ten_danhmuc) {
          $eror["ten_danhmuc"]["content"] = "Phải nhập vào trường này"; 
        } else {
            $eror["ten_danhmuc"]["content"] = ""; 
        }
        if (!$ten_sanPham) {
            $eror["ten_sanPham"]["content"] = "Phải nhập vào trường này"; 
          } else {
              $eror["ten_sanPham"]["content"] = ""; 
        }
        if ($image) {
            $target_dir = "img/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
              if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
              && $imageFileType != "gif" ) {
                  $eror["image"]["content"] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed"; 
              }
              else {
                $eror["image"]["content"] = ""; 
              }
          }
        
        if (!$price) {
            $eror["price"]["content"] = "Phải nhập vào trường này"; 
          }
           else {
              $eror["price"]["content"] = ""; 
        }
        if (!$moTa) {
            $eror["moTa"]["content"] = "Phải nhập vào trường này"; 
          }
           else {
              $eror["moTa"]["content"] = ""; 
        }
        foreach($eror as $values){
       
            if(trim($values["content"]) != ""){
                $cheked = false;
            }
            
        }
        
    }
    ?>
    <img src="" alt="">
    <div class="form">
        <form style="margin-top: 0px;" action="" method="post" enctype="multipart/form-data">
            <div class="form_title">
                <span>Thêm Sản Phẩm</span>
            </div>
            <br>
            <div class="form_group">
                <label for="">Tên danh mục</label>
                <select  style="border-radius: 8px;
                                padding: 0.4rem 0.8rem;
                                border: 0.05rem solid #C0C6C9;
                                background: #FFF;
                                color: #192A3E;
                                outline: none;
                transition: 0.25s;" name="id_danhmuc" id="">
            
                    <option value=""></option>
                    <?php foreach ($listDanhmuc as $list) : ?>
                        <option <?php
                             $ten_danhmuc = !empty($product["id_danhmuc"]) ? $product["id_danhmuc"] : null;
                             if($ten_danhmuc){
                                if($ten_danhmuc == $list["id_danhmuc"]){
                                    echo "selected";
                                }
                             }
                            ?> value="<?php echo $list["id_danhmuc"] ?>"><?php echo $list["ten_danhmuc"] ?></option>
                    <?php endforeach ?>
                </select>
                
                <span style="color: red;
                     font-size: 0.7rem;"><?php  echo isset($eror["ten_danhmuc"]["content"]) ?$eror["ten_danhmuc"]["content"] :"" ?></span>
            </div>
            
            <br>
            <div class="form_group">
                <label for="">Tên Sản Phẩm</label>
                <input data-check= "true" type="text" value="<?php echo !empty($product["ten_sanPham"]) ? $product["ten_sanPham"] : null ?>" name="ten_sanPham">

                <span style="color: red;
                                    font-size:0.7rem">
                  <?php  echo isset($eror["ten_sanPham"]["content"]) ?$eror["ten_sanPham"]["content"] :"" ?>
                </span>
            </div>
            <br>
            <div class="form_group">
                <label for="">Ảnh</label>
                <input data-check= "true" type="file" name="image" value="<?php echo !empty($product["image"]) ? $product["image"] : null ?>">
                <br>
                <img style="
                width: 50px;
                margin-top:10px;
                margin-left:50px;
    height: 50px;
    vertical-align: -webkit-baseline-middle;
                " src="../view/img/<?php echo $product["image"]  ?>"  alt="">
                <span style="color: red;
                                    font-size:0.7rem">
                 <?php  echo isset($eror["image"]["content"]) ?$eror["image"]["content"] :"" ?>
                </span>
            </div>
            <br>
            <div class="form_group">
                <label  for="">Giá</label>
                <input data-check= "true" type="text" name="price" value="<?php echo !empty($product["price"]) ? $product["price"] : null ?>">
                
                <span style="color: red;
                                    font-size:0.7rem">
                  <?php  echo isset($eror["price"]["content"]) ?$eror["price"]["content"] :"" ?>
                </span>
            </div>
            <br>
            <div class="form_group">
                <label for="">Lượt Xem</label>
                <input  type="text" name="luotxem" value="<?php echo !empty($product["luotXem"]) ? $product["luotXem"] : null ?>">

                <span style="color: red;
                                    font-size:0.7rem">
                   <?php  echo isset($eror["luotXem"]["content"]) ?$eror["luotXem"]["content"] :"" ?>
                </span>
            </div>
            <br>
            <div class="form_group" style="display: flex;">
                <label for="">Lượt xem</label>
                <textarea  value="<?php echo !empty($product["moTa"]) ? $product["moTa"] : null ?>" style="outline: none;" name="moTa" id="" cols="30" rows="7">
                            <?php echo !empty($product["moTa"]) ? $product["moTa"] : "" ?>
            </textarea>

                <span style="color: red;
                                    font-size:0.7rem">
                    <?php  echo isset($eror["moTa"]["content"]) ?$eror["moTa"]["content"] :"" ?>
                </span>
            </div>
            <div class="submit">
                <input type="submit" value="sumit"  name="submit">
            </div>

        </form>
    </div>
        
</section>
<script>
    const form = document.querySelector("form");

    const img = document.querySelector("img");
    const input = document.querySelector("input[name=image]");
    function handleChange(e){
       const img = input.parentElement.querySelector("img");
       const [file] = e.target.files;
        console.log(file)
        img.src = URL.createObjectURL(file);  
    }
    input.addEventListener("change", handleChange);
    const inputs = form.querySelectorAll("input");
    console.log(inputs);
   
    window.scrollTo({
  top: 267.20001220703125,
  
  behavior: "smooth",
});
  
</script>
<script language="javascript"></script>