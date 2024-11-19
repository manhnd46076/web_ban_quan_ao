<?php
// QUAN LY BINH LUAN

function quanLyBinhLuan()
{

    $listBinhLuan = getAllBinhLuan();
    include VIEWS_URL . "admin/binhluan/index.php";
}
function BinhLuan()
{
    $ma_san_pham = $_GET['ma_san_pham'];
    // $listBinhLuanchitiet = getBinhLuanID($ma_san_pham);
    $listBinhLuan = getBinhLuanID($ma_san_pham);

    include VIEWS_URL . "admin/binhluan/chitietbl.php";
}
function ChiTietBinhLuan()
{
    $ma_san_pham = $_GET['ma_san_pham'];
    $ma_binh_luan = $_GET['ma_binh_luan'];
    //  getChiTietBinhLuanID($ma_binh_luan);
    $listChiTietBinhLuan = getAllChiTietBinhLuan($ma_binh_luan);
    include VIEWS_URL . "admin/binhluan/chitietbl1.php";
}
function xoaBinhLuan()
{
    $ma_san_pham = $_GET['ma_san_pham'];
    $ma_binh_luan = $_GET['ma_binh_luan'];
    if (deleteBinhLuan($ma_binh_luan)) {
        $tbao = "Xóa thành công";
        echo "<script>window.location.href='?url=admin/binhluan/tatcabinhluan&ma_san_pham=$ma_san_pham&tb=$tbao&type=success'</script>";
    } else {
        $tbao = "Xóa không thành công";
        echo "<script>window.location.href='?url=admin/binhluan/tatcabinhluan&ma_san_pham=$ma_san_pham&tb=$tbao&type=danger'</script>";
    }
}
function xoaChiTietBinhLuan()
{
    $ma_san_pham = $_GET['ma_san_pham'];
    $ma_binh_luan = $_GET['ma_binh_luan'];
    $ma_chi_tiet_binh_luan = $_GET['ma_chi_tiet_binh_luan'];
    if (deleteChiTietBinhLuan($ma_chi_tiet_binh_luan)) {
        $tbao = "Xóa thành công";
        echo "<script>window.location.href='?url=admin/binhluan/traloi&ma_san_pham=$ma_san_pham&ma_binh_luan=$ma_binh_luan&tb=$tbao&type=success'</script>";
    } else {
        $tbao = "Xóa  không thành công";
        echo "<script>window.location.href='?url=admin/binhluan/traloi&ma_san_pham=$ma_san_pham&ma_binh_luan=$ma_binh_luan&tb=$tbao&type=danger'</script>";
    }
}
