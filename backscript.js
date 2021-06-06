//================================================================
//------------------- Ajax Page Calls -------------------
//================================================================
AjaxIndexPageCall();
//-----------------------

function AjaxIndexPageCall(){
    $.ajax({
        url: "AjaxIndex.php",
        success: function (result) {
            $(".AjaxContentDisplay").html(result);
            // $(".Products,.ChangePassword,.Categories,.Cities,.Sellers,.MyWhishlist,.MyCart,.MyOrders,.MyProfile,.ActAsSeller,.Dashboard,.ActAsCourierServices").removeClass("active");
            // $(".Home").addClass("active");
            // FilterCategoryCards();
            // ProductsFilter();
            //setInterval(function(){ FilterCategoryCards(); },30000;
        }
    });
}
function ProductsPageCall(){
    $(".AjaxContentDisplay").html("<img src='site/PageCallLoader.gif' style='width:100%;height:500px;'>");
    $.ajax({
        url: "Products.php",
        success: function (result) {
            $(".AjaxContentDisplay").html(result);
            $(".Categories,.ChangePassword,.Home,.Cities,.Sellers,.MyWhishlist,.MyCart,.MyOrders,.MyProfile,.ActAsSeller,.Dashboard,.ActAsCourierServices").removeClass("active");
            $(".Products").addClass("active");
            ProductsFilter();
        }
    });
}
function CategoriesPageCall(){
    $(".AjaxContentDisplay").html("<img src='site/PageCallLoader.gif' style='width:100%;height:500px;'>");
    $.ajax({
        url: "categories.php",
        success: function (result) {
            $(".AjaxContentDisplay").html(result);
            $(".Products,.ChangePassword,.Home,.Cities,.Sellers,.MyWhishlist,.MyCart,.MyOrders,.MyProfile,.ActAsSeller,.Dashboard,.ActAsCourierServices").removeClass("active");
            $(".Categories").addClass("active");
            FilterCategoryCards();
        }
    });
}
function CitiesPageCall(){
    $(".AjaxContentDisplay").html("<img src='site/PageCallLoader.gif' style='width:100%;height:500px;'>");
    $.ajax({
        url: "cities.php",
        success: function (result) {
            $(".AjaxContentDisplay").html(result);
            $(".ChangePassword,.Home,.Categories,.Sellers,.MyWhishlist,.MyCart,.MyOrders,.MyProfile,.ActAsSeller,.Dashboard,.ActAsCourierServices,.Products").removeClass("active");
            $(".Cities").addClass("active");
            filter_city_cards();
            //setInterval(function(){  filter_city_cards(); },30000);
        }
    });
}
function SellersPageCall(){
    $(".AjaxContentDisplay").html("<img src='site/PageCallLoader.gif' style='width:100%;height:500px;'>");
    $.ajax({
        url: "sellers.php",
        success: function (result) {
            $(".AjaxContentDisplay").html(result);
            $(".Products,.ChangePassword,.Home,.Categories,.Cities,.MyWhishlist,.MyCart,.MyOrders,.MyProfile,.ActAsSeller,.Dashboard,.ActAsCourierServices").removeClass("active");
            $(".Sellers").addClass("active");
            FilterSellerCards();

            //setInterval(function(){  FilterCategoryCards() },30000);
        }
    });
}
function MyWhishlistPageCall(){
    $(".AjaxContentDisplay").html("<img src='site/PageCallLoader.gif' style='width:100%;height:500px;'>");
    $.ajax({
        url: "mywhishlist.php",
        success: function (result) {
            $(".AjaxContentDisplay").html(result);
            $(".Products,.ChangePassword,.Home,.Categories,.Sellers,.Cities,.MyCart,.MyOrders,.MyProfile,.ActAsSeller,.Dashboard,.ActAsCourierServices").removeClass("active");
            $(".MyWhishlist").addClass("active");
            MyWhishlist();
            setInterval(function(){   MyWhishlist() },30000);
        }
    });
} 
function  MyWhishlist() {
    $(".Ajax_my_wishlist_data_Response").html("<img src='site/PageCallLoader.gif' style='width:100%;height:500px;'>");
    $.ajax({
        type:"POST",
        url:"backend.php",
        data:{MyWhishlistData:"MyWhishlist"},
        success:function (Response) {
            $(".Ajax_my_wishlist_data_Response").html(Response);
        }
    });
}
function MyCartPageCall(){
    $(".AjaxContentDisplay").html("<img src='site/PageCallLoader.gif' style='width:100%;height:500px;'>");
    $.ajax({
        url: "mycart.php",
        success: function (result) {
            $(".AjaxContentDisplay").html(result);
            $(".Products,.ChangePassword,.Home,.Categories,.Sellers,.MyWhishlist,.Cities,.MyOrders,.MyProfile,.ActAsSeller,.Dashboard,.ActAsCourierServices").removeClass("active");
            $(".MyCart").addClass("active");
            MyCart();
            setInterval(function(){  MyCart() },30000);
        }
    });
}
function MyCart() {
    $.ajax({
        type:"POST",
        url:"backend.php",
        data:{MyCartData:"MyCartData"},
        success:function (Response) {
            $(".Ajax_MyCartData_Response").html(Response);
        }
    });
}
function MyOrdersPageCall(){
    $(".AjaxContentDisplay").html("<img src='site/PageCallLoader.gif' style='width:100%;height:500px;'>");
    $.ajax({
        url: "myorders.php",
        success: function (result) {
            $(".AjaxContentDisplay").html(result);
            $(".Products,.ChangePassword,.Home,.Categories,.Sellers,.MyWhishlist,.MyCart,.Cities,.MyProfile,.ActAsSeller,.Dashboard,.ActAsCourierServices").removeClass("active");
            $(".MyOrders").addClass("active");
        }
    });
}
function MyProfilePageCall(){
    $(".AjaxContentDisplay").html("<img src='site/PageCallLoader.gif' style='width:100%;height:500px;'>");
    $.ajax({
        url: "myprofile.php",
        success: function (result) {
            $(".AjaxContentDisplay").html(result);
            $(".Products,.ChangePassword,.Home,.Categories,.Sellers,.MyWhishlist,.MyCart,.MyOrders,.Cities,.ActAsSeller,.Dashboard,.ActAsCourierServices").removeClass("active");
            $(".MyProfile").addClass("active");
        }
    });
}
function ChangePasswordPageCall(){
    $(".AjaxContentDisplay").html("<img src='site/PageCallLoader.gif' style='width:100%;height:500px;'>");
    $.ajax({
        url: "changepassword.php",
        success: function (result) {
            $(".AjaxContentDisplay").html(result);
            $(".Products,.MyProfile,.Home,.Categories,.Sellers,.MyWhishlist,.MyCart,.MyOrders,.Cities,.ActAsSeller,.Dashboard,.ActAsCourierServices").removeClass("active");
            $(".ChangePassword").addClass("active");
        }
    });
}
function AboutPageCall(){
    $(".AjaxContentDisplay").html("<img src='site/PageCallLoader.gif' style='width:100%;height:500px;'>");
    $.ajax({
        url: "about.php",
        success: function (result) {
            $(".AjaxContentDisplay").html(result);
            $(".Products,.MyProfile,.Home,.Categories,.Sellers,.MyWhishlist,.MyCart,.MyOrders,.Cities,.ActAsSeller,.Dashboard,.ActAsCourierServices").removeClass("active");
            $(".About").addClass("active");
        }
    });
}
function ContactPageCall(){
    $(".AjaxContentDisplay").html("<img src='site/PageCallLoader.gif' style='width:100%;height:500px;'>");
    $.ajax({
        url: "contact.php",
        success: function (result) {
            $(".AjaxContentDisplay").html(result);
            $(".Products,.MyProfile,.Home,.Categories,.Sellers,.MyWhishlist,.MyCart,.MyOrders,.Cities,.ActAsSeller,.Dashboard,.ActAsCourierServices").removeClass("active");
            $(".Contact").addClass("active");
        }
    });
}
function TermsAndConditionsPageCall(){
    $(".AjaxContentDisplay").html("<img src='site/PageCallLoader.gif' style='width:100%;height:500px;'>");
    $.ajax({
        url: "Terms&Conditions.php",
        success: function (result) {
            $(".AjaxContentDisplay").html(result);
            $(".Products,.MyProfile,.Home,.Categories,.Sellers,.MyWhishlist,.MyCart,.MyOrders,.Cities,.ActAsSeller,.Dashboard,.ActAsCourierServices").removeClass("active");
            $(".TermsAndConditions").addClass("active");
        }
    });
}
function AjaxCourierServicesRegistrationPageCall(){
    $(".AjaxContentDisplay").html("<img src='site/PageCallLoader.gif' style='width:100%;height:500px;'>");
    $.ajax({
        url: "CourierServicesRegistration.php",
        success: function (result) {
            $(".AjaxContentDisplay").html(result);
            $(".Products,.ChangePassword,.Categories,.Cities,.Sellers,.MyWhishlist,.MyCart,.MyOrders,.MyProfile,.ActAsSeller,.Dashboard,.Home ").removeClass("active");
            $(".ActAsCourierServices").addClass("active");
        }
    });
}
function AjaxSellerRegistrationPageCall(){
    $(".AjaxContentDisplay").html("<img src='site/PageCallLoader.gif' style='width:100%;height:500px;'>");
    $.ajax({
        url: "seller_registration.php",
        success: function (result) {
            $(".AjaxContentDisplay").html(result);
            $(".Products,.ChangePassword,.Categories,.Cities,.Sellers,.MyWhishlist,.MyCart,.MyOrders,.MyProfile,.Home,.Dashboard,.ActAsCourierServices").removeClass("active");
            $(".ActAsSeller").addClass("active");
        }
    });
}
function AjaxAddProductPageCall(){
    $(".AjaxContentDisplay").html("<img src='site/PageCallLoader.gif' style='width:100%;height:500px;'>");
    $.ajax({
        url: "sellers/ajaxaddproduct.php",
        success: function (result) {
            $(".AjaxContentDisplay").html(result);
            $(".Products,.ChangePassword,.Categories,.Cities,.Sellers,.MyWhishlist,.MyCart,.MyOrders,.MyProfile,.Home,.ActAsSeller,.ActAsCourierServices").removeClass("active");
            $(".Dashboard").addClass("active");
        }
    });
}
function AjaxAddCategoryPageCall(){
    $(".AjaxContentDisplay").html("<img src='site/PageCallLoader.gif' style='width:100%;height:500px;'>");
    $.ajax({
        url: "sellers/ajaxaddcategory.php",
        success: function (result) {
            $(".AjaxContentDisplay").html(result);
            $(".Products,.ChangePassword,.Categories,.Cities,.Sellers,.MyWhishlist,.MyCart,.MyOrders,.MyProfile,.Home,.ActAsSeller,.ActAsCourierServices").removeClass("active");
            $(".Dashboard").addClass("active");
            mycategories();
            setInterval(function(){ mycategories() ; },30000);
        }
    });
}
function mycategories() {
    $(".displaymycategories").html("<img src='site/PageCallLoader.gif' style='width:100%;height:500px;'>");
    var displaymycategories="displaymycategories";
    $.ajax({
        type:"POST",
        url:"backend.php",
        data:displaymycategories,
        success:function (Response) {
            $(".displaymycategories").html(Response);
        }
    });
}
function AjaxMyProductsPageCall() {
    $(".AjaxContentDisplay").html("<img src='site/PageCallLoader.gif' style='width:100%;height:500px;'>");
    $.ajax({
        url: "sellers/ajaxmyproducts.php",
        success: function (result) {
            $(".AjaxContentDisplay").html(result);
            $(".Products,.ChangePassword,.Categories,.Cities,.Sellers,.MyWhishlist,.MyCart,.MyOrders,.MyProfile,.Home,.ActAsSeller,.ActAsCourierServices").removeClass("active");
            $(".Dashboard").addClass("active");
            myProducts();
            setInterval(function(){ myProducts(); },30000);
        }
    });
}
function myProducts() {
    var DisplayMyProducts="DisplayMyProducts";
    $.ajax({
        type:"POST",
        url:"backend.php",
        data:DisplayMyProducts,
        success:function (Response) {
            $(".DisplayMyProducts").html(Response);
        }
    });
}
//================================================================
//------------------- ENd Ajax Page Calls -------------------
//================================================================
//-----------------------------------------
//Filters
//-----------------------------------------
    // =======================================
    function get_filter(class_name){
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }   
    function UnCheckFiler() {
        $('.CommonProductFilter').prop('checked', false);
        ProductsFilter();
    }
    // =======================================
    function ProductsFilter(){
        var Categories = get_filter('ProductCategories');
        var SubCategories = get_filter('ProductSubCategories');
        var Material = get_filter('ProductMaterial'); 
        if ($("#search_text").val() != "") {
            var SearchText = $("#search_text").val();
        }else{
            var SearchText = "";
        }
        $.ajax({
            type:"POST",
            url:"backend.php",
            data:{
                ProductsFilter:"ProductsFilter",
                Categories:Categories,
                SubCategories:SubCategories,
                Material:Material,
                SearchText:SearchText
            },
            success:function (Response) {
                $('.Ajax-Products-Filter-Response,.Ajax-Product-Filter').html(Response);
            }
        });
    }
    $('.CommonProductFilter').click(function(){
        ProductsFilter();
    });
    function FilterSubCategories(){
        var Categories = get_filter('ProductCategories');
            $.ajax({
                type:"POST",
                url:"backend.php",
                data:{
                    ProductsFilterSubCategories:"ProductsFilterSubCategories",
                    FilterSubCategories:Categories
                },
                success:function (Response) {
                    ProductsFilter();
                    $('.Ajax-Filter-SubCategories-Response').html(Response);
                }
            });
        }
    // =======================================
    function FilterCategoryCards(){
        var action="filter_data";
        var categories = get_filter('categories');  
        if ($("#search_text").val() != "") {
            var search_text = $("#search_text").val();
        }else{
            var search_text = "";
        }
        $.ajax({
            type:"POST",
            url:"backend.php",
            data:{
                action:action,
                categories:categories,
                search_text:search_text
            },
            success:function (Response) {
                $('.ajax_filter_categories_data').html(Response);
               // AjaxProductsDisplay();
            }
        });
    }
    $('.common_filer_selector').click(function(){
        FilterCategoryCards();
    });
    // =======================================
    function filter_city_cards(){
        var filter_city_cards ="filter_city_cards";
        if ($("#search_text").val() != "") {
            var search_text = $("#search_text").val();
        }else{
            var search_text = "";
        }
        $.ajax({
            type:"POST",
            url:"backend.php",
            data:{
                filter_city_cards:filter_city_cards,
                search_text:search_text
            },
            success:function (Response) {
                $('.ajax_filter_city_data').html(Response);
            }
        });
    }
    // =======================================
    function FilterSellerCards(){
        $.ajax({
            type:"POST",
            url:"backend.php",
            data:{
                FilterSellerCards:"FilterSellerCards",
            },
            success:function (Response) {
                $('.AjaxSellerPageResponse').html(Response);
            }
        });
    }
    // =======================================
    function ResetProductFilter() {
        $('.CommonProductFilter').prop('checked', false);
        ProductsFilter();
    }
    // =======================================
//-----------------------------------------
//ENd Filters
//-----------------------------------------
//================================================================
//------------------- User Functionalities -------------------
//================================================================
//Login
function UserLogin() {
    $(".Login-alerts").html("Loding..");
    var formdata = {
        username : $("#username").val(),
        passkey : $("#passkey").val(),
        login: "login"
    };
    if (formdata.username =="" || formdata.passkey == "" ||formdata.login == "") {
        $(".Login-alerts").html('All fields must be filled!');
    } else {
        $.ajax({
            type:"POST",
            url:"backend.php",
            data:formdata,
            success:function (Response) {
                $(".Login-alerts").html(Response);
                if (Response == '*Loding..') {
                    window.location.assign("index.php");
                }
                
            }
        });
    }
}
//End Login 
//End User Registration
function UserRegistration(){
    $(".registration-alerts").html("Loding..");
    var formdata = {
        username : $("#register_username").val(),
        register_passkey : $("#register_passkey").val(),
        register_confirm_passkey : $("#register_confirm_passkey").val(),
        UserRegistration: "UserRegistration"
    };   
    if (formdata.username  =="" || formdata.register_passkey == "" || formdata.register_confirm_passkey == "" || formdata.UserRegistration == "") {
        $(".registration-alerts").html('All fields must be filled!');
    } else if(formdata.register_passkey != formdata.register_confirm_passkey){
        $(".registration-alerts").html('Password and confirm confirm should be same!');
    } else if ($("#TermAndConditionscheckbox").prop("checked") != true) {
        $(".registration-alerts").html("Please agree  Terms and Conditions");
    }  else {
        $.ajax({
            type:"POST",
            url:"backend.php",
            data:formdata,
            success:function (Response) {
                $(".registration-alerts").html(Response);
            }
        });
    }
}
//End User Registration
//Forgot Password
function show_Forgot_Password_Form() {
    if($("#Forgot_Password_Form").is(":visible")){
        $("#Forgot_Password_Form").hide();
    } else{
        $("#Forgot_Password_Form").show();
    }
}
function Forgot_Password(){
    var Forgot_Email_Mobile = $("#Forgot_Email_Mobile").val();
    if (Forgot_Email_Mobile !="") {
        $.ajax({
            type:"POST",
            url:"backend.php",
            data:{
                Forgot_Email_Mobile:Forgot_Email_Mobile
            },
            success:function (Response) {
                $('.ajax_Forgot_Password_Response').html(Response);
            }
        });
    } else {
        $('.ajax_Forgot_Password_Response').html('*All fields must be filled!');
    } 
}
//End Forgot Password 
//Update My Account
function UpdateMyAccount() {
    var formdata ={
        fname : $("#fname").val(),
        mname : $("#mname").val(),
        lname : $("#lname").val(),
        phone : $("#phone").val(),
        email : $("#email").val(),
        pincode : $("#pincode").val(),
        address : $("#address").val(),
        my_account_update : "my_account_update"
    };
    if (formdata.phone == '' && formdata.email == '' ) {
        $('.my_account_update_Response').html('*All fields must be filled!!');
    } else {
        $.ajax({
            type:"POST",
            url:"backend.php",
            data:formdata,
            success:function (Response) {
                $(".my_account_update_Response").html(Response);
            }
        });
    }    
}
//End Update My Account
//Change Password
function ChangePassword() {
    $(".change_password_Response").html("Loding...");
    var formdata = {
        old_password : $("#old_password").val(),
        new_password : $("#new_password").val(),
        confirm_password : $("#confirm_password").val(),
        ChangePassword: "UserRegistration"
    };   
    if (formdata.new_password  =="" || formdata.old_password == "" || formdata.confirm_password == "" ) {
        $(".change_password_Response").html('All fields must be filled!');
    } else if(formdata.new_password  != formdata.confirm_password){
        $(".change_password_Response").html('New password and confirm password should be same!');
    }  else {
        $.ajax({
            type:"POST",
            url:"backend.php",
            data:formdata,
            success:function (Response) {
                $(".change_password_Response").html(Response);
            }
        });
    }
}
//End Change Password
//Seller Registration
function SellerRegistration() {
    var form = $("#SellerRegistrationForm")[0];
    var formdata =  new FormData(form);
    $.ajax({
        type:"POST",
        url:"backend.php",
        data:formdata,
        contentType:false,
        processData:false,
        success:function (Response) {
            $('.SellerRegistrationErrors').html(Response);
            if (Response == "*Successfully registered as seller.") {
                window.location.assign("index.php");
            }
            
        }
    });
}
//End Seller Registration

function AjaxShowCategoryProductsPageCall(cat_sno,category_name) {
    $.ajax({
        url: "showcategoryproducts.php",
        success: function (result) {
            $(".AjaxContentDisplay").html(result);
            $(".Dashboard,.ChangePassword,.Categories,.Cities,.Sellers,.MyWhishlist,.MyCart,.MyOrders,.MyProfile,.Home,.ActAsSeller,.ActAsCourierServices").removeClass("active");
            ShowCategoryProducts(cat_sno,category_name);
           // setInterval(function(){ ShowCategoryProducts(cat_sno,category_name); }, 30000);
        }
    });
}
function ShowCategoryProducts(cat_sno,category_name) {
    var formdata = {
        cat_sno:cat_sno,
        category_name:category_name,
        ShowCategoryProducts :"ShowCategoryProducts"
    }
    $.ajax({
        type:"POST",
        url:"backend.php",
        data:formdata,
        success:function (Response) {
            $(".Show-Category-Products-Data").html(Response);
        }
    });
}
function AddToWishlist(pro_sno) {
    var formdata = {
        pro_sno:pro_sno,
        AddToWishlist :"AddToWishlist"
    }
    $.ajax({
        type:"POST",
        url:"backend.php",
        data:formdata,
        success:function (Response) {
            $(".Add-To-Cart-Wishlist-Alerts-"+pro_sno+"-Product").html(Response);
        }
    });
}
function AddToCart(pro_sno) {
    var formdata = {
        pro_sno:pro_sno,
        AddToCart :"AddToCart"
    }
    $.ajax({
        type:"POST",
        url:"backend.php",
        data:formdata,
        success:function (Response) {
            $(".Add-To-Cart-Wishlist-Alerts-"+pro_sno+"-Product").html(Response);
        }
    });
}
function ProductView(ProSno) {
    var formdata ={
        ProductView:"ProductView",
        ProSno:ProSno
    }
    $.ajax({
        type:"POST",
        url:"backend.php",
        data:formdata,
        success:function (Response) {
            $(".AjaxContentDisplay").html(Response);
        }
    });
}
function DeleteFromWishlist(ProSno) {
    var formdata ={
        DeleteProductFromWishlist:"DeleteProductFromWishlist",
        ProSno:ProSno
    }
    $.ajax({
        type:"POST",
        url:"backend.php",
        data:formdata,
        success:function (Response) {
            MyWhishlist();
        }
    });
}
function DeleteFromCart(ProSno) {
    var formdata ={
        DeleteProductFromCart:"DeleteProductFromCart",
        ProSno:ProSno
    }
    $.ajax({
        type:"POST",
        url:"backend.php",
        data:formdata,
        success:function (Response) {
            MyCart();
        }
    });
}
function CityViceSellers(CitySno) {
    var formdata ={
        CityViceSellers:"CityViceSellers",
        CitySno:CitySno
    }
    $.ajax({
        type:"POST",
        url:"backend.php",
        data:formdata,
        success:function (Response) {
            $(".AjaxSellerPageResponse,.ajax_filter_city_data").html(Response);
        }
    });
}
function SellerView(SellerSno) {
    $.ajax({
        type:"POST",
        url:"backend.php",
        data:{
            SellerView:"SellerView",
            SellerSno:SellerSno
        },
        success:function (Response) {
            $(".AjaxSellerPageResponse,.ajax_filter_city_data,.AjaxContentDisplay").html(Response);
        }
    });
}
//================================================================
//----------------- End User Functionalities -----------------
//================================================================
//================================================================
//-------------------- Seller --------------------
//================================================================
//Add Category
function AddCategory(){
    var formdata = {
        add_category :$("#add_category").val(),
        AddCategory :"AddCategory"
    }
    $.ajax({
        type:"POST",
        url:"backend.php",
        data:formdata,
        success:function (Response) {
            $(".add-category-alerts").html(Response);
            
        }
    });
}
//End Add Category
//Add Sub Category
function AddSubCategory(){
    var formdata = {
        add_sub_category :$("#add_sub_category").val(),
        select_category :$("#select_category").val(),
        AddSubCategory :"AddSubCategory"
    }
    $.ajax({
        type:"POST",
        url:"backend.php",
        data:formdata,
        success:function (Response) {
            $(".add-sub-category-alerts").html(Response);
        }
    });
}
//End Add Sub Category
//Add Product Sub Category Select  
function AddProductSubCategorySelect(){
    var formdata = {
        category :$("#category").val(),
        AddProductSubCategorySelect :"AddProductSubCategorySelect"
    }
    $.ajax({
        type:"POST",
        url:"backend.php",
        data:formdata,
        success:function (Response) {
            $(".Add-Product-Sub-Category-Select-alerts").html(Response);
        }
    });
}
//End Add Product Sub Category Select
//Add Product
function AddProduct(){
    var files = $('#add_product_form')[0];
    var formdata =  new FormData(files);
    $(".Ajax_add_product_Response").html('Loading...');
    $.ajax({
        type:"POST",
        enctype: 'multipart/form-data',
        url:"backend.php",
        data:formdata,
        contentType:false,
        processData:false,
        success:function (Response) {
            $('.Ajax_add_product_Response').html(Response);
        }
    });
}
//End Add Product
//Update My Product
function UpdateMyProduct(){
    var files = $('#My_Product_Update_Form')[0];
    var formdata =  new FormData(files);
    $(".Update-My-Product-alert").html('Loading...');
    $.ajax({
        type:"POST",
        enctype: 'multipart/form-data',
        url:"backend.php",
        data:formdata,
        contentType:false,
        processData:false,
        success:function (Response) {
            $('.Update-My-Product-alert').html(Response);
        }
    });
}
//End Update My Product
//images display
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#uploadIm1').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
function readURL1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#uploadIm2').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
function readURL2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#uploadIm3').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}//end images display
//End Add Product
// My Product View 
function MyProductView(pro_sno){
    var formdata = {
        pro_sno:pro_sno,
        MyProductView :"MyProductView"
    }
    $.ajax({
        type:"POST",
        url:"sellers/ajaxmyproductsview.php",
        data:formdata,
        success:function (Response) {
            $(".AjaxContentDisplay").html(Response);
        }
    });
}
//End My Product View 
//Delete My Product
function DeleteMyProduct(pro_sno){
    $(".Delete-My-Product-alert").html('Loading...');
    $.ajax({
        type:"POST",
        url:"backend.php",
        data:{
            pro_sno:pro_sno,
            DeleteMyProduct:"DeleteMyProduct"
        },
        success:function (Response) {
            if (Response=="Deleted") {
                window.location.assign("index.php");
            }
            $('.Delete-My-Product-alert').html(Response);
        }
    });
}
//End Delete My Product
//================================================================
//-------------------- End Seller --------------------
//================================================================