<?php
    require_once "pdo.php";
    // Lay tat ca san pham
    function getAllSanPham() {
        $sql = "SELECT A.*, C.ten_danh_muc, D.ten_loai, COUNT(A.ma_san_pham) as so_luong_danh_muc
                FROM san_pham A
                JOIN chi_tiet_danh_muc B ON A.ma_san_pham = B.ma_san_pham
                JOIN danh_muc C ON B.ma_danh_muc = C.ma_danh_muc
                JOIN loai D ON C.ma_loai = D.ma_loai 
                GROUP BY A.ma_san_pham, C.ten_danh_muc, D.ten_loai";
        
        return getData($sql);
    }

    // Lay tat ca san pham hien
    function getAllSanPhamShow() {
        $sql = "SELECT A.*, C.ten_danh_muc, D.ten_loai, COUNT(A.ma_san_pham) as so_luong_danh_muc
                FROM san_pham A
                JOIN chi_tiet_danh_muc B ON A.ma_san_pham = B.ma_san_pham
                JOIN danh_muc C ON B.ma_danh_muc = C.ma_danh_muc
                JOIN loai D ON C.ma_loai = D.ma_loai
                WHERE A.trang_thai = 1
                GROUP BY A.ma_san_pham, C.ten_danh_muc, D.ten_loai";
        return getData($sql);
    }

    // Lay tat ca san pham an
    function getAllSanPhamHide() {
        $sql = "SELECT * FROM san_pham WHERE trang_thai = 0";
        return getData($sql);
    }

    // Lay so luong loai theo ma san pham
    function getIDSanPhamSoLuongLoai($id) {
        $sql = "SELECT A.ma_san_pham, C.ten_danh_muc, D.ten_loai, COUNT(C.ten_danh_muc) as so_luong_loai
                FROM san_pham A
                JOIN chi_tiet_danh_muc B ON A.ma_san_pham = B.ma_san_pham
                JOIN danh_muc C ON B.ma_danh_muc = C.ma_danh_muc
                JOIN loai D ON C.ma_loai = D.ma_loai
                WHERE A.ma_san_pham = $id
                GROUP BY C.ten_danh_muc";

        return getData($sql);
    }

    // Lay giam gia cua san pham
    function getGiamGiaSanPhamID($id) {
        $sql = "SELECT A.ma_giam_gia FROM san_pham A
                JOIN giam_gia B ON A.ma_giam_gia = B.ma_giam_gia
                WHERE ma_san_pham = $id
        ";

        return getData($sql,false);
    }

    // Lay san pham theo id
    function getSanPhamID($id) {
        $sql = "SELECT * FROM san_pham WHERE ma_san_pham = $id";

        return getData($sql,false);
    }

    // Lay tat ca san pham co trong don hang
    function getAllProductInOrder() {
        $sql = "SELECT A.ma_san_pham FROM san_pham A
                JOIN chi_tiet_san_pham B ON A.ma_san_pham = B.ma_san_pham
                JOIN chi_tiet_don_hang C ON B.ma_chi_tiet_san_pham = C.ma_chi_tiet_san_pham
                GROUP BY A.ma_san_pham
                ";

        return getData($sql);
    }

    // Insert San Pham
    function insertSanPham($ten_san_pham, $anh, $mo_ta, $trang_thai, $gia, $ma_giam_gia, $so_luong = 'NULL') {
        $sql = "INSERT INTO san_pham VALUES
                (NULL, '$ten_san_pham', '$anh', '$mo_ta', $trang_thai, DEFAULT, $gia, $ma_giam_gia, $so_luong)";
        
        return executeCommandAndGetID($sql);
    }

    // Cap nhat san pham
    function updateSanPham($ma_san_pham, $ten_san_pham, $anh, $mo_ta, $trang_thai, $gia, $ma_giam_gia, $so_luong = 'NULL') {
        $sql = "UPDATE san_pham 
                SET
                ten_san_pham = '$ten_san_pham',
                anh = '$anh',
                mo_ta = '$mo_ta',
                trang_thai = $trang_thai,
                gia = $gia,
                ma_giam_gia = $ma_giam_gia,
                so_luong = $so_luong
                WHERE ma_san_pham = $ma_san_pham
                ";
        return executeCommand($sql);
    }

    // Cap nhat trang thai san pham an hien
    function updateStatusSanPham($id, $status = 1) {
        $sql = "UPDATE san_pham SET trang_thai = $status WHERE ma_san_pham = $id";
        return executeCommand($sql);
    }

    // Cap Nhat So Luong San Pham Binh Thuong
    function updateSoLuongSanPhamBinhThuong($soLuong, $maSanPham) {
        $sql = "UPDATE san_pham SET so_luong = $soLuong WHERE ma_san_pham = $maSanPham";
        return executeCommand($sql);
    }

    // Lay top 10 san pham ban chay
    function getAllSanPhamBanChay() {
        $sql = "SELECT * FROM san_pham
                WHERE trang_thai = 1
                ORDER BY luot_mua DESC
                LIMIT 0, 8
                ";

        return getData($sql);
    }
    function SanPhamTuongTu($maSanPham){
        $sql = "SELECT DISTINCT san_pham.*, giam_gia.ten_giam_gia
        FROM san_pham
        LEFT JOIN giam_gia ON san_pham.ma_giam_gia = giam_gia.ma_giam_gia
        JOIN chi_tiet_danh_muc ON san_pham.ma_san_pham = chi_tiet_danh_muc.ma_san_pham
        JOIN danh_muc ON chi_tiet_danh_muc.ma_danh_muc = danh_muc.ma_danh_muc
        WHERE (chi_tiet_danh_muc.ma_danh_muc IN (
            SELECT ma_danh_muc
            FROM chi_tiet_danh_muc
            WHERE ma_san_pham = $maSanPham
        )
        OR danh_muc.ten_danh_muc IN (
            SELECT ten_danh_muc
            FROM danh_muc
            JOIN chi_tiet_danh_muc ON danh_muc.ma_danh_muc = chi_tiet_danh_muc.ma_danh_muc
            WHERE chi_tiet_danh_muc.ma_san_pham = $maSanPham
        ))
        AND san_pham.trang_thai = 1
        LIMIT 0, 4
        ";
        
        return getData($sql);
    }
?>