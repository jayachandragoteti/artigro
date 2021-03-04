<?php
include "../db.php";
$site_row=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM `site`"));
?>

			<form method="post" id="add_products"> 
				<div class="card">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<div class="card-header">
									<div class="card-title">Add Products</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<label>Product Name :</label>
									<input name="pro_name" id="pro_name" type="text" class="form-control" required>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label>Category :</label>
										<select class="form-control input-solid" id="category" name="category" required>
											<option value="">-------Select Category-----</option>
											<?php 
											$selectcategoryquery="SELECT * FROM `categories`";
											$selectcategorysql=mysqli_query($connect,$selectcategoryquery);
											while($selectcategoryrow=mysqli_fetch_array($selectcategorysql)){ ?>
												<option value="<?PHP echo$selectcategoryrow['cat_sno'];?>"><?PHP echo$selectcategoryrow['cat_name'];?></option>	
											<?PHP }?>
										</select>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label>Materials Used:</label>
									<input id="materials_used" name="materials_used" type="text" class="form-control" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Cost :</label>
									<input name="cost" id="cost" type="text" class="form-control" required>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Quantity:</label>
									<input name="quantity" id="quantity" type="text" class="form-control" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label>About :</label>
									<textarea name="desc" id="desc" class="form-control" rows="5" required></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<label>Picture-1 :</label>
									<input type='file' onchange="readURL(this);" id="uploadImg1" name="uploadImg1"/>
									<img id="uploadIm1" src="http://placehold.it/150" width="300" alt="your image" class="mt-3" />
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label>Picture-2 :</label>
									<input type='file' onchange="readURL1(this);" id="uploadImg2" name="uploadImg2"/>
									<img id="uploadIm2" src="http://placehold.it/150x150" width="250" alt="your image" class="mt-3" />
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label>Picture-3 :</label>
									<input type='file' onchange="readURL2(this);" id="uploadImg3" name="uploadImg3" class=""/>
									<img id="uploadIm3" src="http://placehold.it/150x150" width="250" alt="your image" class="mt-3"/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4 ">
								<div class="form-group" >
										<label for="submit" class=" label-input-file Ajax_add_product_Responce main-text-color"></label>
										<input type="button" class="form-control form-control-file secondry-bg-color text-white" id="uploadImg3" name="uploadImg3" onclick="AddProduct()" value="submit" >
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
<script>
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
        }
</script>