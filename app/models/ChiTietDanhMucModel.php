<?php

    // Lay chi tiet danh muc theo ma san pham
    function getChiTietDanhMucIDSanPham($id) {
        $sql = "SELECT A.ma_danh_muc FROM chi_tiet_danh_muc A
                JOIN danh_muc B ON A.ma_danh_muc = B.ma_danh_muc
                JOIN loai C ON B.ma_loai = C.ma_loai
                WHERE A.ma_san_pham = $id";
                
        return getData($sql);
    }

    // Them chi tiet danh muc
    function insertChiTietDanhMuc($ma_danh_muc, $ma_san_pham) {
        $sql = "INSERT INTO chi_tiet_danh_muc VALUES
                ($ma_danh_muc, $ma_san_pham)";
        return executeCommand($sql);
    }

    // Xoa chi tiet danh muc theo ID san pham
    function deleteChiTietDanhMucIDSanPham($id) {
        $sql = "DELETE FROM chi_tiet_danh_muc WHERE ma_san_pham = $id";
        return executeCommand($sql);
    }

?>