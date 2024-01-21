<?php
require_once 'pdo.php';

function db_binhLuan_insert($ma_kh, $ma_hh, $noi_dung, $ngay_bl){
    $sql = "INSERT INTO db_binhLuan(id_user, id_sanPham, content, date) VALUES (?,?,?,?)";
    pdo_execute($sql, $ma_kh, $ma_hh, $noi_dung, $ngay_bl);
}

function db_binhLuan_update($ma_bl, $ma_kh, $ma_hh, $noi_dung, $ngay_bl){
    $sql = "UPDATE db_binhLuan SET id_user=?,id_sanPham=?,content=?,ngay_capNhat=? WHERE id_bl=?";
    pdo_execute($sql, $ma_kh, $ma_hh, $noi_dung, $ngay_bl, $ma_bl);
}

function db_binhLuan_delete($ma_bl){
    $sql = "DELETE FROM db_binhLuan WHERE id_bl=?";
    if(is_array($ma_bl)){
        foreach ($ma_bl as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql, $ma_bl);
    }
}

function db_binhLuan_select_all(){
    $sql = "SELECT * FROM db_binhLuan bl ORDER BY date DESC";
    return pdo_query($sql);
}

function db_binhLuan_select_by_id($ma_bl){
    $sql = "SELECT * FROM db_binhLuan WHERE id_bl=?";
    return pdo_query_one($sql, $ma_bl);
}
function db_binhluan_select_by_hanghoa1($id){
    $sql=  "SELECT * from db_binhLuan where id_sanPham = ? order by date desc";
    return pdo_query($sql,$id);
}

function db_binhLuan_exist($ma_bl){
    $sql = "SELECT count(*) FROM db_binhLuan WHERE ma_bl=?";
    return pdo_query_value($sql, $ma_bl) > 0;
}
//-------------------------------//
