<?php
require_once 'pdo.php';

function db_sanPham_insert($ten_sanPham, $price,  $image, $id_danhmuc, $luotXem, $mota){
    $sql = "INSERT INTO db_sanpham(ten_sanPham, price, image, id_danhmuc,  luotXem, mota) VALUES (?,?,?,?,?,?)";
    pdo_execute($sql, $ten_sanPham, $price, $image, $id_danhmuc,  $luotXem,  $mota);
}

function db_sanPham_update($ma_hh, $ten_sanPham, $price, $image, $id_danhmuc, $luotXem, $mota){
    $sql = "UPDATE db_sanpham SET ten_sanPham=?,price=?,image=?,id_danhmuc=?,luotXem=?,mota=? WHERE id_sanPham=?";
    pdo_execute($sql, $ten_sanPham, $price, $image, $id_danhmuc, $luotXem, $mota,$ma_hh);
}

function db_sanPham_delete($ma_hh){
    $sql = "DELETE FROM db_sanpham WHERE  id_sanPham=?";
    if(is_array($ma_hh)){
        foreach ($ma_hh as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql, $ma_hh);
    }
}

function db_sanPham_select_all($target= ""){
    $sql = "";
    if(isset($_POST["seach"])){
        $ten_sanPham = !empty($_POST["seach_sanPham"]) ? $_POST["seach_sanPham"]: "";
        $id_danhmuc = !empty($_POST["seach_idDanhMuc"]) ? $_POST["seach_idDanhMuc"] : "";
      
        if(trim($ten_sanPham) == "" && trim($id_danhmuc)==""){
            $sql = "SELECT * FROM db_sanpham order by id_sanPham desc";
        }
        else if(trim($ten_sanPham) != "" && trim($id_danhmuc)==""){
            $sql = "SELECT * FROM db_sanpham where ten_sanPham like '%".$ten_sanPham."%' order by id_sanPham desc" ; 
        }
        else if(trim($ten_sanPham) == "" && trim($id_danhmuc) !=""){
            $sql = "SELECT * FROM db_sanpham where id_danhmuc  = $id_danhmuc order by id_sanPham desc";
        }
        else {
            $sql = "SELECT * FROM db_sanpham where id_danhmuc =  $id_danhmuc AND " . "ten_sanPham like '%" . $ten_sanPham ."%' order by id_sanPham desc";
        }
    }
    else {
        $sql = "SELECT * FROM db_sanpham order by id_sanPham desc";
    }
    if($target == "new"){
        $sql = "SELECT * from db_sanpham order by id_sanPham desc limit 0,8 ";
    }
    else if($target == "luotXem"){
        $sql = "SELECT * from db_sanpham  order by luotXem desc limit 0,8 ";
    }
   
   
    return pdo_query($sql);
} 
function db_sanPham_select_news(){
   
}
function db_sanPham_select_by_id($ma_hh){
    $sql = "SELECT * FROM db_sanPham WHERE id_sanPham=?";
    return pdo_query_one($sql, $ma_hh);
}

function db_sanPham_exist($ma_hh){
    $sql = "SELECT count(*) FROM db_sanPham WHERE ten_sanPham=?";
    return pdo_query_value($sql, $ma_hh) > 0;
}

function db_sanPham_tang_so_luot_xem($ma_hh){
    $sql = "UPDATE db_sanPham SET luotXem = luotXem + 1 WHERE id_sanPham=?";
    pdo_execute($sql, $ma_hh);
}

function db_sanPham_select_top10(){
    $sql = "SELECT * FROM db_sanPham WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0, 10";
    return pdo_query($sql);
}
function db_sanPham_select_dac_biet(){
    $sql = "SELECT * FROM db_sanPham WHERE dac_biet=1";
    return pdo_query($sql);
}

function db_sanPham_select_by_danhmuc($id_danhmuc, $limit = ""){
    if($limit){
        $sql = "SELECT * FROM db_sanPham WHERE id_danhmuc=? order by id_sanPham desc limit " .$limit;
       
    }
    else {
        $sql = "SELECT * FROM db_sanPham WHERE id_danhmuc= ? order by id_sanPham desc";
    }
    return pdo_query($sql, $id_danhmuc);
}
function db_sanPham_paging($id_danhmuc,$page,$per_page){
    $offset = ($page- 1)*$per_page;
    $sql = "SELECT * FROM db_sanPham WHERE id_danhmuc= ? order by id_sanPham desc limit $per_page offset $offset ";
    return pdo_query($sql,$id_danhmuc);
}
function db_sanPham_select_all_paging($page,$per_page){
    $sql = "";
    $offset = ($page- 1)*$per_page;
    if(isset($_POST["seach"])){
        $ten_sanPham = !empty($_POST["seach_sanPham"]) ? $_POST["seach_sanPham"]: "";
        $id_danhmuc = !empty($_POST["seach_idDanhMuc"]) ? $_POST["seach_idDanhMuc"] : "";
      
        if(trim($ten_sanPham) == "" && trim($id_danhmuc)==""){
            $sql = "SELECT * FROM db_sanpham order by id_sanPham desc  limit $per_page offset $offset";
        }
        else if(trim($ten_sanPham) != "" && trim($id_danhmuc)==""){
            $sql = "SELECT * FROM db_sanpham where ten_sanPham like '%".$ten_sanPham."%' order by id_sanPham desc  limit $per_page offset $offset" ; 
        }
        else if(trim($ten_sanPham) == "" && trim($id_danhmuc) !=""){
            $sql = "SELECT * FROM db_sanpham where id_danhmuc  = $id_danhmuc order by id_sanPham desc  limit $per_page offset $offset";
        }
        else { 
            $sql = "SELECT * FROM db_sanpham where id_danhmuc =  $id_danhmuc AND " . "ten_sanPham like '%" . $ten_sanPham ."%' order by id_sanPham desc";
        }
    }
    else {
        $sql = "SELECT * FROM db_sanpham order by id_sanPham desc  limit $per_page offset $offset";
    }
  
   
    return pdo_query($sql);
}

function db_sanPham_select_keyword($keyword){
    $sql = "SELECT * from db_sanpham where ten_sanPham like '%" . "$keyword"  ."%'";
    return pdo_query($sql);
}
function get_paging($pagin){
    $current = $_GET["page"];
    if($current > 3){
      
        echo "<a  href=index.php?act=lksp&page=1&&per_page=10>Fisrt</a>";
    }
    if($current >1){
        echo "<a  href=index.php?act=lksp&page=". $current -1  ."&per_page=10".">Prev</a>";
    }
    for($num = 1 ; $num<=$pagin;$num++){
        if($num==$current){
            echo "<a style='background:#192A3E;color:white' href=index.php?act=lksp&page=".$num ."&per_page=10".">$num</a>";
        }
        else {
            if($num > $current -3 && $num < $current + 3 ){
            
                echo "<a  href=index.php?act=lksp&page=".$num ."&per_page=10".">$num</a>";
            }
        }
        
    }
    if($current <$pagin ){
        echo "<a  href=index.php?act=lksp&page=". $current +1 ."&per_page=10" .">Next</a>";
        echo "<a  href=index.php?act=lksp&page=". $pagin ."&per_page=10".">Last</a>";
    }

}

