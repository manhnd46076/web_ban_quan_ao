<?php
    function chiTietSanPham() {
        $maSanPham = $_GET['maSanPham'];
        
        if (isset($_POST['guibinhluan'])) {
            $noi_Dung = $_POST["comment"];
    
            insertBinhLuan($_SESSION["user"]["ma_nguoi_dung"], $noi_Dung, $maSanPham);
            nextPage("?url=chitietsanpham&maSanPham=$maSanPham");
        }
        if (isset($_POST['submitButton'])) {
            $maBinhLuan = $_POST['matrl'];
            $noi_Dung = $_POST["commentmin"];
            insertBinhLuanNho($maBinhLuan, $noi_Dung, $_SESSION["user"]["ma_nguoi_dung"]);
            nextPage("?url=chitietsanpham&maSanPham=$maSanPham");
        }
    

        if(isset($_POST["btn-load-variants"])) {

            $maKichThuoc = $_POST["size"];
            $maMauSac = $_POST["color"];
            
            $detailProduct = get3ChiTietSanPham($maSanPham,$maKichThuoc,$maMauSac);
        }

        if(isset($_POST["btn-add-cart"])) {
            if(checkLogin("Vui lòng đăng nhập để sử dụng chức năng này")) {
                $maChiTietSanPham = $_POST["maChiTietSanPham"];
                $soLuongMuonMua = $_POST["so_luong_muon_mua"];
                $errors = [];
    
                if($_POST["so_luong"] !== "") {
                    // ADD TO CART SAN PHAM BINH THUONG
                    $soLuongBinhThuong = $_POST["so_luong"];
                    if($soLuongMuonMua == "") {
                        $errors[] = "Vui lòng nhập số lượng muốn mua";
                    }
                    else {
                        if($soLuongMuonMua <= 0) {
                            $errors[] = "Số lượng mua phải là số dương";
                        }
                        else {
                            if($soLuongMuonMua > $soLuongBinhThuong) {
                                $errors[] = "Vui lòng nhập số lượng nhỏ hơn số lượng trong kho";
                            }
                        }
                    }

                    if(empty($errors)) {
                        $params = getAllParam($_GET);
                        nextPage("?url=themgiohang&maChiTietSanPham=$maChiTietSanPham&soLuongMuonMua=$soLuongMuonMua&view=$params");
                    }
                }
                else {
                    // ADD TO CART SAN PHAM BIEN THE
                    if(isset($_POST["size"])) {
                        $maKichThuoc = $_POST["size"];
                    }
        
                    if(isset($_POST["color"])) {
                        $maMauSac = $_POST["color"];
                    }
    
                    if(!(isset($maKichThuoc)) || !(isset($maMauSac))) {
                        $errors[] = "Vui lòng chọn biến thể";
                    }
                    else {
                        $detailProduct = get3ChiTietSanPham($maSanPham,$maKichThuoc,$maMauSac);
                        if($maChiTietSanPham == "") {
                            $errors[] = "Không có biến thể này";
                        }
                        else {
                            if($soLuongMuonMua == "") {
                                $errors[] = "Vui lòng nhập số lượng muốn mua";
                            }
                            else {
                                if($soLuongMuonMua <= 0) {
                                    $errors[] = "Số lượng mua phải là số dương";
                                }
                                else {
                                    $soLuongBienThe = $_POST["so_luong_bien_the"];
                                    if($soLuongMuonMua > $soLuongBienThe) {
                                        $errors[] = "Vui lòng nhập số lượng nhỏ hơn số lượng trong kho";
                                    }
                                }
                            }
                        }
                    }

                    if(empty($errors)) {
                        $params = getAllParam($_GET);
                        nextPage("?url=themgiohang&maChiTietSanPham=$maChiTietSanPham&soLuongMuonMua=$soLuongMuonMua&view=$params");
                    }
                }
            }

        }
        $listBinhLuan = getBinhLuanID($maSanPham);
        $listSPTT = SanPhamTuongTu($maSanPham);
        $sanpham = getSanPhamID($maSanPham);
        $listBoSuuTap = getBoSuuTapIDSanPham($sanpham["ma_san_pham"]);

        include VIEWS_URL . "users/chitietsanpham.php";
    }

?>