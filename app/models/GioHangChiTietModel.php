<?php
    // Lay san pham trong gio hang
    function getProductByIdAndMaGioHang($maGioHang, $maChiTietSanPham) {
        $sql = "SELECT * FROM chi_tiet_gio_hang WHERE ma_gio_hang = $maGioHang AND ma_chi_tiet_san_pham = $maChiTietSanPham";
        return getData($sql, false);
    }

    // Lay tong san pham trong ma gio hang
    function getSumProductInCart($maGioHang) {
        $sql = "SELECT COUNT(*) AS tong FROM chi_tiet_gio_hang WHERE ma_gio_hang = $maGioHang";
        return getData($sql, false);
    }
 
    // Lay tat ca san pham trong ma gio hang
    function getAllProductInCart($maGioHang) {
        $sql = "SELECT A.ma_chi_tiet_san_pham, A.so_luong AS so_luong_muon_mua,
                B.ma_san_pham, B.ma_kich_thuoc, B.ma_mau_sac, B.gia_bien_dong, B.so_luong AS so_luong_bien_the, B.anh_chi_tiet,
                C.ten_san_pham, C.anh, C.gia, C.so_luong
                FROM chi_tiet_gio_hang A
                JOIN chi_tiet_san_pham B ON A.ma_chi_tiet_san_pham = B.ma_chi_tiet_san_pham
                JOIN san_pham C ON B.ma_san_pham = C.ma_san_pham
                WHERE ma_gio_hang = $maGioHang";
                
        return getData($sql);
    }

    // Them san pham vao gio hang
    function insertCartDetail($maGioHang, $maChiTietSanPham, $soLuong) {
        $sql = "INSERT INTO chi_tiet_gio_hang VALUES ($maGioHang, $maChiTietSanPham, $soLuong)";
        return executeCommand($sql);
    }

    // Xoa san pham trong gio hang
    function xoaSanPhamInGioHangById($maGioHang, $maChiTietSanPham) {
        $sql = "DELETE FROM chi_tiet_gio_hang WHERE ma_gio_hang = $maGioHang AND ma_chi_tiet_san_pham = $maChiTietSanPham";
        return executeCommand($sql);
    }

?>