<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:.php');
}
else{

date_default_timezone_set('Asia/Manila');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
// code for Shipping address updation
	if(isset($_POST['shipupdate']))
	{
		$sprovince=$_POST['shippingprovince'];
		$scity=$_POST['shippingcity'];
		$sbarangay=$_POST['shippingbarangay'];
		$sstreet=$_POST['shippingstreet'];
		$szipcode=$_POST['shippingzipcode'];
		$query=mysqli_query($con,"update users set shippingProvince='$sprovince',shippingCity='$scity',shippingZipcode='$szipcode',shippingBarangay='$sbarangay',shippingStreet='$sstreet', updationDate='$currentTime' where id='".$_SESSION['id']."'");
		if($query)
		{
echo "<script>alert('Shipping Address has been updated');</script>";
		}
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

	    <title>My Account</title>

	    <!-- Bootstrap Core CSS -->
		<link rel="stylesheet" href="css/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/css/style.css">
	    <link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/custom.css">
	    
	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="main.css">
	    <link rel="stylesheet" href="green.css">
	    <link rel="stylesheet" href="owl.carousel.css">
		<link rel="stylesheet" href="owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="admin/assets/avatars/head-logo.png">

	</head>
    <body class="cnt-home">
<header class="header-style-1">

<!-- ============================================== TOP MENU : END ============================================== -->
<?php include('includes/main-header.php');?>
	<!-- ============================================== NAVBAR ============================================== -->
<?php include('includes/menu-bar.php');?>
<!-- ============================================== NAVBAR : END ============================================== -->

</header>
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="index.php">Home</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-bd">
	<div class="container">
		<div class="checkout-box inner-bottom-sm">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">

					    <!-- checkout-step-02  -->
					  	<div class="panel panel-default checkout-step-02">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseTwo">
						          <span><i class="fa fa-home"></i></span>Shipping Address
						        </a>
						      </h4>
						    </div>
						    <div id="collapseTwo" class="panel-collapse ">
						      <div class="panel-body">
						     
				<?php
$query=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
?>

					<form class="register-form" role="form" method="post">

						<div class="form-group">
					    <label class="info-title" for="Province">Province  <span>*</span></label>
			 <input type="text" class="form-control unicase-form-control text-input" id="shippingprovince" name="shippingprovince" value="<?php echo $row['shippingProvince'];?>" required>
					  </div>
					  <div class="form-group">
					    <label class="info-title" for="City / Municipality">City / Municipality <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="shippingcity" name="shippingcity" required="required" value="<?php echo $row['shippingCity'];?>" >
					  </div>
					  <div class="form-group">
					    <label class="info-title" for="Barangay">Barangay<span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="shippingbarangay" name="shippingbarangay" required="required" value="<?php echo $row['shippingBarangay'];?>" >
					  </div>
					  <div class="form-group">
					    <label class="info-title" for="Street">Street<span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="shippingstreet" name="shippingstreet" required="required" value="<?php echo $row['shippingStreet'];?>" >
					  </div>
 <div class="form-group">
					    <label class="info-title" for="Zipcode">Zipcode <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="shippingzipcode" name="shippingzipcode" required="required" value="<?php echo $row['shippingZipcode'];?>" >
					  </div>


					  <button type="submit" name="shipupdate" class="btn-upper btn btn-primary checkout-page-button">Update</button>
					</form>
					<?php } ?>




						      </div>
						    </div>
					  	</div>
					  	<!-- checkout-step-02  -->
					  	
					</div><!-- /.checkout-steps -->
				</div>
			<?php include('includes/myaccount-sidebar.php');?>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->

</div>
</div>
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

	<!-- For demo purposes – can be removed on production -->
	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	
	<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
</body>
</html>
<?php } ?>