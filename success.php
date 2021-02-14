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
			 <h2>Successfully Submitted</h2>
                         <span>Kindly Check the Details :-</span>
			 <?php if($_GET['text']=='b'){
  $crntbussiness=$currentsave->getwheredata('business', 'id', $_GET['id']);
  foreach ($crntbussiness as $crntbns) { ?>
			<div class="dashboard-table-list inner-business-list-table  pybill-table-list" style=" margin-top: 50px; margin-bottom: 50px; text-align: justify;">
			  <div class="row">
			    <div class="col-md-1"></div>
			    <div class="col-md-10">
				<div class="payment-bill-report">
				  <div class="payment-bill-name">
				  <h3><span>Date</span> : <?php
					echo $db_date=date("d M Y", strtotime($crntbns["createat"]));	?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3 class="alert alert-success"><span>Business Name</span> : <?php echo $crntbns['name'];?> </h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3 class="alert alert-info"><span>Business Address</span> : <?php echo $crntbns['address'];?></h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3 class="alert alert-warning"><span>Business Mobile Number</span> : <?php echo $crntbns['businessmobile'];?></h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3 class="alert alert-danger"><span>Business Mail</span> : <?php echo $crntbns['email'];?></h3>
				  </div>
				    <div class="payment-bill-name">
				  <h3 class="alert alert-primary"><span>State</span> : <?php echo $crntbns['state'];?> </h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3 class="alert alert-success"><span>Government</span> : <?php echo $crntbns['government'];?></h3>
				  </div>
                                    <div class="payment-bill-name">
				  <h3 class="alert alert-info"><span>Contact Person Name</span> : <?php echo $crntbns['personcontact'];?></h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3 class="alert alert-warning"><span>Contact Person Number</span> : <?php echo $crntbns['personmobile'];?></h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3 class="alert alert-danger"><span>Business Size</span> : <?php echo $crntbns['size'];?></h3>
				  </div>
				</div>
				</div>
			    <div class="col-md-1"></div>
				</div>
				
			  </div>
                         <?php } } if($_GET['text']=='v'){	
				  $crntvehcle=$currentsave->getwheredata('vehicle', 'id', $_GET['id']);
  foreach ($crntvehcle as $crntvhl) { ?>
			<div class="dashboard-table-list inner-business-list-table  pybill-table-list" style=" margin-top: 50px; margin-bottom: 50px; text-align: justify;">
			  <div class="row">
			    <div class="col-md-1"></div>
			    <div class="col-md-10">
				<div class="payment-bill-report">
				  <div class="payment-bill-name">
				  <h3><span>Date</span> : <?php
					echo $db_date=date("d M Y", strtotime($crntvhl["createat"]));	?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3  class="alert alert-success"><span>Owner Name</span> : <?php echo $crntvhl['ownername'];?> </h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3 class="alert alert-info"><span>Vehicle Registration no. </span> : <?php echo $crntvhl['vehicleregistrationno'];?></h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3 class="alert alert-warning"><span>Chasis Number</span> : <?php echo $crntvhl['chasisno'];?></h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3 class="alert alert-danger"><span>Manufacture Year</span> : <?php echo $crntvhl['manufactureyear'];?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3  class="alert alert-primary"><span>Use Type</span> : <?php echo $crntvhl['usetype'];?></h3>
				  </div>
				    <div class="payment-bill-name">
				  <h3  class="alert alert-success"><span>State</span> : <?php echo $crntvhl['state'];?> </h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3  class="alert alert-info"><span>Government</span> : <?php echo $crntvhl['government'];?></h3>
				  </div>
				</div>
				</div>
			    <div class="col-md-1"></div>
			
			  </div>
			 </div>
			
			 <?php } 
                         }  if($_GET['text']=='p'){	
                                $crntproperty=$currentsave->getwheredata('property', 'id', $_GET['id']);
                                  foreach ($crntproperty as $crntprty) { ?>
			<div class="dashboard-table-list inner-business-list-table  pybill-table-list" style=" margin-top: 50px; margin-bottom: 50px; text-align: justify;">
			  <div class="row">
			    <div class="col-md-1"></div>
			    <div class="col-md-10">
				<div class="payment-bill-report">
				  <div class="payment-bill-name">
				  <h3><span>Date</span> : <?php
					echo $db_date=date("d M Y", strtotime($crntprty["createat"]));	?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3 class="alert alert-success"><span>Title</span> : <?php echo $crntprty['title'];?> </h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3 class="alert alert-info"><span>Property Address</span> : <?php echo $crntprty['address1'];?></h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3 class="alert alert-warning"><span>Property Address2</span> : <?php echo $crntprty['address2'];?></h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3 class="alert alert-danger"><span>Validity Year</span> : <?php echo $crntprty['validityyear'];?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3 class="alert alert-primary"><span>Property Type</span> : <?php echo $crntprty['propertytype'];?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3 class="alert alert-success"><span>State</span> : <?php echo $crntprty['state'];?> </h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3 class="alert alert-info"><span>Government</span> : <?php echo $crntprty['government'];?></h3>
				  </div>
				</div>
				</div>
			    <div class="col-md-1"></div>
			</div>
			
                          <?php } } 
                          if($_GET['text']=='b'){$text='business';}
                          elseif($_GET['text']=='v'){ $text='vehicle'; }
                          elseif($_GET['text']=='p'){ $text='property'; }
                          ?>
                            <div class="row">
			 <div class="col-md-4"><a href="viewbill.php?id=<?php echo $_GET['id'].'&text='.$text;?>">View Bill</a></div>
                         <div class="col-md-4"><a href = "editbusiness.php?id=<?php echo $_GET['id'].'&text='.$_GET['text'];?>" style="background: #2e3192;">Edit Entry</a></div>
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
		 