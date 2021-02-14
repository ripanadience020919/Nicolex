<?php include_once("operation/controller.php");
$insertuser=new Users();
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$username=$_POST['username'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$address1=$_POST['address1'];
$address2=$_POST['address2'];
$password=md5($_POST['password']);
if($name!='' && $username!='' && $email!='' && $mobile!='' && $gender!='' && $dob!='' && $address1!='' && $password!='')
{
$sql=$insertuser->insert($name,$username,$email,$mobile,$gender,$dob,$address1,$address2,$password);
if($sql){  echo '<script type="text/javascript">location.href ="userindex.php";</script>';}else{echo "<script>alert('Something wrong');</script>";}
}
}
 ?>
<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign Up | Nicolex Admin Panel</title>
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
    <div class="signup-page">
	<div class="container">
	 <div class="row">
	  <div class="col-md-5">
	   <div class="login-slider-right">
	     <div class="login-logo"><img src="images/logo-login.png" alt=""></div>
		 <div class="login-head"><h3>If You Don’t Have an Account</h3></div>
		 <div class="login-slider owl-carousel owl-theme">
               <div class="item">
			   <div class="login-text"><img src="images/nicolex-info.png" alt=""> </div>
			     <div class="login-btn-sldier"><a href="login.php">Login</a></div>
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
			     <div class="login-btn-sldier"><a href="login.php">Login</a></div>
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
			     <div class="login-btn-sldier"><a href="login.php">Login</a></div>
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
	 
	   <div class="col-md-7">
	   <div class="signup-page-form">
	      <div class="row">
			<div class="col-md-12">
			  
			 <div class="login-heading">
			  <h3><span > Sign Up </span>into Your Account</h3>
			 </div>
			</div>
		  </div>
		  <form class="login-form-class" method="post" action="" enctype="multipart/form-data" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }">
                 <div class="row">
		     <div class="col-md-12">
				     <div class="input-field">
					  <label class="input-label">Name  <sup> *</sup></label>
					  <input type="text" class="" name="name" required>
					 </div>
	        </div>
			   <div class="col-md-12">
				     <div class="input-field">
					  <label class="input-label">Username <sup> *</sup></label>
					  <input type="text" class="" name="username" required>
					 </div>
	        </div>
			<div class="col-md-12">
				     <div class="input-field">
					  <label class="input-label">Mail Id <sup> *</sup></label>
					  <input type="email" class="" name="email" required>
					 </div>
	        </div>
			<div class="col-md-12">
				     <div class="input-field">
					  <label class="input-label">Address  <sup> *</sup></label>
					  <input type="text" class="" name="address1" required>
					 </div>
	        </div>
			<div class="col-md-12">
				     <div class="input-field">
					  <label class="input-label">Address II <span> ( If Different From One Above )</span> <sup> </sup></label>
					  <input type="text" class="" name="address2">
					 </div>
	        </div>
			<div class="col-md-12">
			<label class="input-label">Gender  <sup> *</sup></label>
	        <div class="radio-button-choose edit-profile-choose">
			 <input type="radio" id="Female-gender" name="gender" value="Female"> <label for="Female-gender">Female</label>
             <input type="radio" id="Male-gender" name="gender" value="Male"> <label for="Male-gender">Male</label>
            <input type="radio" id="Other-gender" name="gender" value="Other"> <label for="Other-gender">Other</label>
			</div>
	     </div>
		  <div class="col-md-6">
				    <div class="input-field">
					<label class="input-label">Date of Birth  <sup> </sup></label>
					  <label for="datepicker"><input type="text" id="datepicker" placeholder="DD/MM/YYYY" autocomplete="off" name="dob" required></label>
				 </div>
	    </div>
		<div class="col-md-6">
				     <div class="input-field"  id="mobilecode">
					  <label class="input-label">Mobile Number( xxxxxxxxxx) <sup> *</sup></label>
					 <span class="btn btn-secondary">+234</span><input type="tel" class="" name="mobile" maxlength="10" size="10"  pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required style="">
					 </div>
	        </div>
			<div class="col-md-6">
				     <div class="input-field">
					  <label class="input-label">Password <sup> *</sup></label>       
                         <input class="form-control" name="password" type="text"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required>

					 </div>
	        </div>
			<div class="col-md-6">
				     <div class="input-field">
					  <label class="input-label">Confirm Password <sup> *</sup></label>
					  <input type="password" class="" name="" id="cpass">
					 </div>
                            <p id="message"></p>
	        </div>
                     <div class="col-md-12">
            <p class="errText" style="color: blue;">Password must be at least 8 characters and its contain at least one lower case letter, one upper case letter and one digit</p>
                     </div>
            <script>
                $('#pass,#cpass').on('keyup',function(){ 
                    if($('#pass').val() === $('#cpass').val()){
                        $('#message').html('Matching').css('color','green');
                    }else{  $('#message').html('Not Matching').css('color','red'); }
                });
            </script>
			<div class="col-md-12">
			 <div class="login-remember">
			 <label class="custom-checkbox">I accept all <a href="#">Terms & Conditions.</a> <input type="checkbox" id="chkterms" class="selectall" required>  <span class="input-checkmark"></span></label>
			 </div>
			</div>
			<div class="col-md-12">
			<div class="login-submit-btn">
			 <input type="submit" value="Save & Continue" name="submit" id="btncheck">
			</div>
			</div>
			</div>
		  </form>
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
		<script src="js/datepicker.min.js"></script>
		 <script type="text/javascript">
        $(function() {
            $('#btncheck').click(function() {
                if ($('#chkterms').is(':checked')) {
                    alert('you agreed conditions');
                }
                else {
                    alert('please check terms & conditions');
                }
            });
        });
    </script>
   <script>
      $( function() {
	$( "#datepicker" ).datepicker({
		dateFormat: "dd-mm-yy"
		,	duration: "fast"
	});
} );

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
});

</script>
  </body>
</html>