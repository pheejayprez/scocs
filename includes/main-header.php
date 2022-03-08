<?php 

 if(isset($_Get['action'])){
		if(!empty($_SESSION['cart'])){
		foreach($_POST['quantity'] as $key => $val){
			if($val==0){
				unset($_SESSION['cart'][$key]);
			}else{
				$_SESSION['cart'][$key]['quantity']=$val;
			}
		}
		}
	}
?>
	<div class="main-header">
		<div class="container">

			<div class="row" style="margin-top:40px; background: url('contact.png') 50% 0 repeat-y fixed;">
				
<div >
<div>
    <form name="search" method="post" action="search-result.php">
        <div class="control-group">

            <input class="search_design" placeholder="Search here..." name="product" required="required" />

            <button class="search_btn" type="submit" name="search"></button>    

        </div>
    </form>
</div><!-- /.search-area -->
<!-- ============================================================= SEARCH AREA : END ============================================================= -->				
</div><!-- /.top-search-holder -->

	
					<!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

<div class="animate-dropdown top-cart-row">					
<?php
if(!empty($_SESSION['cart'])){
	?>
	<div class="dropdown dropdown-cart">
		<a href="#" class="dropdown-toggle lnk-cart" style="border: none" data-toggle="dropdown">
			<div class="items-cart-inner" >
				
				<div class="basket">
					<i class="icon fa fa-shopping-cart" style="font-size:20px"></i>
				</div>
				<div class="basket-item-count"><span class="count"><?php echo $_SESSION['qnty'];?></span></div>
			
		    </div>
		</a>
		<ul class="dropdown-menu">
		
		 <?php
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

	?>
		
		
			<li>
				<div class="cart-item product-summary">
					<div class="row">
						<div class="col-xs-4">
							<div class="image">
								<a href="product-details.php?pid=<?php echo $row['id'];?>"><img  src="admin/productimages/<?php echo $row['id'];?>/<?php echo $row['productImage1'];?>" width="35" height="50" alt=""></a>
							</div>
						</div>
						<div class="col-xs-7">
							
							<h3 class="name"><a href="product-details.php?pid=<?php echo $row['id'];?>"><?php echo $row['productName']; ?></a></h3>
							<div class="price">PHP.<?php echo ($row['productPrice']+$row['shippingCharge']); ?> x<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?></div>
						</div>
						
					</div>
				</div><!-- /.cart-item -->
			
				<?php } }?>
				<div class="clearfix"></div>
			<hr>
		
			<div class="clearfix cart-total">
				<div class="pull-right">
					
						<span class="text">Total :</span><span class='price'>PHP.<?php echo $_SESSION['tp']="$totalprice". ".00"; ?></span>
						
				</div>
			
				<div class="clearfix"></div>
					
				<a href="my-cart.php" class="btn btn-upper btn-primary btn-block m-t-20">My Cart</a>	
			</div><!-- /.cart-total-->
					
				
		</li>
		</ul><!-- /.dropdown-menu-->
	</div><!-- /.dropdown-cart -->
<?php } else { ?>
<div class="dropdown dropdown-cart" >
		<a href="#" class="dropdown-toggle lnk-cart"  style="border: none" data-toggle="dropdown">
			<div class="items-cart-inner" >
				<div class="basket">
					<i class="icon fa fa-shopping-cart"  style="font-size:20px"></i>
				</div>
				<div class="basket-item-count"><span class="count">0</span></div>
				
		    </div>
		</a>
		<ul class="dropdown-menu">
		
	
		
		
			<li>
				<div class="cart-item product-summary">
					<div class="row">
						<div class="col-xs-12">
							Your Shopping Cart is Empty.
						</div>
						
						
					</div>
				</div><!-- /.cart-item -->
			
				
			<hr>
		
			<div class="clearfix cart-total">
				
				<div class="clearfix"></div>
					
				<a href="allcategory.php" class="btn btn-upper btn-primary btn-block m-t-20">Continue Shopping</a>	
			</div><!-- /.cart-total-->
					
				
		</li>
		</ul><!-- /.dropdown-menu-->
	</div>
	<?php }?>

	
	<!-- /.Messaging-->
	<?php if(strlen($_SESSION['login'])==0)
    {   ?>
	<?php }
	else{ ?>
	<div style="float: right; padding-top:12px; margin:0px 10px 0px 0px; color:black"><a href="messages.php"><i class="icon fa fa-envelope" style="font-size:20px; color:black"></i></a></div>	
	<?php } ?>	

<!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->				
			</div><!-- /.top-cart-row -->
			</div><!-- /.row -->

		</div><!-- /.container -->

	</div>