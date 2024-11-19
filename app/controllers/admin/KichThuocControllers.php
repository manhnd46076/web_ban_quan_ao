<?php
//Kích Thước
requireFiles(CONTROLLERS_URL . "admin");
requireFiles(MODELS_URL );
function kichThuoc()
{
    $listKichThuoc = getAllKichThuoc();
    include VIEWS_URL . "admin/sanpham/kichthuoc/index.php";
}
function themKichThuoc()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $ten_kich_thuoc = $_POST['ten_kich_thuoc'];

        $erros = [];
        if (empty($ten_kich_thuoc)) {
            $erros['ten_kich_thuoc'] = "Mời nhập tên Kích thước";
        }
        if (empty($erros)) {
            insertKichThuoc($ten_kich_thuoc);
            $tbao = "Thêm kích thước thành công";
            echo "<script>window.location.href='?url=admin/sanpham/kichthuoc&tb=$tbao&type=success'</script>";
        } else {
            $tbao = "Thêm không thành công";
            echo "<script>window.location.href='?url=admin/sanpham/kichthuoc&tb=$tbao&type=danger'</script>";
        }
    }

    include VIEWS_URL . "admin/sanpham/kichthuoc/them.php";
}
function xoaKichThuoc()
{
    $ma_kich_thuoc = $_GET['ma_kich_thuoc'];
    if (deleteKichThuoc($ma_kich_thuoc)) {
        $tbao = "Xóa thành công";
        echo "<script>window.location.href='?url=admin/sanpham/kichthuoc&tb=$tbao&type=success'</script>";
    } else {
        $tbao = "Xóa  không thành công";
        echo "<script>window.location.href='?url=admin/sanpham/kichthuoc&tb=$tbao&type=danger'</script>";
    }
}
function suaKichThuoc()
{
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $ma_kich_thuoc = $_GET['ma_kich_thuoc'];
        $ten_kich_thuoc = $_POST['ten_kich_thuoc'];
        $erros = [];
        $isSusses = false;
        if (empty($ten_kich_thuoc)) {
            $erros['ten_kich_thuoc'] = "Mời nhập tên Kích thước";
        }
        if (empty($erros)) {
            updateKichThuoc($ma_kich_thuoc, $ten_kich_thuoc);
            $tbao = "Cập nhật kích thước thành công";
            $isSusses = true;
        } else {
            $tbao = "Cập nhật thất bại";
            $isSusses = false;
        }
        if ($isSusses) {
            echo "<script>window.location.href='?url=admin/sanpham/kichthuoc&tb=$tbao&type=success'</script>";
        } else {
            echo "<script>window.location.href='?url=admin/sanpham/kichthuoc&tb=$tbao&type=danger'</script>";

        }
    }
    $ma_kich_thuoc = $_GET['ma_kich_thuoc'];
    $kichThuocID = getKichThuocID($ma_kich_thuoc);
    include VIEWS_URL . "admin/sanpham/kichthuoc/sua.php";
}
