<?php
session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$password=md5($_POST['password']);
$ret=mysqli_query($con,"SELECT * FROM admin WHERE username='$username' and password='$password'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="dashboard.php";//
$_SESSION['alogin']=$_POST['username'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$_SESSION['errmsg']="Invalid username or password";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sugarcoat Creations | Admin login</title>
	<link type="text/css" href="bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>

<style>
body{
	background-image:url("images/admin-bg.png");
	background-size: cover;
	
}
.admin-login-btn {
	font-family: Century Gothic;
	font-weight: bold;
	font-size: 15px;
	color:white;
	width: 100%;
	height: 40px;
	text-decoration: none;
	border:none;
	background: #f5b971;
	margin:0px;
	letter-spacing: 5px;
	transition: all 0.5s;
	
}
.admin-login-btn:hover {
	padding-right:10px;
	background: #84c295;
	
}
.storelogo{
	width:200px;
}


</style>

<body>


		<div class="container">
			<div class="row">
			
				<div class="module module-login span4 offset4" style="background:#ffffffd4; border-radius: 30px 30px 0px 0px;">
					<form class="form-vertical" method="post">
						<div>
						<center>
							<div class="storelogo"><img src="../images/scocs-logo.png"/></div>
							<div style="	font-family:Century Gothic; font-size:15px; font-weight:bold;color:#d1733f">Sugarcoat Creations Online Cake Shop <hr style="color:black"></div>
							<br>
						</center>
						</div>
						<center><span style="color:red;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span></center>
						<div class="module-body">
							<div class="control-group">
								<div  class="controls row-fluid">
									<input class="span12" type="text" id="inputEmail" name="username" placeholder="Username" style="	font-family:Century Gothic; font-size:15px;width:100%; padding:10px; border-radius: 15px;">
								</div>
							</div>
							<div class="control-group">
								<div class="controls row-fluid">
						<input class="span12" type="password" id="inputPassword" name="password" placeholder="Password" style="	font-family:Century Gothic; font-size:15px;width:100%; padding:10px; border-radius: 15px;">
								</div>
							</div>
						</div>
						<div class="module-foot" style="border-radius: 30px;">
							
								
									<button type="submit" name="submit" class="admin-login-btn">SIGN IN</button>
									
						</div>
					</form>
				</div>
			</div>
		</div>


	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>