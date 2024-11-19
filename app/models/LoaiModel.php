<?php 
require_once "pdo.php";
function getAllLoai(){
    $sql = "SELECT * FROM loai ";
    return getData($sql);
}