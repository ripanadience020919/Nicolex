<?php include("header.php"); 
$term=new Users;
$valueterms=$term->getwheredata('termpolicy', 'page', 'policy');
?>



<section class="contact-section" id="contact">
 <div class="container">
 <div class="page_head">
   <h2>Privacy<span> Policy</span></h2>
  <?php foreach ($valueterms as $value) {
       echo $value['text'];
   }?> 
   </div>

  </div>
</section>

<?php include("footer.php"); ?>




