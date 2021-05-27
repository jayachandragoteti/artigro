<?php
include "../db.php";
$site_row=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM `site`"));
?>
<!--========================================================-->

<section class="element_page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mx-auto">
                <div class="widget">
                    <div class="login-modal-right">
                        <div class="tab-content">
                            <div class="tab-pane active" id="login" role="tabpanel">
                                <h5 class="heading-design-h5">Add Product</h5>
                                    <form metho="POST" id="add_product_form" enctype="multipart/form-data">
                                        <div class="form-group">
                                                <label for="pro_name">Product Name </label>
                                                <input name="pro_name" id="pro_name" type="text" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                                <label for="category">Category  </label>
                                                <select class="form-control input-solid" id="category" name="category" onchange="AddProductSubCategorySelect()" required>
                                                    <option value="">-------Select Category-----</option>
                                                    <?php 
                                                    $selectcategoryquery="SELECT * FROM `categories`";
                                                    $selectcategorysql=mysqli_query($connect,$selectcategoryquery);
                                                    while($selectcategoryrow=mysqli_fetch_array($selectcategorysql)){ ?>
                                                        <option value="<?PHP echo$selectcategoryrow['cat_sno'];?>"><?PHP echo$selectcategoryrow['cat_name'];?></option>	
                                                    <?PHP }?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="category">Sub Category  </label>
                                            <select class="form-control input-solid Add-Product-Sub-Category-Select-alerts" id="subcategory" name="subcategory"  required>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="materials_used">Materials Used </label>
                                            <input id="materials_used" name="materials_used" type="text" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="cost">Cost</label>
                                            <input name="cost" id="cost" type="number" min="1" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="quantity">Quantity </label>
                                            <input name="quantity" id="quantity" type="number" min="1" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="desc">About</label>
                                            <textarea name="desc" id="desc" class="form-control" rows="5" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="desc">Picture-1</label>
                                            <input type='file' onchange="readURL(this);" id="uploadImg1" name="uploadImg1" class="form-control" />
                                            <img id="uploadIm1" src="http://placehold.it/150x150" width="200" max-height="100" alt="your image" class="mt-3 img-thumbnail" />
                                        </div>
                                        <div class="form-group">
                                            <label for="uploadImg2">Picture-2</label>
                                            <input type='file' onchange="readURL1(this);" id="uploadImg2" name="uploadImg2" class="form-control" />
                                            <img id="uploadIm2" src="http://placehold.it/150x150" width="200" max-height="100" alt="your image" class="mt-3 img-thumbnail" />
                                        </div>
                                        <div class="form-group">
                                            <label for="uploadImg3">Picture-3</label>
                                            <input type='file' onchange="readURL2(this);" id="uploadImg3" name="uploadImg3" class="form-control" />
                                            <img id="uploadIm3" src="http://placehold.it/150x150"  width="200" max-height="100" alt="your image" class="mt-3 img-thumbnail"/>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <span class="custom-control-description text-danger Ajax_add_product_Responce"></span>
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-outline-success btn-lg" onclick="AddProduct()"> SUBMIT </button>
                                        </div>
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
