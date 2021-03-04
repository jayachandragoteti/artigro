<!--========================================================-->
<div class="osahan-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="icofont icofont-ui-home"></i> Home</a></li>
                    <li class="breadcrumb-item">Seller Registration</li>
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
                                <h5 class="heading-design-h5">Seller Registration</h5>
                                    <form id="SellerRegistrationForm" method="post">
                                        <fieldset class="form-group">
                                            <label for="aadharcard">Aadhar Card Number</label>
                                            <input type="number" class="form-control" name="aadharcard" min="0" id="aadharcard" />
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label for="confirmaadharcard">Confirm Aadhar Card Number</label>
                                            <input type="number" class="form-control" name="confirmaadharcard" min="0"id="confirmaadharcard" />
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label for="aadharcard_file">Aadhar Card File</label>
                                            <input type="file" class="form-control" name="aadharcard_file" id="aadharcard_file" />
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label for="PANcard">PAN Card Number</label>
                                            <input type="text" class="form-control" name="PANcard" min="0" id="PANcard"/>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label for="confirmPANcard">Confirm PAN Card Number</label>
                                            <input type="text" class="form-control" name="confirmPANcard" min="0" id="confirmPANcard"/>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label for="PANcard_file">PAN Card File</label>
                                            <input type="file" class="form-control" name="PANcard_file"id="PANcard_file"/>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label for="PANcard_file">City</label>
                                            <input list="citylist" class="form-control" name="selectcity" id="selectcity" placeholder="Select or Enter your City">
                                                <datalist id="citylist" >
                                                    <?php 
                                                    $selectcategoryquery="SELECT * FROM `cities`";
                                                    $selectcategorysql=mysqli_query($connect,$selectcategoryquery);
                                                    while($selectcategoryrow=mysqli_fetch_array($selectcategorysql)){ ?>
                                                        <option value="<?PHP echo$selectcategoryrow['city_name'];?>">
                                                    <?PHP }?>
                                                </datalist>
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <span class="custom-control-description text-danger SellerRegistrationErrors"></span>
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
