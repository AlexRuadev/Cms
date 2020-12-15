<?php include "includes/header_admin.php" ?>

<div id="wrapper">

	<?php include "includes/nav_admin.php" ?>

	<div id="page-wrapper">
		<div class="container-fluid">
			<!-- Page Heading -->
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						Welcome to admin
						<small>Author</small>
					</h1>

					<div class="col-xs-6">

						<?php insert_categories(); ?>

						<form action="categories_admin.php" method="post">
							<div class="form-group">
								<label for="cat-title">Add New Category</label>
								<input class="form-control" type="text" name="cat_title">
							</div>
							<div class="form-group">
								<input class="btn btn-primary" type="submit" name="submit" value="Add Category">
							</div>
						</form>

						<?php
						// UPDATE and include query
						if (isset($_GET['edit'])) {
							$cat_id = $_GET['edit'];

							include "includes/update_categories_admin.php";
						}

						?>

					</div>



					<div class="col-xs-6">

						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Id</th>
									<th>Category Title</th>
								</tr>
							</thead>
							<tbody>
								<?php findAllCategories(); ?>
								<?php deleteCategory(); ?>

							</tbody>
						</table>
					</div>

				</div>
			</div>
			<!-- /.row -->

		</div>
		<!-- /.container-fluid -->

	</div>
	<!-- /#page-wrapper -->



	<?php include "includes/footer_admin.php" ?>