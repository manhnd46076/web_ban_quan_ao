<?php

    // Lay gio hang theo id nguoi dung
    function getGioHangByIdUser($idUser) {
        $sql = "SELECT * FROM gio_hang WHERE ma_nguoi_dung = $idUser";
        return getData($sql, false);
    }

    // Them gio hang
    function insertGioHang($maNguoiDung) {
        $sql = "INSERT INTO gio_hang VALUES (NULL, $maNguoiDung)";
        return executeCommand($sql);
    }

?>