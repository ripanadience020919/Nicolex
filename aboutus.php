<?php include("header.php"); 
$about=new Users;
$rowabt=$about->getdata('aboutus');
?>

	<section class="about-section" id="about">
<div class="container">
 <div class="row">
  <div class="col-md-6">
  <div class="about_txt">
    <h2>About <span>Us</span></h2>
    <p><?php foreach ($rowabt as $value) { echo $value['text'];?></p>
	   <div class="steps">
      <h5>FIVE SIMPLE STEPS TO YOUR NICOLEX ACCOUNT</h5>
  <div class="alert alert-success" role="alert">•	Logon to www.nicolex-igrs.com</div>
<div class="alert alert-info" role="alert">•	Sign up to create your personal profile.</div>
<div class="alert alert-warning" role="alert">•	Declare and register your Businesses and Properties to states and local government where they are located.</div>
<div class="alert alert-danger" role="alert">•	Pay the generated bills directly to local government where businesses and properties are situated.</div>
<div class="alert alert-primary" role="alert">•	Advertise your Businesses and Properties to Millions of users for free using the Council Mall.</div>
</div>
   </div>
  </div>
  <div class="col-md-6">
   <div class="about-img">
    <img src="images/<?php echo $value['img']; }?>" alt="">
   </div>
  </div>
    
 </div>
</div>
</section>

<?php include("footer.php"); ?>