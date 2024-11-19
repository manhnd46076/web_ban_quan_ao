<?php
    // Lay phuong thuc thanh toan bang ma phuong thuc
    function getPhuongThucThanhToanById($id) {
        $sql = "SELECT * FROM phuong_thuc_thanh_toan WHERE ma_phuong_thuc = $id";
        return getData($sql, false);
    }

?>