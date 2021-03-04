<?php
include "../db.php";
$site_row=mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM `site`"));
?>

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
														
														<select class="form-control input-solid" id="selectFloatingLabel2" required>
															<option value="">------  Select Category-----</option>
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
									<input name="firstname" type="text" class="form-control" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<label>Cost :</label>
									<input name="firstname" type="text" class="form-control" required>
								</div>
							</div>
							<div class="col-sm-4">
							<div class="form-group">
														<label>About :</label>
														<textarea name="about" class="form-control" rows="5" required></textarea>
													</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group">
									<label>Quantity:</label>
									<input name="firstname" type="text" class="form-control" required>
								</div>
							</div>
						  </div>
						  <div class="row">
    <div class="col-sm-4">
	<div class="form-group">
														<label>Picture-1 :</label>
														<div class="input-file input-file-image">
															<img class="img-upload-preview img-circle" width="100" height="100" src="http://placehold.it/100x100" alt="preview">
															<input type="file" class="form-control form-control-file" id="uploadImg" name="uploadImg" accept="image/*" required>
															<label for="uploadImg" class=" label-input-file btn btn-primary">Upload a Image</label>
														</div>
													</div>
    </div>
    <div class="col-sm-4">
	<div class="form-group">
														<label>Picture-2 :</label>
														<div class="input-file input-file-image">
															<img class="img-upload-preview img-circle" width="100" height="100" src="http://placehold.it/100x100" alt="preview">
															<input type="file" class="form-control form-control-file" id="uploadImg" name="uploadImg" accept="image/*" required>
															<label for="uploadImg" class=" label-input-file btn btn-primary">Upload a Image</label>
														</div>
													</div>
    </div>
    <div class="col-sm-4">
	<div class="form-group">
														<label>Picture-3 :</label>
														<div class="input-file input-file-image">
															<img class="img-upload-preview img-circle" width="100" height="100" src="http://placehold.it/100x100" alt="preview">
															<input type="file" class="form-control form-control-file" id="uploadImg" name="uploadImg" accept="image/*" required>
															<label for="uploadImg" class=" label-input-file btn btn-primary">Upload a Image</label>
														</div>
													</div>
    </div>
  </div>
					</div>
				</div>
			

<div class="Ajax_add_product_Responce">
							</div>
							<div class="card-action">
							<input type="button" onclick="AddProduct()" value="Submit">	
							</div>