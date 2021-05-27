<section class="products_page">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="widget bg-dark">
                    <div class="category_sidebar">
                        <aside class="sidebar_widget">
                            <div class="widget_title">
                                <h5 class="heading-design-h5"><i class="icofont icofont-filter"></i> Category</h5>
                            </div>
                            <div id="accordion" role="tablist" aria-multiselectable="true">
                                <!--  -->
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingThree">
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#ProductCategoryFilerDropdown" aria-expanded="false" aria-controls="CategoryFilerDropdown">
                                            Category
                                            <span><i class="fa fa-plus-square-o"></i></span>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="ProductCategoryFilerDropdown" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                        <div class="card-block">
                                            <ul class="trends">
                                            <?PHP
                                            include "db.php";
                                                $SelectCategory="SELECT * FROM `categories` ORDER BY `categories`.`cat_sno` ASC";
                                                $SelectCategorySql=mysqli_query($connect, $SelectCategory);
                                                while ($SelectCategoryRow=mysqli_fetch_array($SelectCategorySql)) { ?>
                                                    <li>
                                                        <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                                                            <input type="checkbox" class="custom-control-input CommonProductFilter ProductCategories" value="<?PHP echo  $SelectCategoryRow['cat_sno'];?>" id="categoriesCheck<?PHP echo  $SelectCategoryRow['cat_sno'] ?>" onchange="FilterSubCategories()">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description" for="categoriesCheck<?PHP echo  $SelectCategoryRow['cat_sno'] ?>"><?PHP echo  $SelectCategoryRow['cat_name'];?></span>
                                                        </label>
                                                    </li>
                                                <?PHP } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--  -->
                                <!--  -->
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingThree">
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Kids
                                            <span><i class="fa fa-plus-square-o"></i></span>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                                        <div class="card-block">
                                            <ul class="trends">
                                                <li>
                                                    <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                                                    <input type="checkbox" class="custom-control-input">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Fashion Jewellery <span class="item-numbers">155</span></span>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--  -->
                            </div>
                        </aside>
                        <hr>
                    </div>
                </div>
                <hr>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="osahan_products_top_filter row">
                    <div class="col-lg-6 col-md-6 tags-action">
                        <!-- <span>Clothing <a href="#"><i class="icofont icofont-close-line-circled"></i></a></span> -->
                    </div>
                    <div class="col-lg-6 col-md-6 sort-by-btn pull-right">
                        <div class="dropdown pull-right">
                            <button class="btn btn-warning text-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icofont icofont-filter"></i> Sort by
                            </button>
                            <div class="dropdown-menu pull-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Price: Low to High </a>
                                <a class="dropdown-item" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Price: High to Low </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row products_page_list Ajax-Products-Filter-Response">
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
            <li class="page-item disabled"><a class="page-link" href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
            </ul>
            </nav> -->
        </div>
    </div>
</div>
</section>
<!--========================================================-->
