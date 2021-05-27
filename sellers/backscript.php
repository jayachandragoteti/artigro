<?PHP 
include "../db.php";
include "components.php";
$site_row=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM `site`"));
if (isset($_POST['add_category']) && isset($_POST['AddCategory'])) {
    if ($_POST['add_category'] =="" || $_POST['AddCategory'] =="") {
        echo "All fields must be filled!";
    }else{
            $add_category = $connect -> real_escape_string(strtoupper($_POST['add_category']));
            $selectquery="SELECT * FROM `categories` WHERE `cat_name`='$add_category'";
            $selectcategorysql=mysqli_query($connect,$selectquery);
            $selectcategoryrow=mysqli_num_rows($selectcategorysql);
            if ($selectcategoryrow == 0 ) {
                    $seller_id=$_SESSION['seller']['seller_sno'];
                    $AddCategoryQuery = "INSERT INTO `categories` (`cat_name`,`seller_sno`) VALUES ('$add_category','$seller_id')";
                    $AddCategorySql = mysqli_query($connect,$AddCategoryQuery);
                    if ($AddCategorySql) {
                        echo "Succesfully added the category";
                    } else {
                        echo "Category not added! Try again";
                    }
            }else{
                echo "category already exists";
            }
            
        }
    }
    
if (isset($_POST['displaymycategories'])) {
    $seller_id=$_SESSION['seller']['seller_sno'];
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
if (isset($_POST['pro_name']) && isset($_POST['category']) && isset($_POST['desc']) && isset($_POST['cost']) && isset($_POST['quantity']) && isset($_POST['materials_used']) && $_FILES['uploadImg1'] && $_FILES['uploadImg2'] && $_FILES['uploadImg3']) {
    if ($_POST['pro_name'] != "" && $_POST['category'] != "" && $_POST['desc'] != "" && $_POST['materials_used'] != "" && $_POST['cost'] != "" && $_FILES['uploadImg1'] && $_FILES['uploadImg2'] && $_FILES['uploadImg3']) {
        $pro_name = $connect -> real_escape_string($_POST['pro_name']);
        $category = $connect -> real_escape_string($_POST['category']);
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
        $path = '../product_images/';
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
                    $seller_id=$_SESSION['seller']['seller_sno'];
                    $selectproductquery="SELECT * FROM `sellers` WHERE `seller_sno`='$seller_id'";
                    $selectproductsql=mysqli_query($connect,$selectproductquery);
                    $selprorow=mysqli_fetch_array($selectproductsql);
                    $sell = $selprorow['seller_sno'];
                    $cit= $selprorow['city_sno'];
                    $insert_product="INSERT INTO `products`(`city_sno`, `seller_sno`,`category`, `pro_name`, `pro_desc`, `pro_cost`, `pro_materialsused`, `quantity`, `pro_img1`, `pro_img2`, `pro_img3`, `pro_status`) VALUES ('$cit','$sell','$category','$pro_name','$desc','$cost','$materials_used','$quantity','$final_image1','$final_image2','$final_image3','1')";
                    $insert_product_sql=mysqli_query($connect,$insert_product);
                    if ($insert_product_sql) {
                        echo "Product added successfully.";
                    } else {
                        unlink("../product_images/$final_image3");
                        unlink("../product_images/$final_image2");
                        unlink("../product_images/$final_image1");
                        echo "Product failed to add.Try again!";
                    }
                }else{
                    unlink("../product_images/$final_image2");
                    unlink("../product_images/$final_image1");
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


if (isset($_POST['myproducts'])) {
    $seller_id=$_SESSION['seller']['seller_sno'];
    $selectproductquery="SELECT * FROM `products` WHERE `seller_sno`='$seller_id'";
    $selectproductsql=mysqli_query($connect,$selectproductquery);
	while($selectproductrow=mysqli_fetch_array($selectproductsql)){ 
        $pro_name  = $selectproductrow['pro_name'];
        $pro_sno  = $selectproductrow['pro_sno'];
      
        echo product_card($seller_id,$pro_name,$pro_sno,$selectproductrow['pro_img1']);
    }
}