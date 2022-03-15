

<?php

error_reporting(0);

if($_GET[trtype] == "Cash on Delivery")
{
?>      
        <div class="col-md-12" style="padding:20px: font-weight:bold; text-align:center">
		<h4 class="col-md-12">Cash On Deliver Selected</h4>
        <div class="col-md-12">
			<label>Note: <br> Please prepare exact payment for your order. <br> Thank You!</label>
        </div>
        </div>

<?php
}
else if($_GET[trtype] == "Cash On Pickup")
{
?>      
        <div class="col-md-12" style="padding:20px: font-weight:bold; text-align:center">
		<h4 class="col-md-12">Cash On Pickup Selected</h4>
        <div class="col-md-12">
			<label>Note: <br> Please prepare exact payment for your order. <br> Thank You!</label>
        </div>
        </div>

<?php
}
else if($_GET[trtype] == "Gcash E-wallet")
{
	
?>
		<center>
        <div class="col-md-12" style="padding:20px; text-align:center">
		<label class="col-md-12">Kindly please refer to the following details below to pay via Gcash E-wallet:</label>
		</div>
  
		
		<br>
</center>

<?php } ?>