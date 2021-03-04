//========================================================
AjaxIndexPageCall();
//-----------------------
function AjaxIndexPageCall(){
    $.ajax({
        url: "AjaxIndex.php",
        success: function (result) {
            $(".AjaxContentDisplay").html(result);
            $(".Categories,.Cities,.Sellers,.MyWhishlist,.MyCart,.MyOrders,.MyProfile,.ActAsSeller,.Dashboard,.ActAsCourierServices").removeClass("active");
            $(".Home").addClass("active");
            filter_category_cards();
            setInterval(function(){ filter_category_cards(); },30000);
        }
    });
}
function CategoriesPageCall(){
    $.ajax({
        url: "categories.php",
        success: function (result) {
            $(".AjaxContentDisplay").html(result);
            $(".Home,.Cities,.Sellers,.MyWhishlist,.MyCart,.MyOrders,.MyProfile,.ActAsSeller,.Dashboard,.ActAsCourierServices").removeClass("active");
            $(".Categories").addClass("active");
            filter_category_cards();
           // setInterval(function(){ filter_category_cards(); },30000);
        }
    });
}
function CitiesPageCall(){
    $.ajax({
        url: "cities.php",
        success: function (result) {
            $(".AjaxContentDisplay").html(result);
            $(".Home,.Categories,.Sellers,.MyWhishlist,.MyCart,.MyOrders,.MyProfile,.ActAsSeller,.Dashboard,.ActAsCourierServices").removeClass("active");
            $(".Cities").addClass("active");
            filter_city_cards();
            setInterval(function(){  filter_city_cards(); },5000);
        }
    });
}
function SellersPageCall(){
    $.ajax({
        url: "sellers.php",
        success: function (result) {
            $(".AjaxContentDisplay").html(result);
            $(".Home,.Categories,.Cities,.MyWhishlist,.MyCart,.MyOrders,.MyProfile,.ActAsSeller,.Dashboard,.ActAsCourierServices").removeClass("active");
            $(".Sellers").addClass("active");
            //setInterval(function(){  filter_category_cards() },5000).fadeoIn(1000);
        }
    });
}
function MyWhishlistPageCall(){
    $.ajax({
        url: "mywhishlist.php",
        success: function (result) {
            $(".AjaxContentDisplay").html(result);
            $(".Home,.Categories,.Sellers,.Cities,.MyCart,.MyOrders,.MyProfile,.ActAsSeller,.Dashboard,.ActAsCourierServices").removeClass("active");
            $(".MyWhishlist").addClass("active");
            //setInterval(function(){  filter_category_cards() },5000).fadeoIn(1000);
        }
    });
}
function MyCartPageCall(){
    $.ajax({
        url: "mycart.php",
        success: function (result) {
            $(".AjaxContentDisplay").html(result);
            $(".Home,.Categories,.Sellers,.MyWhishlist,.Cities,.MyOrders,.MyProfile,.ActAsSeller,.Dashboard,.ActAsCourierServices").removeClass("active");
            $(".MyCart").addClass("active");
            //setInterval(function(){  filter_category_cards() },5000).fadeoIn(1000);
        }
    });
}
function MyOrdersPageCall(){
    $.ajax({
        url: "myorders.php",
        success: function (result) {
            $(".AjaxContentDisplay").html(result);
            $(".Home,.Categories,.Sellers,.MyWhishlist,.MyCart,.Cities,.MyProfile,.ActAsSeller,.Dashboard,.ActAsCourierServices").removeClass("active");
            $(".MyOrders").addClass("active");
            //setInterval(function(){  filter_category_cards() },5000).fadeoIn(1000);
        }
    });
}
function MyProfilePageCall(){
    $.ajax({
        url: "myprofile.php",
        success: function (result) {
            $(".AjaxContentDisplay").html(result);
            $(".Home,.Categories,.Sellers,.MyWhishlist,.MyCart,.MyOrders,.Cities,.ActAsSeller,.Dashboard,.ActAsCourierServices").removeClass("active");
            $(".MyProfile").addClass("active");
            //setInterval(function(){  filter_category_cards() },5000).fadeoIn(1000);
        }
    });
}
function AjaxCourierServicesRegistrationPageCall(){
    $.ajax({
        url: "CourierServicesRegistration.php",
        success: function (result) {
            $(".AjaxContentDisplay").html(result);
            $(".Categories,.Cities,.Sellers,.MyWhishlist,.MyCart,.MyOrders,.MyProfile,.ActAsSeller,.Dashboard,.Home ").removeClass("active");
            $(".ActAsCourierServices").addClass("active");
            //setInterval(function(){  filter_category_cards() },5000).fadeoIn(1000);
        }
    });
}
function AjaxSellerRegistrationPageCall(){
    $.ajax({
        url: "seller_registration.php",
        success: function (result) {
            $(".AjaxContentDisplay").html(result);
            $(".Categories,.Cities,.Sellers,.MyWhishlist,.MyCart,.MyOrders,.MyProfile,.Home,.Dashboard,.ActAsCourierServices").removeClass("active");
            $(".ActAsSeller").addClass("active");
            //setInterval(function(){  filter_category_cards() },5000).fadeoIn(1000);
        }
    });
}
function AjaxAddProductPageCall(){
    $.ajax({
        url: "sellers/ajaxaddproduct.php",
        success: function (result) {
            $(".AjaxContentDisplay").html(result);
            $(".Categories,.Cities,.Sellers,.MyWhishlist,.MyCart,.MyOrders,.MyProfile,.Home,.ActAsSeller,.ActAsCourierServices").removeClass("active");
            $(".Dashboard").addClass("active");
            //setInterval(function(){  filter_category_cards() },5000).fadeoIn(1000);
        }
    });
}
function AjaxAddCategoryPageCall(){
    $.ajax({
        url: "sellers/ajaxaddcategory.php",
        success: function (result) {
            $(".AjaxContentDisplay").html(result);
            $(".Categories,.Cities,.Sellers,.MyWhishlist,.MyCart,.MyOrders,.MyProfile,.Home,.ActAsSeller,.ActAsCourierServices").removeClass("active");
            $(".Dashboard").addClass("active");
            //setInterval(function(){  filter_category_cards() },5000).fadeoIn(1000);
        }
    });
}
function AjaxMyProductsPageCall(){
    $.ajax({
        url: "sellers/ajaxaddproduct.php",
        success: function (result) {
            $(".AjaxContentDisplay").html(result);
            $(".Categories,.Cities,.Sellers,.MyWhishlist,.MyCart,.MyOrders,.MyProfile,.Home,.ActAsSeller,.ActAsCourierServices").removeClass("active");
            $(".Dashboard").addClass("active");
            //setInterval(function(){  filter_category_cards() },5000).fadeoIn(1000);
        }
    });
}
//========================================================
//------ Login ------------
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
            success:function (responce) {
                $(".Login-alerts").html(responce);
                if (responce == "Loding..") {
                    window.location.assign("index.php");
                }
            }
        });
    }
}
//------ /Login ------------
//------ Seller Registration ------------
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
    }else if ($("#TermAndConditionscheckbox").prop("checked") != true) {
        $(".registration-alerts").html("Please agree  Terms and Conditions");
    }  else {
        $.ajax({
            type:"POST",
            url:"backend.php",
            data:formdata,
            success:function (responce) {
                $(".registration-alerts").html(responce);
            }
        });
    }
}
//------ /Seller Registration ------------
//------ Forgot Password ------------
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
            success:function (responce) {
                $('.ajax_Forgot_Password_responce').html(responce);
            }
        });
    } else {
        $('.ajax_Forgot_Password_responce').html('*All fields must be filled!');
    } 
}
//------ /Forgot Password ------------
//------ Update My Account ------------
function UpdateMyAccount() {
    var formdata ={
        fname : $("#fname").val(),
        mname : $("#mname").val(),
        lname : $("#lname").val(),
        phone : $("#phone").val(),
        email : $("#email").val(),
        pincode : $("#pincode").val(),
        address : $("#address").val(),
        old_password : $("#old_password").val(),
        new_password : $("#new_password").val(),
        confirm_password : $("#confirm_password").val(),
        my_account_update : "my_account_update"
    };
    if (formdata.phone == '' && formdata.email == '' ) {
        $('.my_account_update_responce').html('*All fields must be filled!!');
    } else {
        $.ajax({
            type:"POST",
            url:"backend.php",
            data:formdata,
            success:function (responce) {
                $(".my_account_update_responce").html(responce);
            }
        });
    }    
}
//------ /Update My Account ------------
//------ Seller Registration ------------
function SellerRegistration() {
    var form = $("#SellerRegistrationForm")[0];
    var formdata =  new FormData(form);
    $.ajax({
        type:"POST",
        url:"backend.php",
        data:formdata,
        contentType:false,
        processData:false,
        success:function (responce) {
            $('.SellerRegistrationErrors').html(responce);
        }
    });
}
//------ /Seller Registration ------------

//=============================================================
    function get_filter(class_name){
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }   
    function filter_category_cards(){
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
            success:function (responce) {
                $('.ajax_filter_categories_data').html(responce);
            }
        });
    }
    $('.common_filer_selector').click(function(){
        filter_category_cards();
    });
    //-----------------
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
            success:function (responce) {
                $('.ajax_filter_city_data').html(responce);
            }
        });
    }
//========================================================
