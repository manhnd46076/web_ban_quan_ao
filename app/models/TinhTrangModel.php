<?php

    function getAllTinhTrang() {
        $sql = "SELECT * FROM tinh_trang";
        return getData($sql);
    }

?>