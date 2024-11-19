<?php

    // QUAN LY DON HANG
    function quanLyDonHang() {
        $url = getAllParam($_GET);

        if(isset($_GET["maTinhTrang"])) {
            $maTinhTrang = $_GET["maTinhTrang"];
        }
        else {
            $maTinhTrang = 1;
        }

        $listTinhTrang = getAllTinhTrang();
        $donHangByTinhTrang = getAllDonHangByTinhTrang($maTinhTrang);
        $shipping = 30000;

        include VIEWS_URL . "admin/donhang/index.php";
    }
    
    function chiTietDonHang() {
        $idDonHang = $_GET["id"];

        $view = $_GET["view"];
        $url = str_replace("$", "&", $view);


        $donHang = getDonHangById($idDonHang);
        $sanPhamDonHang = getAllSanPhamDonHangById($idDonHang);
        $shipping = 30000;
        $sum = 0;
        // debug($sanPhamDonHang);
        include VIEWS_URL . "admin/donhang/chitietdonhang.php";
    }

    function updateDonHangAdmin() {
        $idDonHang = $_GET["id"];
        $maDonHang = $_GET["ma"];
        $action = $_GET["action"];

        $view = $_GET["view"];
        $url = str_replace("$", "&", $view);

        $thongbao = "";
        $type = "";

        if($action == "xacnhan") {
            updateDonHang($idDonHang, 2);
            $thongbao = "Xác nhận đơn hàng $maDonHang thành công !";
            $type = "success";
        }

        if($action == "xacnhandonggoi") {
            updateDonHang($idDonHang, 3);
            $thongbao = "Xác nhận đóng gói cho đơn hàng $maDonHang thành công !";
            $type = "success";
        }

        if($action == "xacnhanthanhtoan") {
            $ngayThanhToan = date("Y-m-d H:i:s");
            updateDayThanhToan($idDonHang, $ngayThanhToan);
            updateThanhToanDonHang($idDonHang, 2);
            $thongbao = "Xác nhận thanh toán cho đơn hàng $maDonHang thành công !";
            $type = "success";
        }

        nextPage("?$url&thongbao=$thongbao&type=$type");
        die;
    }

?>