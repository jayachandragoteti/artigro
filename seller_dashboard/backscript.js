AjaxAddProductPageCall();

function AjaxAddCategoryPageCall(){
    $.ajax({
        url: "ajaxaddcategory.php",
        success: function(result) {
            $(".AjaxContentDisplay").html(result);
            mycategories();
            setInterval(function(){ mycategories() ; }, 1000);

        }
    });
}
function mycategories() {
    var displaymycategories="displaymycategories";
    $.ajax({
        type:"POST",
        url:"backscript.php",
        data:displaymycategories,
        success:function (responce) {
            $(".displaymycategories").html(responce);
        }
    });
}
function AjaxAddProductPageCall(){
    $.ajax({
        url: "ajaxaddproduct.php",
        success: function (result) {
            $(".AjaxContentDisplay").html(result);
        }
    });
} 
function AjaxMyProductPageCall(){
    $.ajax({
        url: "ajaxmyproduct.php",
        success: function (result) {
            $(".AjaxContentDisplay").html(result);
            myproduct();
        }
    });
}
function AjaxEditProductPageCall(){
    $.ajax({
        url: "ajaxeditproduct.php",
        success: function (result) {
            $(".AjaxContentDisplay").html(result);
        }
    });
}

function AddCategory(){
    var formdata = {
        add_category :$("#add_category").val(),
        AddCategory :"AddCategory"
    }
    $.ajax({
        type:"POST",
        url:"backscript.php",
        data:formdata,
        success:function (responce) {
            $(".category-alerts").html(responce);
        }
    });
}
function AddProduct(){
    var form = $("#add_products")[0];
    var formdata =  new FormData(form);
    $(".Ajax_add_product_Responce").html('Loading...');
    $.ajax({
        type:"POST",
        url:"backscript.php",
        data:formdata,
        contentType:false,
        processData:false,
        success:function (responce) {
            $('.Ajax_add_product_Responce').html(responce);

        }
    });
}
function myproduct(){
    var myproducts  = "myproducts";
    $.ajax({
        type:"POST",
        url:"backscript.php",
        data:myproducts,
        success:function (responce) {
            $(".displaymyproducts").html(responce);
        }
    });

}
function AddProduct(){
    var form = $("#add_products")[0];
    var formdata =  new FormData(form);
    $(".Ajax_add_product_Responce").html('Loading...');
    $.ajax({
        type:"POST",
        url:"backscript.php",
        data:formdata,
        contentType:false,
        processData:false,
        success:function (responce) {
            $('.Ajax_add_product_Responce').html(responce);
            
        }
    });
    
    }

    function AddProduct(){
        var form = $("#add_products")[0];
        var formdata =  new FormData(form);
        $(".Ajax_add_product_Responce").html('Loading...');
        $.ajax({
            type:"POST",
            url:"backscript.php",
            data:formdata,
            contentType:false,
            processData:false,
            success:function (responce) {
                $('.Ajax_add_product_Responce').html(responce);
            }
        });
    } 