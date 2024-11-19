<?php

function homePage() {
    $listSanPhamBanChay = getAllSanPhamBanChay();
    include VIEWS_URL . "users/index.php";
}
