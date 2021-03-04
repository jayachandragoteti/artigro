<?php
include "db.php";
session_start();
$site_row=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM `site`"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120909275-1" type="f0492d586e82fc31f3a86f28-text/javascript"></script>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="description">
<meta name="keywords" content="">
<meta name="author" content="">
<title><?php echo $site_row['title'];?></title>
<link rel="apple-touch-icon" sizes="76x76" href="site/<?php echo $site_row['favicon'];?>">
<link rel="icon" type="image/png" href="site/<?php echo $site_row['favicon'];?>">
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="backscript.js" type="text/javascript"></script>
<!-- Scrollbar Custom CSS -->
<link rel="stylesheet" href="assets/css/my_style.css">
<link rel="stylesheet" href="assets/css/jquery.mCustomScrollbar.min.css">
<!-- /Scrollbar Custom CSS -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/animate.css" rel="stylesheet">
<link href="assets/css/mobile.css" rel="stylesheet">
<link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/icofont.css" rel="stylesheet" type="text/css">
<!--<link rel="stylesheet" href="assets/plugins/owl-carousel/owl.carousel.css">
<link rel="stylesheet" href="assets/plugins/owl-carousel/owl.theme.css">-->
<style>

</style>
</head>
<body class="">
<!--===============================================================-->
<!--===============================================================-->
<div class="modal fade login-modal-main " id="bd-example-modal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="login-modal">
          <div class="row">
            <div class="col-lg-6 pad-right-0">
              <div class="login-modal-left">
              </div>
            </div>
            <div class="col-lg-6 pad-left-0">
              <button type="button" class="close close-top-right" data-dismiss="modal" aria-label="Close" >
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
            <div class="login-modal-right">
              <div class="tab-content">
                <div class="tab-pane active" id="login" role="tabpanel">
                  <h5 class="heading-design-h5">Login to your account</h5>
                  <form>
                    <fieldset class="form-group">
                      <label for="username">Enter Email/Mobile number</label>
                      <input type="text" class="form-control" id="username" name="username"placeholder="+91 123 456 7890">
                    </fieldset>
                    <fieldset class="form-group">
                      <label for="passkey">Enter Password</label>
                      <input type="password" class="form-control" name="passkey" id="passkey" placeholder="********">
                    </fieldset>
                    <p>
                        <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                          <input type="checkbox" class="custom-control-input">
                          <span class="custom-control-indicator"></span>
                          <span class="custom-control-description">Remember me </span>
                          <a href="#" class="custom-control-description pull-right ml-lg-5"onclick="show_Forgot_Password_Form()"><i class="fas fa-user-lock"></i> Forgot Password</a>
                        </label>
                      </p>
                    <fieldset class="form-group">
                        <span class=" custom-control-description Login-alerts"></span>
                    </fieldset>
                    <fieldset class="form-group">
                      <input type="button" class="btn btn-lg btn-theme-round btn-block" onclick="UserLogin()"value="Login"/>
                    </fieldset>
                    <p>
                      <h5 class="text-danger Login_Errors"></h5>
                    </p>
                  </form>
                  <form id="Forgot_Password_Form" method="post" role="form" style="display:none;">
                    <fieldset class="form-group">
                      <label for="Forgot_Email_Mobile">Enter Email/Mobile number</label>
                      <input type="text" class="form-control" name="Forgot_Email_Mobile" id="Forgot_Email_Mobile" placeholder="username">
                    </fieldset>
                    <p>
                    <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                      <input type="checkbox" class="custom-control-input">
                      <span class="custom-control-indicator"></span>
                      <span class="custom-control-description">Remember me </span>
                    </label>
                  </p>
                    <h5 class="text-danger ajax_Forgot_Password_responce"></h5>
                    <fieldset class="form-group"><br>
                      <button type="button" class="btn btn-lg btn-theme-round btn-block" onclick="Forgot_Password()">Enter</button>
                    </fieldset>
                  </form>   
                  <div class="login-with-sites text-center">
                    <p>or Login with your social profile:</p>
                    <button class="btn-facebook login-icons btn-lg"><i class="fa fa-facebook"></i> Facebook</button>
                    <button class="btn-google login-icons btn-lg"><i class="fa fa-google"></i> Google</button>
                    <button class="btn-twitter login-icons btn-lg"><i class="fa fa-twitter"></i> Twitter</button>
                  </div>
                </div>
                <!--===============================================================-->
                <div class="tab-pane" id="register" role="tabpanel">
                  <h5 class="heading-design-h5">Register Now!</h5>
                  <form>
                    <fieldset class="form-group">
                      <label for="fregister_username">Enter Email/Mobile number</label>
                      <input type="text" class="form-control" name="register_username"id="register_username" placeholder="+91 123 456 7890">
                    </fieldset>
                    <fieldset class="form-group">
                      <label for="register_passkey">Enter Password</label>
                      <input type="password" class="form-control" name="register_passkey" id="register_passkey" placeholder="********">
                    </fieldset>
                    <fieldset class="form-group">
                      <label for="register_confirm_passkey">Enter Confirm Password </label>
                      <input type="password" class="form-control" name="register_confirm_passkey" id="register_confirm_passkey" placeholder="********">
                    </fieldset>
                    <p>
                    <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                      <input type="checkbox" class="custom-control-input" name="TermAndConditionscheckbox" id="TermAndConditionscheckbox">
                      <span class="custom-control-indicator"></span>
                      <span class="custom-control-description">I Agree with Term and Conditions </span>
                    </label>
                    </p>
                    <fieldset class="form-group">
                        <span class=" custom-control-description registration-alerts"></span>
                    </fieldset>
                    <fieldset class="form-group"><br>
                      <input type="button" class="btn btn-lg btn-theme-round btn-block" onclick="UserRegistration()"value="Create Your Account"/>
                    </fieldset>
                  </form>
                  
                </div>
              </div>
              <div class="clearfix"></div>
                <div class="text-center login-footer-tab">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#login" role="tab"><i class="icofont icofont-lock"></i> LOGIN</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#register" role="tab"><i class="icofont icofont-pencil-alt-5"></i> REGISTER</a>
                    </li>
                  </ul>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--===============================================================-->
<nav class="navbar navbar-light navbar-expand-lg bg-faded  osahan-menu-top-5 main-bg-color ">
  <div class="container">
    <!-- side togle-->
    <button class="navbar-toggler" type="button" id="sidebarCollapse" >
          <i class="fa fa-bars text-white" aria-hidden="true" ></i>
      </button>
    <!-- end side togle-->
    <a class="navbar-brand border  rounded-circle user-logo " href="index.php" style="disply:none;">
      <img src="site/user.png" class="rounded-circle" alt="site/<?php echo $site_row['title'];?>" width="35" height="35" >
    </a>
    <a class="navbar-brand nav-logo" href="index.php">
      <img src="site/<?php echo $site_row['navlogo'];?>" alt="site/<?php echo $site_row['title'];?>" width="100">
    </a>

    <!--===============================================================-->
    <div class="navbar-collapse side_nav_dismiss" id="navbarNavDropdown">
      <div class="navbar-nav mr-auto mt-2 mt-lg-0 margin-auto top-categories-search-main">
        <div class="top-categories-search btn-radius">
          <div class="input-group">
            <span class="input-group-btn categories-dropdown" >
              <div class="dropdown">
                <button class="form-control" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  categories
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <?PHP $selectcategoryquery="SELECT * FROM `categories`";
                      $selectcategorysql=mysqli_query($connect,$selectcategoryquery);
                      while($categories_row=mysqli_fetch_array($selectcategorysql)){ ?>
                          <a class="dropdown-item" href="#">
                              <input type="radio" name="categories" class="common_filer_selector categories" value="<?PHP echo $categories_row['cat_sno'] ?>" id="categoriesCheck<?PHP echo $categories_row['cat_sno'] ?>" onclick="filter_category_cards()" style="display:none;"> 
                              <label  for="categoriesCheck<?PHP echo $categories_row['cat_sno'] ?>" style="cursor: pointer;"><i class="fas fa-city"></i> <?PHP echo $categories_row['cat_name'] ?></label>
                          </a>
                      <?PHP } ?>
                </div>
              </div>
            </span>
            <input class="form-control" placeholder="Search products & brands" id="search_text" aria-label="Search products & brands" type="text">
            <span class="input-group-btn">
              <button class="btn bg-warning btn-radius" type="button" onclick="filter_category_cards()" ><i class="icofont icofont-search-alt-2"></i> Search</button>
            </span>
          </div>
        </div>
      </div>
      <!--===============================================================-->
      <div class="my-2 my-lg-0">
        <ul class="list-inline main-nav-right">
          <?PHP  if(!isset($_SESSION['login'])){ ?>
          <li class="list-inline-item">
            <a class="btn  btn-radius text-white border-warning" data-toggle="modal" data-target="#bd-example-modal" href="#"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign-In</a>
          </li>
          <?PHP } else{ ?>
          <li class="list-inline-item">
            <a class="btn  btn-radius text-white border-warning"href="#" onclick="MyCartPageCall()"><i class="icofont icofont-shopping-cart"></i>&nbsp Cart &nbsp</a>
          </li>
          <li class="list-inline-item">
            <a class="btn  btn-radius text-white border-warning"href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign-Out</a>
          </li>
          <?PHP } ?>
        </ul>
      </div>
    </div>
  </div>
</nav>
<!--===============================================================-->
<nav class="navbar navbar-expand-lg navbar-light  osahan-menu osahan-menu-5 pad-none-mobile ">
  <div class="container ">
    <div class="collapse navbar-collapse " id="navbarText">
      <ul class="navbar-nav mr-auto margin-auto">
        <li class="active Home">
          <a href="#" class="nav-link" onclick="AjaxIndexPageCall()">Home</a>
        </li>
        <li class="nav-item Categories">
          <a class="nav-link" href="#" onclick="CategoriesPageCall()">Categories</a>
        </li>
        <li class="nav-item Cities">
          <a class="nav-link" href="#"onclick="CitiesPageCall()">Cities</a>
        </li>
        <li class="nav-item Sellers ">
          <a class="nav-link" href="#"onclick="SellersPageCall()" >Sellers</a>
        </li>
        <?PHP  if(isset($_SESSION['login'])){ ?>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" type="button" id="MyAccountDropdownMenu" data-toggle="dropdown" aria-haspopup="true" >
              My Account &nbsp<i class="fa fa-caret-down" aria-hidden="true"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="MyAccountDropdownMenu">
              <a class="dropdown-item MyWhishlist" href="#" onclick="MyWhishlistPageCall()"> My Whishlist</a>
              <a class="dropdown-item MyCart" href="#" onclick="MyCartPageCall()"> My Cart</a>
              <a class="dropdown-item MyOrders" href="#" onclick="MyOrdersPageCall()"> My Orders</a>
              <?PHP  if(!isset($_SESSION['seller']) && !isset($_SESSION['cs'])){ ?>
                <a class="dropdown-item MyProfile" href="#" onclick="MyProfilePageCall()"> My Profile</a>
              <?PHP }?>
            </div>
          </li>
          <?PHP  if(!isset($_SESSION['seller'])){ ?>
            <li class="nav-item ActAsSeller">
              <a class="nav-link" href="#" onclick="AjaxSellerRegistrationPageCall()">Act As Seller</a>
            </li>
          <?PHP }else{ ?>
          <li class="nav-item dropdown Dashboard">
            <a class="nav-link" href="#" type="button" id="MyAccountDropdownMenu" data-toggle="dropdown" aria-haspopup="true" >
              Dashboard &nbsp<i class="fa fa-caret-down" aria-hidden="true"></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="MyAccountDropdownMenu">
              <a class="dropdown-item MyWhishlist" href="#" onclick="AjaxAddProductPageCall()">Add Products</a>
              <a class="dropdown-item MyCart" href="#" onclick="AjaxAddCategoryPageCall()">Add Category</a>
              <a class="dropdown-item MyOrders" href="#" onclick="AjaxMyProductsPageCall()">My Products</a>
            </div>
          </li>
        <?PHP } 
        if (!isset($_SESSION['cs'])){?>
          <li class="nav-item ActAsCourierServices" >
            <a class="nav-link" href="#" onclick="AjaxCourierServicesRegistrationPageCall()">Act As Courier Services</a>
          </li>
        <?PHP }else{ ?>
          <li class="nav-item Dashboard">
            <a class="nav-link" href="#">Dashboard</a>
          </li>
        <?PHP } }?>
      </ul>
    </div>
  </div>
</nav>
<!-- Side navbar -->
<!--========================================================-->
<div class="wrapper">
  <nav id="sidebar">
    <div id="dismiss" class="side_nav_dismiss">
      <i class="fa fa-times" aria-hidden="true"></i>
    </div>
    <div class="sidebar-header">
      <img src="site/<?php echo $site_row['navlogo'];?>" alt="site/<?php echo $site_row['title'];?>" width="100" >
    </div>
    <ul class="list-unstyled components ">
      <li class=" nav-list border-warning border-bottom active Home ">
          <a href="#" class="nav-link side_nav_dismiss" onclick="AjaxIndexPageCall()">Home</a>
        </li>
        <li class="nav-list border-warning border-bottom Categories">
          <a class="nav-link side_nav_dismiss" href="#" onclick="CategoriesPageCall()">Categories</a>
        </li>
        <li class="nav-list border-warning border-bottom Cities">
          <a class="nav-link side_nav_dismiss" href="#"onclick="CitiesPageCall()">Cities</a>
        </li>
        <li class="nav-list border-warning border-bottom Sellers">
          <a class="nav-link side_nav_dismiss" href="#"onclick="SellersPageCall()" >Sellers</a>
        </li> 
      <?PHP  if(isset($_SESSION['login'])){ ?>
          <li class="nav-list border-warning border-bottom MyWhishlist">
              <a class="nav-link side_nav_dismiss" href="#" onclick="MyWhishlistPageCall()">My Whishlist</a>
            </li>
            <li class="nav-list border-warning border-bottom MyCart">
              <a class="nav-link side_nav_dismiss" href="#" onclick="MyCartPageCall()">My Cart</a>
            </li>
            <li class="nav-list border-warning border-bottom MyOrders">
              <a class="nav-link side_nav_dismiss" href="#" onclick="MyOrdersPageCall()">My Orders</a>
            </li>
            <?PHP  if(!isset($_SESSION['seller']) && !isset($_SESSION['cs'])){ ?>
              <li class="nav-list border-warning border-bottom MyProfile">
                <a class="nav-link side_nav_dismiss" href="#" onclick="MyProfilePageCall()">My Profile</a>
              </li>
              <?PHP }?>
          <?PHP  if(!isset($_SESSION['seller'])){ ?>
            <li class="nav-list border-warning border-bottom ActAsSeller">
              <a class="nav-link side_nav_dismiss" href="#" onclick="AjaxSellerRegistrationPageCall()">Act As Seller</a>
            </li>
          <?PHP }else{ ?>
            <li  class="nav-list border-warning border-bottom ActAsSeller Dashboard">
              <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Dashboard &nbsp<i class="fa fa-caret-down" aria-hidden="true"></i></a>
              <ul class="collapse list-unstyled" id="homeSubmenu">
                <li class="nav-item border-bottom border-warning">
                  <a class="nav-link side_nav_dismiss" href="#" onclick="AjaxAddProductPageCall()">Add Product</a>
                </li>
                <li class="nav-item border-bottom border-warning">
                  <a class="nav-link side_nav_dismiss" href="#" onclick="AjaxAddCategoryPageCall()">Add Category</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link side_nav_dismiss" href="#" onclick="AjaxMyProductsPageCall()">My Products</a>
                </li>
              </ul>
            </li>
        <?PHP } 
        if (!isset($_SESSION['cs'])){?>
          <li class="nav-list border-warning border-bottom ActAsCourierServices">
            <a class="nav-link side_nav_dismiss" href="#" onclick="AjaxCourierServicesPageCall()">Act As Courier Services</a>
          </li>
        <?PHP }else{ ?>
          <li class="nav-list border-warning border-bottom Dashboard">
            <a class="nav-link side_nav_dismiss" href="#">Dashboard</a>
          </li>
        <?PHP } }?>
    </ul>
  </nav>
</div>
<!--========================================================-->
<!-- end navbar -->
<!--===============================================================-->

<!--===============================================================-->

<section class="AjaxContentDisplay side_nav_dismiss">

</section>
<!--===============================================================-->
<!--===============================================================-->
<footer class="side_nav_dismiss">
  <section class="footer-Content main-bg-color" style="">
    <div class="container main-bg-color">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3">
          <div class="footer-widget">
            <h3 class="block-title">About</h3>
            <div class="textwidget">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lobortis tincidunt est, et euismod purus suscipit quis. Etiam euismod ornare elementum. Sed ex est, Sed ex est, consectetur eget consectetur, Lorem ipsum dolor sit amet...</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
          <div class="footer-widget">
            <h3 class="block-title">Quick Links</h3>
            <ul class="menu">
              <li><a href="#">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">All Categories</a></li>
              <li><a href="#">Cities</a></li>
              <li><a href="#">Sellers</a></li>
              <li><a href="#">Contact</a></li>
              <li><a href="#">Terms & Conditions</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
          <div class="footer-widget">
            <h3 class="block-title">Quick Links</h3>
            <ul class="menu">
              <li><a href="#">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">All Categories</a></li>
              <li><a href="#">Cities</a></li>
              <li><a href="#">Sellers</a></li>
              <li><a href="#">Contact</a></li>
              <li><a href="#">Terms & Conditions</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
          <div class="footer-widget">
            <h3 class="block-title">Quick Links</h3>
            <ul class="menu">
              <li><a href="#">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">All Categories</a></li>
              <li><a href="#">Cities</a></li>
              <li><a href="#">Sellers</a></li>
              <li><a href="#">Contact</a></li>
              <li><a href="#">Terms & Conditions</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <hr>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="footer-logo pull-left hidden-xs">
          <img alt="site/<?php echo $site_row['title'];?>" src="site/<?php echo $site_row['footerlogo'];?>" class="img-responsive" width="100">
        </div>
        <!--<div class="footer-links">
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">New Collection</a></li>
            <li><a href="#">Mens Collection</a></li>
            <li><a href="#">Women Dresses</a></li>
            <li><a href="#">Kids Collection</a></li>
          </ul>
        </div>-->
        <div class="copyright">
        <p>© Copyright .&nbsp; | &nbsp;Made with <i class="fa fa-heart"></i>
        by
        <a target="_blank" href="#">
        <strong>Artigo</strong>
        </a>
        </p>
        </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 text-right">
        <div class="social-icon">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
      </div>
    </div>
  </div>
  </section>
</footer>
<!--===============================================================-->
<!--===============================================================-->
<!--===============================================================-->
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/popper.min.js" type="text/javascript"></script>
<script src="assets/plugins/tether/tether.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<!--<script src="assets/js/custom.js" type="text/javascript"></script>
<link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
<script src="assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
<script src="assets/plugins/owl-carousel/owl.carousel.js" type="text/javascript"></script>
<script src="assets/js/rocket-loader.min.js" type="text/javascript"></script>-->
<!-- jQuery Custom Scroller CDN -->
<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="assets/js/my_script.js"></script>
<script>
</script>
<!--===============================================================-->
<!--===============================================================-->
</body>
</html>
