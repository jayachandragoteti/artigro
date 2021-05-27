<?php
include "../db.php";
$site_row=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM `site`"));
?>
<!--========================================================-->
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-5 col-sm-6">
            <div class="widget">
                <div class="section-header">
                <h5 class="heading-design-h5">Add Category</h5>
                    <form id="AddCategoryForm" method="post">
                        <fieldset class="form-group">
                            <label for="add_category">Category Name</label>
                            <input type="text" class="form-control" name="add_category"id="add_category" placeholder="Enter category name">
                        </fieldset>
                        <fieldset class="form-group">
                            <span class="custom-control-description text-danger add-category-alerts"></span>
                        </fieldset>
                        <br>
                        <fieldset class="form-group">
                            <button type="button" class="btn btn-outline-success btn-lg" onclick="AddCategory()"> Add+</button>
                        </fieldset>
                    <form> 
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="widget">
                <div class="section-header">
                    <h5 class="heading-design-h5">Add Sub Category</h5>
                    <form id="AddSubCategoryForm" method="post">
                        <fieldset class="form-group">
                            <label for="select_category">Category Name</label>
                            <select class="form-control" name="select_category" id="select_category">
                                <option value="">------- Select Category -------</option>
                                    <?php 
                                    $selectcategoryquery="SELECT * FROM `categories`";
                                    $selectcategorysql=mysqli_query($connect,$selectcategoryquery);
                                    while($selectcategoryrow=mysqli_fetch_array($selectcategorysql)){ ?>
                                        <option value="<?PHP echo$selectcategoryrow['cat_sno'];?>"><?PHP echo$selectcategoryrow['cat_name'];?></option>	
                                    <?PHP }?>
                            <select>
                        </fieldset>
                        <fieldset class="form-group">
                            <label for="add_sub_category">Sub Category Name</label>
                            <input type="text" class="form-control" name="add_sub_category"id="add_sub_category" placeholder="Enter subcategory name">
                        </fieldset>
                        <fieldset class="form-group">
                            <span class="custom-control-description text-danger add-sub-category-alerts"></span>
                        </fieldset>
                        <br>
                        <fieldset class="form-group">
                            <button type="button" class="btn btn-outline-success btn-lg" onclick="AddSubCategory()"> Add+</button>
                        </fieldset>
                    <form> 
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-md-12">
                <div class="card" style="cursor:pointer;">
                    <div class="card-body">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">SNo</th>
                                    <th scope="col">Category Name</th>
                                </tr>
                            </thead>
                            <tbody class="displaymycategories">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--========================================================-->
