<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
		
		}else{
			$message="Product ID is invalid";
		}
	}
		echo "<script>alert('Product has been added to the cart')</script>";
		echo "<script type='text/javascript'> document.location ='my-cart.php'; </script>";
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

	    <title>HOME | Sugarcoat Creations</title>

	    <!-- Bootstrap Core CSS -->
		<link rel="stylesheet" href="css/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/css/style.css">
	    <link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/custom.css">
	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="main.css">
	    <link rel="stylesheet" href="owl.carousel.css">
		<link rel="stylesheet" href="owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
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
	
<header class="header-style-1">

	<!-- ============================================== TOP MENU ============================================== -->
<?php include('includes/menu-bar.php');?>

</header>
<!-- ============================================== HEADER : END ============================================== -->

			
<!-- home section -->
<section id="home" class="parallax-section-fixed" >

  <div class="container">
  
    <div class="row">
	
	
      <div> <img  src="img/homepagetext.png" class="home-logo"></div><br />
	  
      
        <div class="tagline" data-wow-delay="0.3s" >Vast expertise of making personalize cake for all occasion<div>
        
        <div style="padding-top: 20px;"><a href="category.php?cid=1"  class="homep-btn" data-wow-delay="0.3s">ORDER NOW</a> </div>
    </div>
  </div>
</section>

<!-- about section -->
<section id="about" class="parallax-section" style="padding:10px;">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-2 col-md-8 col-sm-12 text-center wow fadeInUp" data-wow-delay="0.6s">
        
        <br>
		<p class="home-subtitle">About Sugarcoat Creations</p>
		<hr style="width:300px;">
      </div>
	  
	  <div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.6s">
				
			<p class="about_desc wow fadeInUp" data-wow-delay="0.6s">Sugarcoat Creations offers cake for all ocassions such as birthday, wedding, anniversary and many more.
					It also mounts dedication and customization of Cakes.</p>
			<br>
			<p class="about_desc2 wow fadeInUp" data-wow-delay="0.6s">Sugarcoat Creations was already recognized in the city for its exceptional cake creations. 
			It comes in a variety of designs and will definitely suit customer’s desired design with cakes and cupcakes, a special or simple cake for a celebration for your loved one.
			</p>
               
			
			</div>
			
			<div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.6s">
				 <div class="chef-area" data-wow-delay="0.3s"> <img src="img/cakes-about.gif" class="img-responsive center-block" alt="cakes for about">
				</div>
			</div>
	
    </div>
  </div>
</section>

</div><!-- /.breadcrumb -->

<!-- gallery section -->
<section id="gallery" class="parallax-section" >
  <div class="container">
    <div class="row">
      <div class="col-md-offset-2 col-md-8 col-sm-12 text-center wow fadeInUp" data-wow-delay="0.6s">
        <p class="home-subtitle">Featured Customized Cakes</p>       
        <hr>
      </div>
      <div class="col-md-3 col-md-offset-1 col-sm-3 wow fadeInUp" data-wow-delay="0.3s"> <a href="images/gallery-img1.png" data-lightbox="image-1"><img src="images/gallery-img1.png" alt="gallery img"></a>
        <div>
        </div>
        <a href="images/gallery-img2.png" data-lightbox="image-1"><img src="images/gallery-img2.png" alt="gallery img"></a>
        <div>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s"> <a href="images/gallery-img3.png" data-lightbox="image-1"><img src="images/gallery-img3.png" alt="gallery img"></a>
        <div>
        </div>
      </div>
      <div class="col-md-3 col-sm-3 wow fadeInUp" data-wow-delay="0.9s"> <a href="images/gallery-img4.png" data-lightbox="image-1"><img src="images/gallery-img4.png" alt="gallery img"></a>
        <div>
        </div>
        <a href="images/gallery-img5.png" data-lightbox="image-1" style="width:80%"><img src="images/gallery-img5.png" alt="gallery img"></a>
        <div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- footer section -->
<footer class="parallax-section">
	<div class="container">
		<div class="row h-bg">
			<div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.6s">
				<h2 class="heading">Contact Info.</h2>
				<div class="ph">
					<p><i class="fa fa-phone"></i> Phone</p>
					<h4>0939 279 9250</h4>
				</div>
               
				<div class="address">
					<p><i class="fa fa-map-marker"></i> Our Location</p>
					<h4>#775 National Road Barangay Kumintang Ilaya, Batangas City</h4>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.6s">
				<h2 class="heading">Open Hours</h2>
					<p>Sunday <span>10:30 AM - 10:00 PM</span></p>
					<p>Mon-Fri <span>8:00 AM - 5:00 PM</span></p>
					<p>Saturday <span>11:30 AM - 10:00 PM</span></p>
					
					<h2 class="heading">Follow Us</h2>
				<ul class="social-icon">
					<li><a href="https://www.facebook.com/SUGARCOATCREATIONS/" class="fa fa-facebook wow bounceIn" data-wow-delay="0.3s"></a></li>
				</ul>
			</div>
				
		</div>
	</div>
</footer>

<section id="copyright">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<span class="footText">SUGARCOATCREATIONS ONLINE CAKE SHOP</span>
				
			</div>
		</div>
	</div>
</section>
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