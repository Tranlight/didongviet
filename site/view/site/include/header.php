<!DOCTYPE html>
<html>
<head>
	<title>Thế giới điện thoại</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href=<?= asset('/css/bootstrap.css')?>>
	<link rel="stylesheet" type="text/css" href=<?=asset('/css/owl.carousel.css')?>>
	<link rel="stylesheet" type="text/css" href=<?=asset('/css/owl.theme.default.css')?>>
	<link rel="stylesheet" type="text/css" href=<?=asset('/css/owl.theme.default.css')?>>
	<link rel="stylesheet" type="text/css" href=<?=asset('/css/style.css')?>>
	<!-- link cdn -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
	<!-- font-awesome -->
	<link rel="stylesheet" type="text/css" href=<?=asset('/css/font-awesome/css/fontawesome.css')?>>
	<link rel="stylesheet" type="text/css" href=<?=asset('/css/font-awesome/css/brands.css')?>>
	<link rel="stylesheet" type="text/css" href=<?=asset('/css/font-awesome/css/solid.css')?>>
	<link rel="stylesheet" type="text/css" href=<?=asset('/css/font-awesome/css/light.css')?>>
	<!-- script -->
	<script src=<?=asset('/js/jquery-3.4.1.js')?>></script>
	<script src=<?=asset('/js/bootstrap.js')?>></script>
	<script src=<?=asset('/js/owl.carousel.js')?>></script>
	<!-- <script src="https://kit.fontawesome.com/f9f78b3b0a.js" crossorigin="anonymous"></script> -->
</head>
<body>
	<!-- Banner Section -->
	<div class="container-fluid">
		<div class="banner">
			<span class="navigation"></span>
			<!-- logo section -->
			<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 logo">
				<a class="" href="/">
					<img src=<?=asset('/image/logo.png')?> alt="placeholder+image">
				</a>
			</div>
			<div class=" col-xs-12 col-sm-5 col-md-5 col-lg-5">
				<span class="input-group search">
					<input type="text" class="form-control" placeholder="Nhập thứ gì bạn muốn tìm?">
					<div class="input-group-btn">
						<button class="btn btn-default" type="submit">
							<i class="fal fa-search"></i>
						</button>
					</div>
				</span>
			</div>
		</div>
		<div class="right-banner">
			<div>
				<button>Đăng nhập <i class="fal fa-sign-in-alt"></i></button>
				<button>Đăng ký <i class="fal fa-user"></i></button>
				<button class="cart-btn btn-primary"> 
					<i class="fal fa-shopping-cart"></i>
					<span>Giỏ hàng</span>
					<span class="badge">0</span>
				</button>
			</div>
		</div>
	</div>
	<!-- Menu section -->
	<div class="container-fluid">
		<nav class="navbar navbar-default main-menu">
			<div class="container-fluid">
				<div class="category">
					<div class="col-sm-3">
						<a href="">Danh mục sản phẩm</a>
					</div>
				</div>
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">TRANG CHỦ</a></li>
					<li class=""><a  href="#">APPLE</a></li>
					<li class=""><a  href="#">SAMSUNG</a></li>
					<li class=""><a  href="#">NOKIA</a></li>
				</ul>
				<div class="nav navbar-nav navbar-right">
					<a href="tel:0981362931">
						<span class="fal fa-user-headset"></span>
						<span class="contact-info-title">
			 				<span class="contact-info-subtitle">Chăm sóc khách hàng</span>
			 				0981 362 931
			 			</span>
					</a>
				</div>
			</div>
		</nav>
	</div>
	