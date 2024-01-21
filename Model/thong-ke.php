<?php
require_once 'pdo.php';

function thong_ke_hang_hoa(){
    $sql = "SELECT dm.id_danhmuc as id, dm.ten_danhmuc as ten_danhMuc,"
            . " COUNT(*) so_luong,"
            . " MIN(sp.price) gia_min,"
            . " MAX(sp.price) gia_max,"
            . " AVG(sp.price) gia_avg"
            . " FROM db_sanPham sp"
            . " JOIN danhmuc dm ON dm.id_danhmuc=sp.id_danhmuc "
            . " GROUP BY dm.id_danhmuc, dm.ten_danhmuc";
    return pdo_query($sql);
}
function thong_ke_binh_luan(){
    $sql = "SELECT hh.ma_hh, hh.ten_hh,"
            . " COUNT(*) so_luong,"
            . " MIN(bl.ngay_bl) cu_nhat,"
            . " MAX(bl.ngay_bl) moi_nhat"
            . " FROM binh_luan bl "
            . " JOIN hang_hoa hh ON hh.ma_hh=bl.ma_hh "
            . " GROUP BY hh.ma_hh, hh.ten_hh"
            . " HAVING so_luong > 0";
    return pdo_query($sql);
}