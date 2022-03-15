<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit'])){
		if(!empty($_SESSION['cart'])){
		foreach($_POST['quantity'] as $key => $val){
			if($val==0){
				unset($_SESSION['cart'][$key]);
			}else{
				$_SESSION['cart'][$key]['quantity']=$val;

			}
		}
			echo "<script>alert('Your Cart hasbeen Updated');</script>";
			
		}
	}
// Code for Remove a Product from Cart
if(isset($_POST['remove_code']))
	{

if(!empty($_SESSION['cart'])){
		foreach($_POST['remove_code'] as $key){
			
				unset($_SESSION['cart'][$key]);
		}
	}
}
// code for insert product in order table


if(isset($_POST['ordersubmit'])) 
{
	
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{

	$quantity=$_POST['quantity'];
	$pdd=$_SESSION['pid'];
	$value=array_combine($pdd,$quantity);


		foreach($value as $qty=> $val34){



mysqli_query($con,"insert into orders(userId,productId,quantity) values('".$_SESSION['id']."','$qty','$val34')");
header('location:payment-method.php');
}
}
}

date_default_timezone_set('Asia/Manila');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

// code for Shipping address updation
	if(isset($_POST['shipupdate']))
	{
		$sprovince=$_POST['shippingprovince'];
		$scity=$_POST['shippingcity'];
		$sbarangay=$_POST['shippingbarangay'];
		$sstreet=$_POST['shippingstreet'];
		$szipcode=$_POST['shippingzipcode'];
		$query=mysqli_query($con,"update users set shippingProvince='$sprovince',shippingCity='$scity',shippingBarangay='$sbarangay',shippingStreet='$sstreet',shippingZipcode='$szipcode', updationDate='$currentTime' where id='".$_SESSION['id']."'");
		if($query)
		{
echo "<script>alert('Shipping Address has been updated');</script>";
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

	    <title>My Cart</title>
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

		
		
		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="admin/assets/avatars/head-logo.png">

		<!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->

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
				<li class='active'>Shopping Cart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row">
		<form name="cart" method="post">	
<?php
if(!empty($_SESSION['cart'])){
	?>
	
	<div class="col-md-9" style="overflow:auto">
			<table class="table table-bordered">
			<thead>
				<tr style="background:#85a392; color: white;">
					
					<th class="cart-description item">Product</th>
					<th class="cart-product-name item"></th>
					<th></th>
					<th class="cart-total last-item">Total</th>
					<th>Remove</th>
				</tr>
			</thead><!-- /thead -->
			<tfoot>
				<tr>
					<td colspan="7">
						<div class="shopping-cart-btn">
							<span class="">
								<a href="allcategory.php" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
								<input type="submit" name="submit" value="Update shopping cart" class="btn btn-upper btn-primary pull-right outer-right-xs">
							</span>
						</div><!-- /.shopping-cart-btn -->
					</td>
				</tr>
			</tfoot>
			<tbody>
 <?php
 $pdtid=array();
    $sql = "SELECT * FROM products WHERE id IN(";
			foreach($_SESSION['cart'] as $id => $value){
			$sql .=$id. ",";
			}
			$sql=substr($sql,0,-1) . ") ORDER BY id ASC";
			$query = mysqli_query($con,$sql);
			$totalprice=0;
			$totalqunty=0;
			if(!empty($query)){
			while($row = mysqli_fetch_array($query)){
				$quantity=$_SESSION['cart'][$row['id']]['quantity'];
				$subtotal= $_SESSION['cart'][$row['id']]['quantity']*$row['productPrice']+$row['shippingCharge'];
				$totalprice += $subtotal;
				$_SESSION['qnty']=$totalqunty+=$quantity;

				array_push($pdtid,$row['id']);
//print_r($_SESSION['pid'])=$pdtid;exit;
	?>

				<tr>
					
					<td class="cart-image">
					<a href="product-details.php?pid=<?php echo htmlentities($pd=$row['id']);?>">
						    <img src="admin/productimages/<?php echo $row['id'];?>/<?php echo $row['productImage1'];?>" alt="productimg" style="width:100px;height:100px">
						</a>
					</td>
					<td class="cart-product-name-info">
						<h4 class='cart-product-description'><a href="product-details.php?pid=<?php echo htmlentities($pd=$row['id']);?>" ><?php echo $row['productName'];
						$_SESSION['sid']=$pd;
						 ?></a></h4>
						 <div class="cart-product-sub-total"><span class="cart-sub-total-price"><?php echo "₱"." ".$row['productPrice']; ?>.00</span></div>
						 
						 <div>
				             <input type="number" value="<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?>" name="quantity[<?php echo $row['id']; ?>]" style="width:50px">
			              </div>
					</td>
					
<td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php echo "Shipping Fee: <br>"."₱"." ".$row['shippingCharge']; ?>.00</span></td>

					<td class="cart-product-grand-total"><span class="cart-grand-total-price"><?php echo "₱"." ".($_SESSION['cart'][$row['id']]['quantity']*$row['productPrice']+$row['shippingCharge']); ?>.00</span></td>
					<td class="remove-item"><input type="checkbox" name="remove_code[]" value="<?php echo htmlentities($row['id']);?>" /></td>
				</tr>

				<?php } }
$_SESSION['pid']=$pdtid;
				?>
				
			</tbody><!-- /tbody -->
		</table><!-- /table -->
		</div> 
		
		<div class="col-md-3">
	<table class="table table-bordered" >
		<thead>
			<tr>
				<th style="background:#85a392; font-size: 15px;">
					
					<div style="font-size: 18px; color:#fff">
						Grand Total <span   style="font-size: 18px; float:right"><?php echo "₱"." ".$_SESSION['tp']="$totalprice". ".00"; ?></span>
					</div>
				</th>
			</tr>
		</thead><!-- /thead -->
		<tbody>
				<tr>
					<td>
						<div>
						
							<button type="submit" name="ordersubmit" class="btn btn-primary pull-right">PROCEED TO CHEKOUT</button>
						
						</div>
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>
					<span class="estimate-title">Shipping Address</span>
				</th>
			</tr>
		</thead>
		<tbody>
				<tr>
					<td>
						<div class="form-group">
		<?php
$query=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
?>

						<div class="form-group">
					    <label class="info-title" for="Province ">Province  <span>*</span></label>
			 <input type="text" class="form-control unicase-form-control text-input" id="shippingprovince" name="shippingprovince" value="<?php echo $row['shippingProvince'];?>" required>
					  </div>
					  <div class="form-group">
					    <label class="info-title" for="City ">City / Municipality<span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="shippingcity" name="shippingcity" required="required" value="<?php echo $row['shippingCity'];?>" >
					  </div>
					  <div class="form-group">
					    <label class="info-title" for="Barangay ">Barangay<span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="shippingbarangay" name="shippingbarangay" required="required" value="<?php echo $row['shippingBarangay'];?>" >
					  </div>
					  <div class="form-group">
					    <label class="info-title" for="Street">Street <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="shippingstreet" name="shippingstreet" required="required" value="<?php echo $row['shippingStreet'];?>" >
					  </div>
 <div class="form-group">
					    <label class="info-title" for="Zipcode ">Zipcode  <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" id="shippingzipcode" name="shippingzipcode" required="required" value="<?php echo $row['shippingZipcode'];?>" >
					  </div>


					  <button type="submit" name="shipupdate" class="btn-upper btn btn-primary checkout-page-button">Update</button>
					<?php } ?>

		
						</div>
					
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
	<?php } else {?>
	<center>
Your shopping Cart is empty <br><br><br>
<a href="allcategory.php" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
<br><br><br>
</center>
	<?php	}?>
</div>	
<div class="col-md-3 estimate-ship-tax">
	
</div>
		</div> 
		



			</div>
		</div> 
		</form>		

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