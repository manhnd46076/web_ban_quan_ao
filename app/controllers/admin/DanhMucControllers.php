<?php
// Phần sửa ko cho sửa loại 
// Danh Sach Danh Muc
function quanLyDanhMuc()
{
    $listDanhMuc = getAllDanhMuc();

    // $danhMucTens = getDanhMucTen($listDanhMuc['ten_danh_muc']);
    //  debug($danhMucTens);
    include VIEWS_URL . "admin/danhmuc/index.php";
}

// Them Danh Muc
function themDanhMuc()
{
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        // debug($_POST);
        $erros = [];
        $isSusses = false;
        $tenDanhMuc = $_POST['ten_danh_muc'];
        if (isset($_POST['ma_loai'])) {
            $maLoais = $_POST['ma_loai'];
        } else {
            $erros['maLoai'] = "Mời chọn loại";
        }
        if (empty($tenDanhMuc)) {
            $erros['tenDanhMuc'] = "Mời nhập tên danh mục";
        }
        if (empty($erros)) {
            foreach ($maLoais as $key => $maLoai) {
                insertDanhMuc($tenDanhMuc, $maLoai);
                $tbao = "Thêm danh mục thành công";
                $isSusses = true;
            }
        } else {
            $tbao = "Thêm không thành công";
            $isSusses = false;
        }
        if ($isSusses) {
            nextPage("?url=admin/danhmuc&tb=$tbao&type=success");
        }
    }
    $listLoai = getAllLoai();
    include VIEWS_URL . "admin/danhmuc/them.php";
}

// Sửa Danh Muc
function suaDanhMuc()
{
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $erros = [];
        $isSusses = false;
        $tenDanhMucOld = $_GET['ten_danh_muc'];
        $tenDanhMuc = $_POST['ten_danh_muc'];
        if (empty($tenDanhMuc)) {
            $erros['tenDanhMuc'] = "MỜi nhập tên danh mục";
        }
        if (isset($_POST['ma_loai'])) {
            $maLoais = $_POST['ma_loai'];
        } elseif (isset($_POST['ma_loai_hidden'])) {
            // debug($_POST['ma_loai_hidden']);

            $maLoais = $_POST['ma_loai_hidden'];
        } else {
            $erros['maLoai'] = "MỜi chọn loại";
        }
        // debug($maLoais);
        // if (isset($_POST['ma_loai_hidden'])) {
        //    $maLoais = $_POST['ma_loai_hidden'];
        // }
        if (empty($erros)) {
            foreach ($maLoais as $key => $maLoai) {
                updateDanhMuc($tenDanhMuc, $maLoai, $tenDanhMucOld);
                $tbao = "Cập nhập dữ liệu thành công";
                $isSusses = true;
            }
        } else {
            $tbao = "Cập nhập dữ liệu không thành công";
            $isSusses = false;
        }
        if ($isSusses) {
            nextPage("?url=admin/danhmuc&tb=$tbao&type=success");
        }
    }
    $tenDanhMucOld = $_GET['ten_danh_muc'];
    $danhMucTens = getDanhMucTen($tenDanhMucOld);
    $listLoai = getAllLoai();
    include VIEWS_URL . "admin/danhmuc/sua.php";
}


// Xóa Danh Muc
function xoaDanhMuc()
{
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $isSusses = false;
        $erros = [];
        $tenDanhMuc = trim($_POST['ten_danh_muc']);
        if (empty($tenDanhMuc)) {
            $erros['tenDanhMuc'] = "Mời nhập tên danh mục";
        }
        if (isset($_POST['ma_loai'])) {
            $maLoais = $_POST['ma_loai'];
        } else {
            $erros['maLoais'] = "Mời chọn loại";
        }
        if (empty($erros)) {
            foreach ($maLoais as $key => $maLoai) {
                if (deleteDanhMuc($maLoai, $tenDanhMuc)) {
                    $tbao = "Xóa thành công";
                    $isSusses = true;
                }
            }
        } else {
            $tbao = "Xóa không thành công";
            $isSusses = false;
        }

        if ($isSusses) {
            nextPage("?url=admin/danhmuc&tb=$tbao&type=success");
        }
    }
    $tenDanhMucOld = $_GET['ten_danh_muc'];
    $danhMucTens = getDanhMucTen($tenDanhMucOld);
    $count = count($danhMucTens);
    // debug($count);
    include VIEWS_URL . "admin/danhmuc/xoa.php";
}
// Ẩn danh mục 
function anDanhMuc()
{
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $isSusses = false;
        $erros = [];
        $trangThai = $_GET['trang_thai'];
        // debug($_POST);
        $tenDanhMuc = trim($_POST['ten_danh_muc']);

        if (empty($tenDanhMuc)) {
            $erros['tenDanhMuc'] = "Mời nhập tên danh mục";
        }
        if (isset($_POST['ma_loai'])) {
            $maLoais = $_POST['ma_loai'];
        } else {
            $erros['maLoais'] = "Mời chọn loại";
        }

        if (empty($erros)) {
            $maDanhMucs = [];
            foreach ($maLoais as $key => $maLoai) {
                $ketQuas = getMaDanhMuc($tenDanhMuc, $maLoai);
                if (is_array($ketQuas)) {
                    foreach ($ketQuas as $item) {
                        if (is_array($item)) {
                            // Nếu $item là một mảng, thêm từng phần tử của nó
                            $maDanhMucs = array_merge($maDanhMucs, $item);
                        } else {
                            // Nếu $item không phải mảng, thêm trực tiếp
                            $maDanhMucs[] = $item;
                        }
                    }
                } else {
                    // Nếu kết quả không phải một mảng, thêm trực tiếp
                    $maDanhMucs[] = $ketQuas;
                }
            }
        }
        // debug($maDanhMucs);

        if (empty($erros)) {
            $maSanPham = [];
            foreach ($maDanhMucs as  $maDanhMuc) {
                $checks = getChiTietDanhMucSanPham($maDanhMuc);

                if (is_array($checks)) {
                    foreach ($checks as $check) {
                        // Kiểm tra xem $check đã tồn tại trong mảng chưa
                        if (is_array($check)) {
                            foreach ($check as $item) {
                                // Kiểm tra $item có tồn tại trong $maSanPham không 
                                // có ! => nếu $item  chưa có trong $maSanPham thì thêm vào $maSanPham
                                if (!in_array($item, $maSanPham)) {
                                    $maSanPham[] = $item;
                                }
                            }
                        } else { // nếu check là phần tử đơn (không phải mảng) thì thêm trực tiếp
                            if (!in_array($check, $maSanPham)) { // nếu chưa có trong mã sản phẩm thì thêm 
                                $maSanPham[] = $check;
                            }
                        }
                    }
                } else { // nếu checks là phần tử đơn (không phải mảng) thì thêm trực tiếp
                    if (!in_array($checks, $maSanPham)) {
                        $maSanPham[] = $checks;
                    }
                }
            }
            //    $maSanPham = array_unique($maSanPham);
            // debug($maSanPham);
            if (!empty($maSanPham)) {
                $erros['maSanPham'] = "Danh mục chứa sản phẩm";
                // $tbao = "Ẩn không thành công-Danh mục chứa sản phẩm";
                // $isSusses = false;
            } else {
                foreach ($maLoais as $key => $maLoai) {
                    if (trangThaiDanhMuc($tenDanhMuc, $maLoai, $trangThai)) {
                        $tbao = "Ẩn thành công";
                        $isSusses = true;
                    }
                }
            }
        }


        if ($isSusses) {
            nextPage("?url=admin/danhmuc&tb=$tbao&type=success");
        }
        // elseif ($isSusses == false) {
        //     nextPage("?url=admin/danhmuc&tb=$tbao&type=danger");
        // }
    }
    $tenDanhMucOld = $_GET['ten_danh_muc'];
    $danhMucTens = getDanhMucTen($tenDanhMucOld);
    $count = count($danhMucTens);
    // debug($danhMucTens);
    include VIEWS_URL . "admin/danhmuc/an.php";
}
function danhMucAn()
{
    $listDanhMucAn = getAllDanhMucAn();
    include VIEWS_URL . "admin/danhmuc/danhmucan.php";
}

function hienDanhMuc()
{
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $isSusses = false;
        $erros = [];
        $trangThai = $_GET['trang_thai'];
        $tenDanhMuc = trim($_POST['ten_danh_muc']);

        if (empty($tenDanhMuc)) {
            $erros['tenDanhMuc'] = "Mời nhập tên danh mục";
        }
        if (isset($_POST['ma_loai'])) {
            $maLoais = $_POST['ma_loai'];
        } else {
            $erros['maLoais'] = "Mời chọn loại";
        }
        // debug($erros);

        if (empty($erros)) {
            foreach ($maLoais as $key => $maLoai) {
                if (trangThaiDanhMuc($tenDanhMuc, $maLoai, $trangThai)) {
                    $tbao = "Hiện thành công";
                    $isSusses = true;
                }
            }
        } else {
            $tbao = "Hiện không thành công";
            $isSusses = false;
        }

        if ($isSusses) {
            nextPage("?url=admin/danhmuc&tb=$tbao&type=success");
        }
    }
    $tenDanhMucOld = $_GET['ten_danh_muc'];
    $danhMucTenAn = getDanhMucTenAn($tenDanhMucOld);
    $count = count($danhMucTenAn);
    // debug($danhMucTens);
    include VIEWS_URL . "admin/danhmuc/hien.php";
}
