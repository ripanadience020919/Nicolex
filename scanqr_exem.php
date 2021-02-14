<?php include("operation/controller.php");  include("operation/convertnoinword.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> E-Exemption | Nicolex </title>
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
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
 <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
   <?php// include("sidebar.php"); ?>
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
	</nav>
   <div class="main-panel" id="yourdiv" style="text-align:center;">
        <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Official E-Exemption</h3>
            </div>
				 <?php 	
                     $paybill=new Users; 
                     if($_GET['type']=='business'){
                     $paymentbill = $paybill->getwheredata('business_exemptions', 'exemption_id', $_GET['receiptno']);                                     
                     foreach ($paymentbill as $value) {
                         for($i=0;$i<1;$i++){
                                          ?>
			 		<div class="dashboard-table-list inner-business-list-table pybill-table-list">
				<div class="row">
			    <div class="col-md-6">
				<div class="payment-bill-report">
				  <div class="payment-bill-name">
				  <h3><span>PCN</span> : <?php
					echo $value['exemption_id'];	?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3 class=""><span>Name Of Business</span> : <?php echo $value['name'];?> </h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3 class=""><span>Address Of Business</span> : <?php echo $value['address'];?></h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3 class=""><span>Type Of Business</span> : <?php echo $value['type'];?></h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3 class=""><span>Contact Email</span> : <?php echo $value['email'];?></h3>
				  </div>
				    <div class="payment-bill-name">
				  <h3 class=""><span>Contact Tel.</span> : <?php echo $value['personmobile'];?> </h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3 class=""><span>Size Of Business</span> : <?php echo $value['size'];?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3 class=""><span>State</span> : <?php echo $value['state'];?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3 class=""><span>Local Goverment</span> : <?php echo $value['government'];?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3 class=""><span>Year Of Exemption</span> : <?php echo date('Y',strtotime($value['createat']));?></h3>
				  <!-- <h3><?php echo substr(date('Y'), 2, 4)?></h3> -->
				  </div>
				</div>
				</div>
				 <div class="col-md-6">
				 <div class="qr-code text-right">
				  <img src="operation/qr_exem/<?php echo $value['qrcode'];?>" alt="">
				 </div>
				</div>
			  </div>
				  <div class="table-responsive">
                     <?php } }  ?>
			  </div>
		  	<div class="table-all-see-btn business-inner-button">
			  <a href="#" onclick="PrintElem('#yourdiv')">Print Bill</a>
			   <a href="#" class="pay-download">Save</a>
			  </div>
			  
			  <div class="watermark-bill"><img src="images/watermark.png" alt=""></div>
			  </div>
			   <?php } ?>



				 <?php if($_GET['type']=='vehicle'){	
				 $paymentbill = $paybill->getwheredata('vehicle_exemption', 'exemption_id', $_GET['receiptno']);                                    
                     foreach ($paymentbill as $value) {
                         for($i=0;$i<1;$i++){
                      ?><div class="dashboard-table-list inner-business-list-table  pybill-table-list">
			  <div class="row">
			    <div class="col-md-6">
				<div class="payment-bill-report">
				  <div class="payment-bill-name">
				  <h3><span>PCN</span> : <?php
					echo $value['exemption_id'];	?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3  class=""><span>Name Of Owner</span> : <?php echo $value['ownername'];?> </h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3 class=""><span>Registration no. </span> : <?php echo $value['vehicleregistrationno'];?></h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3 class=""><span>Chasis Number</span> : <?php echo $value['chasisno'];?></h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3 class=""><span>Make Of Vehicle</span> : <?php echo $value['vehiclemake'];?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3  class=""><span>Owner's Email</span> : <?php echo $value['email'];?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3  class=""><span>Owner's Tel</span> : <?php echo $value['mobile'];?></h3>
				  </div>
				    <div class="payment-bill-name">
				  <h3  class=""><span>State</span> : <?php echo $value['state'];?> </h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3  class=""><span>Local Government</span> : <?php echo $value['government'];?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3 class=""><span>Year Of Exemption</span> : <?php echo date('Y',strtotime($value['createat']));?></h3>
				  </div>
				</div>
				</div>
				
				 <div class="col-md-6">
				 <div class="qr-code text-right">
				  <img src="operation/qr_exem/<?php echo $value['qrcode'];?>" alt="">
				 </div>
				</div>
			  </div>
			<div class="table-responsive"></div>
				<div class="table-all-see-btn business-inner-button">
			  		<a href="#" onclick="PrintElem('#yourdiv')">Print Bill</a>
			   		<a href="#" class="pay-download">Save</a>
			  	</div>
			   <div class="watermark-bill">
			   		<img src="images/watermark.png" alt="">
			   	</div> 
			</div>
			
                <?php 
	            			} 
						} 
					} 
				?>
								 
			  <?php if($_GET['type']=='property'){	
				 $paymentbill = $paybill->getwheredata('property_exemption', 'exemption_id', $_GET['receiptno']);                                    
                     foreach ($paymentbill as $value) {
                         for($i=0;$i<1;$i++){  ?>
			<div class="dashboard-table-list inner-business-list-table  pybill-table-list">
			  <div class="row">
			    <div class="col-md-6">
				<div class="payment-bill-report">
				  <div class="payment-bill-name">
				  <h3><span>PCN</span> : <?php
					echo $value['exemption_id'];	?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3 class=""><span>Property Title</span> : <?php echo $value['title'];?> </h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3 class=""><span>Address 1</span> : <?php echo $value['address1'];?></h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3 class=""><span>Property Category</span> : <?php echo $value['propertytype'];?></h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3 class=""><span>Contact Email</span> : <?php echo $value['email'];?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3 class=""><span>Contact Tel.</span> : <?php echo $value['mobile'];?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3 class=""><span>State</span> : <?php echo $value['state'];?> </h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3 class=""><span>Local Government</span> : <?php echo $value['government'];?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3 class=""><span>Year Of Exemption</span> : <?php echo date('Y',strtotime($value['createat']));?></h3>
				  </div>
				</div>
				</div>
				
				 <div class="col-md-6">
				 <div class="qr-code text-right">
				  <img src="operation/qr_exem/<?php echo $value['qrcode'];?>" alt="">
				 </div>
				</div>
			  </div>
			  <div class="table-responsive">
			   
			  </div>
			  <div class="table-all-see-btn business-inner-button">
			  <a href="#" onclick="PrintElem('#yourdiv')">Print Bill</a>
			   <a href="#" class="pay-download">Save</a>
			  </div>
			    <div class="watermark-bill"><img src="images/watermark.png" alt=""></div>
			</div>
			
                          <?php } } } ?>
		  
			
			
	
			
		  </div>

   <?php include("userfooter.php"); ?>    

<script type="text/javascript">
    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data)
    {
        var mywindow = window.open('', '', '');
        mywindow.document.write('<html><head><title></title>');
       mywindow.document.write('<link rel="stylesheet" href="css/style.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');
        mywindow.print();
        mywindow.close();
        return true;
    }
</script>
		