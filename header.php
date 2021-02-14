<?php 
include("operation/controller.php"); ?>
<!doctype html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nicolex</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
	 <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
	 <link rel="stylesheet" href="css/swiper.min.css">
</head>
<body>

<header class="header-menu">
	<div class="container">
		<div id="myNav" class="over-nav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="over-nav-content">
  	<div class="menu-logo">
  		<a href="index.php"><img src="images/logo-1.png"></a>
  	</div>
  	<div class="over-nav-menu">
	
	<ul class="navbar-nav list-unstyled">
    	 <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="aboutus.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="services.php">Services</a>
      </li>
	   <li class="nav-item">
        <a class="nav-link" href="contactus.php">Contact Us</a>
      </li>
	   
    </ul>
  </div>
</div>
</div>
	<div class="row">
		<div class="col-md-6 col-4 ">
			<div class="logo">
			<a href="index.php"><img src="images/logo-1.png"></a>
		</div>
		</div>
		<div class="col-md-6 col-8">
        
        
			<div class="user-menu">
	
       <div class="user-menu-link">	
       	<?php	
			      	if(isset($_SESSION['id']) && $_SESSION['id']!=''){
			      	    echo '<a class="nav-link login-link" href="userindex.php"><span class="sign-in">Go To Deshboard</span></a>';
			      	}else{
			      	    ?>
        <a class="nav-link login-link" href="login.php"><span class="sign-in">Sign In</span></a>
        <a class="nav-link signup-link" href="signup.php"><span class="sign-up">Sign up</span></a>
        <?php } ?>
        </div>
				<span class="menu" onclick="openNav()">&#9776;</span>
				
			</div>
		</div>
	</div>
	</div>
</header>