<?php
    // DOI MAT KHAU NGUOI DUNG
    function doiMatKhauNguoiDung() {
        include VIEWS_URL . "admin/nguoidung/doimatkhau.php";
    }

   
    // QUAN LY NGUOI DUNG
    function quanLyNguoiDung()
    {
        $listNguoiDung = getAllNguoiDung();
        include VIEWS_URL . "admin/nguoidung/index.php";
    }
    function quanLyTKKhoa()
    {
        $listNguoiDung = getAllNguoiDung();
        // include VIEWS_URL . "admin/nguoidung/taikhoanbikhoa/index.php.php";
        include VIEWS_URL . "admin/nguoidung/taikhoanbikhoa.php";
    
    }
    //Phân Quyền        
    function capNhatNguoiDung()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $ma_nguoi_dung = $_GET['ma_nguoi_dung'];
    
            $erros = [];
    
            if (isset($_POST['quyen'])) {
                $quyen = $_POST['quyen'];
            } else {
                $erros['quyen'] = "Mời Phân Quyền";
            }
            $isSusses = false;
            if (empty($erros)) {
                updateNguoiDung($ma_nguoi_dung, $quyen);
                $tbao = "Cập nhật quyền thành công";
                $isSusses = true;
            } else {
                $tbao = "Cập nhật thất bại";
                $isSusses = false;
            }
            if ($isSusses) {
                echo "<script>window.location.href='?url=admin/nguoidung&tb=$tbao&type=success'</script>";
            } else {
                echo "<script>window.location.href='?url=admin/nguoidung&tb=$tbao&type=danger'</script>";
            }
        }
        $ma_nguoi_dung = $_GET['ma_nguoi_dung'];
        $nguoiDungID = getNguoiDungID($ma_nguoi_dung);
        // debug($nguoiDungID);
        //     die;
        include VIEWS_URL . "admin/nguoidung/phanquyen.php";
    }
    
    function RessetMKNguoiDung()
    {
        $ma_nguoi_dung = $_GET['ma_nguoi_dung'];
        if (RessetMK($ma_nguoi_dung)) {
            $tbao = "Resset thành công";
            echo "<script>window.location.href='?url=admin/nguoidung&tb=$tbao&type=success'</script>";
        } else {
            $tbao = "Resset  không thành công";
            echo "<script>window.location.href='?url=admin/nguoidung&tb=$tbao&type=danger'</script>";
        }
        
    }
    function KhoaTaiKhoan()
    {
        $trangthai = 0;
        $ma_nguoi_dung = $_GET['ma_nguoi_dung'];
        if (AnTaiTKhoan($ma_nguoi_dung,$trangthai)) {
            $tbao = "Đã khóa tài khoản thành công";
            echo "<script>window.location.href='?url=admin/nguoidung&tb=$tbao&type=success'</script>";
        } else {
            $tbao = "Đã khóa tài khoản không thành công";
            echo "<script>window.location.href='?url=admin/nguoidung&tb=$tbao&type=danger'</script>";
        }
    }
    function MoTaiKhoan()
    {
        $trangthai = 1;
        $ma_nguoi_dung = $_GET['ma_nguoi_dung'];
        if (AnTaiTKhoan($ma_nguoi_dung,$trangthai)) {
            $tbao = "Đã mở tài khoản thành công";
            echo "<script>window.location.href='?url=admin/nguoidung/taikhoanbikhoa&tb=$tbao&type=success'</script>";
        } else {
            $tbao = "Đã mở tài khoản không thành công";
            echo "<script>window.location.href='?url=admin/nguoidung/taikhoanbikhoa&tb=$tbao&type=danger'</script>";
        }
        include VIEWS_URL . "admin/nguoidung/taikhoanbikhoa.php";
    }
    
    
    
?>