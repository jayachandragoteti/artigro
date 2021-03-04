<?PHP 
include '../db.php';
session_start();
/* function pproduct_card(){ ob_start(); ?> <?PHP return ob_get_clean(); } ?> */
function product_card($seller_id,$pro_name,$pro_sno,$pro_img1){ ob_start(); ?>
<div class="col-sm-3">
	<div class="card card-profile">
		<div class="card-header" style="background-image: url('../product_images/<?php echo $pro_img1; ?>')">
			<div class="profile-picture"></div>
		</div>
		<div class="card-body">						
			<div class="row">
				<div class="col-sm-6 align-items-left">
					<p><?php echo $pro_name; ?></p>
				</div>
			</div>
			<div class="user-profile text-center">
				<div class="name text-center"><?php echo $pro_name; ?></div>					
				<div class="view-profile">
					<a href="#" onclick="AjaxEditProductPageCall()"class="btn btn-secondary btn-block">View Full Profile</a>
				</div>							
			</div>
		</div>
	</div>
</div>
<?PHP return ob_get_clean(); }