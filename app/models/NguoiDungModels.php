<?php
require_once "pdo.php";
// đếm số lượng người dùng 
function demUser()
{
    // $sql = "SELECT A.*, B.so_luong FROM nguoi_dung AS A 
    //  JOIN chi_tiet_don_hang AS B ON B.ma_chi_tiet_san_pham = A.ma_nguoi_dung ";
    $sql = "SELECT COUNT(*) so_luong FROM `nguoi_dung`";
    return getData($sql);
}
// Người đăng ký mới 
function newUser()
{
    // $sql = "SELECT A.*, B.so_luong FROM nguoi_dung AS A 
    //  JOIN chi_tiet_don_hang AS B ON B.ma_chi_tiet_san_pham = A.ma_nguoi_dung ";
    $sql = "SELECT COUNT(*) AS so_luong
    FROM nguoi_dung
    WHERE ngay_tao = CURDATE() ";
    return getData($sql);
}
//Lấy toàn bộ người dùng
function getAllNguoiDung()
{
    // $sql = "SELECT A.*, B.so_luong FROM nguoi_dung AS A 
    //  JOIN chi_tiet_don_hang AS B ON B.ma_chi_tiet_san_pham = A.ma_nguoi_dung ";
    $sql = "SELECT * FROM `nguoi_dung` ";
    return getData($sql);
}
//Lấy người dùng theo ID
function getNguoiDungID($ma_nguoi_dung)
{
    $sql = "SELECT * FROM nguoi_dung WHERE ma_nguoi_dung = $ma_nguoi_dung";
    return getData($sql, false);
}

// Lấy người dùng theo email
function getNguoiDungEmail($email)
{
    $sql = "SELECT * FROM nguoi_dung WHERE email = '$email'";
    return getData($sql, false);
}

//Sửa quyền người dùng
function updateNguoiDung($ma_nguoi_dung, $quyen)
{
    $sql = "UPDATE `nguoi_dung` SET `quyen`= '$quyen'  WHERE ma_nguoi_dung=$ma_nguoi_dung";

    return executeCommand($sql);
}
//Resset mk người dùng
function RessetMK($ma_nguoi_dung)
{
    $sql = "UPDATE `nguoi_dung` SET `mat_khau`= '123'  WHERE ma_nguoi_dung=$ma_nguoi_dung";

    return executeCommand($sql);
}
//Khóa tài khoản người dùng và mở tk người dùng
function AnTaiTKhoan($ma_nguoi_dung, $trangthai)
{
    $sql = "UPDATE `nguoi_dung` SET `trang_thai`='$trangthai'  WHERE ma_nguoi_dung=$ma_nguoi_dung";

    return executeCommand($sql);
}

// Them nguoi dung
function insertNguoiDung($email, $matKhau, $code)
{
    $sql = "INSERT nguoi_dung (email, mat_khau, quyen, trang_thai, kich_hoat, ma)
            VALUES ('$email', '$matKhau', 0, 1, FALSE, $code)";
    return executeCommandAndGetID($sql);
}

// Sua trang thai kich hoat nguoi dung
function updateKichHoatNguoiDung($email)
{
    $sql = "UPDATE nguoi_dung SET kich_hoat = TRUE WHERE email = '$email'";
    return executeCommand($sql);
}

// Update ma cua nguoi dung
function updateMaNguoiDung($email, $code)
{
    $sql = "UPDATE nguoi_dung SET ma = $code WHERE email = '$email'";
    return executeCommand($sql);
}

function updateThongTinNguoiDung($hoVaTen, $soDienThoai, $diaChi, $email)
{
    $sql = "UPDATE nguoi_dung
            SET
            ho_va_ten = '$hoVaTen',
            dia_chi = '$diaChi',
            so_dien_thoai = '$soDienThoai'
            WHERE email = '$email'
            ";
    return executeCommand($sql);
}

function updatePasswordNguoiDung($matKhau, $email)
{
    $sql = "UPDATE nguoi_dung
            SET
            mat_khau = '$matKhau'
            WHERE email = '$email'
            ";

    return executeCommand($sql);
}
