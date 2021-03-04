<?PHP
include "db.php";
include 'components.php';
//==========================================================================
// User Login
if (isset($_POST['username']) && isset($_POST['passkey']) && isset($_POST['login'])) {
    if ($_POST['username'] !="" && $_POST['passkey'] !="") {
        $username = $connect -> real_escape_string($_POST['username']);
        $passkey = $connect -> real_escape_string($_POST['passkey']);
        $UserCheckQuery = "SELECT * FROM `users` WHERE (`phone` = '$username' OR `email` = '$username') ";
        $UserCheckSql = mysqli_query($connect,$UserCheckQuery);
        $UserCheckCount = mysqli_num_rows($UserCheckSql);
        if ($UserCheckCount == 0) {
            echo "*Invalid Username or you don't have an account.";
        }elseif ($UserCheckCount > 1){
            echo "*You have multiple accounts.";
        }
        else {
            $UserCheckRow = mysqli_fetch_array($UserCheckSql);
            if ($UserCheckRow['password'] != $passkey) {
                echo "*Invalid Password,Plese try again";
            }elseif ($UserCheckRow['status'] != 1) {
                echo "*Plese activate your account.";
            } else {
                $users_sno = $UserCheckRow['sno'];
                $_SESSION['login'] = array(
                    'sno' => $users_sno,
                    'category' => $UserCheckRow['category'],
                );
                if (isset($_SESSION['login'])) {
                    if ($UserCheckRow['category'] == '2') {
                        $SellerSelectQuery = "SELECT * FROM  `sellers` WHERE `sellers`.`users_sno` = '$users_sno'";
                        $SellerSelectSql = mysqli_query($connect,$SellerSelectQuery);
                        $SellerSelectRow = mysqli_fetch_array($SellerSelectSql);
                        $_SESSION['seller'] = array(
                            'seller_sno' => $SellerSelectRow['seller_sno'],
                        );
                    }elseif ($UserCheckRow['category'] == '3') {
                        $CSSelectQuery = "SELECT * FROM  `cs` WHERE `cs`.`users_sno` = '$users_sno'";
                        $CSSelectSql = mysqli_query($connect,$CSSelectQuery);
                        $CSSelectRow = mysqli_fetch_array($CSSelectSql);
                        $_SESSION['cs'] = array(
                            'cs_sno' => $CSSelectRow['cs_sno'],
                        );
                    }
                    echo "Loding..";
                } else {
                    echo "Login failed!";
                }
            }
        }
    }else{
        echo "All fields must be filled!";
    }
}
// End User Login
// Seller Registration
if (isset($_POST['username']) && isset($_POST['register_passkey']) && isset($_POST['register_confirm_passkey']) && isset($_POST['UserRegistration'])) {
    if ($_POST['username'] == "" || $_POST['register_passkey'] == "" ||$_POST['register_confirm_passkey'] == ""|| $_POST['UserRegistration'] == "") {
        echo "All fields must be filled!";
    }elseif ($_POST['register_passkey']!= $_POST['register_confirm_passkey']) {
        echo "Password and confirm password should be same!";
    }else {
        $register_passkey = $connect -> real_escape_string($_POST['register_passkey']);
        $username = $connect -> real_escape_string($_POST['username']);
        $register_confirm_passkey = $connect -> real_escape_string(strtoupper($_POST['register_confirm_passkey']));
        $otp = md5($username);
        $UserCheckQuery = "SELECT * FROM `users` WHERE `phone` = '$username' OR `email` = '$username'";
        $UserCheckSql = mysqli_query($connect,$UserCheckQuery);
        $UserCheckCount = mysqli_num_rows($UserCheckSql);
        if ($UserCheckCount == 0) {
            if (is_numeric($username) && preg_match('/^[0-9]{3}[0-9]{3}[0-9]{4}$/',$username)) {
                echo "Phone verification is not integrated";
            }elseif (filter_var($username, FILTER_VALIDATE_EMAIL)) {
                $UserInsterQuery = "INSERT INTO `users`(`email`,`password`, `otp`, `status`, `category`)VALUE('$username','$register_passkey', '$otp', '0', '1')";
                $UserInsterSql = mysqli_query($connect,$UserInsterQuery);
                if ($UserInsterSql) {
                    $to = $username;
                    $subject = 'Verification Email';
                    $from ='g.jayachandramohan@gmail.com';
                    // To send HTML mail, the Content-type header must be set
                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    // Create email headers
                    $headers .= 'From: '.$from."\r\n".
                        'Reply-To: '.$from."\r\n" .
                        'X-Mailer: PHP/' . phpversion();
                    // Compose a simple HTML email message
                    $body ='<a href="http://artigo.girishfalcon.in/coustomer_email_verification.php?coustomer_email_verification='.$otp.'" style="color:white;text-decoration:none;">Activate</a>';
                    if (mail($to,$subject,$body,$headers)) {
                        echo "you registered successfully,activation link will send to your email";
                    } else {
                        echo "Failed send verification email,Contact us";
                    }
                } else {
                    echo "Registration failed,try again";
                }
            }else { 
                echo "Invalid Email address or Phone number."; 
            } 
        } else {
            echo "User already exists,Please login";
        }
    }
}
// End Seller Registration
// Forgot Pass
if (isset($_POST['Forgot_Email_Mobile'])) {
    if ($_POST['Forgot_Email_Mobile'] !="") {
        $username = $connect -> real_escape_string($_POST['Forgot_Email_Mobile']);        
        $select_users=mysqli_query($connect,"SELECT * FROM `users` WHERE `users`.`phone` = '$username' OR `users`.`email` = '$username'");
        $select_users_no_rows =  mysqli_num_rows($select_users);
        if ($select_users_no_rows != 0) {
            # OTP 
            $OTP = md5(time().$username);
            $insert_user = mysqli_query($connect,"UPDATE `users` SET `otp`='$OTP' WHERE `users`.`phone` = '$username' OR `users`.`email` = '$username'");
            if ($insert_user) {
                if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
                        $to = $username;
                        $subject = 'Forgot Password';
                        $from ='g.jayachandramohan@gmail.com';
                        // To send HTML mail, the Content-type header must be set
                        $headers  = 'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                        // Create email headers
                        $headers .= 'From: '.$from."\r\n".
                            'Reply-To: '.$from."\r\n" .
                            'X-Mailer: PHP/' . phpversion();
                        // Compose a simple HTML email message
                        $body = forgot_pass_email_template($OTP);
                        if (mail($to,$subject,$body,$headers)) {
                            echo "Reset password link will send to your email";
                        } else {
                            echo "Failed send verification email,Contact us";
                        }
                } elseif (preg_match('/^[0-9]{3}[0-9]{3}[0-9]{4}$/', $username)) {
                    echo "Phone verification is not integrated";
                } else {
                    echo "Invalid email address or phone number";
                }
            }else {
                    echo $connect->error."failed,try again";
            }
        }else{
            echo "Invalid email address or phone number";
        }
        
    } else {
        echo "Enter a valid email address or phone number";
    } 
}
// End Forgot Pass 
// My account update
if (isset($_SESSION['login']['sno']) && isset($_POST['my_account_update']) && isset($_POST['fname']) && isset($_POST['mname']) && isset($_POST['lname']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['pincode']) && isset($_POST['address']) ) {
    if ( $_POST['phone'] !="" || $_POST['email'] !="" ) {
        $customer_id = $_SESSION['login']['sno'];
        $fname = $connect -> real_escape_string($_POST['fname']);
        $fname = $connect -> real_escape_string($_POST['mname']);
        $lname = $connect -> real_escape_string($_POST['lname']);
        $phone = $connect -> real_escape_string($_POST['phone']);
        $email = $connect -> real_escape_string($_POST['email']);
        $pincode = $connect -> real_escape_string($_POST['pincode']);
        $address = $connect -> real_escape_string($_POST['address']);
        $update_profile ="";
        if ($email !="" || $phone !="") {
            if ($email !="" && $phone !="") {
                if (filter_var($email, FILTER_VALIDATE_EMAIL) && is_numeric($phone) && preg_match('/^[0-9]{3}[0-9]{3}[0-9]{4}$/',$phone)) {
                    $update_profile ="UPDATE `users` SET `phone`='$phone',`email`='$email'
                ";
                }else {
                    echo "In valid email/phone number. ";
                } 
            } elseif($email == "" ){
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $update_profile ="UPDATE `users` SET `email`='$email'
                    ";
                } else {
                    echo "In valid email. ";
                }                
            } elseif($phone == ""){
                if (is_numeric($phone) && preg_match('/^[0-9]{3}[0-9]{3}[0-9]{4}$/',$phone)) {
                    $update_profile ="UPDATE `users` SET `phone`='$phone'
                ";
                }else {
                    echo "In valid phone number. ";
                }
            }
            if ($_POST['fname'] !="") {
                $fname = $_POST['fname'];
                $update_profile .="
                    ,`fname`='$fname'
                ";
            }
            if ($_POST['mname'] !="") {
                $mname = $_POST['mname'];
                $update_profile .="
                    ,`mname`='$mname'
                ";
            }
            if ($_POST['lname'] !="") {
                $lname = $_POST['lname'];
                $update_profile .="
                    ,`lname`='$lname'
                ";
            }
            if ($_POST['pincode'] !="") {
                $pincode = $_POST['pincode'];
                $update_profile .="
                    ,`pincode`='$pincode'
                ";
            }
            if ($_POST['address'] !="") {
                $address = $_POST['address'];
                $update_profile .="
                    ,`address`='$address'
                ";
            }
            if (isset($_POST['old_password']) && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
                if ($_POST['old_password'] !="" && $_POST['new_password'] !="" && $_POST['confirm_password'] !="") {
                    $old_password = $connect -> real_escape_string($_POST['old_password']);
                    $new_password = $connect -> real_escape_string($_POST['new_password']);
                    $confirm_password = $connect -> real_escape_string($_POST['confirm_password']);
                    if ($new_password != $confirm_password) {
                        echo "New password and confirm password should be same-";
                    } else {
                        $select_user=mysqli_query($connect,"SELECT * FROM `users` WHERE `sno` = '$customer_id' AND `users`.`status` ='1'");
                        $select_user_num_rows=mysqli_num_rows($select_user);
                        if ($select_user_num_rows == '1') {
                            $select_user_row=mysqli_fetch_array($select_user);
                            if ($old_password == $select_user_row['password']) {
                                $update_profile .="
                                    ,`users`.`password`='$confirm_password'
                                ";
                            } else { 
                                echo "Old password is incorrect-";
                            }
                        }
                    } 
                }
            }
            $update_profile .="WHERE `sno` = '$customer_id'
            ";
            $update_profile_sql = mysqli_query($connect,$update_profile);
            if ($update_profile_sql) {
                echo "Profile updated";
            } else {
                echo "failed!";
            }
        }else {
            echo "*Email/Phone number must be filled!";
        }
    } else {
        echo "*all fields must be filled!";
    }
}
//End My account update
// Seller Registration
if (isset($_POST['aadharcard']) && isset($_POST['confirmaadharcard']) && isset($_POST['PANcard']) && isset($_POST['confirmPANcard']) && isset($_POST['selectcity']) && $_FILES['aadharcard_file'] && $_FILES['PANcard_file']) {
    if ($_POST['aadharcard'] !="" && $_POST['confirmaadharcard'] !="" && $_POST['PANcard'] !="" && $_POST['confirmPANcard'] !="" && $_POST['selectcity'] !="") {
        if ($_POST['aadharcard'] != $_POST['confirmaadharcard']) {
            echo "Aadhar card number and confirm aadhar card number both should be same";
        } elseif($_POST['PANcard'] != $_POST['confirmPANcard']){
            echo "PAN card number and confirm PAN card number both should be same";
        }else{
            $aadharcard = $connect -> real_escape_string($_POST['aadharcard']);
            $PANcard = $connect -> real_escape_string($_POST['PANcard']);
            $city = strtoupper($connect -> real_escape_string($_POST['selectcity']));
            $aadharcard_file_img = $_FILES['aadharcard_file']['name'];
            $aadharcard_file_tmp = $_FILES['aadharcard_file']['tmp_name'];
            $PANcard_file_img = $_FILES['PANcard_file']['name'];
            $PANcard_file_tmp = $_FILES['PANcard_file']['tmp_name'];
            $valid_extensions = array('pdf', 'PDF');
            $aadharcard_file_ext = strtolower(pathinfo($aadharcard_file_img, PATHINFO_EXTENSION));
            $aadharcard_final_file = strtolower($aadharcard.".".$aadharcard_file_ext);
            $PANcard_file_ext = strtolower(pathinfo($PANcard_file_img, PATHINFO_EXTENSION)); 
            $PANcard_final_file = strtolower($PANcard.".".$PANcard_file_ext);
            $in_path = 'seller_files/';
            $path_1 = $in_path.($aadharcard_final_file);
            $path_2 = $in_path.($PANcard_final_file);
            $customer_id = $_SESSION['login']['sno'];
            $select_sellers = mysqli_query($connect,"SELECT * FROM `sellers` WHERE `users_sno` = '$customer_id'");
            $select_sellers_rows = mysqli_num_rows($select_sellers);
            $select_users = mysqli_query($connect,"SELECT * FROM `users` WHERE `users`.`sno` = '$customer_id'");
            $select_users_rows = mysqli_fetch_array($select_users);
            if ($select_sellers_rows != 0) {
                echo "Your alredy registered, please login again or activate your account.";
            }elseif ($select_users_rows['fname'] == "" || $select_users_rows['lname'] == "" || $select_users_rows['phone'] == "" || $select_users_rows['email'] == ""|| $select_users_rows['address'] == "" || $select_users_rows['pincode'] == "" || $select_users_rows['password'] == "" || $select_users_rows['status'] != "1" ) {
                echo "Complete your profile.";
            }else{
                if(!in_array($aadharcard_file_ext, $valid_extensions) && !in_array($PANcard_file_ext, $valid_extensions)){
                    echo"You images extension must be PDF/pdf.";
                }elseif ($_FILES['aadharcard_file']['size'] > 1097152 && $_FILES['PANcard_file']['size'] > 1097152) {
                    echo"File size must be excately 1 MB or below.";
                }elseif (move_uploaded_file($aadharcard_file_tmp,$path_1)) {
                    if (move_uploaded_file($PANcard_file_tmp,$path_2)) {
                        $SelectCityQuery="SELECT * FROM `cities` WHERE `city_name` = '$city'";
                        $SelectCitySql= mysqli_query($connect,$SelectCityQuery);
                        $SelectCityCount=mysqli_num_rows($SelectCitySql);
                        if ($SelectCityCount >= 1 ) {
                            $SelectCityRow=mysqli_fetch_array($SelectCitySql);
                            $city_sno = $SelectCityRow['city_sno'];
                            $SellerInsertQuery="INSERT INTO `sellers`(`users_sno`, `city_sno`, `seller_status`, `aadharcard`, `aadharcard_file`, `PANcard`, `PANcard_file`) VALUES ('$customer_id','$city_sno','0','$aadharcard','$aadharcard_final_file','$PANcard','$PANcard_final_file')";
                            $SellerInsertSql = mysqli_query($connect,$SellerInsertQuery) or ('0');
                            if ($SellerInsertSql) {
                                echo "registered successfully,activation link will send to your email or phone";
                            } else {
                                unlink("./seller_files/$aadharcard_final_file");
                                unlink("./seller_files/$PANcard_final_file");
                                echo "Filed,try again!";
                            }
                        } else {
                            $AddCityQuery ="INSERT INTO `cities`(`city_name`, `city_admin`) VALUES ('$city','0000')";
                            $AddCityQuerySql = mysqli_query($connect,$AddCityQuery);
                            if ($AddCityQuerySql) {
                                $SelectCityQuery_2="SELECT * FROM `cities` WHERE `city_name` = '$city'";
                                $SelectCitySql_2= mysqli_query($connect,$SelectCityQuery_2);
                                $SelectCityRow=mysqli_fetch_array($SelectCitySql_2);
                                $city_sno = $SelectCityRow['city_sno'];
                                $SellerInsertQuery="INSERT INTO `sellers`(`users_sno`, `city_sno`, `seller_status`, `aadharcard`, `aadharcard_file`, `PANcard`, `PANcard_file`) VALUES ('$customer_id','$city_sno','0','$aadharcard','$aadharcard_final_file','$PANcard','$PANcard_final_file')";
                                $SellerInsertSql = mysqli_query($connect,$SellerInsertQuery) or ('0');
                                if ($SellerInsertSql) {
                                    echo "registered successfully,activation link will send to your email or phone.";
                                } else {
                                    unlink("./seller_files/$aadharcard_final_file");
                                    unlink("./seller_files/$PANcard_final_file");
                                    echo "Filed,try again!";
                                }
                            } else {
                                echo"*City adding is failed,try again!";
                            }
                        }
                    } else {
                        unlink("seller_files/$aadharcard_final_file");
                        echo "Filed,file is not uploded,try again!";
                    }
                }else {
                    echo "Filed,file is not uploded,try again!";
                }
            }
        }
    } else {
        echo "*all fields must be filled!";
    }
}
//End Seller Registration
// home card fillter
if (isset($_POST['action'])) {
    $SelectProductCategory = "SELECT DISTINCT(`category`) FROM `products`  WHERE `pro_sno` != '0'";
    if (isset($_POST['categories'])) {
        $categories_filter = $connect -> real_escape_string(implode("','",$_POST['categories']));
        $SelectProductCategory .="AND `category` IN (' ".$categories_filter." ')";
    }
    if (isset($_POST['search_text']) && $_POST['search_text'] !="") {
        $search_text_filter = $connect -> real_escape_string($_POST['search_text']);
        $SelectProductCategory .=" AND `products`.`pro_name` LIKE '%$search_text_filter%' OR `products`.`pro_desc` LIKE '%$search_text_filter%' OR `products`.`pro_materialsused` LIKE '%$search_text_filter%'  OR `products`.`pro_cost` LIKE '%$search_text_filter%'" ;
    }
    $SelectProductCategorySql = mysqli_query($connect,$SelectProductCategory);
    $SelectProductCategoryNR = mysqli_num_rows($SelectProductCategorySql);
    $output =" ";
    if ($SelectProductCategoryNR == 0) {
        $output .="<h4 class='text-center text-danger'> <i class='fas fa-frown'></i>  No data found</h4>";
    }else {
        while ($SelectProductCategoryRow = mysqli_fetch_array($SelectProductCategorySql)){
            $ProductCategory  = $SelectProductCategoryRow['category'];
            $select_categories ="SELECT * FROM `categories` WHERE `categories`.`cat_sno` = '$ProductCategory'";
            $categoriessql = mysqli_query($connect,$select_categories);
            $categories_row = mysqli_fetch_array($categoriessql);
            $categories =  $categories_row['cat_sno'];
            $SelectProductQuery="SELECT * FROM `products` WHERE `products`.`category` = '$categories' AND `products`.`pro_status` = '1' ORDER BY RAND() LIMIT 1";
            $SelectProductSql = mysqli_query($connect,$SelectProductQuery);
            $SelectProductRow=mysqli_fetch_array($SelectProductSql);
            $output .=category_card($SelectProductRow['pro_img1'],$categories_row['cat_name']);
        }
    }
    echo $output;
    exit;
}
// End home card fillter
// city card fillter
if (isset($_POST['filter_city_cards'])) {
    $SelectCityQuery ="SELECT * FROM `cities` WHERE `city_name` != '' ";
    if (isset($_POST['search_text']) && $_POST['search_text'] !="") {
        $search_text_filter = $connect -> real_escape_string($_POST['search_text']);
        $SelectCityQuery .=" AND  `city_name` LIKE '%$search_text_filter%'" ;
    }
    $SelectCitySql = mysqli_query($connect,$SelectCityQuery);
    $SelectCityNR = mysqli_num_rows($SelectCitySql);
    $output =" ";
    if ($SelectCityNR == 0) {
        $output .="<h4 class='text-center text-danger'> <i class='fas fa-frown'></i>  No data found</h4>";
    }else {
        while ($SelectCityRow = mysqli_fetch_array($SelectCitySql)){
            $CitySno  = $SelectCityRow['city_sno'];
            $output .=city_card($CitySno,$SelectCityRow['city_name']);
        }
    }
    echo $output;
    exit;
}
// End city card fillter