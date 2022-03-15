<?php 
session_start();
error_reporting(0);
include('includes/config.php');
$oid=intval($_GET['oid']);
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{
$pid=intval($_GET['pid']);
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

	    <title>Order Track</title>
		
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

	
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
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
				<li class='active'>Customer Reviews</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

      <div class="col-md-offset-2 col-md-8 col-sm-12 text-center wow fadeInUp" data-wow-delay="0.6s">
        
        <br>
		<p class="home-subtitle">Customer Reviews</p>
		<hr style="width:300px;">
      </div>

<div class="body-content outer-top-xs">
	<div class="container" style="margin-bottom:20px;">
		 <div class="col-md-offset-3 col-md-6 col-sm-12 text-center wow fadeInUp" data-wow-delay="0.6s">
																				
										<div class="product-reviews">
										

<?php $qry=mysqli_query($con,"select * from productreviews where productId='$pid'");									
while($rvw=mysqli_fetch_array($qry))
{
?>

											<div class="reviews" style="border: solid 1px #85a392; border-radius:10px; padding: 5px; margin: 10px ">
												<div class="review">
													
                                                <div class="author m-t-15"><i class="fa fa-user-circle-o"></i> <span class="name"><?php echo htmlentities($rvw['name']);?></span></div>	
												<div class="text" style="margin-left:10px; color: #85a392; font-weight: bold">"<?php echo htmlentities($rvw['review']);?>"</div>
												<div style="margin-left:10px; margin-top:10px; font-size:10px;"><?php echo htmlentities($rvw['reviewDate']);?></div>
												</div>
											
											</div>
											<?php } ?><!-- /.reviews -->
										</div><!-- /.product-reviews -->
										<form role="form" class="cnt-form" name="review" method="post">

							</div></div>								
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

	
</body>
</html>
<?php } ?>