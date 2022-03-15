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
	$sql=mysqli_query($con,"update  orders set payment_receipt='$productimage1' where userId='".$_SESSION['id']."' and payment_receipt is null ");
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

	    <title>Payment Method |Sugarcoat Creations </title>
				<link rel="stylesheet" href="css/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/css/style.css">
	    <link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/custom.css">
	    <link rel="stylesheet" href="main.css">
	    <link rel="stylesheet" href="green.css">
	    <link rel="stylesheet" href="owl.carousel.css">
		<link rel="stylesheet" href="owl.transitions.css">
		
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="animate.min.css">
		<link rel="stylesheet" href="rateit.css">
		<link rel="stylesheet" href="bootstrap-select.min.css">
		<link rel="stylesheet" href="assets/css/config.css">
		
		
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="admin/assets/avatars/head-logo.png">
	</head>
    <body class="cnt-home">
	
		
<header class="header-style-1">
<?php include('includes/menu-bar.php');?>
</header>
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="index.php">Home</a></li>
				<li class='active'>Payment Method</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-bd">
	<div class="container">
		<div class="checkout-box faq-page inner-bottom-sm">
			<div class="row">
		
				
				<div class="col-md-offset-2 col-md-8">
					<!-- checkout-progress-sidebar -->
				
<div>
	
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
</div> 
<!-- checkout-progress-sidebar -->				
</div>

                

			<form name="insertproduct" method="post" enctype="multipart/form-data">

						<div class="card-body">



									<div class="form-group mb-3">
										<label class="control-label" for="basicinput">New Product Image1</label>
											<div class="custom-file">
											<input type="file" name="productimage1" id="productimage1" value="" class="span8 tip" required>
											</div>
									</div>


							

									<div class="form-group mb-3">
										<div class="controls">
										<button type="submit" name="submit" class="btn mb-2 btn-primary">Update</button>
										</div>
									</div>
							</div>
						</form>
				
						</div>
			</div><!-- /.row -->
			
			
		
		</div><!-- /.checkout-box -->
		
			
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	
</div><!-- /.container -->
</div><!-- /.body-content -->
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

	<!-- For Gcash Payment Transaction  -->
	<script>
function funtranstype(trtype) {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) 
			{
                document.getElementById("divpaytranstype").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajaxtranstype.php?trtype="+trtype,true);
        xmlhttp.send();

}
	</script>


	

</body>
</html>
<?php } ?>



