      <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
          <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
          <!-- nav bar -->
          <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="#">
                <img src="../scocs images/scocs-logo.png" width="70%">
       
            </a>
          </div>
       
		  <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="dashboard.php">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text">Dashboard</span>
              </a>
            </li>
          </ul>
		  
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Components</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="#ui-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-box fe-16"></i>
                <span class="ml-3 item-text">Products</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="category.php"><span class="ml-1 item-text">Category</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="subcategory.php"><span class="ml-1 item-text">Sub-category</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="manage-products.php"><span class="ml-1 item-text">List of Products</span></a>
                </li>
              </ul>
			  
            </li>
           
            <li class="nav-item dropdown">
              <a href="#forms" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-credit-card fe-16"></i>
                <span class="ml-3 item-text">Orders</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="forms">
			   <li class="nav-item">
                  <a class="nav-link pl-3" href="all-orders.php"><span class="ml-1 item-text">All Orders</span></a>
                </li>
                <li class="nav-item">
  <?php
  	$status='Delivered';	
  $f1="00:00:00";
$from=date('Y-m-d')." ".$f1;
$t1="23:59:59";
$to=date('Y-m-d')." ".$t1;
	$status='Delivered';									 
$ret = mysqli_query($con,"SELECT * FROM Orders where orderStatus!='$status' || orderStatus is null and orderDate Between '$from' and '$to' ");
$num = mysqli_num_rows($ret);
{?><span class="badge badge-pill badge-primary"><?php echo htmlentities($num); ?></span>
<?php } ?>
                  <a class="nav-link pl-3" href="todays-orders.php"><span class="ml-1 item-text">Today's Orders</span></a>
                </li>
				
                <li class="nav-item">
					<?php	
	$status='Delivered';									 
$ret = mysqli_query($con,"SELECT * FROM Orders where orderStatus!='$status' || orderStatus is null ");
$num = mysqli_num_rows($ret);
{?><span class="badge badge-pill badge-primary"><?php echo htmlentities($num); ?></span>
<?php } ?>
                  <a class="nav-link pl-3" href="pending-orders.php"><span class="ml-1 item-text">Pending Orders</span></a>
                </li>
                <li class="nav-item">
					
					<?php
					$status='Delivered';									 
					$rt = mysqli_query($con,"SELECT * FROM Orders where orderStatus='$status'");
					$num1 = mysqli_num_rows($rt);
					{?><span class="badge badge-pill badge-primary"><?php echo htmlentities($num1); ?></span>
					<?php } ?>
                  <a class="nav-link pl-3" href="delivered-orders.php"><span class="ml-1 item-text">Delivered Orders</span></a>
                </li>
              
              </ul>
            </li>
			
			 <li class="nav-item w-100">
              <a class="nav-link" href="users.php">
                <i class="fe fe-layers fe-16"></i>
                <span class="ml-3 item-text">Messaging</span>
              </a>
            </li>
			
			 <li class="nav-item w-100">
              <a class="nav-link" href="#">
                <i class="fe fe-layers fe-16"></i>
                <span class="ml-3 item-text">Reports</span>
              </a>
            </li>
           
            <li class="nav-item dropdown">
              <a href="#accounts" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-pie-chart fe-16"></i>
                <span class="ml-3 item-text">Account Management</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="accounts">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="manage-users.php"><span class="ml-1 item-text">Users</span></a>
                </li>
				<li class="nav-item">
                  <a class="nav-link pl-3" href="user-logs.php"><span class="ml-1 item-text">Login Logs</span></a>
                </li>
               
              </ul>
            </li>
          </ul>
		  
          <!--<p class="text-muted nav-heading mt-4 mb-1">
            <span>Apps</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="#">
                <i class="fe fe-calendar fe-16"></i>
                <span class="ml-3 item-text">Calendar</span>
              </a>
            </li>
       ``-->
         
        </nav>
      </aside>