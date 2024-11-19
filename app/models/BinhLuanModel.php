<?php
require_once "pdo.php";

function getAllBinhLuan()
{
    // $sql = "SELECT * FROM `binh_luan`";
    $sql = "SELECT binh_luan.*, san_pham.ten_san_pham, count(san_pham.ten_san_pham) as tongbl
    FROM binh_luan
    JOIN san_pham ON binh_luan.ma_san_pham = san_pham.ma_san_pham
    GROUP BY ten_san_pham";
    return getData($sql);
}
function getBinhLuanID($maSanPham)
{
    $sql = "SELECT binh_luan.*, nguoi_dung.ho_va_ten,nguoi_dung.anh_dai_dien, san_pham.ten_san_pham
     FROM binh_luan 
     JOIN nguoi_dung ON binh_luan.ma_nguoi_dung = nguoi_dung.ma_nguoi_dung 
     JOIN san_pham ON binh_luan.ma_san_pham = san_pham.ma_san_pham 
     WHERE binh_luan.ma_san_pham = $maSanPham ";
    return getData($sql);
}
function getAllChiTietBinhLuan($ma_binh_luan)
{
    $sql = "SELECT chi_tiet_binh_luan.*, nguoi_dung.ho_va_ten,nguoi_dung.anh_dai_dien
    FROM chi_tiet_binh_luan
    JOIN nguoi_dung ON chi_tiet_binh_luan.ma_nguoi_dung = nguoi_dung.ma_nguoi_dung
    WHERE chi_tiet_binh_luan.ma_binh_luan = $ma_binh_luan";
    return getData($sql);
}
function deleteBinhLuan($ma_binh_luan)
{
    $sql = " DELETE FROM chi_tiet_binh_luan
    WHERE ma_binh_luan IN (
        SELECT ma_binh_luan
        FROM binh_luan
        WHERE ma_binh_luan = $ma_binh_luan);
             DELETE FROM binh_luan
    WHERE ma_binh_luan = $ma_binh_luan";
    return executeCommand($sql);
}
function deleteChiTietBinhLuan($ma_chi_tiet_binh_luan)
{
    $sql = "DELETE FROM chi_tiet_binh_luan WHERE ma_chi_tiet_binh_luan = $ma_chi_tiet_binh_luan";
    return executeCommand($sql);
}
function insertBinhLuan($ma_nguoi_dung, $noi_Dung, $maSanPham) {
    $sql = "INSERT INTO binh_luan
            VALUES (Null,'$ma_nguoi_dung','$noi_Dung',DEFAULT,'$maSanPham')
            ";
    return executeCommand($sql);
}
function insertBinhLuanNho($maBinhLuan,$noi_Dung,$ma_nguoi_dung) {
    $sql = "INSERT INTO chi_tiet_binh_luan
            VALUES (Null,'$maBinhLuan','$ma_nguoi_dung','$noi_Dung',DEFAULT) ";
    return executeCommand($sql);
}