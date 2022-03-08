
<section class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">

		<div class="navbar-header">
		
		<div class="navlogo navbar-brand collapse"></div> 
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				
			</button>
            
			<a href="index.php" class="navbar-brand">  SUGARCOAT CREATIONS</a>

        </div>
		<div class="collapse navbar-collapse">

 <nav1>
		
        <ul class="nav1 navbar-nav navbar-right ">
          
            		<li><a href="index.php">  Home</a></li>   
                    <li><a href="allcategory.php">  Cakes</a></li>
					<li><a href="index.php#about">  About</a></li>
                     
            	</li>
         <?php if(strlen($_SESSION['login']))
       ?>
				

					<li><a href="my-account.php"><i class="icon fa fa-user " ></i> My Account</a></li>
					<?php if(strlen($_SESSION['login'])==0)
    {   ?>
<li><a href="login.php"><i class="icon fa fa-sign-in"></i> Login</a></li>
<?php }
else{ ?>
	
				<li><a href="logout.php"><i class="icon fa fa-sign-out"></i> Logout</a></li>
				<?php } ?>	
               
			   <li>
			   
			   </li>
             
        </ul>
    </nav1>	

		</div>
	</div>

</section>
	
