<?php include("userheader.php"); 
  $currentsave=new Users;
  ?>
 <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
   <?php include("sidebar.php"); ?>
      <div class="main-panel" id="yourdiv">
          <div class="content-wrapper">
   <div class="success-part">
			 <img src="images/success-icon.png" alt="">
			 <h2>Exemption Permit</h2>
                <span>Kindly Check the Details :-</span>
			 <?php 

			 if($_GET['text']=='e'){
  
  if (!empty($currentsave->getwheredata('business_exemptions','code',$_GET['id']))) {
  	$bdata = $currentsave->getwheredata('business_exemptions','code',$_GET['id']);
  	if (empty($bdata[0]['qrcode']))
  	{
  		$rno = $currentsave->makerecipt_exem($bdata[0]['state'], $bdata[0]['government'],'BUS');
	   $qrcode = $currentsave->qrcode_exem($rno,'business');
	   $generateqr = new mainfuntion;
	   $updateqrcode =  $generateqr->updatebusinessexemptionqr($bdata[0]['id'],$qrcode,$rno);
  	}
  	$crntbussiness=$currentsave->getwheredata('business_exemptions','code',$_GET['id']);
  foreach ($crntbussiness as $crntbns) { ?>
			<div class="dashboard-table-list inner-business-list-table  pybill-table-list" style=" margin-top: 50px; margin-bottom: 50px; text-align: justify;">
			  <div class="row">
			    <div class="col-md-9">
				<div class="payment-bill-report">
				  <div class="payment-bill-name">
				  <h3><span>PCN</span> : <?php
					echo $crntbns['exemption_id'];	?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3 class=""><span>Name Of Business</span> : <?php echo $crntbns['name'];?> </h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3 class=""><span>Address Of Business</span> : <?php echo $crntbns['address'];?></h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3 class=""><span>Type Of Business</span> : <?php echo $crntbns['type'];?></h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3 class=""><span>Contact Email</span> : <?php echo $crntbns['email'];?></h3>
				  </div>
				    <div class="payment-bill-name">
				  <h3 class=""><span>Contact Tel.</span> : <?php echo $crntbns['personmobile'];?> </h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3 class=""><span>Size Of Business</span> : <?php echo $crntbns['size'];?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3 class=""><span>State</span> : <?php echo $crntbns['state'];?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3 class=""><span>Local Goverment</span> : <?php echo $crntbns['government'];?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3 class=""><span>Year Of Exemption</span> : <?php echo date('Y',strtotime($crntbns['createat']));?></h3>
				  <!-- <h3><?php echo substr(date('Y'), 2, 4)?></h3> -->
				  </div>
				</div>
				</div>
			    <div class="col-md-3">
			    	<div class="payment-bill-name">
				  	 <div class="qr-code text-right">
				  		<img src="operation/qr_exem/<?php echo $crntbns['qrcode'];?>" alt="">
				 	 </div>
				  	</div>
			    </div>
				</div>
				
			  </div>
                    <?php 
                }
                }
   			elseif (!empty($currentsave->getwheredata('vehicle_exemption','code',$_GET['id']))) {
   				$bdata = $currentsave->getwheredata('vehicle_exemption','code',$_GET['id']);
			  	if (empty($bdata[0]['qrcode']))
			  	{
			  		$rno=$currentsave->makerecipt_exem($bdata[0]['state'], $bdata[0]['government'],'VRPP');
				   $qrcode = $currentsave->qrcode_exem($rno,'vehicle');
				   $generateqr = new mainfuntion;
				   $updateqrcode =  $generateqr->updatevehicleexemptionqr($bdata[0]['id'],$qrcode,$rno);
			  	}
            $crntvehcle=$currentsave->getwheredata('vehicle_exemption','code',$_GET['id']);
  		foreach ($crntvehcle as $crntvhl) { ?>
			<div class="dashboard-table-list inner-business-list-table  pybill-table-list" style=" margin-top: 50px; margin-bottom: 50px; text-align: justify;">
			  <div class="row">
			    <div class="col-md-9">
				<div class="payment-bill-report">
				  <div class="payment-bill-name">
				  <h3><span>PCN</span> : <?php
					echo $crntvhl['exemption_id'];	?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3  class=""><span>Name Of Owner</span> : <?php echo $crntvhl['ownername'];?> </h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3 class=""><span>Registration no. </span> : <?php echo $crntvhl['vehicleregistrationno'];?></h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3 class=""><span>Chasis Number</span> : <?php echo $crntvhl['chasisno'];?></h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3 class=""><span>Make Of Vehicle</span> : <?php echo $crntvhl['vehiclemake'];?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3  class=""><span>Owner's Email</span> : <?php echo $crntvhl['email'];?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3  class=""><span>Owner's Tel</span> : <?php echo $crntvhl['mobile'];?></h3>
				  </div>
				    <div class="payment-bill-name">
				  <h3  class=""><span>State</span> : <?php echo $crntvhl['state'];?> </h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3  class=""><span>Local Government</span> : <?php echo $crntvhl['government'];?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3 class=""><span>Year Of Exemption</span> : <?php echo date('Y',strtotime($crntvhl['createat']));?></h3>
				  </div>
				</div>
				</div>
			    <div class="col-md-3">
			    	<div class="qr-code text-right">
				  	<img src="operation/qr_exem/<?php echo $crntvhl['qrcode'];?>" alt="">
				 </div>
			    </div>
			  </div>
			 </div>
			
			 <?php 
						}
					
					}
				else
				{
			
			if (!empty($currentsave->getwheredata('property_exemption','code',$_GET['id']))) {
				$bdata = $currentsave->getwheredata('property_exemption','code',$_GET['id']);
			  	if (empty($bdata[0]['qrcode']))
			  	{
			  		$rno=$currentsave->makerecipt_exem($bdata[0]['state'], $bdata[0]['government'],'PRO');
				   $qrcode = $currentsave->qrcode_exem($rno,'property');
				   $generateqr = new mainfuntion;
				   $updateqrcode =  $generateqr->updatepropertyexemptionqr($bdata[0]['id'],$qrcode,$rno);
			  	}
				$crntproperty=$currentsave->getwheredata('property_exemption','code',$_GET['id']);
                foreach ($crntproperty as $crntprty) { ?>
			<div class="dashboard-table-list inner-business-list-table  pybill-table-list" style=" margin-top: 50px; margin-bottom: 50px; text-align: justify;">
			  <div class="row">
			    <div class="col-md-9">
				<div class="payment-bill-report">
				  <div class="payment-bill-name">
				  <h3><span>PCN</span> : <?php
					echo $crntprty['exemption_id'];	?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3 class=""><span>Property Title</span> : <?php echo $crntprty['title'];?> </h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3 class=""><span>Address 1</span> : <?php echo $crntprty['address1'];?></h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3 class=""><span>Property Category</span> : <?php echo $crntprty['propertytype'];?></h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3 class=""><span>Contact Email</span> : <?php echo $crntprty['email'];?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3 class=""><span>Contact Tel.</span> : <?php echo $crntprty['mobile'];?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3 class=""><span>State</span> : <?php echo $crntprty['state'];?> </h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3 class=""><span>Local Government</span> : <?php echo $crntprty['government'];?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3 class=""><span>Year Of Exemption</span> : <?php echo date('Y',strtotime($crntprty['createat']));?></h3>
				  </div>
				</div>
				</div>
			    <div class="col-md-3">
				  <div class="qr-code text-right">
				  	<img src="operation/qr_exem/<?php echo $crntprty['qrcode'];?>" alt="">
				 </div>
			    </div>
			</div>
				<?php 
								}
							} 
						}
					} 
                ?>
                            <div class="row">
			 <div class="col-md-4"></div>
                         <div class="col-md-4"></div>
			 <div class="col-md-4"><a href="userindex.php"  style="background: #b5332b;">Return to deshboard</a></div>
			 </div>
			</div>
        
		  </div>

        </div>
        </div>
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
        mywindow.document.write('<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><title></title>');
       mywindow.document.write('<link rel="stylesheet" href="css/style.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');
        mywindow.print();
        mywindow.close();
        return true;
    }
</script>
		 