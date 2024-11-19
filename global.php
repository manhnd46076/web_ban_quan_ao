<?php

    const IMAGES_URL = 'assets/images/';
    const EXTRA_LIBS_URL = 'assets/extra-libs/';
    const LIBS_URL = 'assets/libs/';
    const CLIENT_URL = 'assets/gd-client/';
    const SWEETPICK_URL = 'assets/gd-client/max-themes.net/demos/sweetpick/';

    const CSS_URL = 'dist/css/';
    const JS_URL = 'dist/js/';

    const CONTROLLERS_URL = 'app/controllers/';
    const MODELS_URL = 'app/models/';
    const VIEWS_URL = 'app/views/';

    const LIBRARIES_URL = 'libraries/';

    $textBangDieuKhien = "Bảng điều khiển";
    $textQuanLyDanhMuc = "Quản lý danh mục";
    $textQuanLySanPham = "Quản lý sản phẩm";
    $textDanhSachSanPham = "Danh sách sản phẩm";
    $textSanPham = "Sản phẩm";
    $textMauSac = "Màu sắc";
    $textKichThuoc = "Kích thước";
    $textQuanLyNguoiDung = "Quản lý người dùng";
    $textQuanLyBinhLuan = "Quản lý bình luận";
    $textQuanLyDonHang = "Quản lý đơn hàng";
    $textThongKe = "Thống kê";
    $textThem = "Thêm";
    $textSua = "Sửa";
    $textDoiMatKhau = "Đổi mật khẩu";
    $textChiTietSanPham = "Chi Tiết Sản Phẩm";

    // Upload ảnh
    function uploadFiles($name, $tmpName, $to) {
        move_uploaded_file($tmpName, IMAGES_URL . $to . "/" . $name);
        return $to . "/" . $name;
    }

    // Kiểm tra đăng nhập
    function checkLogin($message) {
        if(!isset($_SESSION["user"])) {
            echo 
            "<script>
                alert('$message');
                window.location.href = '?url=dangnhap';
            </script>";
            die;
        }
        return true;
    }

    // Debug
    function debug($data) {
        echo "<pre>";
        // print_r($data);
        var_dump($data);

        die;
    }

    // Require đến tất cả các file của một thư mục nào đó 
    function requireFiles($pathFolder) {
        // scandir để lấy toàn bộ file trong folder thành 1 mảng
        $files = scandir($pathFolder);

        // array diff để loại những thằng khác biệt trong mảng ( ở đây là mảng files lấy ở trên )
        $files = array_diff($files,['.','..']); //gán lại thằng files

        foreach($files as $file) {
            require_once $pathFolder . "/$file";
        }
    }

    // Chuyển trang
    function nextPage($link) {
        echo "<script>window.location.href='$link'</script>";
    }

    // Lấy all param
    function getAllParam($arrayParam) {
        $keys = array_keys($arrayParam);
        $keysLength = count($keys);
        $params = "";
        foreach($keys as $index => $key) {
            if($index == $keysLength - 1) {
                $params .= $key . "=" . $arrayParam["$key"];
                break;
            }
            $params .= $key . "=" . $arrayParam["$key"] . "$"; 
        }
        return $params;
    }

    // Phân trang
    function phanTrang($mangSanPhams,$trangHienTai) {
        $soLuongHien = 9; // Số lượng sản phẩm sẽ hiện 
        $trangHienTai; // lấy trên url nếu không có mặc định 1
        // Tính key bắt đầu hiện thị của mỗi trang
        $keyStart = ($trangHienTai - 1) * $soLuongHien; // trang đâu tiên sản phẩm hiện từ key =0
        // Tính tổng số trang 
        $tongSoTrang = ceil(COUNT($mangSanPhams) / $soLuongHien);  //Tổng số trang theo số lượng sản phẩm, làm tròn lên 
        // Thêm dữ liệu vào mảng hiện thị 
        $ketQuas = array_slice($mangSanPhams,$keyStart,$soLuongHien);
        return $ketQuas;
    }

    // Random Mã đơn hàng
    function randomCodeOrder() {
        $randomString = '';
        $lengthRandomString = 2;

        $number = rand(000,999999);

        for($i = 0; $i < $lengthRandomString; $i++) {
            $randomChar = chr(mt_rand(65, 90));
            $randomString .= $randomChar;
        }

        return $randomString . $number;
    }

?>