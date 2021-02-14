<?php include("header.php"); 
$term=new Users;
$valueterms=$term->getgovernment('termpolicy', 'page', 'terms');
?>



<section class="contact-section" id="contact">
 <div class="container">
 <div class="page_head">
   <h2>Terms And<span> Conditions</span></h2>
  <?php foreach ($valueterms as $value) {
       echo $value['text'];
   }?> 
   </div>

  </div>
</section>

<?php include("footer.php"); ?>




