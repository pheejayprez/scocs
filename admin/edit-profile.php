
<?php
session_start();
include('../include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Manila');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
	$fname=$_POST['firstname'];
	$mname=$_POST['middlename'];
	$lname=$_POST['lastname'];
	$gcash_name=$_POST['gcash_name'];
	$gcash_number=$_POST['gcash_number'];
	$productimage1=$_FILES["productimage1"]["name"];
	

	move_uploaded_file($_FILES["productimage1"]["tmp_name"],"productimages/".$_FILES["productimage1"]["name"]);
	
$sql=mysqli_query($con,"update admin set firstname='$fname',middlename='$mname',lastname='$lname',gcash_name='$gcash_name',gcash_number='$gcash_number',QRimage='$productimage1',updationDate='$currentTime' where id=1");
$_SESSION['msg']="Profile Updated !!";

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
              <h2 class="h5 page-title">Profile Settings</h2>
              <div class="card shadow mb-4">
                <div class="card-header">
                  <strong class="card-title">Profile</strong>
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

			<form name="Category" method="post" >
<?php

$query=mysqli_query($con,"select * from admin where id=1");
while($row=mysqli_fetch_array($query))
{
?>									

							<div class="row">
							<div class="col-md-6">
							<strong>Personal Info.</strong>
							  <div class="form-group mb-3">
								<label for="simpleinput">Firstname</label>
								<input type="text" placeholder="Enter Firstname"  name="firstname" value="<?php echo  htmlentities($row['firstname']);?>"class="form-control" required>
							  </div>
								<div class="form-group mb-3">
								<label for="simpleinput">Middlename</label>
								<input type="text" placeholder="Enter Middlename (Optional)"  name="middlename" value="<?php echo  htmlentities($row['middlename']);?>"class="form-control">
							  </div>
							  <div class="form-group mb-3">
								<label for="simpleinput">Lastname</label>
								<input type="text" placeholder="Enter Lastname"  name="lastname" value="<?php echo  htmlentities($row['lastname']);?>"class="form-control" required>
							  </div>
							  <strong>Gcash Account Info.</strong>
							  <div class="form-group mb-3">
								<label for="simpleinput">Account Name</label>
								<input type="text" placeholder="Gcash Account Name"  name="gcash_name" value="<?php echo  htmlentities($row['gcash_name']);?>"class="form-control" required>
							  </div>
							  <div class="form-group mb-3">
								<label for="simpleinput">Account Number</label>
								<input type="text" placeholder="Gcash Account Number"  name="gcash_number" value="<?php echo  htmlentities($row['gcash_number']);?>"class="form-control" required>
							  </div>
							  
							  <div class="form-group mb-3">
<label class="control-label" for="basicinput">QR Code</label>
<div class="controls">
<img src="QRimages/<?php echo htmlentities($row['QRimage']);?>" width="200" height="200"> <a href="update-qr-code.php?id=<?php echo $row['id'];?>" class="btn mb-2 btn-outline-primary">Change QR Code</a>
</div>
</div>
						
										  <?php } ?>	

							    <div class="form-group mb-3">
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