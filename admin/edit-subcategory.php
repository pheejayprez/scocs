
<?php
session_start();
include('../include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
	$category=$_POST['category'];
	$subcat=$_POST['subcategory'];
	$id=intval($_GET['id']);
$sql=mysqli_query($con,"update subcategory set category_id='$category',subcategory='$subcat',updationDate='$currentTime' where subcategory_id='$id'");
$_SESSION['msg']="Sub-Category Updated !!";

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
              <h2 class="page-title">Product Management</h2>
              <div class="card shadow mb-4">
                <div class="card-header">
                  <strong class="card-title"><span><a href="subcategory.php">Sub Category |</a></span> | Edit Sub Category</strong>
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

			<form  name="Category" method="post" >
<?php
$id=intval($_GET['id']);
$query=mysqli_query($con,"select category.category_id,category.categoryName,subcategory.subcategory from subcategory join category on category.category_id=subcategory.category_id where subcategory.subcategory_id='$id'");
while($row=mysqli_fetch_array($query))
{
?>		

										<div class="col-md-offset-3 col-md-6">
											<label class="control-label" for="basicinput">Category</label>
												<div class="controls">
													<select name="category" class="form-control" required>
													<option value="<?php echo htmlentities($row['category_id']);?>"><?php echo htmlentities($catname=$row['categoryName']);?></option>
														<?php $ret=mysqli_query($con,"select * from category");
															while($result=mysqli_fetch_array($ret))
															{
															echo $cat=$result['categoryName'];
															if($catname==$cat)
															{
																continue;
															}
															else{
														?>
													<option value="<?php echo $result['category_id'];?>"><?php echo $result['categoryName'];?></option>
													<?php } }?>
													</select>
												</div>
										</div>
<br>
										<div class="col-md-offset-3 col-md-6">
											<label for="simpleinput">Sub Category Name</label>
											<input type="text" placeholder="Enter category Name"  name="subcategory" value="<?php echo  htmlentities($row['subcategory']);?>" class="form-control" required>
										</div>

											<?php } ?>	
										<br>
										<div class="col-md-offset-3 col-md-6">
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