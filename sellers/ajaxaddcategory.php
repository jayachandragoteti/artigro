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
                    <li class="breadcrumb-item">Add Category</li>
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
                                <h5 class="heading-design-h5">Add Category</h5>
                                    <form id="SellerRegistrationForm" method="post">
                                        <fieldset class="form-group">
                                            <label for="add_category">Category Name</label>
                                            <input type="text" class="form-control" name="add_category"id="add_category" placeholder="Enter category name">
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <span class="custom-control-description text-danger category-alerts"></span>
                                        </fieldset>
                                        <br>
                                        <fieldset class="form-group">
                                            <button type="button" class="btn btn-outline-success btn-lg" onclick="AddCategory()"> Add </button>
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
    
    <div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <div class="card" style="cursor:pointer;">
                    <div class="card-body">
                        <table class="table table-hover">
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
