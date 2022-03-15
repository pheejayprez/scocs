
<?php
session_start();
include('../include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_POST['submit']))
{
	$category=$_POST['category'];
	$subcat=$_POST['subcategory'];
$sql=mysqli_query($con,"insert into subcategory(category_id,subcategory) values('$category','$subcat')");
$_SESSION['msg']="SubCategory Created !!";

}

if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from subcategory where subcategory_id = '".$_GET['id']."'");
                  $_SESSION['delmsg']="SubCategory deleted !!";
		  }

?>
<!doctype html>
<html lang="en">
  <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/avatars/head-logo.png">
    <title>Sugarcoat Creations | Product Management</title>
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
              <h2 class="h5 page-title">Product Management</h2>
              <div class="card shadow mb-4">
                <div class="card-header">
                  <strong class="card-title">Sub Category</strong>
                </div>
                <div class="card-body">
				
					<?php if(isset($_POST['submit']))
{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
<?php } ?>


									<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />
									
				<form name="Category" method="post" >
				
             
				  
                    <div class="col-md-6">
					
					
					
					 <div class="form-group mb-3">
                        <label for="example-select">Category</label>
                        <select name="category" class="form-control" required>
<option value="">Select Category</option> 
<?php $query=mysqli_query($con,"select * from category");
while($row=mysqli_fetch_array($query))
{?>

<option value="<?php echo $row['category_id'];?>"><?php echo $row['categoryName'];?></option>
<?php } ?>
</select>
                      </div>
					  
                      <div class="form-group mb-3">
                        <label for="simpleinput">Sub Category</label>
                        <input type="text" placeholder="Enter SubCategory Name"  name="subcategory"  class="form-control" required>
                      </div>
					  
					    <div class="form-group mb-3">
                         <button type="submit" name="submit" class="btn mb-2 btn-primary">Create</button>
                      </div>
					 
					  
                  </div>
				</form>
				  
				  
                </div>
              </div> <!-- / .card -->
			  
			            <div class="card shadow mb-4">
                <div class="card-header">
                  <strong class="card-title">Manage Sub Categories</strong>
                </div>
     
	 <div class="module-body table">
							<table class="datatable-1  table table-borderless table-hover" id="DataTables">
									<thead>
										<tr>
											<th>#</th>
											<th>Sub Category</th>
											<th>Category</th>
											<th>Creation date</th>
											<th>Last Updated</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>

<?php $query=mysqli_query($con,"select subcategory.subcategory_id,category.categoryName,subcategory.subcategory,subcategory.creationDate,subcategory.updationDate from subcategory join category on category.category_id=subcategory.category_id");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>									
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($row['subcategory']);?></td>
											<td><?php echo htmlentities($row['categoryName']);?></td>
											<td> <?php echo htmlentities($row['creationDate']);?></td>
											<td><?php echo htmlentities($row['updationDate']);?></td>
											<td>
											<a href="edit-subcategory.php?id=<?php echo $row['subcategory_id']?>" ><i class="icon-edit"></i></a>
											<a href="subcategory.php?id=<?php echo $row['subcategory_id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="icon-remove-sign"></i></a></td>
										</tr>
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