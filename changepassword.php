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
        <div class="row">
            <div class="col-lg-6 col-md-6 mx-auto">
                <div class="widget">
                    <div class="login-modal-right">
                        <div class="tab-content">
                            <div class="tab-pane active" id="login" role="tabpanel">
                                <h5 class="heading-design-h5">Change Password</h5>
                                <form method="post">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="control-label">Old Password <spam class="text-danger">*</spam></label>
                                                <input class="form-control border-form-control" name="old_password"  id="old_password"  type="text">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="control-label">New Password <spam class="text-danger">*</spam></label>
                                                <input class="form-control border-form-control" name="new_password"  id="new_password" type="password">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="control-label">Confirm Password <spam class="text-danger">*</spam></label>
                                                <input class="form-control border-form-control" name="confirm_password"  id="confirm_password" type="password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <p class="text-danger change_password_responce"></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 text-right">
                                            <button type="button" class="btn btn-outline-success btn-lg" onclick="ChangePassword()" name="ChangePassword"> Changes </button>
                                        </div>
                                    </div>
                                </form> 
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
