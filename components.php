<?PHP 
include 'db.php';
session_start();
/* 
//  Card
function pproduct_card(){ ob_start(); ?>
<?PHP return ob_get_clean(); }
// End Card
function Card(){ ob_start(); ?>
<a href="#">
    <div class="container bcontent">
        <div class="card text-muted" style="width: 20rem;">
            <img class="card-img" src="https://mdbootstrap.com/img/new/standard/nature/182.jpg" alt="Suresh Dasari Card">
            <div class="card-img-overlay">
                <h5 class="card-title">Suresh Dasari</h5>
                <p class="card-text">Suresh Dasari is a founder and technical lead developer in tutlane.</p>
                <a href="#" class="btn btn-warning float-right text-white bottom-0">View Profile</a>
            </div>
        </div>
    </div>
</a>


      <div class="col-lg-3 col-md-3">
        <div class="item">
          <div class="h-100">
            <div class="product-item product-item-list">
              <span class="badge badge-default offer-badge">NEW</span>
              <div class="product-item-image">
                <a href="#"><img class="card-img-top img-fluid" src="site/banners/banner  (1).JPG" alt="" ></a>
              </div>
              <div class="product-item-body">
                <h4 class="card-title"><a href="#">Lorem epsomdor geruam karugds sapudra</a></h4>
                <h5>
                <span class="product-desc-price">$200.00</span>
                <span class="product-price">$100.00</span>
                <span class="product-discount">50% Off</span>
                </h5>
              </div>
              <div class="product-item-footer">
                <div class="stars-rating">
                  <i class="icofont icofont-star active"></i>
                  <i class="icofont icofont-star active"></i>
                  <i class="icofont icofont-star active"></i>
                  <i class="icofont icofont-star active"></i>
                  <i class="icofont icofont-star active"></i> <span>(44)</span>
                </div>
              </div>
              <div class="list-product-item-size">
                <strong>Size</strong> <span>S</span> <span>M</span> <span>L</span> <span> XL</span> <span> 2XL</span>
              </div>
              <div class="list-product-item-action">
                <a class="btn btn-theme-round" href="#"><i class="icofont icofont-shopping-cart"></i> Add To Cart</a>
                <a data-toggle="tooltip" data-placement="top" title="" class="btn btn-danger" href="#" data-original-title="SAVE"><i class="icofont icofont-heart"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
<?PHP return ob_get_clean(); } 
*/
//  No Data Found Card
function NoDataFound(){ ob_start(); ?>
<div class="container">
    <a href="#" onclick="AjaxIndexPageCall()">
        <div class="row justify-content-md-center align-items-center">
            <div class='col-sm d-flex  justify-content-center mt-5'>
                <span class='btn btn-danger'><i class='icofont icofont-fa-frown-open'></i> No Data Found</span>
            </div>
        </div>
    </a>
</div>

<?PHP return ob_get_clean(); }
// End No Data Found Card
// Category Card
function category_card($cat_sno,$category_image,$category_name){ ob_start(); ?>
<div class="col-lg-3 col-md-6 col-sm-6 mt-5">
    <div class="item">
        <div class="h-100">
            <div class="product-item pro">
                <h4><span class="badge badge-warning offer-badge text-white"><?PHP echo $category_name;?></span></h4>
                <div class="product-item-image">
                    <a href="#" onclick="AjaxShowCategoryProductsPageCall('<?PHP echo $cat_sno;?>','<?PHP echo $category_name;?>')"><img class="card-img-top img-fluid" src="product_images/<?PHP echo $category_image;?>" style="height:20rem;" alt="<?PHP echo $category_name;?>"></a>
                </div>
            </div>
        </div>
    </div>
</div> 
<?PHP return ob_get_clean(); }
// End Category Card
// City Card
function CityCard($CitySno,$CityName){ ob_start(); ?> 
<div class="col-lg-3 col-md-3 mt-2 mt-5">
    <a href="#" onclick="CityViceSellers('<?PHP echo $CitySno;?>')">
        <div class="about_page_widget widget">
            <i class="icofont icofont-city"></i>
            <h5><?PHP echo $CityName;?></h5>
        </div>
    </a>
</div>
<?PHP return ob_get_clean(); }
// End City Card
// Show Category Products Card
function ShowCategoryProducts($SelectProductsRow){ ob_start(); ?> 
<div class="col-lg-3 col-md-6 mt-5">
    <div class="item">
        <div class="h-100">
            <div class="product-item">
                <div class="product-item-image">
                    <a href="#" onclick="ProductView('<?PHP echo $SelectProductsRow['pro_sno'];?>')"><img class="card-img-top img-fluid" src="product_images/<?PHP echo $SelectProductsRow['pro_img1'];?>" style="height:15rem;"></a>
                </div>
                <a href="#" onclick="ProductView('<?PHP echo $SelectProductsRow['pro_sno'];?>')">
                    <div class="product-item-body">
                        <p class="Add-To-Cart-Wishlist-Alerts-<?PHP echo $SelectProductsRow['pro_sno'];?>-Product text-danger"></p>
                        <!-- <div class="product-item-action">
                            <a data-toggle="tooltip" data-placement="top" title="" class="btn btn-theme-round btn-sm" href="#" data-original-title="Add To Cart"><i class="fa fa-heart"></i></a>
                            <a data-toggle="tooltip" data-placement="top" title="" class="btn btn-theme-round btn-sm" href="#" data-original-title="View Detail"><i class="fa fa-cart-plus"></i></a>
                        </div> -->
                        <h4 class="card-title"><a href="#"><?PHP echo $SelectProductsRow['pro_name'];?></a></h4>
                        <h5>
                            <span class="product-price"><i class="fa fa-rupee-sign"></i> <?PHP echo $SelectProductsRow['pro_cost'];?>/-</span>
                        </h5>
                        <?PHP if(isset($_SESSION['login'])){?>
                            <a class="btn btn-warning" href="#" onclick="AddToWishlist('<?PHP echo $SelectProductsRow['pro_sno'];?>')"><i class="fa fa-heart text-white"></i></a>
                            <a class="btn btn-success" href="#" onclick="AddToCart('<?PHP echo $SelectProductsRow['pro_sno'];?>')"><i class="fa fa-cart-plus text-white"></i></a>

                        <?PHP }else {?>
                            <a class="btn btn-warning" href="#" data-toggle="modal" data-target="#login-register-modal"><i class="fa fa-heart text-white"></i></a>
                            <a class="btn btn-success" href="#" data-toggle="modal" data-target="#login-register-modal" ><i class="fa fa-cart-plus text-white"></i></a>
                        <?PHP }?>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
function ProductView(ProSno) {
    var formdata ={
        ProductView:"ProductView",
        ProSno:ProSno
    }
    $.ajax({
        type:"POST",
        url:"backend.php",
        data:formdata,
        success:function (responce) {
            $(".AjaxContentDisplay").html(responce);
        }
    });
}
</script>

<?PHP return ob_get_clean(); }
// End Show Category Products Card
// My Products Card
function MyProductsCard($pro_sno,$pro_name,$cat_name,$category_sno,$pro_cost,$pro_img1){ ob_start(); ?> 
<div class="col-lg-3 col-md-3 col-sm-6 mt-5">
    <a href="#" onclick="MyProductView('<?PHP echo $pro_sno;?>')" >
        <div class="h-100">
            <div class="product-item">
                <div class="product-item-image">
                    <img class="card-img-top img-fluid" src="product_images/<?PHP echo $pro_img1;?>" style="width:20rem;height:15rem;" alt="<?PHP echo $pro_name;?> ">
                </div>
                <div class="product-item-body">
                    <div class="product-item-action">
                        <a data-toggle="tooltip" data-placement="top" title="" class="btn btn-theme-round btn-sm" href="#"  onclick="MyProductView(<?PHP echo $pro_sno;?>)"><i class="icofont icofont-eye"></i></a>
                    </div>
                    <h4 class="card-title"><?PHP echo $pro_name;?> (<?PHP echo $cat_name;?>)</h4>
                    <h5>
                        <span class="product-price"><i class="icofont icofont-rupee-sign"></i> <?PHP echo $pro_cost;?></span>
                    </h5>
                </div>
                <div class="product-item-footer">
                    <div class="product-item-size">
                        <h4 class="card-title"><?PHP echo $pro_name;?> (<?PHP echo $cat_name;?>)</h4>
                    </div>
                    <!--<div class="stars-rating">
                        <i class="icofont icofont-star active"></i>
                        <i class="icofont icofont-star active"></i>
                        <i class="icofont icofont-star active"></i>
                        <i class="icofont icofont-star"></i>
                        <i class="icofont icofont-star"></i> <span>(415)</span>
                    </div>-->
                </div>
            </div>
        </div>
    </a>
</div>
<?PHP return ob_get_clean(); } 
// End My Products Card
// My Wishlist Card
function MyWishlistCard($ProductDetailsRow,$CategoryDetailsRow,$SubCategoryDetailsRow,$SellerDetailsRow,$CityDetailsRow,$UserDetailsRow){ ob_start(); ?> 
<div class="col-lg-3 col-md-6 col-sm-6 mt-5 ">
    <div class="h-100">
        <div class="product-item">
            <div class="product-item-image">
                <span class="like-icon"><a href="#" onclick="DeleteFromWishlist('<?PHP echo $ProductDetailsRow['pro_sno'];?>')"> <i class="icofont icofont-close-circled"></i></a></span>
                <a href="#" onclick="ProductView('<?PHP echo $ProductDetailsRow['pro_sno'];?>')"><img class="card-img-top img-fluid" src="product_images/<?PHP echo $ProductDetailsRow['pro_img1'];?>" style="width:20rem;height:15rem;" alt="ARTIGRO"></a>
            </div>
            <a href="#" onclick="ProductView('<?PHP echo $ProductDetailsRow['pro_sno'];?>')">
                <div class="product-item-body">
                    <h4 class="card-title"><a href="#"><?PHP echo $ProductDetailsRow['pro_name'];?></a></h4>
                    <h5>
                        <span class="product-price"><?PHP echo $ProductDetailsRow['pro_cost'];?></span>
                    </h5>
                    <p class="Add-To-Cart-Wishlist-Alerts-<?PHP echo $pro_sno;?>-Product"></p>
                    <p>
                        <a class="btn btn-success" href="#" onclick="AddToCart('<?PHP echo $ProductDetailsRow['pro_sno'];?>')"><i class="icofont icofont-shopping-cart"></i> Add To Cart</a>
                    </p>
                </div>
            </a>
        </div>
    </div>
</div>
<?PHP return ob_get_clean(); }
// End My Wishlist Card
// My Cart Card
function MyCartCard($ProductDetailsRow,$CategoryDetailsRow,$SubCategoryDetailsRow,$SellerDetailsRow,$CityDetailsRow,$UserDetailsRow){ ob_start(); ?> 
    <div class="col-lg-3 col-md-6 col-sm-6 mt-5">
        <div class="h-100">
            <div class="product-item">
                <div class="product-item-image">
                    <span class="like-icon"><a href="#" onclick="DeleteFromCart('<?PHP echo $ProductDetailsRow['pro_sno'];?>')"> <i class="icofont icofont-close-circled"></i></a></span>
                    <a href="#" onclick="ProductView('<?PHP echo $ProductDetailsRow['pro_sno'];?>')"><img class="card-img-top img-fluid" src="product_images/<?PHP echo $ProductDetailsRow['pro_img1'];?>" style="width:20rem;height:15rem;" alt="ARTIGRO"></a>
                </div>
                <a href="#" onclick="ProductView('<?PHP echo $ProductDetailsRow['pro_sno'];?>')">
                    <div class="product-item-body">
                        <h4 class="card-title"><a href="#"><?PHP echo $ProductDetailsRow['pro_name'];?></a></h4>
                        <h5>
                            <span class="product-price"><?PHP echo $ProductDetailsRow['pro_cost'];?></span>
                        </h5>
                        <p class="Add-To-Cart-Wishlist-Alerts-<?PHP echo $pro_sno;?>-Product"></p>
                        <p>
                            <a class="btn btn-success" href="#" onclick="ProductView('<?PHP echo $ProductDetailsRow['pro_sno'];?>')"><i class="icofont icofont-eye"></i>View</a>
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </div>
<?PHP return ob_get_clean(); }
// End My Cart Card
// Product View Card
function ProductViewCard($ProductDetailsRow,$CategoryDetailsRow,$SubCategoryDetailsRow,$SellerDetailsRow,$CityDetailsRow,$UserDetailsRow){ ob_start(); ?> 
<div class="container ">
    <div class="row">
        <div class="col-lg-8 col-md-8 mt-5">
            <div class="panel blog-box">
                <div class="panel-image">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img src="product_images/<?PHP echo $ProductDetailsRow['pro_img1'];?>" class="d-block w-100 img-responsive" style="height:22rem;" alt="ARTIGRO">
                            </div>
                            <div class="carousel-item">
                            <img src="product_images/<?PHP echo $ProductDetailsRow['pro_img2'];?>" class="d-block w-100 img-responsive" style="height:22rem;" alt="ARTIGRO">
                            </div>
                            <div class="carousel-item">
                            <img src="product_images/<?PHP echo $ProductDetailsRow['pro_img3'];?>" class="d-block w-100 img-responsive" style="height:22rem;" alt="ARTIGRO">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <div class="title">
                        <a href="blog-single.html">
                        <!-- <h4><?PHP echo $ProductDetailsRow['pro_name'];?></h4>  -->
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <h5><?PHP echo $ProductDetailsRow['pro_name'];?></h5>
                    <p class="mb-2 text-danger text-uppercase small Add-To-Cart-Wishlist-Alerts-<?PHP echo $ProductDetailsRow['pro_sno'];?>-Product text-warning"></p>
                    <p><span class="mr-1"><strong>$<?PHP echo $ProductDetailsRow['pro_cost'];?></strong></span></p>
                    <p class="pt-1"><?PHP echo $ProductDetailsRow['pro_desc'];?></p>
                    <div class="table-responsive">
                        <table class="table table-sm borderless mb-0">
                            <tbody class="borderless">
                                <tr>
                                    <th class="pl-0 w-25" scope="row"><strong>Material</strong></th>
                                    <td><?PHP echo $ProductDetailsRow['pro_materialsused'];?></td>
                                </tr>
                                <tr>
                                    <th class="pl-0 w-25" scope="row"><strong>Category</strong></th>
                                    <td><?PHP echo $CategoryDetailsRow['cat_name'];?></td>
                                </tr>
                                <tr>
                                    <th class="pl-0 w-25" scope="row"><strong>SubCategory</strong></th>
                                    <td><?PHP echo $SubCategoryDetailsRow['sub_cat_name'];?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <?PHP if(isset($_SESSION['login'])){?>
                        <br/>
                        <a href="#" class="btn btn-warning btn-md mr-1 mb-2" onclick="AddToWishlist('<?PHP echo $ProductDetailsRow['pro_sno'];?>')"><i class="fa fa-heart text-white"></i></a>
                        <a href="#" class="btn btn-success btn-md mr-1 mb-2" onclick="AddToCart('<?PHP echo $ProductDetailsRow['pro_sno'];?>')"><i class="fa fa-cart-plus"></i></a>
                    <?PHP }else{?>
                        <br/>
                        <a href="#" class="btn btn-warning btn-md mr-1 mb-2" data-toggle="modal" data-target="#login-register-modal"><i class="fa fa-heart text-white"></i></a>
                        <a href="#" class="btn btn-success btn-md mr-1 mb-2" data-toggle="modal" data-target="#login-register-modal"><i class="fa fa-cart-plus"></i></a>
                    <?PHP }?>
                </div>
                <div class="panel-heading">
                <br>
                    <div class="media clearfix">
                        <a href="#" class="pull-left" onclick="SellerView('<?PHP echo $ProductDetailsRow['seller_sno'];?>')">
                            <img src="http://artigro.aitamsac.in/site/logo.png" alt="profile-picture">
                        </a>
                        <div class="media-body">
                            <a href="#" onclick="SellerView('<?PHP echo $ProductDetailsRow['seller_sno'];?>')"><small>Seller: <span class="font-bold"><?PHP echo $UserDetailsRow['fname']." ".$UserDetailsRow['mname']." ".$UserDetailsRow['lname'];?></span> </small></a>
                            <br>
                            <small class="text-muted">City: <?PHP echo $CityDetailsRow['city_name'];?></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
        <div class="col-md-4 mt-5">
            <div class="sidebar-widget blog-box">
                <ul class="widget-post">
                    <li>
                        <a href="#" class="widget-post-media">
                        <img src="product_images/<?PHP echo $ProductDetailsRow['pro_img1'];?>" style="width:20rem;height:15rem;">
                        </a>
                        <div class="widget-post-info">
                            <h6><a href="#">Picture-1</a></h6>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="widget-post-media">
                        <img src="product_images/<?PHP echo $ProductDetailsRow['pro_img2'];?>" style="width:20rem;height:15rem;">
                        </a>
                        <div class="widget-post-info">
                            <h6><a href="#">Picture-2</a></h6>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="widget-post-media">
                            <img src="product_images/<?PHP echo $ProductDetailsRow['pro_img3'];?>" style="width:20rem;height:15rem;">
                        </a>
                        <div class="widget-post-info">
                            <h6><a href="#">Picture-3</a></h6>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?PHP return ob_get_clean(); }
// End Product View Card
//  Seller Card
function SellerCard($CityViceSellersRow,$SellerDetailsRow,$CityDetailsRow){ ob_start(); ?> 
        <div class="col-lg-3 col-md-3 mt-5" >
            <div class="our-team widget" >
                <div class="team_img">
                    <a href="#">
                        <img src="site/seller.png" style="height:15rem;"> 
                    </a>
                    <ul class="social">
                        <li><a href="mailto:<?PHP echo $SellerDetailsRow['email'];?>"><i class="fa fa-envelope"></i></a></li>
                        <li><a href="tel:<?PHP echo $SellerDetailsRow['phone'];?>"><i class="fa fa-phone"></i></a></li>
                    </ul>
                </div>
                <a href="#" onclick="SellerView('<?PHP echo $CityViceSellersRow['seller_sno'];?>')">
                    <div class="team-content">
                        <h3 class="title"><?PHP echo $SellerDetailsRow['fname']." ".$SellerDetailsRow['mname']." ".$SellerDetailsRow['lname'];?></h3>
                        <span class="post"><?PHP echo $CityDetailsRow['city_name'];?></span>
                    </div>
                </a>
            </div>
        </div>
<?PHP return ob_get_clean(); }
// End Seller Card
//  Seller View Card
function SellerViewCard($SellerDetailsRow,$CityDetailsRow,$UserDetailsRow,$ProductDetailsNoRow,$ProductDetails){ ob_start(); ?> 
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-5 mt-5">
            <div class="user-account-sidebar">
                <aside class="user-info-wrapper">
                    <div class="user-cover" style="background-image: url(site/artigro.png);">
                    </div>
                    <div class="user-info">
                        <div class="user-avatar">
                            <img src="site/favicon-.png" alt="User">
                        </div>
                        <div class="user-data">
                            <h4><small><?PHP echo $UserDetailsRow['fname'];?></small></h4>
                            <span><?PHP echo $CityDetailsRow['city_name'];?></span>
                        </div>
                    </div>
                </aside>        
                <nav class="list-group">
                    <a class="list-group-item" href="#"><i class="icofont icofont-user fa-fw"></i> <?PHP echo $UserDetailsRow['fname']." ".$UserDetailsRow['mname']." ".$UserDetailsRow['lname'];?></a>
                    <a class="list-group-item" href="#"><i class="icofont icofont-phone fa-fw"></i> <?PHP echo $UserDetailsRow['phone'];?></a>
                    <a class="list-group-item" href="#"><i class="icofont icofont-email fa-fw"></i> <?PHP echo $UserDetailsRow['email'];?></a>
                    <a class="list-group-item" href="#"><i class="icofont icofont-location-pin fa-fw"></i> <?PHP echo $UserDetailsRow['address'];?></a>
                </nav>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-7 mt-5">
            <div class="widget">
                <div class="section-header">
                    <h5 class="heading-design-h5">Seller Products</h5>
                </div>   
                <div class="row">
                    <!--  -->
                    <?PHP if($ProductDetailsNoRow > 0){
                        while ($ProductDetailsRow = mysqli_fetch_array($ProductDetails)) {?>
                            <div class="col-lg-4 col-md-6">
                                <div class="h-100">
                                    <div class="product-item">
                                        <div class="product-item-image">
                                            <a href="#" onclick="ProductView('<?PHP echo $ProductDetailsRow['pro_sno'];?>')"><img class="card-img-top img-fluid" src="product_images/<?PHP echo $ProductDetailsRow['pro_img1'];?>" style="height:15rem;"></a>
                                        </div>
                                        <a href="#" onclick="ProductView('<?PHP echo $ProductDetailsRow['pro_sno'];?>')">
                                            <div class="product-item-body">
                                                <h4 class="card-title"><a href="#"><?PHP echo $ProductDetailsRow['pro_name'];?></a></h4>
                                                <h5>
                                                    <span class="product-price"><?PHP echo $ProductDetailsRow['pro_cost'];?></span>
                                                </h5>
                                                <p>
                                                    <a class="btn btn-success" href="#" onclick="ProductView('<?PHP echo $ProductDetailsRow['pro_sno'];?>')"><i class="icofont icofont-eye"></i>View</a>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div> 
                    <?PHP } }else {?>
                        <div class="col-lg-6 col-md-6 tags-action">
                            <span>No Data Found!</span>
                        </div>
                        <?PHP }?>
                    <!--  -->
                </div>
            </div>
        </div>
    </div>
</div>
<?PHP return ob_get_clean(); }
// End Seller View Card
    























































































































































//================================================================
//================================================================
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
                <td align="center"><a href="#" target="_blank" style="text-decoration:none;"><img src="http://artigro.aitamsac.in/site/logo.png" width="230" height="80" style="display:block;font-family: Arial, sans-serif; font-size:15px; line-height:18px; color:#30373b;  font-weight:bold;" border="0" /></a></td>
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
                        <td valign="middle" align="center"><img src="http://artigro.aitamsac.in/site/activate_account.png" width="333" height="303" alt="WELCOME" style="display:block; font-family:Arial, sans-serif; font-size:25px; line-height:303px; color:#c27cbb;max-width:333px;" class="em_full_img" border="0" /></td>
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
                            <td valign="middle" align="center" height="45" bgcolor="#e4960e" style="font-family:'Open Sans', Arial, sans-serif; font-size:17px; font-weight:bold; color:#ffffff; text-transform:uppercase;"><a href="http://artigro.aitamsac.in/coustomer_email_verification.php?coustomer_email_verification=<?PHP echo $otp; ?>" style="color:white;text-decoration:none;">Activate</a></td>
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
//================================================================
//================================================================
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
                    <td align="center"><a href="#" target="_blank" style="text-decoration:none;"><img src="http://artigro.aitamsac.in/site/logo.png" width="230" height="80" style="display:block;font-family: Arial, sans-serif; font-size:15px; line-height:18px; color:#30373b;  font-weight:bold;" border="0" /></a></td>
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
                            <td valign="middle" align="center"><img src="http://artigro.aitamsac.in/site/reset_password.png" width="333" height="303" alt="WELCOME" style="display:block; font-family:Arial, sans-serif; font-size:25px; line-height:303px; color:#c27cbb;max-width:333px;" class="em_full_img" border="0" /></td>
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
                                <td valign="middle" align="center" height="45" bgcolor="#e4960e" style="font-family:'Open Sans', Arial, sans-serif; font-size:17px; font-weight:bold; color:#ffffff; text-transform:uppercase;"><a href="http://artigro.aitamsac.in/coustomer_forgot_password_verification.php?coustomer_forgot_password_verification=<?PHP echo $otp; ?>" style="color:white;text-decoration:none;">Reset password</a></td>
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
//================================================================
//================================================================