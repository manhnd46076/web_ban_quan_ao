<?php
require_once "pdo.php";

// Lay danh muc theo ma loai
function getAllDanhMucIDLoai($id)
{
    $sql = "SELECT A.*, B.ten_loai FROM danh_muc A
                JOIN loai B ON A.ma_loai = B.ma_loai
                WHERE A.ma_loai = $id";
    return getData($sql);
}

// Lấy full danh mục
function getAllDanhMuc()
{
    $sql = "SELECT A.*,B.ten_loai, COUNT(ten_danh_muc) so_luong_danh_muc
            FROM danh_muc  A JOIN loai  B 
            ON A.ma_loai = B.ma_loai
            WHERE A.trang_thai = 1
            Group By ten_danh_muc, A.ma_danh_muc";
    return getData($sql);
}
// Danh mục bị ẩn 
function getAllDanhMucAn()
{
    $sql = "SELECT A.*,B.ten_loai, COUNT(ten_danh_muc) so_luong_danh_muc
            FROM danh_muc  A JOIN loai  B 
            ON A.ma_loai = B.ma_loai
            WHERE A.trang_thai = 0
            Group By ten_danh_muc, A.ma_danh_muc";
    return getData($sql);
}
// Thêm danh mục 
function insertDanhMuc($tenDanhMuc, $maLoai)
{
    $sql = "INSERT INTO danh_muc VALUES (NULL,'$tenDanhMuc','$maLoai','1') ";
    return executeCommand($sql);
}
// Xóa danh mục 
function deleteDanhMuc($maLoai, $tenDanhMuc)
{
    $sql = "DELETE  FROM danh_muc WHERE ten_danh_muc = '$tenDanhMuc' AND ma_loai = $maLoai ";
    return executeCommand($sql);
}
// Ẩn danh mục
function trangThaiDanhMuc($tenDanhMuc, $maLoai, $trangThai)
{
    $sql = "UPDATE  danh_muc SET trang_thai = $trangThai WHERE ten_danh_muc = '$tenDanhMuc' AND ma_loai = $maLoai";
    return executeCommand($sql);
}

// Lấy danh mục theo id 
function getDanhMucID($maDanhMuc)
{
    $sql = "SELECT * FROM danh_muc WHERE ma_danh_muc = $maDanhMuc";
    return getData($sql, false);
}
// lấy danh mục theo tên
function getDanhMucTen($tenDanhMucOld) // tên danh mục cũ
{
    $sql = "SELECT A.*, B.ten_loai FROM danh_muc A JOIN loai B
    ON A.ma_loai = B.ma_loai
    WHERE A.ten_danh_muc='$tenDanhMucOld' AND A.trang_thai = 1";
    return getData($sql);
}
// lấy  Mã danh mục theo tên
function getMaDanhMuc($tenDanhMuc, $maLoai) // tên danh mục cũ
{
    $sql = "SELECT ma_danh_muc FROM danh_muc 
    WHERE ten_danh_muc='$tenDanhMuc' AND trang_thai = 1 AND ma_loai = $maLoai";
    return getData($sql);
}
// lấy danh mục theo tên bị ẩn
function getDanhMucTenAn($tenDanhMucOld) // tên danh mục cũ
{
    $sql = "SELECT A.*, B.ten_loai FROM danh_muc A JOIN loai B
    ON A.ma_loai = B.ma_loai
    WHERE A.ten_danh_muc='$tenDanhMucOld' AND A.trang_thai = 0";
    return getData($sql);
}
// Kiểm tra chi tiết danh mục có sản phẩm không 
function getChiTietDanhMucSanPham($maDanhMuc)
{
    $sql = "SELECT ma_san_pham FROM chi_tiet_danh_muc WHERE ma_danh_muc = $maDanhMuc AND ma_san_pham IS NOT NULL";
    return getData($sql);
}
// Cập nhật danh mục 
function updateDanhMuc($tenDanhMuc, $maLoai, $tenDanhMucOld)
{
    $sql = "UPDATE danh_muc SET ten_danh_muc = '$tenDanhMuc' WHERE ten_danh_muc ='$tenDanhMucOld' ";
    return executeCommand($sql);
}