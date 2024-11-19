<?php
    // QUAN LY SAN PHAM


    // DANH SACH SAN PHAM
    function danhSachSanPham() {
        if(isset($_POST["btn-add"])) {
            if($_POST["loai"] == 1) {
                nextPage('?url=admin/sanpham/danhsach/binhthuong/them');
                die;
            }
            else {
                nextPage('?url=admin/sanpham/danhsach/bienthe/them');
                die;
            }
        }

        $listSanPham = getAllSanPhamShow();
        $listSanPhamTrongDonHang = getAllProductInOrder();
        include VIEWS_URL . "admin/sanpham/index.php";
    }
    
    // THEM SAN PHAM
    function themBinhThuong() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            // debug($_POST);
            // debug($_FILES);

            $tenSanPham = trim($_POST["tenSanPham"]);
            $gia = $_POST["gia"];
            $soLuong = $_POST["soLuong"];
            $giamGiaSelected = $_POST["giamGia"];
            $moTa = trim($_POST["moTa"]);
            $anhMacDinh = $_FILES["anhMacDinh"];
            $boSuuTaps = $_FILES["boSuuTap"];


            $errors = [];

            // 
            if($tenSanPham == "") {
                $errors[] = "Vui lòng nhập tên sản phẩm";
            }

            // 
            if(isset($_POST["danhMuc"])) {
                $danhMucSelecteds = $_POST["danhMuc"];
            }
            else {
                $errors[] = "Vui lòng chọn danh mục";
            }

            // 
            if($gia == "") {
                $errors[] = "Vui lòng nhập giá";
            }

            // 
            if($soLuong == "") {
                $errors[] = "Vui lòng nhập số lượng";
            }

            // 
            if(isset($_POST["trangThai"])) {
                $trangThai = $_POST["trangThai"];
            }
            else {
                $errors[] = "Vui lòng chọn trạng thái";
            }

            // 
            if($anhMacDinh["error"] !== 0) {
                $errors[] = "Vui lòng chọn ảnh mặc định";
            }

            if(empty($errors)) {
                if($giamGiaSelected == 0) {
                    $giamGiaSelected = 'NULL';
                }

                $tenAnhMacDinh = uploadFiles($anhMacDinh["name"],$anhMacDinh["tmp_name"],'products');
                
                if($maSanPham = insertSanPham($tenSanPham,$tenAnhMacDinh,$moTa,$trangThai,$gia,$giamGiaSelected,$soLuong)) {
                    insertChiTietSanPham($maSanPham);
                    foreach($danhMucSelecteds as $danhMucSelected) {
                        insertChiTietDanhMuc($danhMucSelected,$maSanPham);
                    }
    
                    if($boSuuTaps["error"][0] == 0) {
                        foreach($boSuuTaps["name"] as $key => $tenAnh) {
                            $tenAnhBoSuuTap = uploadFiles($tenAnh,$boSuuTaps["tmp_name"][$key],'collection');
                            insertBoSuuTap($maSanPham,$tenAnhBoSuuTap);
                        }
                    }
    
                    $thongbao = "Thêm sản phẩm thành công !";
                    nextPage("?url=admin/sanpham/danhsach&type=success&thongbao=$thongbao");
                    die;
                }
                else {
                    $errors[] = "Tên sản phẩm đã tồn tại";
                }
                
            }

        }

        $giamGias = getAllGiamGia();
        include VIEWS_URL . "admin/sanpham/thembinhthuong.php";
    }

    function themBienThe() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            // debug($_POST);
            // debug($_FILES);

            $tenSanPham = trim($_POST["tenSanPham"]);
            $gia = $_POST["gia"];
            $giamGiaSelected = $_POST["giamGia"];
            $moTa = trim($_POST["moTa"]);
            $anhMacDinh = $_FILES["anhMacDinh"];
            $boSuuTaps = $_FILES["boSuuTap"];


            $errors = [];

            // 
            if($tenSanPham == "") {
                $errors[] = "Vui lòng nhập tên sản phẩm";
            }

            // 
            if(isset($_POST["danhMuc"])) {
                $danhMucSelecteds = $_POST["danhMuc"];
            }
            else {
                $errors[] = "Vui lòng chọn danh mục";
            }

            // 
            if($gia == "") {
                $errors[] = "Vui lòng nhập giá";
            }

            // 
            if(isset($_POST["trangThai"])) {
                $trangThai = $_POST["trangThai"];
            }
            else {
                $errors[] = "Vui lòng chọn trạng thái";
            }

            // 
            if($anhMacDinh["error"] !== 0) {
                $errors[] = "Vui lòng chọn ảnh mặc định";
            }

            //
            if(isset($_POST["kichThuoc"])) {
                $kichThuocSelecteds = $_POST["kichThuoc"];
            }
            else {
                $errors[] = "Vui lòng chọn biến thể kích thước";
            }

            if(isset($_POST["mauSac"])) {
                $mauSacSelecteds = $_POST["mauSac"];
            }
            else {
                $errors[] = "Vui lòng chọn biến thể màu sắc";
            }

            

            if(empty($errors)) {
                if($giamGiaSelected == 0) {
                    $giamGiaSelected = 'NULL';
                }
                $tenAnhMacDinh = uploadFiles($anhMacDinh["name"],$anhMacDinh["tmp_name"],'products');
                if($maSanPham = insertSanPham($tenSanPham,$tenAnhMacDinh,$moTa,$trangThai,$gia,$giamGiaSelected)) {
                    foreach($danhMucSelecteds as $danhMucSelected) {
                        insertChiTietDanhMuc($danhMucSelected,$maSanPham);
                    }
    
                    foreach($kichThuocSelecteds as $kichThuocSelected) {
                        foreach($mauSacSelecteds as $mauSacSelected) {
                            insertChiTietSanPham($maSanPham,$kichThuocSelected,$mauSacSelected);
                        }
                    }
    
                    if($boSuuTaps["error"][0] == 0) {
                        foreach($boSuuTaps["name"] as $key => $tenAnh) {
                            $tenAnhBoSuuTap = uploadFiles($tenAnh,$boSuuTaps["tmp_name"][$key],'collection');
                            insertBoSuuTap($maSanPham,$tenAnhBoSuuTap);
                        }
                    }
    
                    nextPage("?url=admin/sanpham/danhsach/bienthe/chitiet&maSanPham=$maSanPham");
                    die;
                }
                else {
                    $errors[] = "Tên sản phẩm đã tồn tại !";
                }
                
                
            }

        }

        $giamGias = getAllGiamGia();
        $kichThuocs = getAllKichThuoc();
        $mauSacs = getAllMauSac();

        include VIEWS_URL . "admin/sanpham/thembienthe.php";
    }

    function chiTietBienThe() {
        $errors = [];

        if(isset($_POST["btn-add-bien-the"])) {
            $maSanPham = $_GET["maSanPham"];
            $maKichThuoc = $_POST["kichThuoc"];
            $maMauSac = $_POST["mauSac"];
            $kichThuoc = getKichThuocID($maKichThuoc);
            $mauSac = getMauSacID($maMauSac);
            if(get3ChiTietSanPham($maSanPham,$maKichThuoc,$maMauSac)) {
                $errors[] = "Biến thể Size " . $kichThuoc["ten_kich_thuoc"] . ", " . $mauSac["ten_mau"] . " đã tồn tại";
            }
            else {
                insertChiTietSanPham($maSanPham,$maKichThuoc,$maMauSac);
                $thongbao = "Thêm Biến thể Size " . $kichThuoc["ten_kich_thuoc"] . ", " . $mauSac["ten_mau"] . " thành công !";
                $type = "success";
            }   
        }

        if(isset($_POST["btn-update"])) {
            $maChiTietSanPham = $_POST["maChiTietSanPham"];
            $giaBienDong = $_POST["giaBienDong"];
            $soLuong = $_POST["soLuong"];
            $anhBienThe = $_FILES["anhBienThe"];

            if(isset($_POST["anhBienDongCu"])) {
                $anhBienDongCu = $_POST["anhBienDongCu"];
            }

            if($giaBienDong == '') {
                $giaBienDong = 'NULL';
            }
            else {
                if($giaBienDong < 0) {
                    $giaBienDong = 0;
                }
            }

            if($soLuong == '') {
                $soLuong = 'NULL';
            }
            else {
                if($soLuong < 0) {
                    $soLuong = 0;
                }
            }

            if($anhBienThe["error"] !== 0) {
                if(isset($anhBienDongCu)) {
                    $tenAnhBienThe = $anhBienDongCu;
                }
                else {
                    $tenAnhBienThe = NULL;
                }
            }
            else {
                $tenAnhBienThe = uploadFiles($anhBienThe["name"],$anhBienThe["tmp_name"],'detail_product');
            }

            update3ChiTietSanPham($maChiTietSanPham, $giaBienDong, $soLuong, $tenAnhBienThe);
            $thongbao = "Cập nhật biến thể thành công";
            $type = "warning";
        }

        if(isset($_POST["btn-delete"])) {
            $maChiTietSanPham = $_POST["maChiTietSanPham"];
            if(deleteChiTietSanPham($maChiTietSanPham)) {
                $thongbao = "Xóa thành công !";
                $type = "success";
            }
            else {
                $thongbao = "Xóa thất bại (Vi phạm ràng buộc dữ liệu) !";
                $type = "danger";
            }
        }

        $maSanPham = $_GET["maSanPham"];
        $sanPham = getSanPhamID($maSanPham);
        $bienThes = getChiTietSanPhamIDSanPham($maSanPham);
        $kichThuocs = getAllKichThuoc();
        $mauSacs = getAllMauSac();
        include VIEWS_URL . "admin/sanpham/chitietbienthe.php";
    }

    function suaSanPham() {
        $maSanPham = $_GET["maSanPham"];
        $sanPham = getSanPhamID($maSanPham);

        if($sanPham["so_luong"]) {
            $errors = [];

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                // debug($_POST);
                // debug($_FILES);
                
                $tenSanPham = trim($_POST["tenSanPham"]);
                $gia = $_POST["gia"];
                $soLuong = $_POST["soLuong"];
                $giamGiaSelected = $_POST["giamGia"];
                $moTa = trim($_POST["moTa"]);
                $anhMacDinh = $_FILES["anhMacDinh"];

                if(isset($_FILES["boSuuTap"])) {
                    $boSuuTaps = $_FILES["boSuuTap"];
                }

                $anhMacDinhCu = $_POST["anhMacDinhCu"];
        
                // 
                if($tenSanPham == "") {
                    $errors[] = "Vui lòng nhập tên sản phẩm";
                }
    
                // 
                if(isset($_POST["danhMuc"])) {
                    $danhMucSelecteds = $_POST["danhMuc"];
                }
                else {
                    $errors[] = "Vui lòng chọn danh mục";
                }
    
                // 
                if($gia == "") {
                    $errors[] = "Vui lòng nhập giá";
                }
    
                // 
                if($soLuong == "") {
                    $errors[] = "Vui lòng nhập số lượng";
                }
    
                // 
                if(isset($_POST["trangThai"])) {
                    $trangThai = $_POST["trangThai"];
                }
                else {
                    $errors[] = "Vui lòng chọn trạng thái";
                }
    
                // 
                if($anhMacDinh["error"] !== 0) {
                    $tenAnhMacDinh = $anhMacDinhCu;
                }
                else {
                    $tenAnhMacDinh = uploadFiles($anhMacDinh["name"],$anhMacDinh["tmp_name"],'products');
                }
    
                if(empty($errors)) {
                    if($giamGiaSelected == 0) {
                        $giamGiaSelected = 'NULL';
                    }
                    if(updateSanPham($maSanPham,$tenSanPham,$tenAnhMacDinh,$moTa,$trangThai,$gia,$giamGiaSelected,$soLuong)) {
                        deleteChiTietDanhMucIDSanPham($maSanPham);
                        foreach($danhMucSelecteds as $danhMucSelected) {
                            insertChiTietDanhMuc($danhMucSelected,$maSanPham);
                        }

                        if(isset($boSuuTaps)) {
                            if($boSuuTaps["error"][0] == 0) {
                                foreach($boSuuTaps["name"] as $key => $tenAnh) {
                                    $tenAnhBoSuuTap = uploadFiles($tenAnh,$boSuuTaps["tmp_name"][$key],'collection');
                                    insertBoSuuTap($maSanPham,$tenAnhBoSuuTap);
                                }
                            }
                        }
                        
                        $sanPham = getSanPhamID($maSanPham);
                        $thongbao = "Cập nhật sản phẩm thành công !";
                        $type = "warning";
                    }
                }
    
            }

            $giamGias = getAllGiamGia();
            $danhMucSelectedOlds = getChiTietDanhMucIDSanPham($maSanPham);
            $boSuuTaps = getBoSuuTapIDSanPham($maSanPham);
            // San pham binh thuong
            include VIEWS_URL . "admin/sanpham/suabinhthuong.php";
        }
        else {
            $errors = [];

            if($_SERVER["REQUEST_METHOD"] == "POST") {
                // debug($_POST);
                // debug($_FILES);
                
                $tenSanPham = trim($_POST["tenSanPham"]);
                $gia = $_POST["gia"];
                $giamGiaSelected = $_POST["giamGia"];
                $moTa = trim($_POST["moTa"]);
                $anhMacDinh = $_FILES["anhMacDinh"];

                if(isset($_FILES["boSuuTap"])) {
                    $boSuuTaps = $_FILES["boSuuTap"];
                }

                $anhMacDinhCu = $_POST["anhMacDinhCu"];
        
                // 
                if($tenSanPham == "") {
                    $errors[] = "Vui lòng nhập tên sản phẩm";
                }
    
                // 
                if(isset($_POST["danhMuc"])) {
                    $danhMucSelecteds = $_POST["danhMuc"];
                }
                else {
                    $errors[] = "Vui lòng chọn danh mục";
                }
    
                // 
                if($gia == "") {
                    $errors[] = "Vui lòng nhập giá";
                }
    
                // 
                if(isset($_POST["trangThai"])) {
                    $trangThai = $_POST["trangThai"];
                }
                else {
                    $errors[] = "Vui lòng chọn trạng thái";
                }
    
                // 
                if($anhMacDinh["error"] !== 0) {
                    $tenAnhMacDinh = $anhMacDinhCu;
                }
                else {
                    $tenAnhMacDinh = uploadFiles($anhMacDinh["name"],$anhMacDinh["tmp_name"],'products');
                }
    
                if(empty($errors)) {
                    if($giamGiaSelected == 0) {
                        $giamGiaSelected = 'NULL';
                    }
                    if(updateSanPham($maSanPham,$tenSanPham,$tenAnhMacDinh,$moTa,$trangThai,$gia,$giamGiaSelected)) {
                        deleteChiTietDanhMucIDSanPham($maSanPham);
                        foreach($danhMucSelecteds as $danhMucSelected) {
                            insertChiTietDanhMuc($danhMucSelected,$maSanPham);
                        }

                        if(isset($boSuuTaps)) {
                            if($boSuuTaps["error"][0] == 0) {
                                foreach($boSuuTaps["name"] as $key => $tenAnh) {
                                    $tenAnhBoSuuTap = uploadFiles($tenAnh,$boSuuTaps["tmp_name"][$key],'collection');
                                    insertBoSuuTap($maSanPham,$tenAnhBoSuuTap);
                                }
                            }
                        }
                        
                        $sanPham = getSanPhamID($maSanPham);
                        $thongbao = "Cập nhật sản phẩm thành công !";
                        $type = "warning";
                    }
                }
    
            }
    
            $giamGias = getAllGiamGia();
            $danhMucSelectedOlds = getChiTietDanhMucIDSanPham($maSanPham);
            $boSuuTaps = getBoSuuTapIDSanPham($maSanPham);
            // San pham khong binh thuong
            include VIEWS_URL . "admin/sanpham/suabienthe.php";
        }
    }

    function xoaBoSuuTap() {
        $maSanPham = $_GET["maSanPham"];
        $maBoSuuTap = $_GET["maBoSuuTap"];
        deleteBoSuuTapID($maBoSuuTap);
        nextPage("?url=admin/sanpham/danhsach/sua&maSanPham=$maSanPham");
        die;
    }

    // AN SAN PHAM
    function danhSachSanPhamAn() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $errors = [];
            if(isset($_POST["checkbox"])) {
                $listCheckbox = $_POST["checkbox"];
                foreach($listCheckbox as $maSanPham) {
                    updateStatusSanPham($maSanPham);
                }
                $thongbao = "Bỏ ẩn sản phẩm đã chọn thành công !";
                $type = "success";
            }
            else {
                $errors[] = "Vui lòng chọn sản phẩm";
            }
        }

        $listSanPham = getAllSanPhamHide();
        include VIEWS_URL . "admin/sanpham/danhsachan.php";
    }

    function anSanPham() {
        $maSanPham = $_POST["maSanPham"];
        updateStatusSanPham($maSanPham,0);
        $thongbao = "Ẩn sản phẩm thành công !";
        $type = "success";
        nextPage("?url=admin/sanpham/danhsach&thongbao=$thongbao&type=$type");
        die;
    }

?>