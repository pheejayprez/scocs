<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Sugarcoat Creations | Messaging</title>
		<link rel="stylesheet" href="chatcss/users.css">
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="css/simplebar.css">
    <!-- Fonts CSS -->
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
              <h2 class="h5 page-title">Messaging</h2>
           
              <div class="card shadow mb-4">
				<?php
				$headerQuery = "SELECT * FROM `admin` WHERE id = '{$_SESSION["id"]}'";
				$runHeaderQuery = mysqli_query($con, $headerQuery);

				if(!$runHeaderQuery){
					echo "connection failed";
				}else{
					$info = mysqli_fetch_assoc($runHeaderQuery);
				?>
                <div class="card-header">
                  <strong class="card-title" style="text-transform: uppercase">ADMIN | <?php echo $info['firstname']." ".$info['lastname']; ?></strong>
                </div>
				<?php
				}
				?>
				<!-- search box -->
				<div style="padding:10px 0px 0px 20px; color: black;">
					<!-- Visit "fontawesome.com" for icons  -->
					<input type="text" id="search" placeholder="Find a Customer To Chat" autocomplete="OFF" style="width:215px; padding:5px; border-radius:20px; padding-left:20px; border: solid 2px black">
					<i class="fas fa-search"></i>
				</div>
				
				
                <div class="card-body" style=" height:400px; overflow:auto;">
				
				<div id="onlineUsers">
					<!-- ====================No user are avilable to chat================-->
				</div>
				 
                </div>
              </div> <!-- / .card -->
           
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
      

    
      </main> <!-- main -->
    </div> <!-- .wrapper -->
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
	<script src="chatjs/users.js"></script>
	
	
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
    </script>
  </body>
  <?php } ?>
</html>