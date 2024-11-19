<?php
// Lay tat ca kich thuoc
function getAllKichThuoc()
{
    $sql = "SELECT * FROM kich_thuoc";
    return getData($sql);
}

// Lay kich thuoc bang id kich thuoc
function getKichThuocID($id)
{
    $sql = "SELECT * FROM kich_thuoc WHERE ma_kich_thuoc = $id";
    return getData($sql, false);
}
//Thêm kích thước
function insertKichThuoc($ten_kich_thuoc)
{
    $sql = "INSERT INTO kich_thuoc VALUES (NULL,'$ten_kich_thuoc')";
    return executeCommand($sql);
}
//Xóa Kích Thước
function deleteKichThuoc($ma_kich_thuoc)
{
    $sql = "DELETE FROM kich_thuoc WHERE ma_kich_thuoc = $ma_kich_thuoc";
    return executeCommand($sql);
}
//Sửa Kích thước
function updateKichThuoc($ma_kich_thuoc, $ten_kich_thuoc)
{
    $sql = "UPDATE `kich_thuoc` SET `ma_kich_thuoc`='$ma_kich_thuoc',`ten_kich_thuoc`='$ten_kich_thuoc' WHERE  ma_kich_thuoc = $ma_kich_thuoc";
    return executeCommand($sql);
}
