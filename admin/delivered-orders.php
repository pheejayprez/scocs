
<?php
session_start();
include('../include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Manila');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


?>

<!doctype html>
<html lang="en">
  <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/avatars/head-logo.png">
    <title>Sugarcoat Creations | Pending Orders</title>
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
	
<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
	
  </head>
  <body class="vertical  light  ">
<?php include('include/header.php');?>
<?php include('include/sidebar.php');?>
	  
       <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row">
                <!-- Small table -->
                <div class="col-12">
                  <h2 class="h5 page-title">Delivered Orders</h2>
                  <p class="mb-3"></p>
                  <div class="card shadow">
                    <div class="card-body">
					
                      
                      <!-- table -->
					  <?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />

                      <table  class="datatable-1  table table-borderless table-hover" id="DataTables" >
					  
                        <thead>
                          <tr>
                       
							<th>#</th>
								<th> Name</th>
								<th>Email /Contact no</th>
								<th>Shipping Address</th>
								<th>Product </th>
								<th>Qty </th>
								<th>Amount </th>
								<th>Order Date</th>
								<th>Action</th>
                          </tr>
                        </thead>
										<tbody>
											<?php 
											$st='Delivered';
											$query=mysqli_query($con,"select users.name as username,users.email as useremail,users.contactno as usercontact,users.shippingStreet as shippingstreet,users.shippingBarangay as shippingbarangay,users.shippingCity as shippingcity,users.shippingProvince as shippingprovince,users.shippingZipcode as shippingzipcode,products.productName as productname,products.shippingCharge as shippingcharge,orders.quantity as quantity,orders.orderDate as orderdate,products.productPrice as productprice,orders.id as id  from orders join users on  orders.userId=users.id join products on products.id=orders.productId where orders.orderStatus='$st'");
											$cnt=1;
											while($row=mysqli_fetch_array($query))
											{
											?>										
												<tr>
													<td><?php echo htmlentities($cnt);?></td>
													<td><?php echo htmlentities($row['username']);?></td>
													<td><?php echo htmlentities($row['useremail']);?>/<?php echo htmlentities($row['usercontact']);?></td>
												
													<td><?php echo htmlentities($row['shippingstreet'].",".$row['shippingbarangay'].",".$row['shippingcity'].",".$row['shippingprovince']."-".$row['shippingzipcode']);?></td>
													<td><?php echo htmlentities($row['productname']);?></td>
													<td><?php echo htmlentities($row['quantity']);?></td>
													<td><?php echo htmlentities($row['quantity']*$row['productprice']+$row['shippingcharge']);?></td>
													<td><?php echo htmlentities($row['orderdate']);?></td>
													<td>    <a href="updateorder.php?oid=<?php echo htmlentities($row['id']);?>" title="Update order"><i class="icon-edit"></i></a>
													</td>
													</tr>

												<?php $cnt=$cnt+1; } ?>
										</tbody>
                      </table>
                     
                    </div>
                  </div>
                </div> <!-- customized table -->
              </div> <!-- end section -->
            
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