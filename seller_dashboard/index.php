<?php
session_start();
if (!isset($_SESSION['login'] )|| !isset($_SESSION['seller'])) {
	header('location:../logout.php');
}
include "../db.php";
$site_row=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM `site`"));
$login_sno = $_SESSION['login']['sno'];
$UserDetails = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM `users` WHERE `sno` ='$login_sno'"));

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?php echo $site_row['title'];?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<link rel="icon" href="../site/<?php echo $site_row['favicon'];?>" type="image/x-icon"/>
	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/atlantis.css">
	<link rel="stylesheet" href="assets/css/demo.css">
	<script src="assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="backscript.js" type="text/javascript"></script>
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" style="background-color:#153438">
				
				<a href="index.php" class="logo">
					<img src="../site/<?php echo $site_row['navlogo'];?>" alt="navbar brand" class="navbar-brand" width="130" >
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
					<i class="fas fa-bars text-white"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
					</button>
				</div>
			</div>
			<!-- End Logo Header -->
			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" style="background-color:#153438">
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link quick-sidebar-toggler">
								<i class="fa fa-th"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="../site/<?php echo $site_row['favicon'];?>" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="../site/<?php echo $site_row['favicon'];?>" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4><?PHP echo $UserDetails['fname']." ".$UserDetails['mname']." ".$UserDetails['lname'];?></h4>
												<p class="text-muted"><?PHP echo $UserDetails['email'];?></p><a href="#" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">My Profile</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="../logout.php">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>
		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="../site/<?php echo $site_row['favicon'];?>" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?PHP echo $UserDetails['fname']." ".$UserDetails['mname']." ".$UserDetails['lname'];?>
									<span class="user-level"><?php echo $UserDetails['email'];?></span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="../logout.php">
											<span class="link-collapse">Logout</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						
						<li class="nav-item ">
							<a data-toggle="collapse" href="#" onclick="AjaxAddProductPageCall()" class="collapsed" aria-expanded="false">
							<i class="fas fa-cart-plus"></i>
								<p>Add Products</p>
							</a>
							
						</li>
						<li class="nav-item ">
							<a data-toggle="collapse" href="#" onclick="AjaxAddCategoryPageCall()" class="collapsed" aria-expanded="false">
							<i class="fas fa-plus"></i>
								<p>Add Category</p>
							</a>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#" onclick="AjaxMyProductPageCall()" class="collapsed" aria-expanded="false">
							<i class="fab fa-product-hunt"></i>
								<p>My Products</p>
							</a>
							
						</li>
						
					</ul>
				</div>
			</div>
		</div>
		<div class="main-panel">
			<div class="container">
				<div class="page-inner">
					<div class="row AjaxContentDisplay">
						
					</div>
				</div>
			</div>

			<footer class="footer" style="background-color:#153438">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link  text-white" href="#">
									Help
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link  text-white" href="#">
								<?php echo $site_row['title'];?>
								</a>
							</li>
						</ul>
					</nav>
					<div class="copyright ml-auto text-white">
						Made with <i class="fa fa-heart heart text-danger"></i> by <a href="#" class="text-white"><?php echo $site_row['title'];?></a>
					</div>				
				</div>
			</footer>
		</div>
	</div>

	<!--   Core JS Files   -->
	<script src="assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="assets/js/core/popper.min.js"></script>
	<script src="assets/js/core/bootstrap.min.js"></script>
	<!-- jQuery UI -->
	<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	<!-- Bootstrap Toggle -->
	<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
	<!-- jQuery Scrollbar -->
	<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Atlantis JS -->
	<script src="assets/js/atlantis.min.js"></script>
	
</body>
</html>