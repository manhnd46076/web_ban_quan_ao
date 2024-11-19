<?php
    // DASHBOARD
    function dashboard() {
        $nguoiDung = demUser(); //đếm tổng người dùng
        $nguoiDungNew = newUser();
        $demDonThanhCong = demDonThanhCong($idTinhTrang=4);
        $tongDonHang = tongDonHang();
        // debug($demDonHang);
        include VIEWS_URL . "admin/index.php";
    }


?>