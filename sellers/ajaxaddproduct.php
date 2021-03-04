<?php
include "../db.php";
$site_row=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM `site`"));
?>
<!--========================================================-->
<div class="osahan-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="icofont icofont-ui-home"></i> Home</a></li>
                    <li class="breadcrumb-item">Add Product</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="element_page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mx-auto">
                <div class="widget">
                    <div class="login-modal-right">
                        <div class="tab-content">
                            <div class="tab-pane active" id="login" role="tabpanel">
                                <h5 class="heading-design-h5">Add Product</h5>
                                    <form id="SellerRegistrationForm" method="post">
                                        <fieldset class="form-group">
                                            <label for="pro_name">Product Name </label>
                                            <input name="pro_name" id="pro_name" type="text" class="form-control" required>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label for="category">Category </label>
                                            <select class="form-control input-solid" id="category" name="category" required>
                                                <option value="">-------Select Category-----</option>
                                                <?php 
                                                $selectcategoryquery="SELECT * FROM `categories`";
                                                $selectcategorysql=mysqli_query($connect,$selectcategoryquery);
                                                while($selectcategoryrow=mysqli_fetch_array($selectcategorysql)){ ?>
                                                    <option value="<?PHP echo$selectcategoryrow['cat_sno'];?>"><?PHP echo$selectcategoryrow['cat_name'];?></option>	
                                                <?PHP }?>
                                            </select>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label for="cost">Cost</label>
                                            <input name="cost" id="cost" type="text" class="form-control" required>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label for="quantity">Quantity</label>
                                            <input name="quantity" id="quantity" type="text" class="form-control" required>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label for="desc">Description</label>
                                            <textarea name="desc" id="desc" class="form-control" rows="5" required></textarea>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label for="uploadImg1">Picture-1</label>
                                            <input type="file" class="form-control" name="uploadImg1"id="uploadImg1"/>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label for="uploadImg2">Picture-2</label>
                                            <input type="file" class="form-control" name="uploadImg2"id="uploadImg2"/>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label for="uploadImg3">Picture-3</label>
                                            <input type="file" class="form-control" name="uploadImg3"id="uploadImg3"/>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <span class="custom-control-description text-danger Ajax_add_product_Responce"></span>
                                        </fieldset>
                                        <br>
                                        <fieldset class="form-group">
                                            <button type="button" class="btn btn-outline-success btn-lg" onclick="SellerRegistration()"> SUBMIT </button>
                                        </fieldset>
                                    <form> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</section>

<!--========================================================-->
