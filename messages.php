<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{
	


date_default_timezone_set('Asia/Manila');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );




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

		<link rel="stylesheet" href="admin/chatcss/users.css">
		<link rel="stylesheet" href="admin/chatcss/messages.css">
	
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
				<li class='active'>Chat with us</li>
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
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	<!-- panel-heading -->
		<div class="panel-heading">
    	<h4 class="unicase-checkout-title">
	        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
	          Chat with us
	        </a>
	     </h4>
    </div>
    <!-- panel-heading -->

	<div id="collapseOne" class="panel-collapse collapse in">

		<!-- card-body  -->

	<div class="card-body">
				
				<!-- main section => messages section -->
				<div id="mainSection">
				
				<!-- ================== messages section ======================-->
				
				</div>
	
				<!-- input messages -->
				<div width="100%">
				<center>
				<form action="" id="typingArea">
				</center>
				<div id="messagingTypingSection" >
					<input type="text" name="outgoing" placeholder="type a message..." id="outgoing" class="setid" autocomplete="off" value="<?php echo $myid; ?>" hidden>
					<input type="text" name="incoming" placeholder="type a message..." id="incoming" class="setid" autocomplete="off" value="<?php echo $userid?>" hidden>
					<input type="text" name="typingField" placeholder="type a message..." id="typingField" autocomplete="off">
					<input type="submit" value="Send" id="sendMessage">
				</div>
				</form>
				 </div>
                </div>
		

	</div><!-- row -->
</div>
<!-- checkout-step-01  -->
					   
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

	<script src="admin/chatjs/users.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="admin/chatjs/message.js"></script>
    <script src="admin/chatjs/showChat.js"></script>


	
</body>
</html>
<?php } ?>