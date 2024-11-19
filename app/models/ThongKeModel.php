<?php


// Thống kê sản phẩm theo danh mục của nam
function getSanPhamDanhMuc($maLoai)
{
    $sql = "SELECT A.*, COUNT(B.ma_san_pham) so_luong FROM danh_muc A JOIN chi_tiet_danh_muc B 
            ON A.ma_danh_muc = B.ma_danh_muc
            WHERE A.ma_loai = $maLoai AND A.trang_thai =1
            GROUP BY A.ma_danh_muc";
    return getData($sql);
}

// Thống kê đơn hàng theo ngày
function getDonHangTheoNgay()   
{
    $sql = "SELECT DATE(A.ngay_thanh_toan) thoi_gian,COUNT(A.id_don_hang) so_don_hang
                FROM don_hang A 
                JOIN tinh_trang B ON A.ma_tinh_trang = B.ma_tinh_trang
                WHERE B.ma_tinh_trang = 4 
                AND DATE(A.ngay_thanh_toan) >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) -- tạo ngày X cách hiện tại 7 ngày
                GROUP BY DATE(A.ngay_thanh_toan)
                ORDER BY thoi_gian ASC LIMIT 7";
    return getData($sql);
}

// function getDonHangTheoThang()
// {
//     $sql = "SELECT  DATE_FORMAT(A.ngay_thanh_toan, '%Y-%m')  thoi_gian,COUNT(A.id_don_hang)  so_don_hang
//                 FROM  don_hang A                   
//                 JOIN  tinh_trang B ON A.ma_tinh_trang = B.ma_tinh_trang               
//                 WHERE  B.ma_tinh_trang = 4 
//                 AND A.ngay_thanh_toan >= DATE_SUB(CURDATE(), INTERVAL 12 MONTH) -- Tạo tháng X cách hiện tại 12 tháng                
//                 GROUP BY DATE_FORMAT(A.ngay_thanh_toan, '%Y-%m')                 
//                 ORDER BY  thoi_gian ASC";   
//     return getData($sql);
// }
