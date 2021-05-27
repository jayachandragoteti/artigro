<?PHP 
if (isset($_POST['pro_sno'])&& isset($_POST['MyProductView'])) {
    include "../db.php";
    $site_row=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM `site`"));
    $pro_sno = $_POST['pro_sno'];
    $selectproductsquery="SELECT * FROM `products` WHERE `products`.`pro_sno`='$pro_sno'";
	$selectproductssql=mysqli_query($connect,$selectproductsquery);
    $selectproductsrow=mysqli_fetch_array($selectproductssql);
?>
<!--========================================================-->
<section class="blog_page">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="widget">
                    <div class="section-header">
                        <h5 class="heading-design-h5">My Product View</h5>
                        <form metho="POST" id="My_Product_Update_Form" enctype="multipart/form-data">
                            <input name="update_my_pro_sno" id="update_my_pro_sno" type="hidden" value="<?PHP echo $selectproductsrow['pro_sno'];?>" class="form-control" required>
                            <div class="form-group">
                                <label for="update_pro_name">Product Name :  <?PHP echo $selectproductsrow['pro_name'];?></label>
                                <input name="update_pro_name" id="update_pro_name" type="text" value="<?PHP echo $selectproductsrow['pro_name'];?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="category">Category : <?PHP echo $selectproductsrow['category'];?>  </label>
                                <select class="form-control input-solid" id="category" name="category" onchange="AddProductSubCategorySelect()" required>
                                    <option value="">-------Select Category-----</option>
                                    <?php 
                                        $selectcategoryquery="SELECT * FROM `categories`";
                                        $selectcategorysql=mysqli_query($connect,$selectcategoryquery);
                                        while($selectcategoryrow=mysqli_fetch_array($selectcategorysql)){ ?>
                                            <option value="<?PHP echo $selectcategoryrow['cat_sno'];?>"><?PHP echo $selectcategoryrow['cat_name'];?></option>	
                                        <?PHP }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="subcategory">Sub Category : <?PHP echo $selectproductsrow['subcategory'];?> </label>
                                <select class="form-control input-solid Add-Product-Sub-Category-Select-alerts" id="subcategory" name="subcategory"  required>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="update_materials_used">Materials Used : <?PHP echo $selectproductsrow['pro_materialsused'];?> </label>
                                <input id="update_materials_used" name="update_materials_used" value="<?PHP echo $selectproductsrow['pro_materialsused'];?>" type="text" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="update_cost">Cost : <?PHP echo $selectproductsrow['pro_cost'];?></label>
                                <input name="update_cost" id="update_cost" type="number" value="<?PHP echo $selectproductsrow['pro_cost'];?>" min="1" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="update_quantity">Quantity : <?PHP echo $selectproductsrow['quantity'];?></label>
                                <input name="update_quantity" id="update_quantity" value="<?PHP echo $selectproductsrow['quantity'];?>" type="number" min="1" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="update_desc">About : </label>
                                <textarea name="update_desc" id="update_desc" placeholder="<?PHP echo $selectproductsrow['pro_desc'];?>" value="<?PHP echo $selectproductsrow['pro_desc'];?>" class="form-control" rows="5" required></textarea>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="update_uploadImg1">Picture-1</label>
                                            <input type='file' onchange="readURL(this);" id="update_uploadImg1" name="update_uploadImg1" class="form-control" />
                                            <img id="uploadIm1" src="http://placehold.it/150x150" style="width:150px;height:150px;" alt="your image" class="mt-3 img-thumbnail" />
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="update_uploadImg2">Picture-2</label>
                                            <input type='file' onchange="readURL1(this);" id="update_uploadImg2" name="update_uploadImg2" class="form-control" />
                                            <img id="uploadIm2" src="http://placehold.it/150x150" style="width:150px;height:150px;" alt="your image" class="mt-3 img-thumbnail" />
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="update_uploadImg3">Picture-3</label>
                                            <input type='file' onchange="readURL2(this);" id="update_uploadImg3" name="update_uploadImg3" class="form-control" />
                                            <img id="uploadIm3" src="http://placehold.it/150x150" style="width:150px;height:150px;" alt="your image" class="mt-3 img-thumbnail"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <span class="custom-control-description text-danger Update-My-Product-alert"></span>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-outline-success btn-lg" onclick="UpdateMyProduct()"> Update </button>
                                <button type="button" class="btn btn-outline-danger btn-lg float-right"  data-toggle="modal" data-target="#DeleteMyProductModal"> Delete </button>
                            </div>
                        <form> 
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="widget blog-sidebar mb18">
                    <div class="sidebar-widget">
                        <ul class="widget-post">
                            <li>
                                <a href="#" >
                                    <img src="product_images/<?PHP echo $selectproductsrow['pro_img1'];?>" style="width:200px;height:200px;">
                                </a>
                                <div class="widget-post-info">
                                    <h6><a href="#">Picture-1</a></h6>
                                </div>
                            </li>
                            <li>
                                <a href="#" >
                                    <img src="product_images/<?PHP echo $selectproductsrow['pro_img2'];?>" style="width:200px;height:200px;">
                                </a>
                                <div class="widget-post-info">
                                    <h6><a href="#">Picture-2</a></h6>
                                </div>
                            </li>
                            <li>
                                <a href="#" >
                                    <img src="product_images/<?PHP echo $selectproductsrow['pro_img3'];?>" style="width:200px;height:200px;">
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
    </div>
</section>

    <!-- Modal -->
<div class="modal fade" id="DeleteMyProductModal" tabindex="-1" role="dialog" aria-labelledby="DeleteMyProductModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="DeleteMyProductModal">Delete My Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Are you sure do you what to delete..?
        </div>
        <div class="Delete-My-Product-alert"></div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger" onclick="DeleteMyProduct(<?PHP echo $pro_sno;?>)">Yes</button>
        </div>
        </div>
    </div>
</div>
<!--========================================================-->
<?PHP }else {?> 
<!--========================================================-->
<section class="element_page">
    <div class="container">
        <div class=" row">
            No Data Found
        </div>
    </div>
</section>
<!--========================================================-->
<?PHP }?> 