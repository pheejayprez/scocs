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


	<style>	
	@keyframes ordertrack{
		from{
			transform: translateY(-50%);
			opacity:0.25;
		}
		to{
			transform: translateY(100%);
			opacity:1;
		}
	}
	</style>	
		
		
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
				<li><a href="order-history.php">Order History</a></li>
				<li class='active'>Order Track</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

      <div class="col-md-offset-2 col-md-8 col-sm-12 text-center wow fadeInUp" data-wow-delay="0.6s">
        
        <br>
		<p class="home-subtitle">Order Tracking Details !</p>
		<hr style="width:300px;">
      </div>

<div class="body-content outer-top-xs">
	<div class="container" style="margin-bottom:20px;">
	
<?php 

$ret = mysqli_query($con,"SELECT * FROM ordertrackhistory WHERE orderId='$oid'");
$num=mysqli_num_rows($ret);
if($num>0)
{
while($row=mysqli_fetch_array($ret))
      {
					$od='Delivered';
					$oip='in Process';
					   $rt = mysqli_query($con,"SELECT * FROM orders WHERE id='$oid'");
						 while($num=mysqli_fetch_array($rt))
						 {
						 $currrentSt=$num['orderStatus'];
					   }
						 if($oip==$currrentSt)
						 { ?>
					   
			<div class="col-md-12" style="margin-bottom:20px;">

				<center>
				<div>
				<span style="margin-top: 5px;background:#85a392; border-radius: 20px; padding:10px; color:white">Order Number: <?php echo $oid;?></span>
				
				</div>
				</center>
				
		</div>
	
		<div class="col-md-offset-3 col-md-4">
				<div>
				<span style="float:left; margin-top: 5px;  margin-left: 50px; ">Payment Details Verified</span>
				<div style="background:#f5b971; border-radius:50%; width: 30px; height:30px; font-size:20px;"></i></div>
				
				<div style="background:#f5b971; width: 5px; height:100px; font-size:35px;margin-left: 12px;"></div>
				<span style="float:left; margin-top: 5px;  margin-left: 50px; ">Your order is being processed <br></span>
				<span style="float:left; margin-top: 5px;  margin-left: 50px; "><?php echo $row['postingDate'];?></span>
				<div style="background:#f5b971; border-radius:50%; width: 30px; height:30px; font-size:20px"></i></div>
				
				<div style="background:#c8cdca; width: 5px; height:100px; font-size:35px;margin-left: 12px;"><div style="width: 5px; height:50px;background:#f5b971; border-radius:20%;animation:ordertrack 1s; animation-iteration-count: infinite"></div></div>
				<span style="float:left; margin-top: 5px;  margin-left: 50px; ">Your order has been delivered</span>
				<div style="background:#c8cdca; border-radius:50%; width: 30px; height:30px; font-size:20px"></i></div>
				
				</div>
					   
					   
					   <?php } ?>
		
				
		</div>
	
	</div>
<?php } }
else{
   ?>
   
   <div class="col-md-12" style="margin-bottom:20px;">

				<center>
				<div>
				<span style="margin-top: 5px;background:#85a392; border-radius: 20px; padding:10px; color:white">Order Number: <?php echo $oid;?></span><span style="margin-top: 10px;margin-left: 12px; padding: 5px;"><?php echo $row['postingDate'];?></span>
				
				</div>
				</center>
				
		</div>
   
   		<div class="col-md-offset-3 col-md-4">

			
				<div>
				<span style="float:left; margin-top: 5px;  margin-left: 50px; ">We are verifying your payment details</span>
				<div style="background:#f5b971; border-radius:50%; width: 30px; height:30px; font-size:20px;"></i></div>
			
				<div style="background:#c8cdca; width: 5px; height:100px; font-size:35px;margin-left: 12px;"><div style="width: 5px; height:50px;background:#f5b971; border-radius:20%;animation:ordertrack 1s; animation-iteration-count: infinite"></div></div>
				<span style="float:left; margin-top: 5px;  margin-left: 50px; ">Your order is being processed</span>
				<div style="background:#c8cdca; border-radius:50%; width: 30px; height:30px; font-size:20px"></i></div>
				
				<div style="background:#c8cdca; width: 5px; height:100px; font-size:35px;margin-left: 12px;"></div>
				<span style="float:left; margin-top: 5px;  margin-left: 50px; ">Your order has been delivered</span>
				<div style="background:#c8cdca; border-radius:50%; width: 30px; height:30px; font-size:20px"></i></div>
				
				</div>
				
				
		</div>
		
	
			
<?php  } 

$st='Delivered';
$st_inprocess='in Process';
   $rt = mysqli_query($con,"SELECT * FROM orders WHERE id='$oid'");
     while($num=mysqli_fetch_array($rt))
     {
     $currrentSt=$num['orderStatus'];
   }
     if($st==$currrentSt)
     { ?>
 <div class="container" style="margin-bottom:20px;">
    <div class="col-md-12" style="margin-bottom:20px;">

				<center>
				<div>
				
				<span style="margin-top: 5px;background:#85a392; border-radius: 20px; padding:10px; color:white">Order Number: <?php echo $oid;?></span>
			
				</div>
				</center>
				
		</div>
			<div class="col-md-offset-3 col-md-4">
   				<div>
				<span style="float:left; margin-top: 5px;  margin-left: 50px; ">Payment Details Verified</span>
				<div style="background:#f5b971; border-radius:50%; width: 30px; height:30px; font-size:20px;"></i></div>
				
				<div style="background:#f5b971; width: 5px; height:100px; font-size:35px;margin-left: 12px;"></div>
				<span style="float:left; margin-top: 5px;  margin-left: 50px; ">Your order has been processed </span>
				<?php							 
					$rt = mysqli_query($con,"SELECT * FROM ordertrackhistory WHERE orderId='$oid' AND status='$st_inprocess' ");
					$orderStat2= mysqli_fetch_array($rt);
					{?>
					
				<span style="float:left; margin-top: 5px;  margin-left: 50px; "><?php echo $orderStat2['postingDate'];?></span>
				<?php } ?>
				<div style="background:#f5b971; border-radius:50%; width: 30px; height:30px; font-size:20px"></i></div>
				
				<div style="background:#f5b971; width: 5px; height:100px; font-size:35px;margin-left: 12px;"></div>

				<span style="float:left; margin-top: 5px;  margin-left: 50px; ">Your order has been delivered</span>
				<?php							 
					$rt = mysqli_query($con,"SELECT * FROM ordertrackhistory WHERE orderId='$oid' AND status='$st' ");
					$orderStat1= mysqli_fetch_array($rt);
					{?>
				<span style="float:left; margin-top: 5px;  margin-left: 50px; "><?php echo $orderStat1['postingDate'];?></span>
				<?php } ?>
				<div style="background:#f5b971; border-radius:50%; width: 30px; height:30px; font-size:20px"></i></div>
				
				</div>
			</div>
	</div>
   
   <?php } 
 
  ?>

		<!-- /.container -->
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

	
</body>
</html>
<?php } ?>