<?php

// Lấy danh mục của Nam  
 function timKiemSanPham($tenSanPham){
    $sql = "SELECT * FROM san_pham WHERE ten_san_pham LIKE '%$tenSanPham%' AND trang_thai = 1";
    return getData($sql);
 }
function danhMuc($maLoai){
    $sql = "SELECT * FROM danh_muc WHERE ma_loai = $maLoai AND trang_thai=1";
    return getData($sql);
}

// đếm số lượng sản phẩm của từng danh mục
function soLuongSanPhamDanhMuc($danhMuc,$maLoai){
    $sql = "SELECT A.*, COUNT(B.ma_san_pham) so_luong_san_pham FROM  danh_muc A
            JOIN chi_tiet_danh_muc B ON A.ma_danh_muc = B.ma_danh_muc
            JOIN san_pham C ON C.ma_san_pham = B.ma_san_pham
            WHERE   A.ma_loai = $maLoai AND A.trang_thai = 1 AND C.trang_thai = 1";
    if ($danhMuc > 0) {
        $sql .=" AND A.ma_danh_muc=$danhMuc";
    }
    return getData($sql);
}
// Lấy sản phẩm theo mã loại 
function getSanPhamLoai($maLoai,$maDanhMuc,$min,$max){
    $sql = "SELECT * FROM san_pham A 
            JOIN chi_tiet_danh_muc B ON A.ma_san_pham = B.ma_san_pham
            JOIN danh_muc C ON B.ma_danh_muc = C.ma_danh_muc 
            JOIN loai D ON C.ma_loai = D.ma_loai
            WHERE D.ma_loai = $maLoai ";
            if (!empty($min) && !empty($max)) {
                $sql .=" AND A.gia >= $min AND A.gia <= $max";
            }
            if ($maDanhMuc > 0) {
                $sql .=" AND B.ma_danh_muc=$maDanhMuc";
            }
    return getData($sql);
}

// DEM TAT CA SO LUONG SAN PHAM
function soLuongAllSanPham($maLoai) {
    $sql = "SELECT COUNT(B.ma_san_pham) so_luong_san_pham FROM danh_muc A
            JOIN chi_tiet_danh_muc B ON A.ma_danh_muc = B.ma_danh_muc
            JOIN san_pham C ON C.ma_san_pham = B.ma_san_pham
            WHERE A.ma_loai = $maLoai AND C.trang_thai = 1 AND A.trang_thai = 1";

    return getData($sql);
}

// Lấy kích thước theo loại và danh mục 
function getKichThuoc($maLoai,$maDanhMuc){
    // DISTINCT loại bỏ giá trị trùng lặp 
    $sql = "SELECT A.*, COUNT(DISTINCT C.ma_san_pham) so_luong_san_pham FROM kich_thuoc A
            JOIN chi_tiet_san_pham B ON A.ma_kich_thuoc = B.ma_kich_thuoc
            JOIN san_pham C ON B.ma_san_pham = C.ma_san_pham
            JOIN chi_tiet_danh_muc D ON D.ma_san_pham = C.ma_san_pham
            JOIN danh_muc E ON D.ma_danh_muc = E.ma_danh_muc
            JOIN loai F ON E.ma_loai = F.ma_loai
            WHERE F.ma_loai = $maLoai AND C.trang_thai = 1";
            if ($maDanhMuc > 0) {
                $sql .=" AND E.ma_danh_muc=$maDanhMuc";
            }
                $sql .=" GROUP BY A.ten_kich_thuoc, A.ma_kich_thuoc";
    return getData($sql);
}

// Lấy màu sắc theo loại và danh mục 
function getMauSac($maLoai,$maDanhMuc){
    // DISTINCT loại bỏ giá trị trùng lặp 
    $sql = "SELECT A.*, COUNT(DISTINCT C.ma_san_pham) so_luong_san_pham FROM mau_sac A
            JOIN chi_tiet_san_pham B ON A.ma_mau_sac = B.ma_mau_sac
            JOIN san_pham C ON B.ma_san_pham = C.ma_san_pham
            JOIN chi_tiet_danh_muc D ON D.ma_san_pham = C.ma_san_pham
            JOIN danh_muc E ON D.ma_danh_muc = E.ma_danh_muc
            JOIN loai F ON E.ma_loai = F.ma_loai
            WHERE F.ma_loai = $maLoai AND C.trang_thai = 1";
            if ($maDanhMuc > 0) {
                $sql .=" AND E.ma_danh_muc=$maDanhMuc";
            }
                $sql .=" GROUP BY A.ten_mau, A.ma_mau_sac";
    return getData($sql);
}
// Lấy sản phẩm theo màu sắc và kích thước 
    function getSanPhamMauSac($maMauSac){
        $sql = "SELECT * FROM san_pham A
                JOIN chi_tiet_san_pham B ON A.ma_san_pham = B.ma_san_pham
                WHERE B.ma_mau_sac = $maMauSac AND A.trang_thai = 1
                GROUP BY A.ma_san_pham";
        return getData($sql);
    }
    function locSanPham($maLoai,$maMauSac,$maKichThuoc,$min,$max) {
        $sql = "SELECT D.* FROM loai A 
                JOIN  danh_muc B ON A.ma_loai = B.ma_loai
                JOIN chi_tiet_danh_muc C ON B.ma_danh_muc = C.ma_danh_muc
                JOIN san_pham D ON C.ma_san_pham = D.ma_san_pham
                JOIN chi_tiet_san_pham E ON D.ma_san_pham = E.ma_san_pham
                WHERE A.ma_loai =$maLoai  AND D.gia >= $min AND D.gia <= $max AND D.trang_thai = 1" ;
                if ($maMauSac > 0 && $maKichThuoc > 0 ) {
                    $sql .=" AND E.ma_mau_sac = $maMauSac  AND E.ma_kich_thuoc = $maKichThuoc";
                }
                
                if ($maMauSac > 0 && empty($maKichThuoc) ) {
                    $sql .=" AND E.ma_mau_sac = $maMauSac ";
                }
                if (empty($maMauSac)  && $maKichThuoc > 0) {
                    $sql .=" AND  E.ma_kich_thuoc = $maKichThuoc";
                }
                
                 $sql .=" GROUP BY D.ma_san_pham";
                // if ($maMauSac = 0 && $maKichThuoc = 0) {
                   
                // }
                    
        return getData($sql);
    }

    // Lọc giá 
 