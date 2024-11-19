<?php
//Lấy Tất cả 
function getAllMauSac()
{
    $sql = "SELECT * FROM mau_sac";
    return getData($sql);
}
//Lấy 1 cái the ID
function getMauSacID($id)
{
    $sql = "SELECT * FROM mau_sac WHERE ma_mau_sac = $id";
    return getData($sql, false);
}
//Thêm màu sắc 
function insertMauSac($ten_mau, $ma_mau)
{
    $sql = "INSERT INTO `mau_sac` VALUES (NULL,'$ten_mau','$ma_mau')";

    return executeCommand($sql);
}
//Xóa màu sắc 
function deleteMauSac($ma_mau_sac)
{
    $sql = "DELETE FROM mau_sac WHERE ma_mau_sac = $ma_mau_sac";
    return executeCommand($sql);
}
//Sửa màu sắc 
function updateMauSac($ma_mau_sac, $ten_mau, $ma_mau)
{
    $sql = "UPDATE `mau_sac` SET `ma_mau_sac`='$ma_mau_sac',`ten_mau`='$ten_mau',`ma_mau`='$ma_mau' WHERE ma_mau_sac = $ma_mau_sac";
    return executeCommand($sql);
}
