
<?php
session_start();
include('../include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	
if(isset($_POST['submit']))
{
	$category=$_POST['category'];
	$subcat=$_POST['subcategory'];
	$productname=$_POST['productName'];
	$productsize=$_POST['productSize'];
	$productprice=$_POST['productprice'];
	$productdescription=$_POST['productDescription'];
	$productscharge=$_POST['productShippingcharge'];
	$productavailability=$_POST['productAvailability'];
	$productimage1=$_FILES["productimage1"]["name"];
	$productimage2=$_FILES["productimage2"]["name"];
	$productimage3=$_FILES["productimage3"]["name"];
//for getting product id
$query=mysqli_query($con,"select max(id) as pid from products");
	$result=mysqli_fetch_array($query);
	 $productid=$result['pid']+1;
	$dir="productimages/$productid";
if(!is_dir($dir)){
		mkdir("productimages/".$productid);
	}

	move_uploaded_file($_FILES["productimage1"]["tmp_name"],"productimages/$productid/".$_FILES["productimage1"]["name"]);
	move_uploaded_file($_FILES["productimage2"]["tmp_name"],"productimages/$productid/".$_FILES["productimage2"]["name"]);
	move_uploaded_file($_FILES["productimage3"]["tmp_name"],"productimages/$productid/".$_FILES["productimage3"]["name"]);
$sql=mysqli_query($con,"insert into products(category_id,subcategory_id,productName,productSize,productPrice,productDescription,shippingCharge,productAvailability,productImage1,productImage2,productImage3) values('$category','$subcat','$productname','$productsize','$productprice','$productdescription','$productscharge','$productavailability','$productimage1','$productimage2','$productimage3')");
$_SESSION['msg']="Product Inserted Successfully !!";

}


?>
<!doctype html>
<html lang="en">
  <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/avatars/head-logo.png">
    <title>Sugarcoat Creations | Product Management</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="css/simplebar.css">
		
    <!-- Fonts CSS -->
		<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="css/feather.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="app-light.css" id="lightTheme">
    <link rel="stylesheet" href="app-dark.css" id="darkTheme" disabled>
	
	  

  </head>
  <body class="vertical  light  ">
<?php include('include/header.php');?>
<?php include('include/sidebar.php');?>

<main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="h5 page-title">Insert Product</h2>
              <div class="card shadow mb-4">
                <div class="card-header">
                  <strong class="card-title"><span><a href="manage-products.php">Products |</a></span>| Insert Product</strong>
                </div>
                <div class="card-body">
				
					<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>

									<br />

										<form name="insertproduct" method="post" enctype="multipart/form-data">


											<div class="col-md-offset-3 col-md-6">
												<label for="example-select">Category</label>
												<select class="form-control" name="category"  required>
													<option value="">Select Category</option> 
														<?php $query=mysqli_query($con,"select * from category");
														while($row=mysqli_fetch_array($query))
														{?>

													<option value="<?php echo $row['category_id'];?>"><?php echo $row['categoryName'];?></option>
														<?php } ?>
												</select>
											</div>
											
											<div class="col-md-offset-3 col-md-6">
												<label for="example-select">Sub Category</label>
												<select class="form-control" name="subcategory"   required>
													<option value="">Select Sub Category</option> 
														<?php $query=mysqli_query($con,"select * from subcategory");
														while($row=mysqli_fetch_array($query))
														{?>

													<option value="<?php echo $row['subcategory_id'];?>"><?php echo $row['subcategory'];?></option>
														<?php } ?>
												</select>
											</div>

											<div class="col-md-offset-3 col-md-6">
												<label for="simpleinput">Product Name</label>
												<input type="text" name="productName"  placeholder="Enter Product Name" class="form-control" required>
											</div>
											
											<div class="col-md-offset-3 col-md-6">
												<label for="simpleinput">Product Price</label>
												<input type="text" name="productprice"  placeholder="Enter Product Price" class="form-control" required>
											</div>
											
											<div class="col-md-offset-3 col-md-6">
												<label for="simpleinput">Product Size</label>
												<input type="text" name="productSize"  placeholder="Enter Product Product Size" class="form-control" required>
											</div>
											
											<div class="col-md-offset-3 col-md-6">
												<label for="example-textarea">Product Description</label>
												<textarea class="form-control" name="productDescription"  placeholder="Enter Product Description" rows="2"></textarea>
											</div>

											<div class="col-md-offset-3 col-md-6">
												<label for="simpleinput">Product Shipping Fee</label>
												<input type="number"name="productShippingcharge"  placeholder="Enter Product Shipping Charge" class="form-control" required>
											</div>

											<div class="col-md-offset-3 col-md-6">
												<label for="example-select">Product Availability</label>
												<select class="form-control" name="productAvailability"  id="productAvailability" required>
													<option value="">Select</option>
													<option value="In Stock">In Stock</option>
													<option value="Out of Stock">Out of Stock</option>
												</select>
											</div>
											</br>
											<div class="col-md-offset-3 col-md-6">
											<label class="control-label" for="basicinput">Product Image1</label>
											<div class="controls">
											<input type="file" name="productimage1" id="productimage1" value="" class="span8 tip" required>
											</div>
											</div>


											<div class="col-md-offset-3 col-md-6">
											<label class="control-label" for="basicinput">Product Image2</label>
											<div class="controls">
											<input type="file" name="productimage2"  class="span8 tip" required>
											</div>
											</div>



											<div class="col-md-offset-3 col-md-6">
											<label class="control-label" for="basicinput">Product Image3</label>
											<div class="controls">
											<input type="file" name="productimage3"  class="span8 tip">
											</div>
											</div>
	
											<br>
											
											<div class="col-md-offset-3 col-md-6">
											<button type="submit" name="submit" class="btn mb-2 btn-primary">Insert</button>
											</div>
							</div>
							</div>
						</form>
					</div>
				</div> <!-- / .card -->
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
    
      </main> <!-- main -->


  
  
    </div> <!-- .wrapper -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/simplebar.min.js"></script>
    <script src='js/daterangepicker.js'></script>
    <script src='js/jquery.stickOnScroll.js'></script>
    <script src="js/tinycolor-min.js"></script>
    <script src="js/config.js"></script>
    <script src="js/apps.js"></script>
	
	
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>

		<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
<?php } ?>