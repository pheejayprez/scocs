
<?php
session_start();
include('../include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	$pid=intval($_GET['id']);// product id
if(isset($_POST['submit']))
{
	$productname=$_POST['productName'];
	$productimage3=$_FILES["productimage3"]["name"];



	move_uploaded_file($_FILES["productimage3"]["tmp_name"],"productimages/$pid/".$_FILES["productimage3"]["name"]);
	$sql=mysqli_query($con,"update  products set productImage3='$productimage3' where id='$pid' ");
$_SESSION['msg']="Product Image Updated Successfully !!";

}


?>
<!doctype html>
<html lang="en">
  <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/avatars/head-logo.png">
    <title>Sugarcoat Creations | Account Management</title>
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
	
<script>
function getSubcat(val) {
	$.ajax({
	type: "POST",
	url: "get_subcat.php",
	data:'cat_id='+val,
	success: function(data){
		$("#subcategory").html(data);
	}
	});
}
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>	
	
  </head>
  <body class="vertical  light  ">
<?php include('include/header.php');?>
<?php include('include/sidebar.php');?>
	  
	  <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="h5 page-title">Product Management</h2>
  
			  
              <div class="card shadow mb-4">
                <div class="card-header">
                  <strong class="card-title"><span><a href="manage-products.php">Products |</a></span>| Update Image 3 </strong>
                </div>
                <div class="card-body">
				
					<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert" >×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>



									<br />

			<form name="insertproduct" method="post" enctype="multipart/form-data">

									<?php 

									$query=mysqli_query($con,"select productName,productImage3 from products where id='$pid'");
									$cnt=1;
									while($row=mysqli_fetch_array($query))
									{
									  


									?>


									<div class="form-group mb-3">
									<label class="control-label" for="basicinput">Product Name</label>
									<div class="controls">
									<input type="text"    name="productName"  readonly value="<?php echo htmlentities($row['productName']);?>" class="form-control" required>
									</div>
									</div>


									<div class="form-group mb-3">
									<label class="control-label" for="basicinput">Current Product Image3</label>
									<div class="controls">
									<img src="productimages/<?php echo htmlentities($pid);?>/<?php echo htmlentities($row['productImage3']);?>" width="200" height="100"> 
									</div>
									</div>



									<div class="form-group mb-3">
										<label class="control-label" for="basicinput">New Product Image3</label>
											<div class="custom-file">
											<input type="file" name="productimage3" id="productimage3" value="" class="span8 tip" required>
											</div>
									</div>


									<?php } ?>

									<div class="form-group mb-3">
										<div class="controls">
										<button type="submit" name="submit" class="btn mb-2 btn-primary">Update</button>
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
</html>