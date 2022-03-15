<?php 
session_start();
error_reporting(0);
include('includes/config.php');
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

	    <title>My Purchases</title>
		
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
				<li class='active'>Order History</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row inner-bottom-sm">
			<div class="shopping-cart">
				<div class="col-md-12 col-sm-12 shopping-cart-table ">
	<div class="table-responsive">
<form name="cart" method="post">	

		<table class="table table-bordered">
			<thead>
				<tr>
					<th class="cart-romove item">#</th>
					<th class="cart-description item">Image</th>
					<th class="cart-product-name item">Product Name</th>
			
					<th class="cart-qty item">Quantity</th>
					<th class="cart-sub-total item">Price Per unit</th>
					<th class="cart-sub-total item">Shipping Charge</th>
					<th class="cart-total item">Grandtotal</th>
					<th class="cart-total item">Payment Method</th>
					<th class="cart-total item">Receipt</th>
					<th class="cart-description item">Order Date</th>
					<th class="cart-total last-item">Action</th>
				</tr>
			</thead><!-- /thead -->
			
			<tbody>

<?php $query=mysqli_query($con,"select products.productImage1 as pimg1,products.productName as pname,products.id as proid,orders.productId as opid,orders.quantity as qty,products.productPrice as pprice,products.shippingCharge as shippingcharge,orders.paymentMethod as paym,orders.payment_receipt as payreceipt,orders.orderDate as odate,orders.id as orderid, orders.orderStatus as orderStat from orders join products on orders.productId=products.id where orders.userId='".$_SESSION['id']."' and orders.paymentMethod is not null ");
$cnt=1;
$num=mysqli_num_rows($query);
if($num>0)
{
while($row=mysqli_fetch_array($query))
{
?>
				<tr>
					<td><?php echo $cnt;?></td>
					<td class="cart-image">
						<a class="entry-thumbnail" data-lightbox="image-1" href="admin/productimages/<?php echo htmlentities($row['proid']);?>/<?php echo htmlentities($row['pimg1']);?>">
						    <img src="admin/productimages/<?php echo $row['proid'];?>/<?php echo $row['pimg1'];?>"  alt="" width="80" height="80">
						</a>
					</td>
					<td class="cart-product-name-info">
						<h4 class='cart-product-description'><a href="product-details.php?pid=<?php echo $row['opid'];?>">
						<?php echo $row['pname'];?></a></h4>
						
						
					</td>
					<td class="cart-product-quantity">
						<?php echo $qty=$row['qty']; ?>   
		            </td>
					<td class="cart-product-sub-total"><?php echo $price=$row['pprice']; ?>  </td>
					<td class="cart-product-sub-total"><?php echo $shippcharge=$row['shippingcharge']; ?>  </td>
					<td class="cart-product-grand-total"><?php echo (($qty*$price)+$shippcharge);?></td>
					<td class="cart-product-sub-total"><?php echo $row['paym']; ?>  </td>
					
					<td class="cart-image">
						<a class="entry-thumbnail" data-lightbox="image-1" href="paymentreceipts/<?php if ( $row['payreceipt'] == NULL and $row['paym']=="Cash On Pickup"){echo "COP.jpg";}else if ($row['payreceipt'] == NULL){echo "no receipt.jpg";} else {echo $row['payreceipt'];}?>">
						    <img src="paymentreceipts/<?php if ( $row['payreceipt'] == NULL and $row['paym']=="Cash On Pickup"){echo "COP.jpg";}else if ($row['payreceipt'] == NULL){echo "no receipt.jpg";} else {echo $row['payreceipt'];}?>"  alt="N/A" width="80" height="40">
						</a>
					</td>
					<td class="cart-product-sub-total"><?php echo $row['odate']; ?>  </td>
					
					<td>
 <a href="track-order.php?oid=<?php echo htmlentities($row['orderid']);?>" >
					Track </a>
				 <?php 
				 $os="Delivered";
				 $checkreview= ($row['orderid']);
				 if ( $row['orderStat'] == $os){
				

?>
				 <br>
				 <?php
				 	 $query2=mysqli_query($con,"select productreviews.order_id as roID from productreviews join orders on productreviews.order_id=orders.id where  productreviews.order_id='$checkreview' ");

					$row2=mysqli_fetch_array($query2);
					$withreview= ($row2['roID']);
					if ($withreview == $checkreview){?>
						<a href="view-review.php?oid=<?php echo htmlentities($row['orderid']);?>" style="color:#f39626">
					Review </a>
						
					<?php }
					else {?>
						<a href="insert-review.php?oid=<?php echo htmlentities($row['orderid']);?>" style="color:#f39626">
					To Review </a>
						
					<?php }	?>
				 
				 <?php  }?>
					</td>
					
				</tr>
<?php $cnt=$cnt+1;} ?>
				<?php } else {?>
				<tr>
<td colspan="10" align="center"><h4>No Order History</h4></td>
</tr>
<?php } ?>
			</tbody><!-- /tbody -->
		</table><!-- /table -->
		
	</div>
</div>

		</div><!-- /.shopping-cart -->
		</div> <!-- /.row -->
		</form>
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