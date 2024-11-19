<?php
require_once "global.php";
require_once LIBRARIES_URL . "sendmail.php";

requireFiles(CONTROLLERS_URL . "admin");
requireFiles(CONTROLLERS_URL . "users");
requireFiles(MODELS_URL);

session_start();
ob_start();
setlocale(LC_MONETARY, 'vi_VN');
date_default_timezone_set('Asia/Ho_Chi_Minh');

// ROUTER
$url = isset($_GET["url"]) ? $_GET["url"] : '/';

// Header admin
if (strpos($url, "admin") === 0) {
    // Header admin
    $arrayDirectional = [];

    if (strpos($url, "danhmuc")) {
        $pageTitle = $textQuanLyDanhMuc;
        if (strpos($url, "them")) {
            array_push($arrayDirectional, $textThem);
        } else if (strpos($url, "sua")) {
            array_push($arrayDirectional, $textSua);
        }
    } else if (strpos($url, "sanpham")) {
        $pageTitle = $textQuanLySanPham;
        if (strpos($url, "danhsach")) {
            array_push($arrayDirectional, $textDanhSachSanPham);
            if (strpos($url, "chitiet")) {
                if (isset($_POST["btn-add"])) {
                    array_push($arrayDirectional, $textThem);
                } else {
                    array_push($arrayDirectional, $textChiTietSanPham);
                }
            }
        } else if (strpos($url, "mausac")) {
            array_push($arrayDirectional, $textMauSac);
        } else if (strpos($url, "kichthuoc")) {
            array_push($arrayDirectional, $textKichThuoc);
        }
    } else if (strpos($url, "nguoidung")) {
        $pageTitle = $textQuanLyNguoiDung;
    } else if (strpos($url, "binhluan")) {
        $pageTitle = $textQuanLyBinhLuan;
    } else if (strpos($url, "donhang")) {
        $pageTitle = $textQuanLyDonHang;
    } else if (strpos($url, "thongke")) {
        $pageTitle = $textThongKe;
    } else {
        $pageTitle = $textBangDieuKhien;
    }

    include "includes/admin/header.php";
} else {
    // Header user
    if (!($url == 'dangnhap' || $url == 'dangky' || $url == 'khoiphucmatkhau' || $url == 'themgiohang')) {
        include "includes/users/header.php";
    }
}

// CONTENT
switch ($url) {
        // HOME PAGE
    case '/': {
            homePage();
            break;
        }

        // TRANG LOC
    case 'loc': {
            loc();
            break;
        }
    case 'timkiem': {
        timKiem();
        break;
    }
    // case 'nam': {
    //     nam();
    //     break;
    // }
    // case 'nu': {
    //     nu();
    //     break;
    // }

        // CHI TIET SAN PHAM
    case 'chitietsanpham': {
            chiTietSanPham();
            break;
        }

        // DANG NHAP
    case 'dangnhap': {
            dangNhap();
            break;
        }

        // DANG KY
    case 'dangky': {
            dangKy();
            break;
        }

        // DANG XUAT
    case 'dangxuat': {
            dangXuat();
            break;
        }

        // XAC NHAN MA KHOI PHUC MAT KHAU
    case 'khoiphucmatkhau': {
            khoiPhucMatKhau();
            break;
        }

        // GIO HANG
    case 'giohang': {
            gioHang();
            break;
        }

        // Them Vao Gio Hang
    case 'themgiohang': {
            themGioHang();
            break;
    }

        // Xoa 1 san pham trong gio hang
    case 'xoasanphamgiohang': {
            xoaSanPhamGioHang();
            break;
    }

        // THANH TOAN
    case 'dathang': {
            datHang();
            break;
        }
    
    case 'trangthaidathang': {
        trangThaiDatHang();
        break;
    }

    case 'confirm': {
            confirm();
            break;
        }

        // DASHBOARD ADMIN
    case 'admin': {
            dashboard();
            break;
        }

    case 'taikhoan': {
            taiKhoan();
            break;
        }
    case 'taikhoan/donhang': {
        donHangUser();
        break;
    }
    case 'taikhoan/donhang/chitiet': {
        chiTietDonHangUser();
        break;
    }
    case 'taikhoan/donhang/update': {
        updateDonHangUser();
        break;
    }

        // QUAN LY DANH MUC
    case 'admin/danhmuc': {
            quanLyDanhMuc();
            break;
        }
    case 'admin/danhmuc/them': {
            themDanhMuc();
            break;
        }
    case 'admin/danhmuc/sua': {
            suaDanhMuc();
            break;
        }
    case 'admin/danhmuc/xoa': {
            xoaDanhMuc();
            break;
        }
    case 'admin/danhmuc/an': {
            anDanhMuc();
            break;
        }
    case 'admin/danhmuc/hien': {
            hienDanhMuc();
            break;
        }
    case 'admin/danhmuc/danhmucan': {
            danhMucAn();
            break;
        }

        // QUAN LY SAN PHAM
    case 'admin/sanpham/danhsach': {
            danhSachSanPham();
            break;
        }
    case 'admin/sanpham/danhsach/binhthuong/them': {
            themBinhThuong();
            break;
        }
    case 'admin/sanpham/danhsach/bienthe/them': {
            themBienThe();
            break;
        }
    case 'admin/sanpham/danhsach/bienthe/chitiet': {
            chiTietBienThe();
            break;
        }
    case 'admin/sanpham/danhsach/sua': {
            suaSanPham();
            break;
        }
    case 'admin/sanpham/danhsach/xoaanh': {
            xoaBoSuuTap();
            break;
        }
    case 'admin/sanpham/danhsach/dsan': {
            danhSachSanPhamAn();
            break;
        }

    case 'admin/sanpham/danhsach/an': {
            anSanPham();
            break;
        }
        //Kích thước
    case 'admin/sanpham/kichthuoc':
        kichThuoc();
        break;

    case 'admin/sanpham/kichthuoc/them':
        themKichThuoc();
        break;

    case 'admin/sanpham/kichthuoc/xoa':
        xoaKichThuoc();
        break;

    case 'admin/sanpham/kichthuoc/sua':
        suaKichThuoc();
        break;

        //Màu Sắc
    case 'admin/sanpham/mausac':
        mauSac();
        break;

    case 'admin/sanpham/mausac/them':
        themMauSac();
        break;

    case 'admin/sanpham/mausac/xoa':
        xoaMauSac();
        break;

    case 'admin/sanpham/mausac/sua':
        suaMauSac();
        break;

        // QUAN LY NGUOI DUNG
    case 'admin/nguoidung': {
            quanLyNguoiDung();
            break;
        }
    case 'admin/nguoidung/taikhoanbikhoa': {
            quanLyTKKhoa();
            break;
        }
    case 'admin/nguoidung/an': {
            KhoaTaiKhoan();
            break;
        }
    case 'admin/nguoidung/hien': {
            MoTaiKhoan();
            break;
        }
    case 'admin/nguoidung/phanquyen': {
            capNhatNguoiDung();
            break;
        }
    case 'admin/nguoidung/resset': {
            RessetMKNguoiDung();
            break;
        }

        // QUAN LY BINH LUAN
    case 'admin/binhluan': {
            quanLyBinhLuan();
            break;
        }
    case 'admin/binhluan/tatcabinhluan': {
            BinhLuan();
            break;
        }
    case 'admin/binhluan/traloi': {
            ChiTietBinhLuan();
            break;
        }
    case 'admin/binhluan/xoa': {
            xoaBinhLuan();
            break;
        }
    case 'admin/binhluan/xoatraloi': {
            xoaChiTietBinhLuan();
            break;
        }
        // QUAN LY DON HANG
    case 'admin/donhang': {
            quanLyDonHang();
            break;
        }

    case 'admin/donhang/chitiet': {
            chiTietDonHang();
            break;
        }

    case 'admin/donhang/update': {
            updateDonHangAdmin();
            break;
        }

        // THONG KE
    case 'admin/thongke': {
            quanLyThongKe();
            break;
        }
}


// FOOTER
if (strpos($url, "admin") === 0) {
    // Footer admin
    include "includes/admin/footer.php";
} else {
    // Footer user
    if (!($url == 'dangnhap' || $url == 'dangky' || $url == 'khoiphucmatkhau' || $url == 'themgiohang')) {
        include "includes/users/footer.php";
    }
}

session_write_close();
ob_end_flush();