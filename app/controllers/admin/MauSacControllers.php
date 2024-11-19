<?php

function mauSac()
{
    $listMauSac = getAllMauSac();
    include VIEWS_URL . "admin/sanpham/mausac/index.php";
}
function themMauSac()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $ten_mau = $_POST['ten_mau'];
        $ma_mau = $_POST['ma_mau'];

        $erros = [];
        if (empty($ten_mau)) {
            $erros['ten_mau'] = "Mời nhập tên màu";
        }  
        if (empty($ma_mau)) {
            $erros['ma_mau'] = "Mời nhập tên mã màu";
        }       
        if (empty($erros)) {
            insertMauSac($ten_mau,$ma_mau);
            $tbao = "Thêm màu sắc thành công";
            echo "<script>window.location.href='?url=admin/sanpham/mausac&tb=$tbao&type=success'</script>";
        } else {
            $tbao = "Thêm không thành công";
            echo "<script>window.location.href='?url=admin/sanpham/mausac&tb=$tbao&type=danger'</script>";
        }
    }
   
    include VIEWS_URL . "admin/sanpham/mausac/them.php";
}
function xoaMauSac()
{
    $ma_mau_sac = $_GET['ma_mau_sac'];
    if (deleteMauSac($ma_mau_sac)) {
        $tbao = "Xóa thành công";
        echo "<script>window.location.href='?url=admin/sanpham/mausac&tb=$tbao&type=success'</script>";
    } else {
        $tbao = "Xóa  không thành công";  
            echo "<script>window.location.href='?url=admin/sanpham/mausac&tb=$tbao&type=danger'</script>";

    }
}
function suaMauSac()
{
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $ma_mau_sac = $_GET['ma_mau_sac'];
        $ten_mau = $_POST['ten_mau'];
        $ma_mau = $_POST['ma_mau'];
        $erros = [];
        $isSusses = false;
        if (empty($ten_mau)) {
            $erros['ten_mau'] = "Mời nhập tên màu";
        }  
        if (empty($ma_mau)) {
            $erros['ma_mau'] = "Mời nhập tên mã màu";
        }       
        if (empty($erros)) {
            updateMauSac($ma_mau_sac, $ten_mau,$ma_mau);
            $tbao = "Cập nhật mau sắc thành công";
            $isSusses = true;
            // header("location: ?url=admin/sanpham/mausac&tb=$tbao");
            
        } else {
            $tbao = "Cập nhật thất bại";
            $isSusses = false;
        }
        if ($isSusses) {
            echo "<script>window.location.href='?url=admin/sanpham/mausac&tb=$tbao&type=success'</script>";
            // nextPage("?url=admin/sanpham/mausac&tb=$tbao&type=success");
        }else {
            echo "<script>window.location.href='?url=admin/sanpham/mausac&tb=$tbao&type=danger'</script>";

            // nextPage("?url=admin/sanpham/mausac&tb=$tbao&type=danger");

        }
    }
    $ma_mau_sac = $_GET['ma_mau_sac'];
    $mauSacID = getMauSacID($ma_mau_sac);
    include VIEWS_URL . "admin/sanpham/mausac/sua.php";
}
?>