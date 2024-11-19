<!-- content -->
<div id="content">

    <div class="checkout">

        <div class="container">

            <div class="check-anchor clearfix mb40">
                <div class="holder">
                    <ul>
                        <li class="active"><a href="#!"><i class="fa fa-star"></i> Giỏ hàng </a></li>
                        <li><a href="#!"><i class="fa fa-star"></i> Đặt hàng </a></li>
                        <li><a href="#!"><i class="fa fa-star"></i> Trạng thái đặt hàng <i class="fa fa-star"></i></a></li>
                    </ul>
                    <div class="holder-border"></div>
                </div>
            </div>

            <div class="check-infos">
                <form action="?url=giohang" method="post">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="check-details">
                                <table class="table my-cart">
                                    <thead>
                                        <tr>
                                        <th><a href="#!" class="chonTat">Chọn tất</a></th>
                                        <th style="text-align: center;">Ảnh</th>
                                        <th width="30%">Chi tiết sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Tổng</th>
                                        <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="check-body">
                                        <?php foreach($productsInCart as $productInCart) : ?>
                                            <?php if($productInCart["so_luong"] == NULL) : ?>
                                                <?php
                                                    $kichThuoc = getKichThuocID($productInCart["ma_kich_thuoc"]);
                                                    $mauSac = getMauSacID($productInCart["ma_mau_sac"]);
                                                    $sumCart += ($productInCart["gia"] + $productInCart["gia_bien_dong"])*$productInCart["so_luong_muon_mua"];
                                                ?>
                                                <tr>
                                                    <td>
                                                        <input
                                                            style="width: 16px; height: 16px;"
                                                            type="checkbox"
                                                            value="<?php echo $productInCart["ma_chi_tiet_san_pham"] ?>"
                                                            class="maChiTietSanPham"
                                                            name="maChiTietSanPham[]"
                                                        >
                                                    </td>
                                                    <td><img src="<?php echo IMAGES_URL . $productInCart["anh_chi_tiet"] ?>" alt="" width="100px"></td>
                                                    <td>
                                                        <h6><?php echo $productInCart["ten_san_pham"] ?></h6>
                                                        <p>Size: <span><?php echo $kichThuoc["ten_kich_thuoc"]?></span></p>
                                                        <p><?php echo $mauSac["ten_mau"] ?></p>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="giaSanPham"
                                                            style="font-size: unset; color: unset;"
                                                        >
                                                        <?php echo $productInCart["gia"] + $productInCart["gia_bien_dong"] ?>
                                                        </span>
                                                         VNĐ
                                                    </td>
                                                    <td>
                                                        <input
                                                            style="padding: 6px 4px; width: 60px;"
                                                            type="number"
                                                            placeholder="1"
                                                            value="<?php echo $productInCart["so_luong_muon_mua"]?>"
                                                            class="soLuongMuonMua"
                                                            name="soLuongMuonMua<?php echo $productInCart["ma_chi_tiet_san_pham"] ?>"
                                                        >
                                                        <span
                                                            style="display: block; margin-top: 8px; font-size: 12px;"
                                                        >
                                                            Max: <span class="soLuongTrongKho"><?php echo $productInCart["so_luong_bien_the"]?></span>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <strong>
                                                            <label class="tongSanPham"><?php echo ($productInCart["gia"] + $productInCart["gia_bien_dong"])*$productInCart["so_luong_muon_mua"] ?></label> VNĐ
                                                        </strong>
                                                    </td>
                                                    <td>
                                                        <a
                                                            href="?url=xoasanphamgiohang&maChiTietSanPham=<?php echo $productInCart["ma_chi_tiet_san_pham"] ?>&view=<?php echo $params ?>"
                                                            onclick="return confirm('Bạn có muốn xóa sản phẩm này khỏi giỏ hàng không ?')"
                                                        >
                                                            <img src="<?php echo IMAGES_URL ?>delete.png" alt="">
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php else : ?>
                                                <?php $sumCart += $productInCart["gia"]*$productInCart["so_luong_muon_mua"]; ?>
                                                <tr>
                                                    <td>
                                                        <input
                                                            style="width: 16px; height: 16px;"
                                                            type="checkbox"
                                                            value="<?php echo $productInCart["ma_chi_tiet_san_pham"] ?>"
                                                            class="maChiTietSanPham"
                                                            name="maChiTietSanPham[]"
                                                        >
                                                    </td>
                                                    <td><img src="<?php echo IMAGES_URL . $productInCart["anh"] ?>" alt="" width="100px"></td>
                                                    <td>
                                                        <h6><?php echo $productInCart["ten_san_pham"] ?></h6>
                                                    </td>
                                                    <td>
                                                        <span
                                                            class="giaSanPham"
                                                            style="font-size: unset; color: unset;"
                                                        >
                                                        <?php echo $productInCart["gia"] ?>
                                                        </span>
                                                         VNĐ
                                                    </td>
                                                    <td>
                                                        <input
                                                            style="padding: 6px 4px; width: 60px;"
                                                            type="number"
                                                            placeholder="1"
                                                            value="<?php echo $productInCart["so_luong_muon_mua"]?>"
                                                            class="soLuongMuonMua"
                                                            name="soLuongMuonMua<?php echo $productInCart["ma_chi_tiet_san_pham"] ?>"
                                                        >
                                                        <span
                                                            style="display: block; margin-top: 8px; font-size: 12px;"
                                                        >
                                                            Max: <span class="soLuongTrongKho"><?php echo $productInCart["so_luong"]?></span>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <strong>
                                                            <label class="tongSanPham"><?php echo $productInCart["gia"]*$productInCart["so_luong_muon_mua"] ?></label> VNĐ
                                                        </strong>
                                                    </td>
                                                    <td>
                                                        <a
                                                            href="?url=xoasanphamgiohang&maChiTietSanPham=<?php echo $productInCart["ma_chi_tiet_san_pham"] ?>&view=<?php echo $params ?>"
                                                            onclick="return confirm('Bạn có muốn xóa sản phẩm này khỏi giỏ hàng không ?')"
                                                        >
                                                            <img src="<?php echo IMAGES_URL ?>delete.png" alt="">
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php if(!$productsInCart) : ?>
                                <div style="margin-top: 48px;">
                                    <div style="text-align: center;">
                                        <img style="width: 220px;" src="<?php echo IMAGES_URL ?>no-product.png" alt="">
                                    </div>
                                    <h3 style="text-align: center; line-height: 22px;">
                                        Không có sản phẩm nào
                                    </h3>
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="col-md-3">
                            <div class="alert alert-danger error" role="alert" style="display: none;"></div>
                            <?php if(isset($errors)) : ?>
                                <?php foreach($errors as $error ) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        Lỗi: <?php echo $error ?>
                                    </div>
                                <?php endforeach ?>
                            <?php endif ?>
                            <?php if(isset($thongbao) && isset($type)) : ?>
                                <div class="alert alert-<?php echo $type ?>" role="alert">
                                    <?php echo $thongbao ?>
                                </div>
                            <?php endif?>
                            <?php if($sumCart !== 0) :  ?>
                                <div class="check-aside">
                                    <div class="orders mb20">
                                        <h6>Tổng giỏ hàng</h6>
                                        <p>
                                            Tổng các sản phẩm đã chọn:
                                            <label
                                                style="display: block; margin-top: 2px; font-size: 15px; color: #ea5748;"
                                            >
                                                <label style="display: inline-block;" class="tongCacSanPhamDaChon">0</label> VNĐ
                                            </label>
                                        </p>
                                        <p>
                                            Tổng giỏ hàng:
                                            <label style="display: block; margin-top: 2px; font-size: 15px; color: #ea5748;">
                                                <label style="đisplay: inline-block"  class="tongGioHang"><?php echo $sumCart ?></label> VNĐ
                                            </label>
                                        </p>
                                    </div>
                                    <button
                                        class="btn small-button button-brown mb10"
                                        type="submit"
                                        style="width: 100%; display: inline-block;"
                                        onclick="return confirm('Bạn có muốn xóa sản phẩm đã chọn không ?')"
                                        name="btn-delete-product-selected"
                                    >
                                        Xóa sản phẩm đã chọn
                                    </button>
                                    <button
                                        class="btn medium-button button-red mb10 float-right btn-checkout"
                                        type="submit"
                                        style="width: 100%;"
                                        name="btn-checkout"
                                    >
                                        Tiến hành đặt hàng
                                    </button>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
    <!-- End Product Single -->

</div>
<!-- End content -->

<script>
    const cartTable = document.querySelector('.my-cart');
    const error = document.querySelector(".error");
    const checkedsElement = document.querySelectorAll(".maChiTietSanPham");
    const tongCacSanPhamDaChon = document.querySelector(".tongCacSanPhamDaChon");
    const tongGioHang = document.querySelector(".tongGioHang");
    const chonTatBtn = document.querySelector(".chonTat");
    const btnCheckout = document.querySelector(".btn-checkout");
    let isError = false;

    cartTable.addEventListener("change", (e) => {
        if(e.target.className == "maChiTietSanPham") {
            let count = 0;
            checkedsElement.forEach((element) => {
                if(element.checked) {
                    count++;
                }
            })

            if(count == checkedsElement.length) {
                chonTatBtn.textContent = "Bỏ chọn tất";
            }
            else {
                chonTatBtn.textContent = "Chọn tất";
            }
        }

        if(e.target.className == "soLuongMuonMua") {
            let soLuongMuonMuaElement = e.target;
            let soLuongTrongKhoElement = soLuongMuonMuaElement.parentElement.querySelector(".soLuongTrongKho");
            let giaSanPhamElement = soLuongMuonMuaElement.parentElement.parentElement.querySelector(".giaSanPham");
            let tongSanPhamElement = soLuongMuonMuaElement.parentElement.parentElement.querySelector('.tongSanPham');

            let soLuongTrongKho = parseInt(soLuongTrongKhoElement.textContent);
            let soLuongMuonMua = parseInt(soLuongMuonMuaElement.value);
            let giaSanPham = parseInt(giaSanPhamElement.textContent);

            if(soLuongMuonMuaElement.value == "") {
                error.textContent = "Số lượng không được để trống";
                error.style.display = "block";
                soLuongMuonMuaElement.style.borderColor = "red";
                soLuongMuonMuaElement.style.outline = "none";
                tongSanPhamElement.textContent = 0;
                isError = true;
            }
            else {
                if(soLuongMuonMua <= 0) {
                    error.textContent = "Số lượng phải là số dương";
                    error.style.display = "block";
                    soLuongMuonMuaElement.style.borderColor = "red";
                    soLuongMuonMuaElement.style.outline = "none";
                    tongSanPhamElement.textContent = 0;
                    isError = true;
                }
                else {
                    if(soLuongMuonMua > parseInt(soLuongTrongKho)) {
                        error.textContent = "Vui lòng nhập số lượng nhỏ hơn số lượng trong kho";
                        error.style.display = "block";
                        soLuongMuonMuaElement.style.borderColor = "red";
                        soLuongMuonMuaElement.style.outline = "none";
                        tongSanPhamElement.textContent = 0;
                        isError = true;
                    }
                    else {
                        isError = false;
                        error.style.display = "none";
                        soLuongMuonMuaElement.style.borderColor = "";
                        soLuongMuonMuaElement.style.outline = "";
                        tongSanPhamElement.textContent = soLuongMuonMua*giaSanPham;
                    }
                }
            }
        }

        let sumProductChecked = 0;
        let sumCart = 0;
        checkedsElement.forEach((element) => {
            let sumProduct = element.parentElement.parentElement.querySelector(".tongSanPham");
            if(element.checked) {
                sumProductChecked += parseInt(sumProduct.textContent);
            }
            sumCart += parseInt(sumProduct.textContent);
        })

        tongCacSanPhamDaChon.textContent = sumProductChecked;
        tongGioHang.textContent = sumCart;
    })

    chonTatBtn.addEventListener("click", () => {
        const listTongSanPham = document.querySelectorAll(".tongSanPham");
        let count = 0

        checkedsElement.forEach((element) => {
            if(element.checked) {
                count++;
            }
        })

        if(count == checkedsElement.length) {
            chonTatBtn.textContent = "Chọn tất";
            tongCacSanPhamDaChon.textContent = 0

            checkedsElement.forEach((element) => {
                element.checked = false;
            })
        }
        else {
            chonTatBtn.textContent = "Bỏ chọn tất";
            
            tongCacSanPhamDaChon.textContent = tongGioHang.textContent

            checkedsElement.forEach((element) => {
                element.checked = true;
            })
        }

    })

    btnCheckout.addEventListener("click", (e) => {
        if(isError) {
            e.preventDefault();
        }
    })
</script>