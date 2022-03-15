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
	<link rel="stylesheet" href="chatcss/users.css">
	<link rel="stylesheet" href="chatcss/messages.css">

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
				$myid = $_SESSION['id'];
				// getting from messages url
				$userid = mysqli_real_escape_string($con, $_GET['userid']);

				$headerQuery = "SELECT * FROM `users` WHERE id = '{$userid}'";
				$runHeaderQuery = mysqli_query($con, $headerQuery);

				if (!$runHeaderQuery) {
					echo "Connection failed";
				} else {
					$info = mysqli_fetch_assoc($runHeaderQuery);
				?>
				<!-- =======================user Detail (name & status)============================== -->
				<div class="card-header" style="padding:5px">
				<a href="users.php"><strong class="card-title" style="float:left; font-size: 30px;">&#8592;</strong></a>
				<center>
					<img src="images/message-profile.jpg" alt="profilepic" style="width:50px; border-radius:50%">
                  <strong class="card-title"><?php echo $info['name']?></strong>
				 </center>
                </div>
			
				    <?php
					}
				?>
				
                <div class="card-body" style=" height:440px;">
				
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
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="chatjs/message.js"></script>
    <script src="chatjs/showChat.js"></script>
	
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