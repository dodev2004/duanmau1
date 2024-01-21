<?php
require_once 'pdo.php';

/**
 * Thêm loại mới
 * @param String $ten_danhmuc là tên loại
 * @throws PDOException lỗi thêm mới
 */
function danhmuc_insert($ten_danhmuc ,$icon){
    $sql = "INSERT INTO danhmuc(ten_danhmuc,icon) VALUES(?,?)";
    pdo_execute($sql, $ten_danhmuc,$icon);
}
/**
 * Cập nhật tên loại
 * @param int $id_danhmuc là mã loại cần cập nhật
 * @param String $ten_danhmuc là tên loại mới
 * @throws PDOException lỗi cập nhật
 */
function danhmuc_update($id_danhmuc, $ten_danhmuc){
    $sql = "UPDATE danhmuc SET ten_danhmuc=? WHERE id_danhmuc=?";
    pdo_execute($sql, $ten_danhmuc, $id_danhmuc);
}
/**
 * Xóa một hoặc nhiều loại
 * @param mix $id_danhmuc là mã loại hoặc mảng mã loại
 * @throws PDOException lỗi xóa
 */
function danhmuc_delete($id_danhmuc){
    $sql = "DELETE FROM danhmuc WHERE id_danhmuc=?";
    if(is_array($id_danhmuc)){
        foreach ($id_danhmuc as $id) {
            pdo_execute($sql, $id);
        }
    }
    else{
        pdo_execute($sql, $id_danhmuc);
    }
}
/**
 * Truy vấn tất cả các loại
 * @return array mảng loại truy vấn được
 * @throws PDOException lỗi truy vấn
 */
function danhmuc_select_all(){
    $sql = "SELECT * FROM danhmuc";
    return pdo_query($sql);
}
/**
 * Truy vấn một loại theo mã
 * @param int $id_danhmuc là mã loại cần truy vấn
 * @return array mảng chứa thông tin của một loại
 * @throws PDOException lỗi truy vấn
 */
function danhmuc_select_by_id($id_danhmuc){
    $sql = "SELECT * FROM danhmuc WHERE id_danhmuc=?";
    return pdo_query_one($sql, $id_danhmuc);
}
/**
 * Kiểm tra sự tồn tại của một loại
 * @param int $id_danhmuc là mã loại cần kiểm tra
 * @return boolean có tồn tại hay không
 * @throws PDOException lỗi truy vấn
 */
function danhmuc_exist($id_danhmuc){
    $sql = "SELECT count(*) FROM danhmuc WHERE id_danhmuc=?";
    return pdo_query_value($sql, $id_danhmuc) > 0;
}
// mảng chữa thông tin tên 1 loại trùng khớp
function danhmuc_exit_tendanhmuc($ten_danhmuc){
    $sql  = "SELECT count(*) from danhmuc where ten_danhmuc = ?";
    return pdo_query_value($sql, $ten_danhmuc) > 0;
}