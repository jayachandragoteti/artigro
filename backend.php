<?PHP
include "db.php";
include 'components.php';
//==========================================================================
// User Details  By Sno
function UserDetailsBySno($UserId){
    include "db.php";
    $UserDetails=mysqli_query($connect,"SELECT * FROM `users` WHERE `users`.`sno`= '$UserId'");
    $UserDetailsRow = mysqli_fetch_array($UserDetails);
    return $UserDetailsRow;
}
// End User Details  By Sno
// Seller Details
function SellerDetails(){
    include "db.php";
    $CustomerId = $_SESSION['login']['sno'];
    $SellerDetails=mysqli_query($connect,"SELECT * FROM `sellers` WHERE `sellers`.`users_sno`= '$CustomerId'");
    $SellerDetailsRow = mysqli_fetch_array($SellerDetails);
    return $SellerDetailsRow;
}
// End Seller Details
// Product Details By Sno
function ProductDetailsByProSno($ProSno){
    include "db.php";
    $ProductDetails=mysqli_query($connect,"SELECT * FROM `products` WHERE `products`.`pro_sno`='$ProSno'");
    $ProductDetailsRow=mysqli_fetch_array($ProductDetails); 
    return $ProductDetailsRow;
}
// End Product Details By Sno
// City Details By Sno
function CityDetailsBySno($CitySno){
    include "db.php";
    $CityDetails=mysqli_query($connect,"SELECT * FROM `cities` WHERE `cities`.`city_sno`= '$CitySno'");
    $CityDetailsRow = mysqli_fetch_array($CityDetails);
    return $CityDetailsRow;
}
// End City Details By Sno
// Seller Details By Sno
function SellerDetailsBySno($SellerSno){
    include "db.php";
    $SellerDetails=mysqli_query($connect,"SELECT * FROM `sellers` WHERE `sellers`.`seller_sno`= '$SellerSno'");
    $SellerDetailsRow = mysqli_fetch_array($SellerDetails);
    return $SellerDetailsRow;
}
// End Seller Details By Sno
// Category Details By Sno
function CategoryDetailsBySno($CategorySno){
    include "db.php";
    $CategoryDetails=mysqli_query($connect,"SELECT * FROM `categories` WHERE `categories`.`cat_sno`= '$CategorySno'");
    $CategoryDetailsRow = mysqli_fetch_array($CategoryDetails);
    return $CategoryDetailsRow;
}
// End Category Details By Sno
// Category Details By Category Sno
function SubCategoryDetailsByCatSno($CategorySno){
    include "db.php";
    $SubCategoryDetails=mysqli_query($connect,"SELECT * FROM `subcategories` WHERE `subcategories`.`cat_sno`= '$CategorySno'");
    $SubCategoryDetailsRow = mysqli_fetch_array($SubCategoryDetails);
    return $SubCategoryDetailsRow;
}
// End SubCategory Details 
// Category Details By Category Sno
function SubCategoryDetails($SubCategorySno){
    include "db.php";
    $SubCategoryDetails=mysqli_query($connect,"SELECT * FROM `subcategories` WHERE `subcategories`.`sub_cat_sno`= '$SubCategorySno'");
    $SubCategoryDetailsRow = mysqli_fetch_array($SubCategoryDetails);
    return $SubCategoryDetailsRow;
}
// End SubCategory Details 


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
                /*if (isset($_SESSION['login'])) {
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
                    
                } else {
                    echo "*Login failed!";
                }*/
                echo "*Loding..";
            }
        }
    }else{
        echo "*All fields must be filled!";
    }
}
// End User Login
// User Registration
if (isset($_POST['username']) && isset($_POST['register_passkey']) && isset($_POST['register_confirm_passkey']) && isset($_POST['UserRegistration'])) {
    if ($_POST['username'] == "" || $_POST['register_passkey'] == "" ||$_POST['register_confirm_passkey'] == ""|| $_POST['UserRegistration'] == "") {
        echo "*All fields must be filled!";
    }elseif ($_POST['register_passkey']!= $_POST['register_confirm_passkey']) {
        echo "*Password and confirm password should be same!";
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
                echo "*Phone verification is not integrated";
            }elseif (filter_var($username, FILTER_VALIDATE_EMAIL)) {
                $UserInsterQuery = "INSERT INTO `users`(`email`,`password`, `otp`, `status`, `category`)VALUE('$username','$register_passkey', '$otp', '0', '1')";
                if ($UserInsterSql = mysqli_query($connect,$UserInsterQuery)) {
                    $to = $username;
                    $from ='artigro.in@gmail.com'; 
                    $fromName = 'No Reply-ARTIGRO'; 
                    
                    $subject = 'Verification Email';
                    
                    $htmlContent = account_activate_email_template($otp); 
                    // Set content-type header for sending HTML email 
                    $headers = "MIME-Version: 1.0" . "\r\n"; 
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
                    
                    // Additional headers 
                    $headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
                    $headers .= 'Cc: welcome@example.com' . "\r\n"; 
                    $headers .= 'Bcc: welcome2@example.com' . "\r\n"; 
                    
                    if (mail($to, $subject, $htmlContent, $headers)) {
                        echo "*you registered successfully,activation link will send to your email";
                    } else {
                        echo "*Failed send verification email,Contact us";
                    }
                } else {
                    echo "*Registration failed,try again";
                }
            }else { 
                echo "*Invalid Email address or Phone number."; 
            } 
        } else {
            echo "*User already exists,Please login";
        }
    }
}
// End User Registration
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
                        $from ='artigro.in@gmail.com';
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
                            echo "*Reset password link will send to your email";
                        } else {
                            echo "*Failed send verification email,Contact us";
                        }
                } elseif (preg_match('/^[0-9]{3}[0-9]{3}[0-9]{4}$/', $username)) {
                    echo "*Phone verification is not integrated";
                } else {
                    echo "*Invalid email address or phone number";
                }
            }else {
                    echo $connect->error."failed,try again";
            }
        }else{
            echo "*Invalid email address or phone number";
        }
        
    } else {
        echo "*Enter a valid email address or phone number";
    } 
}
// End Forgot Pass 
// My account update
if (isset($_SESSION['login']['sno']) && isset($_POST['my_account_update']) && isset($_POST['fname']) && isset($_POST['mname']) && isset($_POST['lname']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['pincode']) && isset($_POST['address']) ) {
    if ( $_POST['phone'] !="" &&  $_POST['fname'] !="" && $_POST['lname'] !="" ) {
        $customer_id = $_SESSION['login']['sno'];
        $fname = $connect -> real_escape_string($_POST['fname']);
        $mname = $connect -> real_escape_string($_POST['mname']);
        $lname = $connect -> real_escape_string($_POST['lname']);
        $phone = $connect -> real_escape_string($_POST['phone']);
        $email = $connect -> real_escape_string($_POST['email']);
        $pincode = $connect -> real_escape_string($_POST['pincode']);
        $address = $connect -> real_escape_string($_POST['address']);
        $update_profile ="";
        $update_profile ="UPDATE `users` SET `fname`='$fname',`lname`='$lname',`phone`='$phone'";
            if ($_POST['mname'] !="") {
                $mname = $_POST['mname'];
                $update_profile .="
                    ,`mname`='$mname'
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
            $update_profile .="WHERE `sno` = '$customer_id'
            ";
            $update_profile_sql = mysqli_query($connect,$update_profile);
            if ($update_profile_sql) {
                echo "*Profile updated";
            } else {
                echo "*failed!";
            }
    } else {
        echo "*All fields must be filled!";
    }
}
//End My account update
//ChangePassword
if (isset($_POST['ChangePassword']) && isset($_POST['old_password']) && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
    if ($_POST['old_password'] !="" && $_POST['new_password'] !="" && $_POST['confirm_password'] !="") {
        $customer_id = $_SESSION['login']['sno'];
        $old_password = $connect -> real_escape_string($_POST['old_password']);
        $new_password = $connect -> real_escape_string($_POST['new_password']);
        $confirm_password = $connect -> real_escape_string($_POST['confirm_password']);
        if ($new_password != $confirm_password) {
            echo "*New password and confirm password should be same-";
        } else {
            $select_user=mysqli_query($connect,"SELECT * FROM `users` WHERE `sno` = '$customer_id' AND `users`.`status` ='1'");
            $select_user_num_rows=mysqli_num_rows($select_user);
            if ($select_user_num_rows == '1') {
                $select_user_row=mysqli_fetch_array($select_user);
                if ($old_password == $select_user_row['password']) {
                    $update_profile =mysqli_query($connect,"UPDATE `users` SET `users`.`password`='$confirm_password' WHERE `sno` = '$customer_id'");
                    if ($update_profile) {
                        echo "*Password Changed Successfully.";
                    } else {
                        echo "*Failed,try again.";
                    }
                } else { 
                    echo "*Old password is incorrect-";
                }
            }
        } 
    } else {
        echo "*All fields must be filled!";
    }
}
//End ChangePassword
// Seller Registration
if (isset($_POST['aadharcard']) && isset($_POST['confirmaadharcard']) && isset($_POST['PANcard']) && isset($_POST['confirmPANcard']) && isset($_POST['selectcity']) && $_FILES['aadharcard_file'] && $_FILES['PANcard_file']) {
    if ($_POST['aadharcard'] !="" && $_POST['confirmaadharcard'] !="" && $_POST['PANcard'] !="" && $_POST['confirmPANcard'] !="" && $_POST['selectcity'] !="") {
        if ($_POST['aadharcard'] != $_POST['confirmaadharcard']) {
            echo "*Aadhar card number and confirm aadhar card number both should be same";
        } elseif($_POST['PANcard'] != $_POST['confirmPANcard']){
            echo "*PAN card number and confirm PAN card number both should be same";
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
                echo "*Your alredy registered, please login again or activate your account.";
            }elseif ($select_users_rows['fname'] == "" || $select_users_rows['lname'] == "" || $select_users_rows['phone'] == "" || $select_users_rows['email'] == ""|| $select_users_rows['address'] == "" || $select_users_rows['pincode'] == "" || $select_users_rows['password'] == "" || $select_users_rows['status'] != "1" ) {
                echo "*Need to complete your profile.";
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
                            $SellerInsertQuery="INSERT INTO `sellers`(`users_sno`, `city_sno`, `seller_status`, `aadharcard`, `aadharcard_file`, `PANcard`, `PANcard_file`) VALUES ('$customer_id','$city_sno','1','$aadharcard','$aadharcard_final_file','$PANcard','$PANcard_final_file')";
                            $SellerInsertSql = mysqli_query($connect,$SellerInsertQuery)  or die(mysqli_error($connect));
                            if ($SellerInsertSql) {
                                $cat=2;
                                $update_profile =mysqli_query($connect,"UPDATE `users` SET `users`.`category`='$cat' WHERE `sno` = '$customer_id'");
                                $_SESSION['login']['category'] = 2;
                                echo "*Successfully registered as seller.";
                            } else {
                                unlink("./seller_files/$aadharcard_final_file");
                                unlink("./seller_files/$PANcard_final_file");
                                echo "*Filed,try again-!";
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
                                $SellerInsertSql = mysqli_query($connect,$SellerInsertQuery) or die(mysqli_error($connect));
                                if ($SellerInsertSql) {
                                    $cat=2;
                                    $update_profile =mysqli_query($connect,"UPDATE `users` SET `users`.`category`='$cat' WHERE `sno` = '$customer_id'");
                                    $_SESSION['login']['category'] = 2;
                                    echo "*Successfully registered as seller.";
                                } else {
                                    unlink("./seller_files/$aadharcard_final_file");
                                    unlink("./seller_files/$PANcard_final_file");
                                    echo "*Filed,try again!";
                                }
                            } else {
                                echo"*City adding is failed,try again!";
                            }
                        }
                    } else {
                        unlink("seller_files/$aadharcard_final_file");
                        echo "*Filed,file is not uploded,try again!";
                    }
                }else {
                    echo "*Filed,file is not uploded,try again!";
                }
            }
        }
    } else {
        echo "*All fields must be filled!";
    }
}
//End Seller Registration
//Home card fillter
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
        $output .=NoDataFound();
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
            $output .=category_card($categories_row['cat_sno'],$SelectProductRow['pro_img1'],$categories_row['cat_name']);
        }
    }
    echo $output;
    exit;
}
// End home card fillter
// Products Filter
if (isset($_POST['ProductsFilter']) && !isset($_POST['FilterSubCategories'])) {
    
    $ProductsFilter = "
        SELECT * FROM `products` WHERE `products`.`pro_status` = '1'
    ";
    if (isset($_POST['Categories'])) {
        $CategoriesFilter = implode("','",$_POST['Categories']);
        $ProductsFilter .= "AND `products`.`category` IN (' ".$CategoriesFilter." ')";
    }
    if (isset($_POST['SubCategories'])) {
        $SubCategoriesFilter = implode("','",$_POST['SubCategories']);
        $ProductsFilter .= "AND `products`.`subcategory` IN (' ".$SubCategoriesFilter." ')";
    }
    if (isset($_POST['Material']) && $_POST['Material'] !="") {
        $MaterialFilter = implode("','",$_POST['Material']);
        $ProductsFilter .= "AND `products`.`pro_materialsused`  IN (' ".$MaterialFilter." ')";
    }
    $ProductsFilterSql = mysqli_query($connect,$ProductsFilter);
    $ProductsFilterNoRow = mysqli_num_rows($ProductsFilterSql);
    if ($ProductsFilterNoRow == 0) { echo NoDataFound();}
    else {
        while ($ProductsFilterRow = mysqli_fetch_array($ProductsFilterSql)){
            echo ShowCategoryProducts($ProductsFilterRow);
        }
    }
}
if (isset($_POST['ProductsFilterSubCategories']) && isset($_POST['FilterSubCategories'])) {
    $FilterSubCategories = implode("','",$_POST['FilterSubCategories']);
    $SelectCategorySql= mysqli_query($connect,"SELECT * FROM `subcategories` WHERE `subcategories`.`cat_sno` IN (' ".$FilterSubCategories." ')");
    $SelectCategoryNoRow = mysqli_num_rows($SelectCategorySql);
    while ($SelectCategoryRow=mysqli_fetch_array($SelectCategorySql)) { ?>
        <li>
            <label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                <input type="checkbox" class="custom-control-input CommonProductFilter ProductSubCategories" value="<?PHP echo $SelectCategoryRow['sub_cat_sno'];?>" id="SubCategoriesCheck<?PHP echo $SelectCategoryRow['sub_cat_sno'] ?>" onchange="ProductsFilter()">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description" for="SubCategoriesCheck<?PHP echo $SelectCategoryRow['sub_cat_sno'] ?>"><?PHP echo $SelectCategoryRow['sub_cat_name'];?></span>
            </label>
        </li>
    <?PHP } 
}
// End Products Filter
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
        $output .=NoDataFound();
    }else {
        while ($SelectCityRow = mysqli_fetch_array($SelectCitySql)){
            $CitySno  = $SelectCityRow['city_sno'];
            $output .=CityCard($CitySno,$SelectCityRow['city_name']);
        }
    }
    echo $output;
    exit;
}
// End city card fillter
// Seller card fillter
if (isset($_POST['FilterSellerCards'])) {
    $SelectSellersQuery = "SELECT * FROM `sellers` WHERE `sellers`.`users_sno` != '0'";
    if (isset($_POST['search_text']) && $_POST['search_text'] !="") {
        $search_text_filter = $connect -> real_escape_string($_POST['search_text']);
        $SelectSellersQuery .=" AND  `aadharcard` LIKE '%$search_text_filter%'" ;
    }
    $SelectSellersSql = mysqli_query($connect,$SelectSellersQuery);
    $SelectSellersNoRow = mysqli_num_rows($SelectSellersSql);
    $output ="";
    if ($SelectSellersNoRow == 0) {
        $output .=NoDataFound();
    }else {
        while ($SelectSellersRow = mysqli_fetch_array($SelectSellersSql)){
            $CityDetailsRow = CityDetailsBySno($SelectSellersRow['city_sno']);
            $SellerDetailsRow = UserDetailsBySno($SelectSellersRow['users_sno']);
            $output .=SellerCard($SelectSellersRow,$SellerDetailsRow,$CityDetailsRow);
        }
    }

    echo $output;
    exit;
}
// End Seller card fillter
// Show Category Products
if (isset($_POST['cat_sno']) && isset($_POST['category_name']) && isset($_POST['ShowCategoryProducts']) && $_POST['cat_sno'] !="" && $_POST['category_name'] !="")  {
    $cat_sno  = $_POST['cat_sno'];
    $category_name = $_POST['category_name'];
    $SelectProductsSql=mysqli_query($connect,"SELECT * FROM `products` WHERE `products`.`category`='$cat_sno' AND `pro_status` ='1'");
    $SelectProductsNoRow = mysqli_num_rows($SelectProductsSql);
    $output ="";
    if ($SelectProductsNoRow == 0) {$output .=NoDataFound();}
    else {
        while ($SelectProductsRow=mysqli_fetch_array($SelectProductsSql)) {
            echo ShowCategoryProducts($SelectProductsRow);
        }
    }
    
}
//End Show Category Products
//Add to Wishlist
if (isset($_POST['pro_sno']) && isset($_POST['AddToWishlist']) && $_POST['AddToWishlist'] != "" && $_POST['pro_sno'] != "" && isset( $_SESSION['login']['sno'])) {
    $ProSno  = $_POST['pro_sno'];
    $customer_id = $_SESSION['login']['sno'];
    $check=mysqli_query($connect,"SELECT * FROM `wishlist` WHERE `product_sno` =  '$ProSno' AND `user_sno` = '$customer_id'");
    $check_num_row =mysqli_num_rows($check);
    if ($check_num_row == 0) {
        $addtowishlist=mysqli_query($connect,"INSERT INTO `wishlist`(`product_sno`, `user_sno`) VALUES ('$ProSno','$customer_id')");
        if ($addtowishlist) {
            echo "Product added to wishlist.";
        }else {
            echo "Product not added to wishlist!";
        }
    } else {
        echo "Already exist!";
    }
}
//End Add to Wishlist
//Add to cart
if (isset($_POST['pro_sno']) && isset($_POST['AddToCart']) && $_POST['AddToCart'] != "" && $_POST['pro_sno'] != "" && isset( $_SESSION['login']['sno'])) {
    $ProSno  = $_POST['pro_sno'];
    $customer_id = $_SESSION['login']['sno'];
    $check=mysqli_query($connect,"SELECT * FROM `cart` WHERE `product_sno` =  '$ProSno' AND `user_sno` = '$customer_id'");
    $check_num_row = mysqli_num_rows($check);
    if ($check_num_row == 0) {
        $addtocart=mysqli_query($connect,"INSERT INTO `cart`(`product_sno`, `user_sno`) VALUES ('$ProSno','$customer_id')");
        if ($addtocart) {
            echo "Product added to cart.";
        }else {
            echo "Product not added to cart!";
        }
    } else {
        echo "Already exist!";
    }
}
//End Add to cart
// My Whishlist Data
if (isset($_POST['MyWhishlistData'])) {
    $customer_id = $_SESSION['login']['sno'];
    $MyWishlist=mysqli_query($connect,"SELECT * FROM `wishlist` WHERE  `user_sno` = '$customer_id'");
    $MyWishlist_num_row = mysqli_num_rows($MyWishlist);
    if ($MyWishlist_num_row > 0) {
        while ($MyWishlist_row = mysqli_fetch_array($MyWishlist)) {
            $ProSno = $MyWishlist_row['product_sno'];
            $ProductDetailsRow = ProductDetailsByProSno($ProSno);
            $CategoryDetailsRow = CategoryDetailsBySno($ProductDetailsRow['category']);
            $SubCategoryDetailsRow = SubCategoryDetailsByCatSno($CategoryDetailsRow['cat_sno']);
            $SellerDetailsRow = SellerDetailsBySno($ProductDetailsRow['seller_sno']);
            $CityDetailsRow = CityDetailsBySno($ProductDetailsRow['city_sno']);
            $UserDetailsRow = UserDetailsBySno($SellerDetailsRow['users_sno']);
            echo MyWishlistCard($ProductDetailsRow,$CategoryDetailsRow,$SubCategoryDetailsRow,$SellerDetailsRow,$CityDetailsRow,$UserDetailsRow);
        }
    }else {
        echo NoDataFound();
    }
}
//End My Whishlist Data
// My Cart Data
if (isset($_POST['MyCartData'])) {
    $customer_id = $_SESSION['login']['sno'];
    $MyCart=mysqli_query($connect,"SELECT * FROM `cart` WHERE  `user_sno` = '$customer_id'");
    $MyCart_num_row = mysqli_num_rows($MyCart);
    
    if ($MyCart_num_row > 0) {
        while ($MyCart_row = mysqli_fetch_array($MyCart)) {
            $ProSno = $MyCart_row['product_sno'];
            $ProductDetailsRow = ProductDetailsByProSno($ProSno);
            $CategoryDetailsRow = CategoryDetailsBySno($ProductDetailsRow['category']);
            $SubCategoryDetailsRow = SubCategoryDetailsByCatSno($CategoryDetailsRow['cat_sno']);
            $SellerDetailsRow = SellerDetailsBySno($ProductDetailsRow['seller_sno']);
            $CityDetailsRow = CityDetailsBySno($ProductDetailsRow['city_sno']);
            $UserDetailsRow = UserDetailsBySno($SellerDetailsRow['users_sno']);
            echo MyCartCard($ProductDetailsRow,$CategoryDetailsRow,$SubCategoryDetailsRow,$SellerDetailsRow,$CityDetailsRow,$UserDetailsRow);
        }
    }else {
        echo NoDataFound();
    }
}
//End My Cart Data
// Display Products View
if (isset($_POST['ProductView']) && isset($_POST['ProSno']) && $_POST['ProSno'] !="") {
    if (isset($_SESSION['login']['sno'])) {
        $customer_id = $_SESSION['login']['sno'];
    }
    $ProSno = $_POST['ProSno'];
    $ProductDetailsRow = ProductDetailsByProSno($ProSno);
    $CategoryDetailsRow = CategoryDetailsBySno($ProductDetailsRow['category']);
    $SubCategoryDetailsRow = SubCategoryDetails($ProductDetailsRow['subcategory']);
    $SellerDetailsRow = SellerDetailsBySno($ProductDetailsRow['seller_sno']);
    $CityDetailsRow = CityDetailsBySno($ProductDetailsRow['city_sno']);
    $UserDetailsRow = UserDetailsBySno($SellerDetailsRow['users_sno']);
    echo ProductViewCard($ProductDetailsRow,$CategoryDetailsRow,$SubCategoryDetailsRow,$SellerDetailsRow,$CityDetailsRow,$UserDetailsRow);
}
// End Display Products View
// Delete Product From Wishlist
if (isset($_POST['DeleteProductFromWishlist']) && isset($_POST['ProSno']) && $_POST['ProSno'] !="") {
    $customer_id = $_SESSION['login']['sno'];
    $ProSno = $_POST['ProSno'];
    $MyWishlist=mysqli_query($connect,"SELECT * FROM `wishlist` WHERE  `user_sno` = '$customer_id' AND `product_sno` = '$ProSno'");
    $MyWishlist_num_row = mysqli_num_rows($MyWishlist);
    if ($MyWishlist_num_row != 0) {
        $DeleteFromWishlist = mysqli_query($connect,"DELETE FROM `wishlist` WHERE  `user_sno` = '$customer_id' AND `product_sno` = '$ProSno'");
        if ($DeleteFromWishlist) {
            echo "Product Deleted From Wishlist";
        }else{
            echo "Failed,try again!";
        }
    }
}
// End Delete Product From Wishlist
// Delete Product From Cart
if (isset($_POST['DeleteProductFromCart']) && isset($_POST['ProSno']) && $_POST['ProSno'] !="") {
    $customer_id = $_SESSION['login']['sno'];
    $ProSno = $_POST['ProSno'];
    $MyCart=mysqli_query($connect,"SELECT * FROM `cart` WHERE  `user_sno` = '$customer_id' AND `product_sno` = '$ProSno'");
    $MyCart_num_row = mysqli_num_rows($MyCart);
    if ($MyCart_num_row != 0) {
        $DeleteFromCart = mysqli_query($connect,"DELETE FROM `cart` WHERE  `user_sno` = '$customer_id' AND `product_sno` = '$ProSno'");
        if ($DeleteFromCart) {
            echo "Product Deleted From Cart";
        }else{
            echo "Failed,try again!";
        }
    }
}
// End Delete Product From Cart
// City Vice Sellers
if (isset($_POST['CityViceSellers']) && isset($_POST['CitySno']) && $_POST['CitySno'] !="") {
    $CitySno = $_POST['CitySno'];
    $CityViceSellers =  mysqli_query($connect,"SELECT * FROM `sellers` WHERE `city_sno` = $CitySno");
    $CityViceSellersNoRow = mysqli_num_rows($CityViceSellers);
    if ($CityViceSellersNoRow > 0) {
        while ($CityViceSellersRow = mysqli_fetch_array($CityViceSellers)) {
            $SellerDetailsRow = UserDetailsBySno($CityViceSellersRow['users_sno']);
            $CityDetailsRow = CityDetailsBySno($CityViceSellersRow['city_sno']);

            echo SellerCard($CityViceSellersRow,$SellerDetailsRow,$CityDetailsRow);
        }
    }else {
        echo  NoDataFound();
    }

}
// End City Vice Sellers
//  Seller View 
if (isset($_POST['SellerView']) && isset($_POST['SellerSno']) && $_POST['SellerSno'] !="") {
    $SellerSno = $_POST['SellerSno'];
    $SellerDetailsRow = SellerDetailsBySno($_POST['SellerSno']);
    $CityDetailsRow = CityDetailsBySno($SellerDetailsRow['city_sno']);
    $UserDetailsRow = UserDetailsBySno($SellerDetailsRow['users_sno']);
    $ProductDetails = mysqli_query($connect,"SELECT * FROM `products` WHERE `products`.`seller_sno` = '$SellerSno'");
    $ProductDetailsNoRow = mysqli_num_rows($ProductDetails);
    echo SellerViewCard($SellerDetailsRow,$CityDetailsRow,$UserDetailsRow,$ProductDetailsNoRow,$ProductDetails);
}
// End  Seller View 

//=========================================================================
// SELLER PART
//=========================================================================
// Add Category
if (isset($_POST['add_category']) && isset($_POST['AddCategory'])) {
    if ($_POST['add_category'] =="" || $_POST['AddCategory'] =="") {
        echo "All fields must be filled!";
    }else{
            $add_category = $connect -> real_escape_string(strtoupper($_POST['add_category']));
            $selectquery="SELECT * FROM `categories` WHERE `cat_name`='$add_category'";
            $selectcategorysql=mysqli_query($connect,$selectquery);
            $selectcategoryrow=mysqli_num_rows($selectcategorysql);
            if ($selectcategoryrow == 0 ) {
                    $seller_row = SellerDetails();
                    $seller_id = $seller_row['seller_sno'];
                    $AddCategoryQuery = "INSERT INTO `categories` (`cat_name`,`seller_sno`) VALUES ('$add_category','$seller_id')";
                    $AddCategorySql = mysqli_query($connect,$AddCategoryQuery);
                    if ($AddCategorySql) {
                        $selectcategorysql=mysqli_query($connect,"SELECT * FROM `categories` WHERE `cat_name`='$add_category'");
                        $selectcategoryrow=mysqli_fetch_array($selectcategorysql);
                        $cat_sno=$selectcategoryrow['cat_sno'];
                        $AddCategorySql = mysqli_query($connect,"INSERT INTO `subcategories`(`sub_cat_name`, `cat_sno`) VALUES ('$add_category','$cat_sno')");
                        echo "*Succesfully added the category.";
                    } else {
                        echo "*Category not added! Try again.";
                    }
            }else{
                echo "*Category already exists.";
            }
            
        }
    }
//End Add Category
// Add Sub Category
if (isset($_POST['select_category']) && isset($_POST['add_sub_category'])&& isset($_POST['AddSubCategory'])) {
    if ($_POST['select_category'] =="" || $_POST['AddSubCategory'] =="" || $_POST['add_sub_category'] =="") {
        echo "All fields must be filled!";
    }else{
            $select_category = $connect -> real_escape_string($_POST['select_category']);
            $add_sub_category = $connect -> real_escape_string(strtoupper($_POST['add_sub_category']));
            $selectcategorysql=mysqli_query($connect,"SELECT * FROM `categories` WHERE `cat_sno`='$select_category'");
            $selectcategorynumrow=mysqli_num_rows($selectcategorysql);
            if ($selectcategorynumrow > 0 ) {
                $selectcategoryrow=mysqli_fetch_array($selectcategorysql);
                $cat_sno=$selectcategoryrow['cat_sno'];
                $selectsubcategoriessql=mysqli_query($connect,"SELECT * FROM `subcategories` WHERE `sub_cat_name`='$add_sub_category' AND `cat_sno`='$cat_sno' ");
                $selectsubcategoriesnumrow=mysqli_num_rows($selectsubcategoriessql);
                if ($selectsubcategoriesnumrow == 0 ) {
                    $AddCategorySql = mysqli_query($connect,"INSERT INTO `subcategories`(`sub_cat_name`, `cat_sno`) VALUES ('$add_sub_category','$cat_sno')");
                    if ($AddCategorySql) {
                        echo "*Succesfully added the subcategory.";
                    } else {
                        echo "*Subcategory not added! Try again.";
                    }
                }else{
                    echo "*Sub category already exists.";
                }     
            }else{
                echo "*Category not exists.";
            }
            
        }
    }
//End Add Sub Category
// Display My Categories
if (isset($_POST['displaymycategories'])) {
    $customer_id = $_SESSION['login']['sno'];
    $seller_select=mysqli_query($connect,"SELECT * FROM `sellers` WHERE `sellers`.`users_sno`= '$customer_id'");
    $seller_row = mysqli_fetch_array($seller_select);
    $seller_id = $seller_row['seller_sno'];
	$selectcategoryquery="SELECT * FROM `categories` WHERE `seller_sno`='$seller_id'";
	$selectcategorysql=mysqli_query($connect,$selectcategoryquery);
	$i=1;
	while($selectcategoryrow=mysqli_fetch_array($selectcategorysql)){ ?>
		<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $selectcategoryrow['cat_name'];?></td>
			
		</tr>
		<?php $i++; }
}
//End Display My Categories
//Add Product Sub Category Select
if (isset($_POST['category']) && isset($_POST['AddProductSubCategorySelect'])) {
    if ($_POST['category'] != "" && $_POST['AddProductSubCategorySelect'] != "") {
        $category=$_POST["category"];
        $result =mysqli_query($connect,"SELECT * FROM `subcategories` WHERE `cat_sno`=$category");
        ?>
        <option value="">---------- Select SubCategory ----------</option>
        <?php
        while($row = mysqli_fetch_array($result)) {
        ?>
            <option value="<?php echo $row["sub_cat_sno"];?>"><?php echo $row["sub_cat_name"];?></option>
        <?php
        }
    }else {
        echo "*All fields must be filed";
    }
}
//End Add Product Sub Category Select
//Add Product
if (isset($_POST['pro_name']) && isset($_POST['category']) && isset($_POST['desc']) && isset($_POST['cost']) && isset($_POST['quantity']) && isset($_POST['materials_used']) && $_FILES['uploadImg1'] && $_FILES['uploadImg2'] && $_FILES['uploadImg3']) {
    if ($_POST['pro_name'] != "" && $_POST['category'] != "" && $_POST['desc'] != "" && $_POST['materials_used'] != "" && $_POST['cost'] != "" && $_FILES['uploadImg1'] && $_FILES['uploadImg2'] && $_FILES['uploadImg3']) {
        $pro_name = $connect -> real_escape_string($_POST['pro_name']);
        $category = $connect -> real_escape_string($_POST['category']);
        $subcategory = $connect -> real_escape_string($_POST['subcategory']);
        $desc = $connect -> real_escape_string($_POST['desc']);
        $cost = $connect -> real_escape_string($_POST['cost']);
        $materials_used = $connect -> real_escape_string($_POST['materials_used']);
        $quantity = $connect -> real_escape_string($_POST['quantity']);
        $uploadImg1 = $_FILES['uploadImg1']['name'];
        $img_file1 = $_FILES['uploadImg1']['tmp_name'];
        $pro_img2 = $_FILES['uploadImg2']['name'];
        $img_file2 = $_FILES['uploadImg2']['tmp_name'];
        $uploadImg3 = $_FILES['uploadImg3']['name'];
        $img_file3 = $_FILES['uploadImg3']['tmp_name'];
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'JPEG' , 'PNG' , 'JPG' , 'jfif');
        $path = 'product_images/';
        $ext1 = strtolower(pathinfo($uploadImg1, PATHINFO_EXTENSION));
        $ext2 = strtolower(pathinfo($pro_img2, PATHINFO_EXTENSION));
        $ext3 = strtolower(pathinfo($uploadImg3, PATHINFO_EXTENSION));
        $final_image1 = strtolower($pro_name.rand(1000,1000000).".".$ext1);
        $final_image2 = strtolower($pro_name.rand(1000,1000000).".".$ext2);
        $final_image3 = strtolower($pro_name.rand(1000,1000000).".".$ext3);
        $path1 = $path.($final_image1);
        $path2 = $path.($final_image2);
        $path3 = $path.($final_image3);
        if(!in_array($ext1, $valid_extensions) || !in_array($ext2, $valid_extensions) || !in_array($ext3, $valid_extensions)){
            echo "Images extension can be 'jpeg', 'jpg', 'png', 'gif', 'JPEG' , 'PNG' , 'JPG' , 'jfif'";
        }elseif($_FILES['uploadImg1']['size'] > 1097152 || $_FILES['uploadImg2']['size'] > 1097152 || $_FILES['uploadImg3']['size'] > 1097152){
            echo "Image size must be exactly 1MB or below";
        }elseif(move_uploaded_file($img_file1,$path1)){
            if (move_uploaded_file($img_file2,$path2)) {
                if(move_uploaded_file($img_file3,$path3)){
                    $seller_row = SellerDetails();
                    $seller_id = $seller_row['seller_sno'];
                    $selectproductquery="SELECT * FROM `sellers` WHERE `seller_sno`='$seller_id'";
                    $selectproductsql=mysqli_query($connect,$selectproductquery);
                    $selprorow=mysqli_fetch_array($selectproductsql);
                    $sell = $selprorow['seller_sno'];
                    $cit= $selprorow['city_sno'];
                    $insert_product="INSERT INTO `products`(`city_sno`, `seller_sno`,`category`,`subcategory`,`pro_name`, `pro_desc`, `pro_cost`, `pro_materialsused`, `quantity`, `pro_img1`, `pro_img2`, `pro_img3`, `pro_status`) VALUES ('$cit','$sell','$category','$subcategory','$pro_name','$desc','$cost','$materials_used','$quantity','$final_image1','$final_image2','$final_image3','1')";
                    $insert_product_sql=mysqli_query($connect,$insert_product);
                    if ($insert_product_sql) {
                        echo "Product added successfully.";
                    } else {
                        unlink("product_images/$final_image3");
                        unlink("product_images/$final_image2");
                        unlink("product_images/$final_image1");
                        echo "Product failed to add.Try again!";
                    }
                }else{
                    unlink("product_images/$final_image2");
                    unlink("product_images/$final_image1");
                    echo "Image-3 is not uploaded.Try Again!";
                }
            }else{
                unlink("../product_images/$final_image1");
                echo "Image-2 is not uploaded.Try Again!";
            }
        }else{
            echo "Image-1 is not uploaded.Try Again!";
        }
    }else {
        echo "All fields must be filled!";
    }
    
}
//End Add Product
// Display My Products
if (isset($_POST['DisplayMyProducts'])) {
    $customer_id = $_SESSION['login']['sno'];
    $seller_select=mysqli_query($connect,"SELECT * FROM `sellers` WHERE `sellers`.`users_sno`= '$customer_id'");
    $seller_row = mysqli_fetch_array($seller_select);
    $seller_id = $seller_row['seller_sno'];
	$selectproductsquery="SELECT * FROM `products` WHERE `products`.`seller_sno`='$seller_id'";
	$selectproductssql=mysqli_query($connect,$selectproductsquery);
	while($selectproductsrow=mysqli_fetch_array($selectproductssql)){  
        $category_sno=$selectproductsrow['category'];
        $category_row = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM `categories`WHERE `categories`.`cat_sno` = '$category_sno'"));
        echo MyProductsCard($selectproductsrow['pro_sno'],$selectproductsrow['pro_name'],$category_row['cat_name'],$category_sno,$selectproductsrow['pro_cost'],$selectproductsrow['pro_img1']);
    }
}
//End Display My Products
// Update My Products
if (isset($_POST['update_my_pro_sno'])&& isset($_POST['update_materials_used']) && isset($_POST['update_cost']) && isset($_POST['update_quantity']) && isset($_POST['update_desc']) ) {
        $ProSno = $connect -> real_escape_string($_POST['update_my_pro_sno']);
        $selectproductsquery="SELECT * FROM `products` WHERE `products`.`pro_sno`='$ProSno'";
        $selectproductssql=mysqli_query($connect,$selectproductsquery);
        $selectproductsrow=mysqli_fetch_array($selectproductssql);  
        $update_pro_name = $connect -> real_escape_string($_POST['update_pro_name']);
        $update_my_product="";
        $update_my_product .="UPDATE `products` SET `pro_status`= '1'
        ";
        if (isset($_POST['update_pro_name'])) {
            $update_pro_name = $connect -> real_escape_string($_POST['update_pro_name']);
            $update_my_product .="
            ,`pro_name`= '$update_pro_name'
            ";
        }
        if (isset($_POST['category']) && isset($_POST['subcategory'])) {
            $category = $connect -> real_escape_string($_POST['category']);
            $subcategory = $connect -> real_escape_string($_POST['subcategory']);
            $update_my_product .="
                ,`category`= '$category',`subcategory`= '$subcategory'
            ";
        }
        if (isset($_POST['update_materials_used'])) {
            $update_materials_used = $connect -> real_escape_string($_POST['update_materials_used']);
            $update_my_product .="
            ,`pro_materialsused`= '$update_materials_used'
            ";
        }
        if (isset($_POST['update_desc'])) {
            $update_desc = $connect -> real_escape_string($_POST['update_desc']);
            $update_my_product .="
            ,`pro_desc`= '$update_desc'
            ";
        }
        if (isset($_POST['update_cost'])) {
            $update_pro_cost = $connect -> real_escape_string($_POST['update_cost']);
            $update_my_product .="
            ,`pro_cost`= '$update_pro_cost'
            ";
        }
        if (isset($_POST['update_quantity'])) {
            $update_quantity = $connect -> real_escape_string($_POST['update_quantity']);
            $update_my_product .="
            ,`quantity`= '$update_quantity'
            ";
        }
        if ($_FILES['update_uploadImg1']['name'] != "") {
            $uploadImg1 = $_FILES['update_uploadImg1']['name'];
            $img_file1 = $_FILES['update_uploadImg1']['tmp_name'];
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'JPEG' , 'PNG' , 'JPG' , 'jfif');
            $path = 'product_images/';
            $ext1 = strtolower(pathinfo($uploadImg1, PATHINFO_EXTENSION));
            $final_image1 = strtolower($update_pro_name.rand(1000,1000000).".".$ext1);
            $path1 = $path.($final_image1);
            if (move_uploaded_file($img_file1,$path1)) {
                if (!in_array($ext1, $valid_extensions)) {
                    echo "Images extension can be 'jpeg', 'jpg', 'png', 'gif', 'JPEG' , 'PNG' , 'JPG' , 'jfif'";
                }else if($_FILES['update_uploadImg1']['size'] > 1097152){
                    echo "Image size must be exactly 1MB or below";
                }else {
                    $update_my_product .="
                    ,`pro_img1`= '$final_image1'
                    ";
                }
            }else {
                echo "Image-1 is not uploaded.Try Again!";
            }
        }
        if ($_FILES['update_uploadImg2']['name'] != "") {
            $uploadImg2 = $_FILES['update_uploadImg2']['name'];
            $img_file2 = $_FILES['update_uploadImg2']['tmp_name'];
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'JPEG' , 'PNG' , 'JPG' , 'jfif');
            $path = 'product_images/';
            $ext2 = strtolower(pathinfo($uploadImg2, PATHINFO_EXTENSION));
            $final_image2 = strtolower($update_pro_name.rand(2000,2000000).".".$ext2);
            $path2 = $path.($final_image2);
            if (move_uploaded_file($img_file2,$path2)) {
                if (!in_array($ext2, $valid_extensions)) {
                    echo "Images extension can be 'jpeg', 'jpg', 'png', 'gif', 'JPEG' , 'PNG' , 'JPG' , 'jfif'";
                }else if($_FILES['update_uploadImg2']['size'] > 1097152){
                    echo "Image size must be exactly 1MB or below";
                }else {
                    $update_my_product .="
                    ,`pro_img2`= '$final_image2'
                    ";
                }
            }else {
                echo "Image-2 is not uploaded.Try Again!";
            }
        }
        if ($_FILES['update_uploadImg3']['name'] != "") {
            $uploadImg3 = $_FILES['update_uploadImg3']['name'];
            $img_file3 = $_FILES['update_uploadImg3']['tmp_name'];
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'JPEG' , 'PNG' , 'JPG' , 'jfif');
            $path = 'product_images/';
            $ext3 = strtolower(pathinfo($uploadImg3, PATHINFO_EXTENSION));
            $final_image3 = strtolower($update_pro_name.rand(3000,3000000).".".$ext3);
            $path3 = $path.($final_image3);
            if (move_uploaded_file($img_file3,$path3)) {
                if (!in_array($ext3, $valid_extensions)) {
                    echo "Images extension can be 'jpeg', 'jpg', 'png', 'gif', 'JPEG' , 'PNG' , 'JPG' , 'jfif'";
                }else if($_FILES['update_uploadImg3']['size'] > 1097152){
                    echo "Image size must be exactly 1MB or below";
                }else {
                    $update_my_product .="
                    ,`pro_img3`= '$final_image3'
                    ";
                }
            }else {
                echo "Image-2 is not uploaded.Try Again!";
            }
        }

        $update_my_product .="
        WHERE `pro_sno`='$ProSno'
        ";
        $update_my_product_query=mysqli_query($connect,$update_my_product);
        if ($update_my_product_query) {
            echo  "*Product details updated.";
        } else {
            echo  "*Failed try again.";
        }     
}
//End Update My Products
// Delete My Products
if (isset($_POST['DeleteMyProduct']) && isset($_POST['pro_sno'])) {
    $customer_id = $_SESSION['login']['sno'];
    $ProSno = $_POST['pro_sno'];
    $selectproductsquery="SELECT * FROM `products` WHERE `products`.`pro_sno`='$ProSno'";
	$selectproductssql=mysqli_query($connect,$selectproductsquery);
    $selectproductsrow=mysqli_fetch_array($selectproductssql);
    $deleteMyProducts =mysqli_query($connect,"DELETE FROM `products` WHERE `products`.`pro_sno`='$ProSno'");
    if ($deleteMyProducts) {
        echo "Deleted";
        $pro_img1  = $selectproductsrow['pro_img1'];
        $pro_img2  =$selectproductsrow['pro_img2'];
        $pro_img3  =$selectproductsrow['pro_img3'];
        unlink("product_images/$pro_img1");
        unlink("product_images/$pro_img2");
        unlink("product_images/$pro_img3");
    }else {
        echo "Failed,try again!";
    }
}
//End Delete My Products
// Display My Products View
if (isset($_POST['pro_sno']) && isset($_POST['MyProductView']) && $_POST['pro_sno'] !="") {
    $customer_id = $_SESSION['login']['sno'];
    $ProSno = $_POST['pro_sno'];
    $selectproductsquery="SELECT * FROM `products` WHERE `products`.`pro_sno`='$ProSno'";
	$selectproductssql=mysqli_query($connect,$selectproductsquery);
    $selectproductsrow=mysqli_fetch_array($selectproductssql);  
    $category_sno=$selectproductsrow['category'];
    $category_row = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM `categories`WHERE `categories`.`cat_sno` = '$category_sno'"));
    echo "kk";
}
//End Display My Products View
//=========================================================================   
//========================================================================= 