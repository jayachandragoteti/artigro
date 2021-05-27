<!--========================================================-->
<?PHP 
include "db.php";
session_start();
$user_sno = $_SESSION['login']['sno'];
$user_result=mysqli_query($connect,"SELECT * FROM `users` WHERE `users`.`sno` = '$user_sno'");
$user_row=mysqli_fetch_array($user_result);
?>

<section class="element_page">
    <div class="container">
        <div class="row Ajax_my_wishlist_data_responce  justify-content-md-center">
        <div class="col-lg-8 col-md-8 col-sm-7">
                <div class="widget">
                    <div class="section-header">
                        <h5 class="heading-design-h5">
                            My Profile
                        </h5>
                    </div>
                    <form method="post">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">First Name <spam class="text-danger">*</spam></label>
                                    <input class="form-control border-form-control" name="fname" id="fname" value="<?PHP echo $user_row['fname'];?>"type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Middle Name</label>
                                    <input class="form-control border-form-control" name="mname"  id="mname" value="<?PHP echo $user_row['mname'];?>"type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Last Name <spam class="text-danger">*</spam></label>
                                    <input class="form-control border-form-control" name="lname"  id="lname" value="<?PHP echo $user_row['lname'];?>"type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Phone <spam class="text-danger">*</spam></label>
                                    <input class="form-control border-form-control" name="phone"  id="phone" value="<?PHP echo $user_row['phone'];?>"  type="tel" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Email Address <spam class="text-danger">*</spam></label>
                                    <input class="form-control border-form-control " name="email"  id="email" value="<?PHP echo $user_row['email'];?>"  type="email" disabled/>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Zip Code <spam class="text-danger">*</spam></label>
                                    <input class="form-control border-form-control" name="pincode"  id="pincode" value="<?PHP echo $user_row['pincode'];?>" type="number"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label">Address <spam class="text-danger">*</spam></label>
                                    <input class="form-control border-form-control" name="address"  id="address" value="<?PHP echo $user_row['address'];?>" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="text-danger my_account_update_responce"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <button type="button" class="btn btn-outline-success btn-lg" onclick="UpdateMyAccount()"> Save Changes </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--========================================================-->
