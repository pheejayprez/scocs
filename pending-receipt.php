<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{
	if(isset($_POST['submit']))
{
	$productimage1=$_FILES["productimage1"]["name"];


	move_uploaded_file($_FILES["productimage1"]["tmp_name"],"paymentreceipts/".$_FILES["productimage1"]["name"]);
	$sql=mysqli_query($con,"update  orders set payment_receipt='$productimage1' where userId='".$_SESSION['id']."' and payment_receipt is null and paymentMethod='Gcash E-wallet' ");
	header('location:order-history.php');

}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>Pending Order History</title>
		<link rel="stylesheet" href="css/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/css/style.css">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/custom.css">
		
	    <link rel="stylesheet" href="main.css">
	    <link rel="stylesheet" href="owl.carousel.css">
		<link rel="stylesheet" href="owl.transitions.css">
		
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="animate.min.css">
		<link rel="stylesheet" href="rateit.css">
		<link rel="stylesheet" href="bootstrap-select.min.css">

		

		
		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="admin/assets/avatars/head-logo.png">

	

	</head>
    <body class="cnt-home">
	
		
	
		<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">
<?php include('includes/main-header.php');?>
<?php include('includes/menu-bar.php');?>
</header>
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="index.php">Home</a></li>
				<li class='active'>Pending Receipt</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->



<div class="body-content outer-top-xs">
	<?php $query=mysqli_query($con,"select SUM(products.productPrice) as totalprice from orders join products on orders.productId=products.id where orders.userId='".$_SESSION['id']."' and orders.payment_receipt is null and orders.paymentMethod='Gcash E-wallet'");

$num=mysqli_fetch_array($query);
if($num['totalprice'] !="")
{


?>
	<div class="container">

			<div class="col-md-offset-2 col-md-8">
					<!-- checkout-progress-sidebar -->
				
<div>
	
		<div class="panel panel-default info-title">
			<h4 style="text-align:center">Total Payment</h4>
		    


						<div style="text-align:center">
				
					    <h3 class="info-title" style="font-weight:bold"><?php echo $price=$num['totalprice']; ?></h3>
					    <h5>Kindly please refer to the following details below to pay via Gcash E-wallet:</h5>
						
					</div>
					
				
					
			</div>
		


	</div>
	
</div> 

		<div class="col-md-offset-2 col-md-8">
					<!-- checkout-progress-sidebar -->
				

	
		<div class="panel panel-default">
			<h4 style="text-align:center">Sugarcoat Creations Gcash Info</h4>
		    <div class="panel-body">
				<?php
$query=mysqli_query($con,"select * from admin where id=1 ");
while($row=mysqli_fetch_array($query))
{
?>

						<div class="col-md-9">
						<div class="form-group">
					    <label class="info-title" for="name">Account Name</label>
					    <input type="text" class="form-control unicase-form-control text-input" value="<?php echo $row['gcash_name'];?>" readonly>
					  </div>

					  <div class="form-group">
					    <label class="info-title" for="Contact No.">Account Number</label>
					    <input type="text" class="form-control unicase-form-control text-input" value="<?php echo $row['gcash_number'];?>"  readonly>
					  </div>
					  </div>
					  
					  <div class="col-md-3">
					  <div class="wow fadeInUp" data-wow-delay="0.3s"> <a href="admin/QRimages/<?php echo $row['QRimage'];?>" data-lightbox="image-1"><img src="admin/QRimages/<?php echo $row['QRimage'];?>" alt="gallery img" style="width:100%"></a>
    
     
					</div>
					  </div>
					  
					<?php } ?>	
			</div>
		

</div> 
<!-- checkout-progress-sidebar -->				
</div>
<div class="col-md-offset-2 col-md-8">
<div class="panel panel-default"  style="padding:20px;">
		<form name="insertproduct" method="post" enctype="multipart/form-data">

					
<center>
									<div class="form-group mb-12">
										<label class="control-label" for="basicinput" style="font-size: 15px;">Attached your receipt here! </label>
											<div class="custom-file">
											<input type="file" name="productimage1" id="productimage1" value="" class="span8 tip" required>
											</div>
											
									</div>
									<div class="form-group md-12">
										<div class="controls">
										<button type="submit" name="submit" class="btn mb-2 btn-primary">SUBMIT</button>
										</div>
									</div>
									

	</center>						
						</form>
</div>
</div>

</div> <!-- /.container -->
		

	<?php } else{?>
<tr>
<center>
<td colspan="10" align="center"><h4>No Result Found</h4></td>
</center>
</tr>
<?php } ?>	


		</div> <!-- /.body-content -->
	
<?php include('includes/footer.php');?>

	<script src="assets/js/jquery-1.11.1.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
	
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>

	
</body>
</html>
<?php } ?>