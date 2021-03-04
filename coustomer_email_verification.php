<?PHP 
session_start();
include "db.php";
$site_row=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM `site`"));
$output="";
if(isset($_GET['coustomer_email_verification'])){
    $OTP = $_GET['coustomer_email_verification'];
    $select_users=mysqli_query($connect,"SELECT `status` FROM `users` WHERE `otp` = '$OTP' AND `status` = '0' LIMIT 1");
    if (mysqli_num_rows($select_users) == 1) {
        $update_status=mysqli_query($connect,"UPDATE `users` SET  `status` = '1' WHERE `otp` = '$OTP'");
        if ($update_status) {
            $output= "Your account has been activated";
        } else {
            $output= "something went wrong try again";
        }
    } else {
        $output= "Tis is invalid Account or Account is already verified";
    }
}else {
    $output="invalid Access";
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120909275-1" type="f0492d586e82fc31f3a86f28-text/javascript"></script>
<script type="f0492d586e82fc31f3a86f28-text/javascript">
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-120909275-1');
</script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="description">
<meta name="keywords" content="">
<meta name="author" content="JAY">
<title><?php echo $site_row['title'];?></title>
<link rel="apple-touch-icon" sizes="76x76" href="site/<?php echo $site_row['favicon'];?>">
<link rel="icon" type="image/png" href="site/<?php echo $site_row['favicon'];?>">
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
<link rel="stylesheet" href="assets/plugins/owl-carousel/owl.carousel.css">
<link rel="stylesheet" href="assets/plugins/owl-carousel/owl.theme.css">
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="backscript.js" type="text/javascript"></script>

</head>
<style>
    nav .nav-item .nav-link{
        color:white;
    }
</style>
<body>
<br><br><br><br>
<div class="col-lg-6 col-md-6 mx-auto">
    <div class="widget">
        <div class="login-modal-right">
            <div class="tab-content">
                <div class="tab-pane active" id="login" role="tabpanel">
                    <h5 class="heading-design-h5">Wellcome</h5>
                    <h5 class="heading-design-h5 text-center"><?php if($output !=""){?><strong> <?php echo htmlentities($output); ?>  </strong><?php } ?></h5>
                            <fieldset class="form-group">
                                <a href="index.php" class="btn btn-lg btn-theme-round btn-block">Click Me</a>
                            </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--========================================================-->
<!--========================================================-->
<!--===============================================================-->
<!--===============================================================-->
<!--===============================================================-->
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/popper.min.js" type="text/javascript"></script>
<script src="assets/plugins/tether/tether.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/custom.js" type="text/javascript"></script>
<link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
<script src="assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
<script src="assets/plugins/owl-carousel/owl.carousel.js" type="text/javascript"></script>
<script src="assets/js/rocket-loader.min.js" type="text/javascript"></script>
<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- jQuery Custom Scroller CDN -->
<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  $("#sidebar").mCustomScrollbar({
    theme: "minimal"
  });
  $('#dismiss, .overlay').on('click', function () {
    $('#sidebar').removeClass('active');
    $('.overlay').removeClass('active');
  });
  $('#sidebarCollapse').on('click', function () {
    $('#sidebar').addClass('active');
    $('.overlay').addClass('active');
    $('.collapse.in').toggleClass('in');
    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
  });

  function UserRegistration(){
    //<div class="toast d-flex align-items-center" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-body">Hello, world! This is a toast message.</div><button type="button" class="btn-close ms-auto me-2" data-bs-dismiss="toast" aria-label="Close"></button></div>
    $(".registration-alerts").html("<img src='assets/img/loder-1.gif' width='85' height='85'>");
    var formdata = {
        username : $("#register_username").val(),
        register_passkey : $("#register_passkey").val(),
        register_confirm_passkey : $("#register_confirm_passkey").val(),
        UserRegistration: "UserRegistration"
    };   
    if (formdata.username  =="" || formdata.register_passkey == "" || formdata.register_confirm_passkey == "" || formdata.UserRegistration == "") {
        $(".registration-alerts").html('All fields must be filled!');
    } else if(formdata.register_passkey != formdata.register_confirm_passkey){
        $(".registration-alerts").html('Password and confirm confirm should be same!');
    } else {
        $.ajax({
            type:"POST",
            url:"backend.php",
            data:formdata,
            success:function (responce) {
                $(".registration-alerts").html(responce);
            }
        });
    }
}

});
</script>
<!--===============================================================-->
<!--===============================================================-->
</body>
</html>
