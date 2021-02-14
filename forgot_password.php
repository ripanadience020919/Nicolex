<?php include("operation/controller.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Forgot Password | Nicolex User Panel</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/vendor.bundle.base.css">
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/owl.carousel.min.css" >
    <!-- End layout styles -->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
     <link rel="icon" href="images/favicon.ico" type="image/x-icon">
  </head>
  <body>
    <div class="login-page">
	<div class="container">
	 <div class="row">
	   <div class="col-md-7">
	   <div class="login-page-form">
	      <div class="row">
		    <div class="col-md-12">
			  <div class="login-img">
			    <img src="images/logo.png" alt="">
			  </div>
			</div>
			<div class="col-md-12">
			 <div class="login-heading">
			  <h3><span > Enter Your </span>Registered Details With Us</h3>
			 </div>
			   <?php 
       //error_reporting(FALSE);
if(isset($_POST['forgot'])){
if($_POST['username']!='' && $_POST['email']!=''){
    $login=new Users;
    $lg=$login->get_details($_POST['username'],$_POST['email']);    
    if($lg !=false)
    {
      header("location:reset_password.php?id=".$lg."");
    }
    else
    { 
    	echo '<div class="business-warning"><p>User Not Found.</p></div>'; 
    }
}else{
    echo '<div class="business-warning"><p>Please Fill The Details.</p></div>';
}
}?>
			</div>
		  </div>
		   <form class="login-form-class" method="post" action="" enctype="multipart/form-data">
                 
		    <div class="input-login-field">
			 <input type="text" placeholder="User Name" name="username">
			 <div class="login-icon"> <i class="fas fa-user-alt"></i></div>
			</div>
			<div class="input-login-field">
			 <input type="Email" placeholder="Email" name="email">
			 <div class="login-icon"> <i class="fas fa-unlock-alt"></i></div>
			</div>
			<div class="row">
			<div class="col-md-12">
			<div class="login-submit-btn">
           <input type="submit" value="Submit" name="forgot">
			</div>
			</div>
			</div>
		  </form>
	   </div>
	   </div>
	   <div class="col-md-5">
	   <div class="login-slider-right">
	     <div class="login-logo"><img src="images/logo-login.png" alt=""></div>
		 <div class="login-head"><h3>If You Don’t Have an Account</h3></div>
		 <div class="login-slider owl-carousel owl-theme">
               <div class="item">
			   <div class="login-text"><img src="images/nicolex-info.png" alt=""></div>
			     <div class="login-btn-sldier"><a href="signup.php">Sign Up</a></div>
		   <div class="social-login">
		    <ul>
			 <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
			 <li><a href="#"><i class="fab fa-skype"></i></a></li>
			 <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
			 <li><a href="#"><i class="fab fa-twitter"></i></a></li>
			</ul>
		   </div>
			   
			   </div>
               <div class="item">
			   <div class="login-text"><img src="images/nicolex-info.png" alt=""></div>
			     <div class="login-btn-sldier"><a href="signup.php">Sign Up</a></div>
		   <div class="social-login">
		    <ul>
			 <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
			 <li><a href="#"><i class="fab fa-skype"></i></a></li>
			 <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
			 <li><a href="#"><i class="fab fa-twitter"></i></a></li>
			</ul>
		   </div>
			   
			   </div>
			    <div class="item">
			   <div class="login-text"><img src="images/nicolex-info.png" alt=""> </div>
			     <div class="login-btn-sldier"><a href="signup.php">Sign Up</a></div>
		   <div class="social-login">
		    <ul>
			 <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
			 <li><a href="#"><i class="fab fa-skype"></i></a></li>
			 <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
			 <li><a href="#"><i class="fab fa-twitter"></i></a></li>
			</ul>
		   </div>
			   
			   </div>
			   
           </div>
		 
	   </div>
	   </div>
	 <div>
      </div>
    <script src="js/vendor.bundle.base.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/misc.js"></script>
    <script src="js/dashboard.js"></script>
	<script src="js/off-canvas.js"></script>
	<script src="js/owl.carousel.min.js"></script>
   <script>
     $('.login-slider.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
	autoplay:true,
	nav:false,
	 responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:1,
            nav:false
        },
        1000:{
            items:1,
            nav:true,
            loop:false
        }
    }
})

</script>
  </body>
</html>