<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from max-themes.net/demos/sweetpick/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Mar 2024 07:53:54 GMT -->
<head>
<script>

</script>

	<title>SweetPick</title>

	<meta charset="utf-8">

	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link href='<?php echo CLIENT_URL ?>fonts.googleapis.com/css8e21.css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<link href='<?php echo CLIENT_URL ?>fonts.googleapis.com/css1aac.css?family=Raleway:400,300,500,600,800,900,200,100' rel='stylesheet' type='text/css'>
	<link href='<?php echo CLIENT_URL ?>fonts.googleapis.com/css0513.css?family=Noticia+Text:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href='<?php echo CLIENT_URL ?>fonts.googleapis.com/css32b5.css?family=Raleway:500,600,700,400,200,300' rel='stylesheet' type='text/css'>
	<link href='<?php echo CLIENT_URL ?>fonts.googleapis.com/cssa9a5.css?family=Playfair+Display:400,700,900,400italic,700italic,900italic' rel='stylesheet' type='text/css'>


	<link rel="stylesheet" type="text/css" href="<?php echo CLIENT_URL ?>max-themes.net/demos/sweetpick/css/bootstrap.css" media="screen">	

    <!-- REVOLUTION BANNER CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="<?php echo CLIENT_URL ?>max-themes.net/demos/sweetpick/css/fullwidth.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?php echo CLIENT_URL ?>max-themes.net/demos/sweetpick/css/settings.css" media="screen" />

	<link rel="stylesheet" type="text/css" href="<?php echo CLIENT_URL ?>max-themes.net/demos/sweetpick/css/font-awesome.css" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo CLIENT_URL ?>max-themes.net/demos/sweetpick/css/jquery.bxslider.css" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo CLIENT_URL ?>max-themes.net/demos/sweetpick/css/style.css" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo CLIENT_URL ?>max-themes.net/demos/sweetpick/css/responsive.css" media="screen">

	<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL ?>/icons/font-awesome/css/fontawesome-all.css">
	
	<link rel="shortcut icon" href="<?php echo IMAGES_URL ?>favicon.png" type="image/x-icon">
	<link rel="icon" href="<?php echo IMAGES_URL ?>favicon.png" type="image/x-icon">

	<!-- Style Switch -->
	
	<link rel="stylesheet" type="text/css" href="<?php echo CLIENT_URL ?>max-themes.net/demos/sweetpick/css/colors/red-black.css" title="red" media="screen" />

</head>
<body>


<!-- Preloader -->
<!-- <div id="preloader">
    <div id="status">&nbsp;</div>
</div> -->

	<!-- Container -->
	<div id="container">
		<!-- Header
		    ================================================== -->
		<header class="clearfix">

			<div class="top-line">
				<div class="container">
					<div class="left-line">
						<ul class="lang clearfix">
							<li><span>Language: </span> <a href="#">VN <i class="fa fa-angle-down"></i></a>
								<ul class="drop-down2">
									<li><a href="#">ENG</a></li>
								</ul>
							</li>
						</ul>
						<ul class="curr clearfix">
							<li><span>Currency: </span><a href="#">VND <i class="fa fa-angle-down"></i></a>
								<ul class="drop-down2">
									<li><a href="#">USD</a></li>
								</ul>
							</li>
						</ul>

						<div class="mobile-a">
							<a href="#login-box" class="login-window"><i class="fa fa-user"></i></a>
							<a href="#"><i class="fa fa-heart"></i></a>
						</div>
					</div>
					<div class="right-line clearfix">
						<ul>

							<?php if(isset($_SESSION["user"])) { ?>
								<li>
									<a href="#!">Chào, <?php echo $_SESSION["user"]["email"]?></a>
									
								</li>
								<?php if($_SESSION["user"]["quyen"] == 1) : ?>
									<li>
										<a href="?url=admin">Quản trị</a>
									</li>
								<?php endif?>
								<li>
									<a href="?url=taikhoan">Tài khoản</a>
								</li>
							<?php } else { ?>
								<li>
									<a href="?url=dangnhap" class="login-window">Đăng nhập</a>
								</li>
							<?php } ?>

						</ul>
          
						<div class="mobile-version">
							<div class="cart-icon">
								<a href="#"><img src="<?php echo IMAGES_URL ?>cart-white.png" alt="">
								<span>8 Items</span></a>
							</div>
						</div>

					</div>
					<div class="clear"></div>
				</div>
			</div>
			<!-- end topline -->

			<div class="upper-header">
				<div class="container">

					<div class="search-input">
						<form action="#">
							<input type="text" placeholder="Tìm kiếm...">
							<input type="submit" value="">
						</form>
					</div>

					<div class="logo">
						<a href="?url=/"><img src="<?php echo IMAGES_URL ?>logo.png" alt=""></a>
					</div>
					<?php if(isset($_SESSION["user"])) : ?>
						<?php
							$maNguoiDung = $_SESSION["user"]["ma_nguoi_dung"];
							$gioHang = getGioHangByIdUser($maNguoiDung);
							$maGioHang = $gioHang["ma_gio_hang"];
							$sumCart = 0;
							$params = getAllParam($_GET);

							$productsInCart = getAllProductInCart($maGioHang);
							// debug($productsInCart);
							$sumProductInCart = getSumProductInCart($maGioHang);
						?>
						<div class="cart">
							<a href="?url=giohang" class="cartmain">GIỎ HÀNG</a>
							<div class="card-icon">
								<img src="<?php echo IMAGES_URL ?>cart.png" alt="">
								<div class="shop-items"><?php echo $sumProductInCart["tong"] ?></div>
							</div>
							<div class="hover-cart" style="min-width: 340px;">
								<div style="max-height: 300px; overflow: auto;">
									<?php foreach($productsInCart as $productInCart) : ?>
										<?php if($productInCart["so_luong"] == NULL) : ?>
											<?php
												$kichThuoc = getKichThuocID($productInCart["ma_kich_thuoc"]);
												$mauSac = getMauSacID($productInCart["ma_mau_sac"]);
												$sumCart += ($productInCart["gia"] + $productInCart["gia_bien_dong"])*$productInCart["so_luong_muon_mua"];
											?>
											<div class="hover-box">
												<a href="?url=chitietsanpham&maSanPham=<?= $productInCart['ma_san_pham'] ?>">
													<img
														src="<?php echo IMAGES_URL . $productInCart["anh_chi_tiet"] ?>"
														alt=""
														class="left-hover"
													>
												</a>
												<div class="hover-details">
													<p
														style="
															display: -webkit-box;
															-webkit-box-orient: vertical;
															overflow: hidden;
															-webkit-line-clamp: 2;
														"
													>
														<?php echo $productInCart["ten_san_pham"] ?>
													</p>
													<p
														style="
															font-family: 'Merriweather';
															font-size: 13px;
															font-style: italic;
															color: #9b9b9b;
															"
													>
														Size: <?php echo $kichThuoc["ten_kich_thuoc"] ?> , <?php echo $mauSac["ten_mau"] ?>
													</p>
													<span><?php echo $productInCart["gia"] + $productInCart["gia_bien_dong"] ?> VNĐ</span>
													<div class="quantity">Số lượng: <?php echo $productInCart["so_luong_muon_mua"] ?></div>
												</div>
												<a
													href="?url=xoasanphamgiohang&maChiTietSanPham=<?php echo $productInCart["ma_chi_tiet_san_pham"] ?>&view=<?php echo $params ?>"
													class="right-hover"
													onclick="return confirm('Bạn có muốn xóa sản phẩm này khỏi giỏ hàng không ?')"
												>
													<img src="<?php echo IMAGES_URL ?>/delete.png" alt="">
												</a>
				
												<div class="clear"></div>
											</div>
										<?php else : ?>
											<?php $sumCart += $productInCart["gia"]*$productInCart["so_luong_muon_mua"]; ?>
											<div class="hover-box">
												<a href="?url=chitietsanpham&maSanPham=<?= $productInCart['ma_san_pham'] ?>">
													<img
														src="<?php echo IMAGES_URL . $productInCart["anh"] ?>"
														alt=""
														class="left-hover"
													>
												</a>
												<div class="hover-details">
													<p
														style="
															display: -webkit-box;
															-webkit-box-orient: vertical;
															overflow: hidden;
															-webkit-line-clamp: 2;
														"
													>
														<?php echo $productInCart["ten_san_pham"] ?>
													</p>
													<span><?php echo $productInCart["gia"] ?> VNĐ</span>
													<div class="quantity">Số lượng: <?php echo $productInCart["so_luong_muon_mua"] ?></div>
												</div>
												
												<a
													href="?url=xoasanphamgiohang&maChiTietSanPham=<?php echo $productInCart["ma_chi_tiet_san_pham"] ?>&view=<?php echo $params ?>"
													class="right-hover"
													onclick="return confirm('Bạn có muốn xóa sản phẩm này khỏi giỏ hàng không ?')"
												>
													<img src="<?php echo IMAGES_URL ?>/delete.png" alt="">
												</a>
				
												<div class="clear"></div>
											</div>
										<?php endif ?>
									<?php endforeach ?>
									<?php if(!$productsInCart) : ?>
										<div style="text-align: center;">
											<img style="width: 100px;" src="<?php echo IMAGES_URL ?>no-product.png" alt="">
										</div>
										<div class="hover-box">
											<h6 style="text-align: center; line-height: 22px;">
												Không có sản phẩm nào
											</h6>
										</div>
									<?php endif ?>
								</div>
								<?php if($sumCart !== 0) : ?>
									<div class="subtotal mt15">
										Tổng tiền: <span><?php echo $sumCart ?> VNĐ</span>
									</div>
								<?php endif ?>

								<a class="viewcard" href="?url=giohang"> Xem giỏ hàng</a>

							</div>
						</div>
					<?php else : ?>
						<div class="cart">
							<a href="#!" class="cartmain">GIỎ HÀNG</a>
							<div class="card-icon">
								<img src="<?php echo IMAGES_URL ?>cart.png" alt="">
								<div class="shop-items">0</div>
							</div>
							<div class="hover-cart">
								<div class="hover-box">
									<h6 style="text-align: center; line-height: 22px;">
										Bạn cần <a href="?url=dangnhap">đăng nhập</a> để sử dụng tính năng này
									</h6>
								</div>
							</div>
						</div>
					<?php endif ?>

					<div class="clear"></div>

				</div>
				<!-- End container -->	
			</div>
			<!-- End Upper-header -->	
			
			<div class="nav-border"></div>
			<div class="container">
				<!-- Navigation -->
				<nav id="nav">
					<ul id="navlist" class="sf-menu clearfix ">
						<li class="current" ><a href="?url=/">Trang chủ</a></li>
						<li  > <a href="?url=loc&ma_loai=1">Nam</a></li>
						<li> <a href="?url=loc&ma_loai=2">Nữ</a></li>
						<!-- <li><a href="#">Blog</a>
							<ul class="sub-menu">
								<li><a href="blog.html"><span>--</span>Blog</a></li>
								<li><a href="blog-single.html"><span>--</span>Blog Single</a></li>
							</ul>
						</li> -->
					</ul>
				</nav>
		    	<!-- Navigation -->
			</div>
		

		</header>
		<!-- End Header -->