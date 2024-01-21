<?php 
    $idpr = isset( $_REQUEST["product"]["idpro"]) ?  $_REQUEST["product"]["idpro"] :"";
    $name = isset( $_REQUEST["product"]["name"]) ?  $_REQUEST["product"]["name"] :"";
    require("../../dao/binh-luan.php");
    require("../../dao/khach-hang.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../asset/home.css">
</head>
<body>
     <h1>Bình Luận</h1>
                        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" class="coment_user">
                            <input type="text" name="comment" placeholder="Hãy để lại ý kiến ở mục này">
                            <input type="text" name="id_sanPham" value="<?=$idpr?>" hidden>
                            <input  type="submit" name="submit">
                        </form>
                          <?php 
                            if(isset($_POST["submit"])){
                                $comment = !empty($_POST["comment"]) ? $_POST["comment"] :"";
                                $id_sanPham = $_POST["id_sanPham"];
                                $id_user  = $_SESSION["user"]["id"];
                                $date = date("Y-m-d H:i:s");
                                db_binhLuan_insert($id_user,$id_sanPham,$comment,$date);
                                header("Location:".$_SERVER["HTTP_REFERER"]);
                            
                            }
                          ?>
                          <?php
                            $comments = db_binhluan_select_by_hanghoa1($idpr);
                            
                          ?>
                        <section class="comment_content">
                                <span class="comment-title">Đánh giá sản phẩm <?=$name?></span>
                                <section class="comment_contnet-list">
                                    <?php foreach($comments as $comment):?>
                                        <section class="comment_user-content">
                                        <span><?php 
                                            echo db_user_select_by_id($comment["id_user"])["user"];
                                        ?></span>
                                        <span><?=$comment["content"]?></span>
                                    </section>
                                    <section class="coment_user-timer">
                                    <?=$comment["date"]?>
                                    </section>
                                    <?php endforeach ?>
                                    
                                </section>

                        </section>
</body>
</html>
                   