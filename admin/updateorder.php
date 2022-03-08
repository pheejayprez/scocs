<?php
session_start();

include_once '../include/config.php';
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:index.php');
}
else{
$oid=intval($_GET['oid']);
if(isset($_POST['submit2'])){
$status=$_POST['status'];
$remark=$_POST['remark'];//space char

$query=mysqli_query($con,"insert into ordertrackhistory(orderId,status,remark) values('$oid','$status','$remark')");
$sql=mysqli_query($con,"update orders set orderStatus='$status' where id='$oid'");
echo "<script>alert('Order updated sucessfully...');</script>";
//}
}

 ?>
 
 <script language="javascript" type="text/javascript">
function f2()
{
window.close();
}ser
function f3()
{
window.print(); 
}
</script>
 
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
	
   <script>
function getSubcat(val) {
	$.ajax({
	type: "POST",
	url: "get_subcat.php",
	data:'cat_id='+val,
	success: function(data){
		$("#subcategory").html(data);
	}
	});
}
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
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
              <h2 class="page-title">Orders Update</h2>
  
			  
              <div class="card shadow mb-4">
                <div class="card-header">
                  <strong class="card-title"><span><a href="all-orders.php">Orders |</a></span>| Update Order </strong>
                </div>
                <div class="card-body">
				

			<form name="updateticket" id="updateticket" method="post">
			<table class="datatable-1  table table-borderless table" id="DataTables">
	
				<tr height="30">
				  <td  class="form-group mb-3"><b>order Id:</b></td>
				  <td  class="form-group mb"><?php echo $oid;?></td>
				</tr>
					<?php 
					$ret = mysqli_query($con,"SELECT * FROM ordertrackhistory WHERE orderId='$oid'");
						 while($row=mysqli_fetch_array($ret))
						  {
					 ?>

				<tr height="20">
				  <td class="form-group mb-3" ><b>At Date:</b></td>
				  <td  class="form-group mb"><?php echo $row['postingDate'];?></td>
				</tr>
				 <tr height="20">
				  <td  class="form-group mb-3"><b>Status:</b></td>
				  <td  class="form-group mb"><?php echo $row['status'];?></td>
				</tr>
				 <tr height="20">
				  <td  class="form-group mb-3"><b>Remark:</b></td>
				  <td  class="form-group mb"><?php echo $row['remark'];?></td>
				</tr>

   
				<tr>
				  <td colspan="2"><hr /></td>
				</tr>
				   <?php } ?>
				   <?php 
				   
				$st='Delivered';
			   $rt = mysqli_query($con,"SELECT * FROM orders WHERE id='$oid'");
				 while($num=mysqli_fetch_array($rt))
				 {
				 $currrentSt=$num['orderStatus'];
			   }
				 if($st==$currrentSt)
				 { ?>
			   <tr><td colspan="2"><b>
				  Product Delivered </b></td>
			   <?php }else  {
				  ?>
   
				<tr height="50">
				  <td class="form-group mb-3">Status: </td>
				  <td  class="form-control"><span class="form-group mb-3" >
					<select name="status" class="form-control" required="required" >
					  <option value="">Select Status</option>
							 <option value="in Process">In Process</option>
							  <option value="Delivered">Delivered</option>
					</select>
					</span></td>
				</tr>

				 <tr style=''>
				  <td class="form-group mb-3" >Remark:</td>
				  <td class="form-group mb" align="justify" ><span >
					<textarea cols="50" rows="7" name="remark"  class="form-control" required="required" ></textarea>
					</span></td>
				</tr>
				<tr>
				  <td class="form-group mb-3">&nbsp;</td>
				  <td  >&nbsp;</td>
				</tr>
				<tr>
				  <td class="form-group mb">       </td>
				  <td > <input class="btn mb-2 btn-primary" type="submit" name="submit2"  value="update" /> &nbsp;&nbsp;   
				</tr>
		<?php } ?>
		</table>
							</div>
						</form>
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