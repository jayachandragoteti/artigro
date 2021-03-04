<?PHP 
include 'db.php';
session_start();
/* function pproduct_card(){ ob_start(); ?> <?PHP return ob_get_clean(); } ?> */
function category_card($category_image,$category_name){ ob_start(); ?>  
<!--<div class="col-lg-3 col-md-3 mt-5">
    <div class="card bg-dark text-white" >
        <img class="card-img" data-src="product_images/<?PHP echo $category_image;?>" alt="<?PHP echo $category_name;?>" src="product_images/<?PHP echo $category_image;?>" data-holder-rendered="true" >
        <div class="card-img-overlay">
            <h1 class="card-title text-white"><?PHP echo $category_name;?></h1>
        </div>
    </div>
</div>-->
<div class="col-xs-12 col-sm-3 col-lg-3 col-md-3">
	<div class="banner-block" >
		<a href="#" onclick=""> <img src="product_images/<?PHP echo $category_image;?>" alt="<?PHP echo $category_name;?>" style="height:20rem;width:20rem;"> </a>
		<div class="text-des-container">
			<div class="text-des">
				<h2><?PHP echo $category_name;?></h2>
				<a href="#"><button class="btn main-bg-color" type="button"><i class="icofont icofont-shopping-cart"></i> SHOP NOW</button></a>
			</div>
		</div>
	</div>
</div>
<?PHP return ob_get_clean(); }
function city_card($CitySno,$city_name){ ob_start(); ?> 
<a href="#" onclick="">
    <div class="col-lg-2 col-md-2 ">
        <div class="about_page_widget widget rounded-circle">
            <i class="fa fa-map-marker"></i>
            <h2><strong><?PHP echo $city_name;?></strong></h2>
        </div>
    </div>
</a>

<?PHP return ob_get_clean(); }
function seller_card(){ ob_start(); ?> 
<a href="#">
    <div class="col-lg-4 col-md-4">
        <div class="our-team widget">
            <div class="team_img">
                <img src="site/seller.png">
                <ul class="social">
                    <li><a href="#"><i class="fa fa-email"></i></a></li>
                    <li><a href="#"><i class="fa fa-phone"></i></a></li>
                </ul>
            </div>
            <div class="team-content">
                <h3 class="title">Osahan</h3>
                <span class="post">CEO</span>
            </div>
        </div>
    </div>
</a>
<?PHP return ob_get_clean(); }
function account_activate_email_template($otp){ ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>WELCOME</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0 " />
        <meta name="format-detection" content="telephone=no" />
        <!--[if !mso]><!-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!--<![endif]-->
        <style type="text/css">
        body {
        -webkit-text-size-adjust: 100% !important;
        -ms-text-size-adjust: 100% !important;
        -webkit-font-smoothing: antialiased !important;
        }
        img {
        border: 0 !important;
        outline: none !important;
        }
        p {
        Margin: 0px !important;
        Padding: 0px !important;
        }
        table {
        border-collapse: collapse;
        mso-table-lspace: 0px;
        mso-table-rspace: 0px;
        }
        td, a, span {
        border-collapse: collapse;
        mso-line-height-rule: exactly;
        }
        .ExternalClass * {
        line-height: 100%;
        }
        span.MsoHyperlink {
        mso-style-priority:99;
        color:inherit;}
        span.MsoHyperlinkFollowed {
        mso-style-priority:99;
        color:inherit;}
        </style>
        <style media="only screen and (min-width:481px) and (max-width:599px)" type="text/css">
        @media only screen and (min-width:481px) and (max-width:599px) {
        table[class=em_main_table] {
        width: 100% !important;
        }
        table[class=em_wrapper] {
        width: 100% !important;
        }
        td[class=em_hide], br[class=em_hide] {
        display: none !important;
        }
        img[class=em_full_img] {
        width: 100% !important;
        height: auto !important;
        }
        td[class=em_align_cent] {
        text-align: center !important;
        }
        td[class=em_aside]{
        padding-left:10px !important;
        padding-right:10px !important;
        }
        td[class=em_height]{
        height: 20px !important;
        }
        td[class=em_font]{
        font-size:14px !important;	
        }
        td[class=em_align_cent1] {
        text-align: center !important;
        padding-bottom: 10px !important;
        }
        }
        </style>
        <style media="only screen and (max-width:480px)" type="text/css">
        @media only screen and (max-width:480px) {
        table[class=em_main_table] {
        width: 100% !important;
        }
        table[class=em_wrapper] {
        width: 100% !important;
        }
        td[class=em_hide], br[class=em_hide], span[class=em_hide] {
        display: none !important;
        }
        img[class=em_full_img] {
        width: 100% !important;
        height: auto !important;
        }
        td[class=em_align_cent] {
        text-align: center !important;
        }
        td[class=em_align_cent1] {
        text-align: center !important;
        padding-bottom: 10px !important;
        }
        td[class=em_height]{
        height: 20px !important;
        }
        td[class=em_aside]{
        padding-left:10px !important;
        padding-right:10px !important;
        } 
        td[class=em_font]{
        font-size:14px !important;
        line-height:28px !important;
        }
        span[class=em_br]{
        display:block !important;
        }
        }
        </style>
    </head>
    <body style="margin:0px; padding:0px;" bgcolor="#ffffff">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
        <!-- === BODY SECTION=== --> 
        <tr>
            <td align="center" valign="top"  bgcolor="#ffffff">
            <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="em_main_table" style="table-layout:fixed;">
                <!-- === LOGO SECTION === -->
                <tr>
                <td height="40" class="em_height">&nbsp;</td>
                </tr>
                <tr>
                <td align="center"><a href="#" target="_blank" style="text-decoration:none;"><img src="http://artigo.girishfalcon.in/assets/images/logo.png" width="230" height="80" style="display:block;font-family: Arial, sans-serif; font-size:15px; line-height:18px; color:#30373b;  font-weight:bold;" border="0" /></a></td>
                </tr>
                <tr>
                <td height="30" class="em_height">&nbsp;</td>
                </tr>
                
                    <tr>
                        <td height="1" bgcolor="#d8e4f0" style="font-size:0px;line-height:0px;"><hr></td>
                    </tr>
                <!-- === //LOGO SECTION === -->
                <!-- === NEVIGATION SECTION === -->
                <!-- === //NEVIGATION SECTION === -->
                <!-- === IMG WITH TEXT AND COUPEN CODE SECTION === -->
                <tr>
                <td valign="top" class="em_aside">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td height="36" class="em_height">&nbsp;</td>
                    </tr>
                    <tr>
                        <td valign="middle" align="center"><img src="http://artigo.girishfalcon.in/site/activate_account.png" width="333" height="303" alt="WELCOME" style="display:block; font-family:Arial, sans-serif; font-size:25px; line-height:303px; color:#c27cbb;max-width:333px;" class="em_full_img" border="0" /></td>
                    </tr>
                    <tr>
                        <td height="41" class="em_height">&nbsp;</td>
                    </tr>
                    <tr>
                        <td height="12" style="font-size:1px; line-height:1px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td valign="top" align="center">
                        <table width="210" border="0" cellspacing="0" cellpadding="0" align="center">
                            <tr>
                            <td valign="middle" align="center" height="45" bgcolor="#007BFF" style="font-family:'Open Sans', Arial, sans-serif; font-size:17px; font-weight:bold; color:#ffffff; text-transform:uppercase;"><a href="http://artigo.girishfalcon.in/coustomer_email_verification.php?coustomer_email_verification=<?PHP echo $otp; ?>" style="color:white;text-decoration:none;">Activate</a></td>
                            </tr>
                        </table>
                        </td>
                    </tr>
                    <tr>
                        <td height="34" class="em_height">&nbsp;</td>
                    </tr>
                    <tr>
                        <td height="31" class="em_height">&nbsp;</td>
                    </tr>
                    </table>
                </td>
                </tr>
                <!-- === //IMG WITH TEXT AND COUPEN CODE SECTION === -->
            </table>
            </td>
        </tr>
        </table>
        <div style="display:none; white-space:nowrap; font:20px courier; color:#ffffff; background-color:#ffffff;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
    </body>
    </html>
<?PHP return ob_get_clean(); }
function forgot_pass_email_template($otp){ ob_start(); ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <title>WELCOME</title>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0 " />
            <meta name="format-detection" content="telephone=no" />
            <!--[if !mso]><!-->
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
            <!--<![endif]-->
            <style type="text/css">
            body {
            -webkit-text-size-adjust: 100% !important;
            -ms-text-size-adjust: 100% !important;
            -webkit-font-smoothing: antialiased !important;
            }
            img {
            border: 0 !important;
            outline: none !important;
            }
            p {
            Margin: 0px !important;
            Padding: 0px !important;
            }
            table {
            border-collapse: collapse;
            mso-table-lspace: 0px;
            mso-table-rspace: 0px;
            }
            td, a, span {
            border-collapse: collapse;
            mso-line-height-rule: exactly;
            }
            .ExternalClass * {
            line-height: 100%;
            }
            span.MsoHyperlink {
            mso-style-priority:99;
            color:inherit;}
            span.MsoHyperlinkFollowed {
            mso-style-priority:99;
            color:inherit;}
            </style>
            <style media="only screen and (min-width:481px) and (max-width:599px)" type="text/css">
            @media only screen and (min-width:481px) and (max-width:599px) {
            table[class=em_main_table] {
            width: 100% !important;
            }
            table[class=em_wrapper] {
            width: 100% !important;
            }
            td[class=em_hide], br[class=em_hide] {
            display: none !important;
            }
            img[class=em_full_img] {
            width: 100% !important;
            height: auto !important;
            }
            td[class=em_align_cent] {
            text-align: center !important;
            }
            td[class=em_aside]{
            padding-left:10px !important;
            padding-right:10px !important;
            }
            td[class=em_height]{
            height: 20px !important;
            }
            td[class=em_font]{
            font-size:14px !important;	
            }
            td[class=em_align_cent1] {
            text-align: center !important;
            padding-bottom: 10px !important;
            }
            }
            </style>
            <style media="only screen and (max-width:480px)" type="text/css">
            @media only screen and (max-width:480px) {
            table[class=em_main_table] {
            width: 100% !important;
            }
            table[class=em_wrapper] {
            width: 100% !important;
            }
            td[class=em_hide], br[class=em_hide], span[class=em_hide] {
            display: none !important;
            }
            img[class=em_full_img] {
            width: 100% !important;
            height: auto !important;
            }
            td[class=em_align_cent] {
            text-align: center !important;
            }
            td[class=em_align_cent1] {
            text-align: center !important;
            padding-bottom: 10px !important;
            }
            td[class=em_height]{
            height: 20px !important;
            }
            td[class=em_aside]{
            padding-left:10px !important;
            padding-right:10px !important;
            } 
            td[class=em_font]{
            font-size:14px !important;
            line-height:28px !important;
            }
            span[class=em_br]{
            display:block !important;
            }
            }
            </style>
        </head>
        <body style="margin:0px; padding:0px;" bgcolor="#ffffff">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff">
            <!-- === BODY SECTION=== --> 
            <tr>
                <td align="center" valign="top"  bgcolor="#ffffff">
                <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="em_main_table" style="table-layout:fixed;">
                    <!-- === LOGO SECTION === -->
                    <tr>
                    <td height="40" class="em_height">&nbsp;</td>
                    </tr>
                    <tr>
                    <td align="center"><a href="#" target="_blank" style="text-decoration:none;"><img src="http://artigo.girishfalcon.in/site/logo.png" width="230" height="80" style="display:block;font-family: Arial, sans-serif; font-size:15px; line-height:18px; color:#30373b;  font-weight:bold;" border="0" /></a></td>
                    </tr>
                    <tr>
                    <td height="30" class="em_height">&nbsp;</td>
                    </tr>
                    
                        <tr>
                            <td height="1" bgcolor="#d8e4f0" style="font-size:0px;line-height:0px;"><hr></td>
                        </tr>
                    <!-- === //LOGO SECTION === -->
                    <!-- === NEVIGATION SECTION === -->
                    <!-- === //NEVIGATION SECTION === -->
                    <!-- === IMG WITH TEXT AND COUPEN CODE SECTION === -->
                    <tr>
                    <td valign="top" class="em_aside">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td height="36" class="em_height">&nbsp;</td>
                        </tr>
                        <tr>
                            <td valign="middle" align="center"><img src="http://artigo.girishfalcon.in/site/reset_password.png" width="333" height="303" alt="WELCOME" style="display:block; font-family:Arial, sans-serif; font-size:25px; line-height:303px; color:#c27cbb;max-width:333px;" class="em_full_img" border="0" /></td>
                        </tr>
                        <tr>
                            <td height="41" class="em_height">&nbsp;</td>
                        </tr>
                        <tr>
                            <td height="12" style="font-size:1px; line-height:1px;">&nbsp;</td>
                        </tr>
                        <tr>
                            <td valign="top" align="center">
                            <table width="210" border="0" cellspacing="0" cellpadding="0" align="center">
                                <tr>
                                <td valign="middle" align="center" height="45" bgcolor="#007BFF" style="font-family:'Open Sans', Arial, sans-serif; font-size:17px; font-weight:bold; color:#ffffff; text-transform:uppercase;"><a href="http://artigo.girishfalcon.in/coustomer_forgot_password_verification.php?coustomer_forgot_password_verification=<?PHP echo $otp; ?>" style="color:white;text-decoration:none;">Reset password</a></td>
                                </tr>
                            </table>
                            </td>
                        </tr>
                        <tr>
                            <td height="34" class="em_height">&nbsp;</td>
                        </tr>
                        <tr>
                            <td height="31" class="em_height">&nbsp;</td>
                        </tr>
                        </table>
                    </td>
                    </tr>
                    <!-- === //IMG WITH TEXT AND COUPEN CODE SECTION === -->
                </table>
                </td>
            </tr>
            <!-- === //BODY SECTION=== -->
            <!-- === FOOTER SECTION ===
            <tr>
                <td align="center" valign="top"  bgcolor="#30373b" class="em_aside">
                <table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="em_main_table" style="table-layout:fixed;">
                    <tr>
                    <td height="35" class="em_height">&nbsp;</td>
                    </tr>
                    <tr>
                    <td valign="top" align="center">
                        <table border="0" cellspacing="0" cellpadding="0" align="center">
                        <tr>
                            <td valign="top"><a href="#" target="_blank" style="text-decoration:none;"><img src="https://www.sendwithus.com/assets/img/emailmonks/images/fb.png" width="26" height="26" style="display:block;font-family: Arial, sans-serif; font-size:10px; line-height:18px; color:#feae39; " border="0" alt="Fb" /></a></td>
                            <td width="7">&nbsp;</td>
                            <td valign="top"><a href="#" target="_blank" style="text-decoration:none;"><img src="https://www.sendwithus.com/assets/img/emailmonks/images/tw.png" width="26" height="26" style="display:block;font-family: Arial, sans-serif; font-size:10px; line-height:18px; color:#feae39; " border="0" alt="Tw" /></a></td>
                            <td width="7">&nbsp;</td>
                            <td valign="top"><a href="#" target="_blank" style="text-decoration:none;"><img src="https://www.sendwithus.com/assets/img/emailmonks/images/pint.png" width="26" height="26" style="display:block;font-family: Arial, sans-serif; font-size:10px; line-height:18px; color:#feae39; " border="0" alt="pint" /></a></td>
                            <td width="7">&nbsp;</td>
                            <td valign="top"><a href="#" target="_blank" style="text-decoration:none;"><img src="https://www.sendwithus.com/assets/img/emailmonks/images/google.png" width="26" height="26" style="display:block;font-family: Arial, sans-serif; font-size:10px; line-height:18px; color:#feae39; " border="0" alt="G+" /></a></td>
                            <td width="7">&nbsp;</td>
                            <td valign="top"><a href="#" target="_blank" style="text-decoration:none;"><img src="https://www.sendwithus.com/assets/img/emailmonks/images/insta.png" width="26" height="26" style="display:block;font-family: Arial, sans-serif; font-size:10px; line-height:18px; color:#feae39; " border="0" alt="Insta" /></a></td>
                            <td width="7">&nbsp;</td>
                            <td valign="top"><a href="#" target="_blank" style="text-decoration:none;"><img src="https://www.sendwithus.com/assets/img/emailmonks/images/yt.png" width="26" height="26" style="display:block;font-family: Arial, sans-serif; font-size:10px; line-height:18px; color:#feae39; " border="0" alt="Yt" /></a></td>
                        </tr>
                        </table>
                    </td>
                    </tr>
                    <tr>
                    <td height="22" class="em_height">&nbsp;</td>
                    </tr>
                    <tr>
                    <td align="center" style="font-family:'Open Sans', Arial, sans-serif; font-size:12px; line-height:18px; color:#848789; text-transform:uppercase;">
                    <span style="text-decoration:underline;"><a href="#" target="_blank" style="text-decoration:underline; color:#848789;">PRIVACY STATEMENT</a></span> &nbsp;&nbsp;|&nbsp;&nbsp; <span style="text-decoration:underline;"><a href="#" target="_blank" style="text-decoration:underline; color:#848789;">TERMS OF SERVICE</a></span><span class="em_hide"> &nbsp;&nbsp;|&nbsp;&nbsp; </span><span class="em_br"></span><span style="text-decoration:underline;"><a href="#" target="_blank" style="text-decoration:underline; color:#848789;">RETURNS</a></span>
                    </td>
                    </tr>
                    <tr>
                    <td height="10" style="font-size:1px; line-height:1px;">&nbsp;</td>
                    </tr>
                    <tr>
                    <td align="center" style="font-family:'Open Sans', Arial, sans-serif; font-size:12px; line-height:18px; color:#848789;text-transform:uppercase;">
                        &copy;2&zwnj;016 company name. All Rights Reserved.
                    </td>
                    </tr>
                    <tr>
                    <td height="10" style="font-size:1px; line-height:1px;">&nbsp;</td>
                    </tr>
                    <tr>
                    <td align="center" style="font-family:'Open Sans', Arial, sans-serif; font-size:12px; line-height:18px; color:#848789;text-transform:uppercase;">
                        If you do not wish to receive any further emails from us, please  <span style="text-decoration:underline;"><a href="#" target="_blank" style="text-decoration:underline; color:#848789;">unsubscribe</a></span>
                    </td>
                    </tr>
                    <tr>
                    <td height="35" class="em_height">&nbsp;</td>
                    </tr>
                </table>
                </td>
            </tr> -->
            <!-- === //FOOTER SECTION === -->
            </table>
            <div style="display:none; white-space:nowrap; font:20px courier; color:#ffffff; background-color:#ffffff;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
        </body>
        </html>
        <?PHP return ob_get_clean(); }