<?php
    // LAY TOAN BO SAN PHAM TRONG DON HANG BANG ID DON HANG
    function getAllSanPhamDonHangById($id) {
        $sql = "SELECT A.id_don_hang, A.ma_chi_tiet_san_pham, A.so_luong AS so_luong_muon_mua,
                B.ma_san_pham, B.ma_kich_thuoc, B.ma_mau_sac, B.so_luong AS so_luong_bien_the, B.gia_bien_dong,
                C.ten_san_pham, C.gia, C.so_luong FROM chi_tiet_don_hang A
                JOIN chi_tiet_san_pham B ON A.ma_chi_tiet_san_pham = B.ma_chi_tiet_san_pham
                JOIN san_pham C ON B.ma_san_pham = C.ma_san_pham
                WHERE id_don_hang = $id";
        return getData($sql);
    }

    // THEM CHI TIET DON HANG ( them san pham vao don hang )
    function insertChiTietDonHang($idDonHang, $maChiTietSanPham, $soLuong) {
        $sql = "INSERT INTO chi_tiet_don_hang VALUES
                ($idDonHang, $maChiTietSanPham, $soLuong)
                ";

        return executeCommand($sql);
    }

?>