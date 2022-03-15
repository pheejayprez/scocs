<?php
session_start();
error_reporting(0);
$oid=intval($_GET['oid']);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{
	$query=mysqli_query($con,"select products.productImage1 as pimg1,products.productName as pname,products.id as proid,orders.productId as opid,orders.quantity as qty,products.productPrice as pprice,products.shippingCharge as shippingcharge,orders.paymentMethod as paym,orders.payment_receipt as payreceipt,orders.orderDate as odate,orders.id as orderid, orders.orderStatus as orderStat from orders join products on orders.productId=products.id where orders.id='$oid' and orders.paymentMethod is not null ");
	$row=mysqli_fetch_array($query);
	if(isset($_POST['submit']))
{
	$qname=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
	$row2=mysqli_fetch_array($qname);

	
	$my_review=$_POST['myreview'];
	$r_prod_id=$row['opid'];
	$r_name=$row2['name'];
	$r_order_id=$oid;
	
	$sql=mysqli_query($con,"insert into productreviews(productId,order_id,name,review) values('$r_prod_id','$r_order_id','$r_name','$my_review')");
	echo "<script>alert('Your review has been added!');</script>";
	header('location:order-history.php');
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

	    <title>My Account | Sugarcoat Creations</title>

	    <!-- Bootstrap Core CSS -->
				<link rel="stylesheet" href="css/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/css/style.css">
				<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/custom.css">
	    
	    <!-- Customizable CSS -->
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
				<li class='active'>Insert Review</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-bd">
	<div class="container">
		<div class="checkout-box inner-bottom-sm">
			<div class="row">
				<div class="col-md-offset-2 col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->

	<!-- panel-heading -->
		<div class="panel-heading">
    	<h4 class="unicase-checkout-title">
	        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
	          Review Product
	        </a>
	     </h4>
		 <?php $query=mysqli_query($con,"select products.productImage1 as pimg1,products.productName as pname,products.id as proid,orders.productId as opid,orders.quantity as qty,products.productPrice as pprice,products.shippingCharge as shippingcharge,orders.paymentMethod as paym,orders.payment_receipt as payreceipt,orders.orderDate as odate,orders.id as orderid, orders.orderStatus as orderStat from orders join products on orders.productId=products.id where orders.id='$oid' and orders.paymentMethod is not null ");

while($row=mysqli_fetch_array($query))
{?>
		<img src="admin/productimages/<?php echo $row['proid'];?>/<?php echo $row['pimg1'];?>"  alt="" style="float:left; margin-top: 10px; padding-top: 10px; width:50px; height:50px; border-radius:50%">
		 <h4 style="float:left; margin: 20px; padding-top: 10px;"><?php echo $row['pname'];?></h4>
<?php} ?>
    </div>
    <!-- panel-heading -->
	

	<div id="collapseOne" class="panel-collapse collapse in">

		<!-- panel-body  -->
	    <div class="panel-body">
			<div class="row">		


				<div class="col-md-12 col-sm-12 already-registered-login">


					<form role="form" method="post">


					<div class="col-md-12">
											
												<textarea class="form-control" name="myreview"  placeholder="Write your review here..." rows="5"></textarea>
								</div>
								<div class="col-md-12" style="margin-top:10px">			
					  <button type="submit" name="submit" class="btn mb-2 btn-primary">Submit Review</button>
					  </div>
					</form>
				
				
				

			</div>			
		</div>
		<!-- panel-body  -->

	</div><!-- row -->

<!-- checkout-step-01  -->
					   
					  	
					</div><!-- /.checkout-steps -->
				</div>
			
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


</body>
</html>
<?php } ?>