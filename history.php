<?php include("userheader.php"); ?>
 <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
   <?php include("sidebar.php"); ?>
     <div class="main-panel">
          <div class="content-wrapper">
 
            <div class="page-header">
              <h3 class="page-title">Payment History</h3>
            </div>
            
			<div class="payment-form-search">
			  <form class="payment-search-inner" action="" method="post">
			    <h3>Filter By</h3>
				<div class="row">
				 <div class="col-md-4">
				 <div class="input-field">
					  <label for="datepicker"><input type="text" id="datepicker" placeholder="To" autocomplete="off" name="form" required></label>
				 </div>
				 </div>
				 <div class="col-md-4">
				 <div class="input-field">
					  <label for="datepicker"><input type="text" id="datepicker1" placeholder="From" autocomplete="off" name="too" required></ label>
				 </div>
				 </div>
				 <div class="col-md-4">
				    <div class="search-btn-history">
					   <input type="submit" value="Search" name="filter">
					</div>
				 </div>
				</div>
			  </form>
			</div>
                <?php $his=new Users;
              ?>
			<div class="dashboard-table-list inner-business-list-table">
			  
			  <div class="table-responsive">
			    <table class="table dashboard-business-table">
				  <thead>
				   <tr>
				     <th>S No</th>
					 <th> QR Code</th>
					 <th>Business / Property / Vehicle Radio</th>
					 <th> Date</th>
					 <th>Download Qr Code</th>
				   </tr>
				  </thead>
				  <tbody>
				   <?php	$s=1;
                                   if(isset($_POST['filter'])){
                  $filter=$his->getfilterdata($_POST['form'], $_POST['too'], $_SESSION['id']);
                  if($filter=='nodata'){ echo '<div class="business-warning"><p>No Data</p></div>';}else{
                     // print_r($filter);
                      foreach ($filter as $fvalue) {
                                       for ($i = 0; $i < 1; $i++) {
                                           ?>
                                       <tr>
				     <td><?php echo $s; ?></td>
						 <td><a href="operation/qr/temp/<?php echo $hvalue['qrcode']; ?>" target="_blank"><img src="operation/qr/temp/<?php echo $hvalue['qrcode']; ?>"  alt=""> </a></td>
				  <td><?php echo $fvalue['name']; ?></td>
					  <td><?php echo $fvalue['createat']; ?></td>
					  <td><a href="operation/qr/download.php?file=<?php echo $fvalue['qrcode']; ?> " class="download-button-table"><i class="fas fa-download"></i></a></td>		
				   </tr>
               <?php   }  $s++;   } } } else{ 
                                   $history=$his->getallpaytaxlist($_SESSION['id']); 
                                   foreach ($history as $hvalue) {
                                       for ($i = 0; $i < 1; $i++) {
                                           ?>
                                       <tr>
				     <td><?php echo $s; ?></td>
					 <td><a href="operation/qr/temp/<?php echo $hvalue['qrcode']; ?>" target="_blank"><img src="operation/qr/temp/<?php echo $hvalue['qrcode']; ?>"  alt=""> </a></td>
					  <td><?php echo $hvalue['name']; ?></td>
					  <td><?php echo $hvalue['createat']; ?></td>
					  <td><a href="operation/qr/download.php?file=<?php echo $hvalue['qrcode']; ?> " class="download-button-table"><i class="fas fa-download"></i></a></td>		
				   </tr>
				   
                                      <?php
                                       }
              $s++; } }?>
                                 
				  </tbody>
				</table>
			  </div>
			
			</div>
			
	
			
		  </div>

        </div>
        </div>
    
   <?php include("userfooter.php"); ?>
    <script>
   $( function() {
	$( "#datepicker" ).datepicker({
		dateFormat: "yy-mm-dd"
		,	duration: "fast"
	});
} );
   $( function() {
	$( "#datepicker1" ).datepicker({
		dateFormat: "yy-mm-dd"
		,	duration: "fast"
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