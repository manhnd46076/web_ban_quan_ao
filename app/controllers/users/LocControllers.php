<?php
function timKiem()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $maLoai = isset($_GET['ma_loai']) ? $_GET['ma_loai'] : '';
        $maDanhMuc = isset($_GET['ma_danh_muc']) ? $_GET['ma_danh_muc'] : 0;
        $danhMucs = danhMuc($maLoai);
        $getKichThuocs = getKichThuoc($maLoai, $maDanhMuc);
        $getMauSacs = getMauSac($maLoai, $maDanhMuc);
        $soLuongTatCaSanPham = soLuongAllSanPham($maLoai);
        $tenSanPham = isset($_POST['tim_kiem']) ? $_POST['tim_kiem'] : '';
        $sp = timKiemSanPham($tenSanPham);
    }else {
       $maLoai = isset($_GET['ma_loai']) ? $_GET['ma_loai'] : '';
    $maDanhMuc = isset($_GET['ma_danh_muc']) ? $_GET['ma_danh_muc'] : 0;
    $danhMucs = danhMuc($maLoai);
    $getKichThuocs = getKichThuoc($maLoai, $maDanhMuc);
    $getMauSacs = getMauSac($maLoai, $maDanhMuc);
    $soLuongTatCaSanPham = soLuongAllSanPham($maLoai);
    $sp = timKiemSanPham($tenSanPham='');
    }
    

    $trangHienTai = isset($_GET['soTrang']) ? $_GET['soTrang'] : 1;
    $tongSoTrang = ceil(COUNT($sp) / 10);
    $sanPhams = phanTrang($sp, $trangHienTai);
    include VIEWS_URL . "users/loc.php";
}
function loc()
{
    $maLoai = isset($_GET['ma_loai']) ? $_GET['ma_loai'] : '';
    $maDanhMuc = isset($_GET['ma_danh_muc']) ? $_GET['ma_danh_muc'] : 0;
    $danhMucs = danhMuc($maLoai);
    $getKichThuocs = getKichThuoc($maLoai, $maDanhMuc);
    $getMauSacs = getMauSac($maLoai, $maDanhMuc);
    $soLuongTatCaSanPham = soLuongAllSanPham($maLoai);

    // if (isset($_POST['search'])) {
    //     $tenSanPham = isset($_POST['tim_kiem']) ? $_POST['tim_kiem'] : '';
    //     $sanPhams = timKiemSanPham($tenSanPham);
    // }



    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $maLoai = isset($_GET['ma_loai']) ? $_GET['ma_loai'] : '';
        $maMauSacs = isset($_POST['ma_mau_sac']) ? $_POST['ma_mau_sac'] : [];
        $maKichThuocs = isset($_POST['ma_kich_thuoc']) ? $_POST['ma_kich_thuoc'] : [];
        // PRICE 
        // if (isset($_POST['price'])) {
        $chuoiGia = $_POST['price']; // chuỗi giá chưa cắt
        $catChuoi = [];
        // tách chuỗi  chỉ lấy phần số
        preg_match_all('/\d+/', $chuoiGia, $catChuoi);
        //    debug($catChuoi);

        if (!empty($catChuoi[0])) {
            //    debug($catChuoi);

            foreach ($catChuoi[0] as $key => $value) {
                $khoangGia[] = (int)$value;
            }
            //    debug($khoangGia);

        }
        // }
        $min = $khoangGia[0];
        $max = $khoangGia[1];
        // debug($maKichThuocs);

        if (empty($maMauSacs) && empty($maKichThuocs)) {
            //  debug($min);
            $sp = getSanPhamLoai($maLoai, $maDanhMuc, $min, $max); // lọc rỗng lấy ra full sản phẩm
            echo "lọc NULL";

            // Hiện full sản phâm nếu lọc rỗng
        } else {
            $bienTam = []; //Hứng kết quả tạm thời 
            // TH1: CHỉ CHỌN MÀU 
            if (!empty($maMauSacs) && empty($maKichThuocs)) {
                foreach ($maMauSacs as $key => $maMauSac) {
                    // debug($maMauSac);
                    $getSanPham = locSanPham($maLoai, $maMauSac, $maKichThuoc = 0, $min, $max);
                    $bienTam = array_merge($bienTam, $getSanPham); // nối mảng

                    echo "MÀu ///";
                    // echo "<pre>";
                    // var_dump($sanPhams);
                }
            }
            //TH2:  CHỈ CHỌN SIZE
            if (empty($maMauSacs) && !empty($maKichThuocs)) {
                foreach ($maKichThuocs as $key => $maKichThuoc) {
                    $bienTam = array_merge($bienTam, locSanPham($maLoai, $maMauSac = 0, $maKichThuoc, $min, $max));
                    // $sanPhams = locSanPham($maLoai, $maMauSac = 0, $maKichThuoc);
                    echo "SIZE ///";
                }
            }
            // TH3: CẢ MÀU VÀ SIZE 
            if (!empty($maMauSacs) && !empty($maKichThuocs)) {
                foreach ($maMauSacs as $key => $maMauSac) {
                    foreach ($maKichThuocs as $key => $maKichThuoc) {
                        $bienTam = array_merge($bienTam, locSanPham($maLoai, $maMauSac, $maKichThuoc, $min, $max));
                        // $sanPhams = locSanPham($maLoai, $maMauSac, $maKichThuoc);
                        // echo "<pre>";
                        // print_r($sanPhams);
                        echo "CẢ MÀU VÀ SIZE ///";
                    }
                }
            }
            $sp = array_unique($bienTam, SORT_REGULAR); // loại bỏ phần tử trùng lặp, so sánh mảng đa chiều
            // $trangHienTai = isset($_GET['soTrang']) ? $_GET['soTrang'] : 1;
            // $tongSoTrang = ceil(COUNT($sp) / 10);
            // $sanPhams = phanTrang($sp, $trangHienTai);
            // debug($sanPhams);

        }
    } else {
        $sp = getSanPhamLoai($maLoai, $maDanhMuc, $min = [], $max = []);
       

        // debug($tongSoTrang);
        // debug($danhMucNam);
    }
    $trangHienTai = isset($_GET['soTrang']) ? $_GET['soTrang'] : 1;
    $tongSoTrang = ceil(COUNT($sp) / 9);
    $sanPhams = phanTrang($sp, $trangHienTai);
    include VIEWS_URL . "users/loc.php";
}

// function nam()
// {
//     $maLoai = isset($_GET['ma_loai']) ? $_GET['ma_loai'] : 1;
//     $maDanhMuc = isset($_GET['ma_danh_muc']) ? $_GET['ma_danh_muc'] : 0;
//     $danhMucs = danhMuc($maLoai);
//     $getKichThuocs = getKichThuoc($maLoai, $maDanhMuc);
//     $getMauSacs = getMauSac($maLoai, $maDanhMuc);
//     $soLuongTatCaSanPham = soLuongSanPhamDanhMuc($maDanhMuc, $maLoai);
//     // $sanPhams=[];



//     if ($_SERVER['REQUEST_METHOD'] == "POST") {
//         $maLoai = isset($_GET['ma_loai']) ? $_GET['ma_loai'] : 1;
//         $maMauSacs = isset($_POST['ma_mau_sac']) ? $_POST['ma_mau_sac'] : [];
//         $maKichThuocs = isset($_POST['ma_kich_thuoc']) ? $_POST['ma_kich_thuoc'] : [];

//         if (empty($maMauSacs) && empty($maKichThuocs)) {
//             $sanPhams = getSanPhamLoai($maLoai, $maDanhMuc);
//             echo "lọc NULL";
//             // Hiện full sản phâm nếu lọc rỗng
//         } else {
//             $bienTam = []; //Hứng kết quả tạm thời 
//             // TH1: CHỉ CHỌN MÀU 
//             if (!empty($maMauSacs) && empty($maKichThuocs)) {

//                 foreach ($maMauSacs as $key => $maMauSac) {
//                     $getSanPham = locSanPham($maLoai, $maMauSac, $maKichThuoc = 0);
//                     $bienTam = array_merge($bienTam, $getSanPham); // nối mảng
//                     // $bienTam = array_merge($bienTam,locSanPham($maLoai, $maMauSac, $maKichThuoc = 0));
//                     // $ketQua = locSanPham($maLoai, $maMauSac, $maKichThuoc = 0);
//                     // $a =array_merge($a,$ketQua);
//                     echo "MÀu ///";
//                     // echo "<pre>";
//                     // var_dump($sanPhams);
//                 }
//                 // $sanPhams = $a;
//                 // debug($sanPhams);

//             }
//             //TH2:  CHỈ CHỌN SIZE
//             if (empty($maMauSacs) && !empty($maKichThuocs)) {
//                 foreach ($maKichThuocs as $key => $maKichThuoc) {
//                     $bienTam = array_merge($bienTam, locSanPham($maLoai, $maMauSac = 0, $maKichThuoc));

//                     // $sanPhams = locSanPham($maLoai, $maMauSac = 0, $maKichThuoc);
//                     echo "SIZE ///";
//                 }
//             }
//             // TH3: CẢ MÀU VÀ SIZE 
//             if (!empty($maMauSacs) && !empty($maKichThuocs)) {
//                 foreach ($maMauSacs as $key => $maMauSac) {
//                     foreach ($maKichThuocs as $key => $maKichThuoc) {
//                         $bienTam = array_merge($bienTam, locSanPham($maLoai, $maMauSac, $maKichThuoc));

//                         // $sanPhams = locSanPham($maLoai, $maMauSac, $maKichThuoc);
//                         // echo "<pre>";
//                         // print_r($sanPhams);
//                         echo "CẢ MÀU VÀ SIZE ///";
//                     }
//                 }
//             }
//             $sanPhams = array_unique($bienTam, SORT_REGULAR); // loại bỏ phần tử trùng lặp, so sánh mảng đa chiều

//             debug($sanPhams);
//         }


//         // $erros = [];
//         // if (isset($_POST['ma_mau_sac'])) {
//         //     $maMauSacs = $_POST['ma_mau_sac'];
//         // } else {
//         //     $erros['maMauSac'] = "Mời chọn màu";
//         // }
//         // // debug($maMauSacs);
//         // if (isset($_POST['ma_kich_thuoc'])) {
//         //     $maKichThuocs = $_POST['ma_kich_thuoc'];
//         // } else {
//         //     $erros['maKichThuoc'] = "Mời chọn kích thước";
//         // }
//         // // debug($maKichThuocs);
//         // if (empty($erros['maMauSac']) || empty($erros['maKichThuoc'])) {
//         //     if (isset($maMauSacs) && isset($maKichThuocs)) {
//         //         foreach ($maMauSacs as $key => $maMauSac) {
//         //             foreach ($maKichThuocs as $key => $maKichThuoc) {
//         //                 $sanPhams = locSanPham($maLoai, $maMauSac, $maKichThuoc);
//         //                 echo " màu AND size ///";
//         //             }
//         //         }
//         //     }
//         //     if (isset($maMauSacs) && (!isset($maKichThuocs))) {
//         //         foreach ($maMauSacs as $key => $maMauSac) {
//         //             $sanPhams = locSanPham($maLoai, $maMauSac, $maKichThuoc = 0);
//         //             echo "MÀU ///";
//         //         }
//         //         //  debug($maKichThuoc);
//         //     }
//         //     if ((!isset($maMauSacs)) && isset($maKichThuocs)) {
//         //         foreach ($maKichThuocs as $key => $maKichThuoc) {
//         //             $sanPhams = locSanPham($maLoai, $maMauSac = 0, $maKichThuoc);
//         //             echo "SIZE ///";
//         //         }
//         //     }
//         //     if (!isset($maMauSacs) && !isset($maKichThuocs)) {
//         //             $sanPhams = locSanPham($maLoai, $maMauSac = 0, $maKichThuoc=0);
//         //             echo "Ko size ko màu ///";
//         //     }
//         // }
//         // // if (empty($erros['maMauSac']) && empty($erros['maKichThuoc'])) {

//         // //     $tbao = "Bạn chưa chọn màu sắc hoặc kích thước";
//         // //     // $isSusses = false;
//         // //     // nextPage("?url=nam&ma_loai=1&tb=$tbao&type=danger");
//         // // }


//         // // 
//         // $danhMucs = danhMuc($maLoai);
//         // // Đếm số lượng sản phẩm của tất cả danh mục (mã danh mục gán  = 0)
//         // $soLuongTatCaSanPham = soLuongSanPhamDanhMuc(0, $maLoai);
//         // // debug($soLuongTatCaSanPham);
//         // if (isset($_GET['ma_danh_muc'])) {
//         //     $maDanhMuc = isset($_GET['ma_danh_muc']) ? $_GET['ma_danh_muc'] : 0;
//         //     //Hiện thị sản phẩm theo từng danh mục (nam)
//         //     // $sanPhams = getSanPhamLoai($maLoai, $maDanhMuc);
//         //     // Hiện size theo từng danh muc
//         //     $getKichThuocs = getKichThuoc($maLoai, $maDanhMuc);
//         //     // 
//         //     $getMauSacs = getMauSac($maLoai, $maDanhMuc);
//         // } else {
//         //     //Hiện thị sản phẩm của tất cả danh mục(gán mã danh mục = 0)
//         //     // $sanPhams = getSanPhamLoai($maLoai, $maDanhMuc = 0);
//         //     // Hiện size của tất cả danh mục
//         //     $getKichThuocs = getKichThuoc($maLoai, $maDanhMuc = 0);
//         //     // 
//         //     $getMauSacs = getMauSac($maLoai, $maDanhMuc = 0);
//         // }
//         // // debug($sanPhams);
//         // include VIEWS_URL . "users/loc.php";
//     } else {
//         $sanPhams = getSanPhamLoai($maLoai, $maDanhMuc);
//         // debug($sanPhams);
//         // if (isset($_GET['ma_loai'])) {
//         //     $maLoai = $_GET['ma_loai'];
//         //     // Lấy danh sách danh mục theo mã loại 
//         //     $danhMucs = danhMuc($maLoai);
//         //     // Đếm số lượng sản phẩm của tất cả danh mục (mã danh mục gán  = 0)
//         //     $soLuongTatCaSanPham = soLuongSanPhamDanhMuc(0, $maLoai);

//         //     // debug($soLuongTatCaSanPham);
//         //     if (isset($_GET['ma_danh_muc'])) {
//         //         $maDanhMuc = $_GET['ma_danh_muc'];
//         //         //Hiện thị sản phẩm theo từng danh mục (nam)
//         //         $sanPhams = getSanPhamLoai($maLoai, $maDanhMuc);
//         //         // Hiện size theo từng danh muc
//         //         $getKichThuocs = getKichThuoc($maLoai, $maDanhMuc);
//         //         // 
//         //         $getMauSacs = getMauSac($maLoai, $maDanhMuc);
//         //     } else {
//         //         //Hiện thị sản phẩm của tất cả danh mục(gán mã danh mục = 0)
//         //         $sanPhams = getSanPhamLoai($maLoai, $maDanhMuc = 0);
//         //         // Hiện size của tất cả danh mục
//         //         $getKichThuocs = getKichThuoc($maLoai, $maDanhMuc = 0);
//         //         // 
//         //         $getMauSacs = getMauSac($maLoai, $maDanhMuc = 0);
//         //     }
//         //     //    debug($sanPhams);
//         // }
//         // debug($getKichThuocs);

//     }
//     include VIEWS_URL . "users/loc.php";
// }


// function nu()
// {
//     $maLoai = isset($_GET['ma_loai']) ? $_GET['ma_loai'] : 2;
//     $maDanhMuc = isset($_GET['ma_danh_muc']) ? $_GET['ma_danh_muc'] : 0;
//     $danhMucs = danhMuc($maLoai);
//     $getKichThuocs = getKichThuoc($maLoai, $maDanhMuc);
//     $getMauSacs = getMauSac($maLoai, $maDanhMuc);
//     $soLuongTatCaSanPham = soLuongSanPhamDanhMuc($maDanhMuc, $maLoai);


//     if ($_SERVER['REQUEST_METHOD'] == "POST") {
//         $maLoai = isset($_GET['ma_loai']) ? $_GET['ma_loai'] : 2;
//         $maMauSacs = isset($_POST['ma_mau_sac']) ? $_POST['ma_mau_sac'] : [];
//         $maKichThuocs = isset($_POST['ma_kich_thuoc']) ? $_POST['ma_kich_thuoc'] : [];

//         if (empty($maMauSacs) && empty($maKichThuocs)) {
//             $sanPhams = getSanPhamLoai($maLoai, $maDanhMuc);
//             echo "lọc NULL";
//             // Hiện full sản phâm nếu lọc rỗng
//         } else {
//             $bienTam = []; //Hứng kết quả tạm thời 
//             // TH1: CHỉ CHỌN MÀU 
//             if (!empty($maMauSacs) && empty($maKichThuocs)) {

//                 foreach ($maMauSacs as $key => $maMauSac) {
//                     $getSanPham = locSanPham($maLoai, $maMauSac, $maKichThuoc = 0);
//                     $bienTam = array_merge($bienTam, $getSanPham); // nối mảng
//                     // $bienTam = array_merge($bienTam,locSanPham($maLoai, $maMauSac, $maKichThuoc = 0));
//                     // $ketQua = locSanPham($maLoai, $maMauSac, $maKichThuoc = 0);
//                     // $a =array_merge($a,$ketQua);
//                     echo "MÀu ///";
//                     // echo "<pre>";
//                     // var_dump($sanPhams);
//                 }
//                 // $sanPhams = $a;
//                 // debug($sanPhams);

//             }
//             //TH2:  CHỈ CHỌN SIZE
//             if (empty($maMauSacs) && !empty($maKichThuocs)) {
//                 foreach ($maKichThuocs as $key => $maKichThuoc) {
//                     $bienTam = array_merge($bienTam, locSanPham($maLoai, $maMauSac = 0, $maKichThuoc));

//                     // $sanPhams = locSanPham($maLoai, $maMauSac = 0, $maKichThuoc);
//                     echo "SIZE ///";
//                 }
//             }
//             // TH3: CẢ MÀU VÀ SIZE 
//             if (!empty($maMauSacs) && !empty($maKichThuocs)) {
//                 foreach ($maMauSacs as $key => $maMauSac) {
//                     foreach ($maKichThuocs as $key => $maKichThuoc) {
//                         $bienTam = array_merge($bienTam, locSanPham($maLoai, $maMauSac, $maKichThuoc));

//                         // $sanPhams = locSanPham($maLoai, $maMauSac, $maKichThuoc);
//                         // echo "<pre>";
//                         // print_r($sanPhams);
//                         echo "CẢ MÀU VÀ SIZE ///";
//                     }
//                 }
//             }
//             $sanPhams = array_unique($bienTam, SORT_REGULAR); // loại bỏ phần tử trùng lặp, so sánh mảng đa chiều

//             // debug($sanPhams);
//         }
//     } else {
//         $sanPhams = getSanPhamLoai($maLoai, $maDanhMuc);


//         // Đếm số lượng sản phẩm của tất cả danh mục (mã danh mục gán  = 0)

//         // if (isset($_GET['ma_danh_muc'])) {
//         //     $maDanhMuc = $_GET['ma_danh_muc'];
//         //     $sanPhams = getSanPhamLoai($maLoai, $maDanhMuc);
//         //     $getKichThuocs = getKichThuoc($maLoai, $maDanhMuc);
//         //     $getMauSacs = getMauSac($maLoai, $maDanhMuc);
//         // } else {
//         //     $sanPhams = getSanPhamLoai($maLoai, $maDanhMuc = 0);
//         //     $getKichThuocs = getKichThuoc($maLoai, $maDanhMuc = 0);
//         //     $getMauSacs = getMauSac($maLoai, $maDanhMuc = 0);
//         // }

//         // debug($danhMucNam);
//     }
//     include VIEWS_URL . "users/loc.php";
// }
