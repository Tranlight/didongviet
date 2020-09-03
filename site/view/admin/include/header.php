<!doctype html>
<html lang="en">

<head>
	<title>Di Động Việt Com | <?php echo isset($title) ? $title : ''; ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href=<?php echo asset('/vendor/bootstrap/css/bootstrap.min.css') ?>>
	<!-- FONT AWESOME -->
	<link rel="stylesheet" type="text/css" href=<?=asset('/css/font-awesome/css/fontawesome.css')?>>
	<link rel="stylesheet" type="text/css" href=<?=asset('/css/font-awesome/css/brands.css')?>>
	<link rel="stylesheet" type="text/css" href=<?=asset('/css/font-awesome/css/solid.css')?>>
	<link rel="stylesheet" type="text/css" href=<?=asset('/css/font-awesome/css/light.css')?>>
	<!-- LINEAR -->
	<link rel="stylesheet" href=<?php echo asset('/vendor/linearicons/style.css') ?>>
	
	<!-- MAIN CSS -->
	<link rel="stylesheet" href=<?php echo asset('/css/main.css') ?>>
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href=<?php echo asset('/img/apple-icon.png') ?>>
	<link rel="icon" type="image/png" sizes="96x96" href=<?php echo asset('/img/favicon.png') ?>>
	<script src=<?php echo asset('/vendor/jquery/jquery.min.js') ?>></script>
	<script src=<?php echo asset('/vendor/bootstrap/js/bootstrap.min.js') ?>></script>
	<script src=<?php echo asset('/js/script.js') ?>></script>
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.html"><img src=<?php echo asset('/img/logo-dark.png'); ?> alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<form class="navbar-form navbar-left">
					<div class="input-group">
						<input type="text" value="" class="form-control" placeholder="Search dashboard...">
						<span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
					</div>
				</form>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
								<i class="lnr lnr-alarm"></i>
								<span class="badge bg-danger">5</span>
							</a>
							<ul class="dropdown-menu notifications">
								<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is almost full</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9 unfinished tasks</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly report is available</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>
								<li><a href="#" class="more">See all notifications</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#">Basic Use</a></li>
								<li><a href="#">Working With Data</a></li>
								<li><a href="#">Security</a></li>
								<li><a href="#">Troubleshooting</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src=<?php echo asset('/img/user.png'); ?> class="img-circle" alt="Avatar"> <span>Samuel</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
								<li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
								<li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
								<li><a href="#"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="/admin/dashboard" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li><a href="/admin/products" class=""><i class="fas fa-biking"></i> <span>Product</span></a></li>
						<li><a href="/admin/page-profile" class="active"><i class="lnr lnr-home"></i> <span>Page Profile</span></a></li>
						<li><a href="/admin/elements" class=""><i class="lnr lnr-code"></i> <span>Elements</span></a></li>
						<li><a href="/admin/charts" class=""><i class="lnr lnr-chart-bars"></i> <span>Charts</span></a></li>
						<li><a href="/admin/panels" class=""><i class="lnr lnr-cog"></i> <span>Panels</span></a></li>
						<li><a href="/admin/notifications" class=""><i class="lnr lnr-alarm"></i> <span>Notifications</span></a></li>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Pages</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="page-profile.html" class="">Profile</a></li>
									<li><a href="page-login.html" class="">Login</a></li>
									<li><a href="page-lockscreen.html" class="">Lockscreen</a></li>
								</ul>
							</div>
						</li>
						<li><a href="/admin/tables" class=""><i class="lnr lnr-dice"></i> <span>Tables</span></a></li>
						<li><a href="/admin/typography" class=""><i class="lnr lnr-text-format"></i> <span>Typography</span></a></li>
						<li><a href="/admin/icons" class=""><i class="lnr lnr-linearicons"></i> <span>Icons</span></a></li>
					</ul>
				</nav>
			</div>
		</div>