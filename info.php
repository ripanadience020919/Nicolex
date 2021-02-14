<?php include("userheader.php"); ?>
 <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
   <?php include("sidebar.php"); ?>
     <div class="main-panel">
          <div class="content-wrapper">
 
            <div class="page-header">
              <h3 class="page-title">Info </h3>
            </div>
            <?php 
                $term=new Users;
          $valueterms=$term->getinfo();
          if (!empty($valueterms)) {
          foreach ($valueterms as $value) {
            ?>
      <div class="payment-form-search">
        <h3><b><?php echo $value['title']?></b></h3><br>
        <p><?php echo $value['description']?></p>
      </div>
            <?php
                }
              }else{
            ?>
            <div class="payment-form-search">
        <p style="text-align: center;">Sorry ! No Result Found.</p>
      </div>
            <?php
              }
            ?>
      </div>

        </div>
        </div>
    
   <?php include("userfooter.php"); ?>
    <script>
   $( function() {
  $( "#datepicker" ).datepicker({
    dateFormat: "yy-mm-dd"
    , duration: "fast"
  });
} );
   $( function() {
  $( "#datepicker1" ).datepicker({
    dateFormat: "yy-mm-dd"
    , duration: "fast"
  });
} );
   $('.advertisement-slider.owl-carousel').owlCarousel({
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
            items:2,
            nav:false
        },
        1000:{
            items:3,
            nav:true,
            loop:false
        }
    }
})

</script>