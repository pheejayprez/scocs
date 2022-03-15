
<?php
session_start();
include('../include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

?>
<!doctype html>
<html lang="en">
  <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/avatars/head-logo.png">
    <title>Sugarcoat Creations | Account Management</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="css/simplebar.css">
		
    <!-- Fonts CSS -->
		<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
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
              <h2 class="h5 page-title">Account Management</h2>
  
			  
			            <div class="card shadow mb-4">
                <div class="card-header">
                  <strong class="card-title">User Login Logs</strong>
                </div>
     
<div class="module-body table">
		<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />

							
								<table class="datatable-1  table table-borderless table-hover" id="DataTables">
									<thead>
										<tr>
											<th>#</th>
											<th> User Email</th>
											<th>User IP </th>
											<th>Login Time</th>
											<th>Logout Time </th>
											<th>Status </th>
										
										</tr>
									</thead>
<?php $query=mysqli_query($con,"select * from userlog ");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>									
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['userEmail']);?></td>
											<td><?php echo htmlentities($row['userip']);?></td>
											<td> <?php echo htmlentities($row['loginTime']);?></td>
											<td><?php echo htmlentities($row['logout']); ?></td>
										<td><?php $st=$row['status'];

if($st==1)
{
	echo "Successfull";
}
else
{
	echo "Failed";
}
										 ?></td>
											
											
										<?php $cnt=$cnt+1; } ?>
										
										
								</table>
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
	
	
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>

		<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
  </body>
  <?php } ?>
</html>