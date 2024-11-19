<?php
    // LAY DON HANG THEO ID
    function getDonHangById($id) {
        $sql = "SELECT A.*, B.ten_trang_thai, C.ten_phuong_thuc, D.ten_tinh_trang FROM don_hang A 
                JOIN trang_thai_thanh_toan B ON A.ma_trang_thai = B.ma_trang_thai
                JOIN phuong_thuc_thanh_toan C ON A.ma_phuong_thuc = C.ma_phuong_thuc
                JOIN tinh_trang D ON A.ma_tinh_trang = D.ma_tinh_trang
                WHERE id_don_hang = $id
                ";
        
        return getData($sql, false);
    }

    // LAY All DON HANG THEO TINH TRANG
    function getAllDonHangByTinhTrang($idTinhTrang) {
        $sql = "SELECT A.*, B.ten_trang_thai, C.ten_phuong_thuc FROM don_hang A 
                JOIN trang_thai_thanh_toan B ON A.ma_trang_thai = B.ma_trang_thai
                JOIN phuong_thuc_thanh_toan C ON A.ma_phuong_thuc = C.ma_phuong_thuc
                WHERE ma_tinh_trang = $idTinhTrang
                ";
        return getData($sql);
    }
    //Tổng đơn hàng
    function tongDonHang() {
        $sql = "SELECT COUNT(*) so_luong FROM don_hang  ";
        return getData($sql);
    }
    // Đếm đơn thành công 
    function demDonThanhCong($idTinhTrang=4) {
        $sql = "SELECT COUNT(A.ma_don_hang) so_luong FROM don_hang A 
                JOIN trang_thai_thanh_toan B ON A.ma_trang_thai = B.ma_trang_thai
                JOIN phuong_thuc_thanh_toan C ON A.ma_phuong_thuc = C.ma_phuong_thuc
                WHERE ma_tinh_trang = $idTinhTrang
                GROUP BY ma_tinh_trang
                ";
        return getData($sql);
    }
    // LAY ALL DON HANG THEO NGUOI DUNG VA TINH TRANG
    function getDonHangByNguoiDungAndTinhTrang($idTinhTrang, $maNguoiDung) {
        $sql = "SELECT A.*, B.ten_trang_thai, C.ten_phuong_thuc FROM don_hang A 
                JOIN trang_thai_thanh_toan B ON A.ma_trang_thai = B.ma_trang_thai
                JOIN phuong_thuc_thanh_toan C ON A.ma_phuong_thuc = C.ma_phuong_thuc
                WHERE ma_tinh_trang = $idTinhTrang AND ma_nguoi_dung = $maNguoiDung
                ";
        return getData($sql);
    }

    // THEM DON HANG
    function insertDonHang(
        $ma_don_hang,
        $ho_va_ten,
        $so_dien_thoai,
        $dia_chi,
        $ngay_dat,
        $ma_phuong_thuc,
        $ma_trang_thai,
        $ma_tinh_trang,
        $tong_tien,
        $ma_nguoi_dung = NULL,
        $ngay_thanh_toan = NULL
    )
    {
        if($ngay_thanh_toan) {
            $sql = "INSERT INTO don_hang VALUES
                    (NULL, '$ma_don_hang', $ma_nguoi_dung, '$ho_va_ten', '$so_dien_thoai', '$dia_chi',
                    '$ngay_dat', '$ngay_thanh_toan', $ma_phuong_thuc, $ma_trang_thai, $ma_tinh_trang, $tong_tien)
                    ";
        }
        else {
            $sql = "INSERT INTO don_hang VALUES
                    (NULL, '$ma_don_hang', $ma_nguoi_dung, '$ho_va_ten', '$so_dien_thoai', '$dia_chi',
                    '$ngay_dat', NULL, $ma_phuong_thuc, $ma_trang_thai, $ma_tinh_trang, $tong_tien)
                    ";
        }


        return executeCommandAndGetID($sql);
    }

    // UPDATE TINH TRANG DON HANG
    function updateDonHang($id, $ma_tinh_trang) {
        $sql = "UPDATE don_hang SET ma_tinh_trang = $ma_tinh_trang WHERE id_don_hang = $id";
        return executeCommand($sql);
    }

    // UPDATE TRANG THAI THANH TOAN DON HANG
    function updateThanhToanDonHang($id, $ma_trang_thai) {
        $sql = "UPDATE don_hang SET ma_trang_thai = $ma_trang_thai WHERE id_don_hang = $id";
        return executeCommand($sql);
    }

    // UPDATE NGAY THANH TOAN DON HANG
    function updateDayThanhToan($id, $ngay_thanh_toan) {
        $sql = "UPDATE don_hang SET ngay_thanh_toan = '$ngay_thanh_toan' WHERE id_don_hang = $id";
        return executeCommand($sql);
    }

?>