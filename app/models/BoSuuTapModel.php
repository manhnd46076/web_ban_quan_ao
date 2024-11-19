<?php
    // Lay bo suu tap theo ma san pham
    function getBoSuuTapIDSanPham($id) {
        $sql = "SELECT A.* FROM bo_suu_tap_san_pham A
                JOIN san_pham B ON A.ma_san_pham = B.ma_san_pham
                WHERE A.ma_san_pham = $id
        ";
        return getData($sql);
    }


    // Them bo suu tap
    function insertBoSuuTap($id, $anh) {
        $sql = "INSERT INTO bo_suu_tap_san_pham VALUES
                (NULL, $id, '$anh')";
                
        return executeCommand($sql);
    }

    // Xoa bo suu tap theo id
    function  deleteBoSuuTapID($id) {
        $sql = "DELETE FROM bo_suu_tap_san_pham WHERE ma_bo_suu_tap = $id";
        return executeCommand($sql);
    }


?>