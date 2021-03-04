
	<div class="col-md-4 "></div>
	<div class="col-md-4 ">
		<div class="card full-height">
			<div class="card-body">
				<div class="card-title"><h1>Add Category</h1></div>
					<form method="post">
						<div class="d-flex flex-wrap justify-content-around ">
							<div class="px-2 pb-2 pb-md-0 text-center">
								<div class="form-group">
									<input type="text" class="form-control" name="add_category"id="add_category" placeholder="Enter category name">
								</div>
								<div class="category-alerts">
								</div>
								<input type="button" onclick="AddCategory()" value="Submit" class="form-control form-control-file secondry-bg-color text-white">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4 "></div>
	<div class="container">
  <div class="row justify-content-md-center">
    <div class="col-md-10">
		<div class="card" style="cursor:pointer;">
			<div class="card-body">
				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">SNo</th>
							<th scope="col">Category Name</th>
						</tr>
					</thead>
					<tbody class="displaymycategories">

					</tbody>
				</table>
			</div>
		</div>
    </div>
</div>





