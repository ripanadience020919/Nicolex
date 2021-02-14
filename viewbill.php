<?php include("userheader.php"); include("operation/convertnoinword.php"); ?>
 <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
   <?php include("sidebar.php"); 
   $viewbill=new Users;
   ?>
      <div class="main-panel" id="yourdiv">
          <div class="content-wrapper">
 
            <div class="page-header">
              <h3 class="page-title">Payment Bill</h3>
            </div>
			 <?php if($_GET['text']=='business'){	
                             $viewbusinessbill=$viewbill->getwheredata('business', 'id',$_GET['id'] );
                             foreach ($viewbusinessbill as $vbbill) { $bid=$vbbill['id'];
                                 ?>
			<div class="dashboard-table-list inner-business-list-table  pybill-table-list">
			  <div class="row">
			    <div class="col-md-6">
				<div class="payment-bill-report">
				  <div class="payment-bill-name">
				  <h3><span>Date</span> : <?php
					echo $db_date=date("d M Y", strtotime($vbbill["createat"]));	?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3><span>Business Name</span> : <?php echo $vbbill['name'];?> </h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3><span>Business Address</span> : <?php echo $vbbill['address'];?></h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3><span>Business Mobile Number</span> : <?php echo $vbbill['businessmobile'];?></h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3><span>Business Mail</span> : <?php echo $vbbill['email'];?></h3>
				  </div>
				</div>
				</div>
				
				 <div class="col-md-6">
				</div>
			  </div>
				  <div class="table-responsive">
			    <table class="table payment-business-table">
				  <thead>
				   <tr>
				     <th>Levies </th>
					 <th> Rate</th>
				   </tr>
				  </thead>
				  <tbody>
				  	 <?php 	$amount=0;
                                       $businesslist=$viewbill->getbusinessbilltable($vbbill['type'], $vbbill['size'], $vbbill['state'],$vbbill['government']); 
                                   echo '<tr> <td>BUSINESS IDENTIFICATION FEE </td><td>'.$businesslist['bidenticationfee'].'</td></tr>'
                                                  . '<tr> <td>HSE LEVY </td><td>'.$businesslist['hselevy'].'</td></tr>'
                                                  . '<tr> <td>PROFESSIONAL LEVY  </td><td>'.$businesslist['professionallevy'].'</td></tr>'
                                                  . '<tr> <td>REFUSE DISPOSAL</td><td>'.$businesslist['refusedisposal'].'</td></tr>'
                                                  . '<tr> <td>BILLBOARD </td><td>'.$businesslist['billboard'].'</td></tr>'
                                                  . '<tr> <td>FIRE  </td><td>'.$businesslist['fire'].'</td></tr>'
                                                  . '<tr> <td>PRIVATE ENTERPRISE </td><td>'.$businesslist['privateenterprise'].'</td></tr>'
                                                  . '<tr> <td>ENVIRONMENTAL SANITATION  </td><td>'.$businesslist['evssanitation'].'</td></tr>';
                                               $amount=$businesslist['bidenticationfee']+$businesslist['hselevy']+$businesslist['professionallevy']+$businesslist['refusedisposal']+$businesslist['billboard']+$businesslist['fire']+$businesslist['privateenterprise']+$businesslist['evssanitation'];
                                       
                             } 
                                         ?>				    
				    <tr>
				     <td colspan="4">
					 <div class="payment-amount">
					  <h5>Total Amount Paid In Figure: <span> <?php echo 'NGN '.$amount; ?></span></h5>
					 <h5>Total Amount Paid In Words: <span>
					     <?php $_result=convert_number_to_words($amount);
					            $a=$_result; echo $a.' Naira Only'; ?></span></h5>
					 </div>
                     </td>					 
				   </tr>
				  </tbody>
				</table>
				<div class="table-all-see-btn business-inner-button">
			  <a href="#" onclick="PrintElem('#yourdiv')">Print Bill</a>
			    <a href="paymentgateway.php?text=business&id=<?php echo $bid.'&amount='.$amount; ?>" id="paymentbusinessbutton" class="view-list" >Pay Now</a>
			
			<!--  <a href="paymentsuccess.php?name=<?php echo $row['name'].'&phone='.$row['bphone'].'&email='.$row['email'].'&amount='.$amount.'&receiptno='.$row['receiptno'].'&text=business'.'&id='.$row[0]; ?>" class="view-list">Pay Now</a>
						  <a href="file.php?amount='.$amount.'&text=business'.'&id='.$row[0];?>" class="view-list">Pay Now</a>
			      -->
			  </div>
			    <div class="watermark-bill"><img src="images/watermark.png" alt=""></div>
			</div>
                         
			 <?php }  ?>
 <!---
                            <form id="paymentbusinessform" action="paymentgateway.php" name="busform">
                                <input type="hidden" name="bid" value="<?php echo $bid;?>"/>
                                <input type="hidden" name="amount" value="<?php echo $amount;?>"/>
                                <input type="hidden" name="text" value="<?php echo 'business';?>"/>
                                <input type="submit" name="busform" />
                            </form>                            
<script type="text/javascript">
    $(document).ready(function(){
        $("#paymentbusinessbutton").click(function(){
            $("#paymentbusinessform").submit();
        });
    });
    </script>------->
			 <?php if($_GET['text']=='vehicle'){	
				 $viewvehiclebill=$viewbill->getwheredata('vehicle', 'id',$_GET['id'] );
                             foreach ($viewvehiclebill as $vvbill) { $vid=$vvbill['id']; ?>
			<div class="dashboard-table-list inner-business-list-table  pybill-table-list">
			  <div class="row">
			    <div class="col-md-6">
				<div class="payment-bill-report">
				  <div class="payment-bill-name">
				  <h3><span>Date</span> : <?php
					echo $db_date=date("d M Y", strtotime($vvbill["createat"]));	?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3><span>Owner Name</span> : <?php echo $vvbill['ownername'];?> </h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3><span>Vehicle Registration no. </span> : <?php echo $vvbill['vehicleregistrationno'];?></h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3><span>Chasis Number</span> : <?php echo $vvbill['chasisno'];?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3><span>Vehicle Make Model</span> : <?php echo $vvbill['vehiclemake'];?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3><span>State Of Compliance</span> : <?php echo $vvbill['state'];?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3><span>LGA Of Compliance</span> : <?php echo $vvbill['government'];?></h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3><span>Year Of Compliance</span> : <?php echo $vvbill['manufactureyear'];?></h3>
				  </div>
			
				</div>
				</div>
				
				 <div class="col-md-6">
				</div>
			  </div>
			    <div class="table-responsive">
			    <table class="table payment-business-table">
				  <thead>
				   <tr>
				     <th>Levies </th>
					 <th> Rate</th>
				   </tr>
				  </thead>
				  <tbody>
				 <?php 	$amount=0;
                                       $vehiclelist=$viewbill->getvehiclebilltable($vvbill['usetype'],$vvbill['state'],$vvbill['government']);
                                       echo '<tr> <td>'.$vehiclelist['type'].'</td>'
                                                  . '<td> N '.$vehiclelist['rate'].'</td></tr>';
                                               $amount=$vehiclelist['rate'];
                                           ?>
				    <tr>
				     <td colspan="4">
					 <div class="payment-amount">
					  <h5>Total Amount Paid In Figure: <span> <?php echo 'NGN '.$amount; ?></span></h5>
					 <h5>Total Amount Paid In Words: <span>
					     <?php $_result1=convert_number_to_words($amount);
					            $a1=$_result1; echo $a1.' Naira Only';
				 ?></span></h5>
					 </div>
                     </td>					 
				   </tr>
				  </tbody>
				</table>
				
<div class="table-all-see-btn business-inner-button">
			  <a href="#" onclick="PrintElem('#yourdiv')">Print Bill</a>
			     <a href="paymentgateway.php?text=vehicle&id=<?php echo $vid.'&amount='.$amount; ?>" class="view-list">Pay Now</a>
			 <!--  <a href="paymentsuccess.php?name=<?php echo $row['ownername'].'&phone='.$row21['mobile'].'&email='.$row21['email'].'&amount='.$amount.'&receiptno='.$row['receiptno'].'&text=vehicle'.'&id='.$row[0]; ?>" class="view-list">Pay Now</a>
			<a href="file.php?name=<?php echo $row['ownername'].'&phone='.$row21['mobile'].'&email='.$row21['email'].'&amount='.$amount.'&id='.$row['id'].'&text=vehicle';   ?>" class="view-list">Pay Now</a>
			  -->
			  </div>
			   <div class="watermark-bill"><img src="images/watermark.png" alt=""></div> 
			</div>
			
                         <?php } } 
                         if($_GET['text']=='property'){	
				  $viewpropertybill=$viewbill->getwheredata('property', 'id',$_GET['id'] );
                             foreach ($viewpropertybill as $vpbill) { $pid=$vpbill['id']; ?>
			<div class="dashboard-table-list inner-business-list-table  pybill-table-list">
			  <div class="row">
			    <div class="col-md-6">
				<div class="payment-bill-report">
				  <div class="payment-bill-name">
				  <h3><span>Date</span> : <?php
					echo $db_date=date("d M Y", strtotime($vpbill["createat"]));	?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3><span>Title</span> : <?php echo $vpbill['title'];?> </h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3><span>Contact Person tel</span> : <?php echo $vpbill['mobile'];?> </h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3><span>Property LGA </span> : <?php echo $vpbill['government'];?></h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3><span>Property Address</span> : <?php echo $vpbill['address1'];?></h3>
				  </div>
				   <div class="payment-bill-name">
				  <h3><span>Validity Year</span> : <?php echo $vpbill['validityyear'];?></h3>
				  </div>
				  <div class="payment-bill-name">
				  <h3><span>Property Type</span> : <?php echo $vpbill['propertytype'];?></h3>
				  </div>
				</div>
				</div>
				
				 <div class="col-md-6">
				</div>
			  </div>
			  <div class="table-responsive">
			    <table class="table payment-business-table">
			  <thead>
				   <tr>
				     <th>Levies </th>
					 <th> Rate</th>
				   </tr>
				  </thead>
				  <tbody>
				  
                                       <?php 	$amount=0;
                                   $propertyamountlist=$viewbill->getpropertybilltable($vpbill['propertytype'],$vpbill['state'],$vpbill['government']);
                                       echo '<tr> <td>PROPERTY  IDENTIFICATION </td><td>'.$propertyamountlist['identification'].'</td></tr>'
                                                  . '<tr> <td>LAND USE </td><td>'.$propertyamountlist['landuse'].'</td></tr>'
                                                  . '<tr> <td>SEWAGE AND HUMAN WASTE SYSTEMS  </td><td>'.$propertyamountlist['wastesystem'].'</td></tr>'
                                                  . '<tr> <td>RADIO UV RADIATIONS FEES</td><td>'.$propertyamountlist['radiationfee'].'</td></tr>'
                                                  . '<tr> <td>INFRASTRUCTURAL USE </td><td>'.$propertyamountlist['infrastructre'].'</td></tr>'
                                                  . '<tr> <td>ENVIRONMENTAL POLLUTION  </td><td>'.$propertyamountlist['polution'].'</td></tr>';
                                               $amount=$propertyamountlist['identification']+$propertyamountlist['landuse']+$propertyamountlist['wastesystem']+$propertyamountlist['radiationfee']+$propertyamountlist['infrastructre']+$propertyamountlist['polution'];
                                       
                             } 
                                         ?>
				    <tr>
				     <td colspan="4">
					 <div class="payment-amount">
					  <h5>Total Amount Paid In Figure: <span> <?php echo 'NGN '.$amount; ?></span></h5>
					 <h5>Total Amount Paid In Words: <span>
					     <?php $_result2=convert_number_to_words($amount);
					            $a2=$_result2; echo $a2.' Naira Only';
				 ?></span></h5>
					 </div>
                     </td>					 
				   </tr>
				  </tbody>
				</table>
			  </div>
			  <div class="table-all-see-btn business-inner-button">
			  <a href="#" onclick="PrintElem('#yourdiv')">Print Bill</a>
			   <a href="paymentgateway.php?text=property&id=<?php echo $pid.'&amount='.$amount; ?>" class="view-list">Pay Now</a>
	 
	  <!--  <a href="paymentsuccess.php?name=<?php echo $row21['name'].'&phone='.$row21['mobile'].'&email='.$row21['email'].'&amount='.$amount.'&receiptno='.$row['receiptno'].'&text=property'.'&id='.$row[0]; ?>" class="view-list">Pay Now</a>
	 				  <a href="file.php?name=<?php echo $row21['name'].'&phone='.$row21['mobile'].'&email='.$row21['email'].'&amount='.$amount.'&receiptno='.$row['receiptno'].'&text=property';   ?>" class="view-list">Pay Now</a>
	-->
			  </div>
			    <div class="watermark-bill"><img src="images/watermark.png" alt=""></div>
			</div>
			
			 <?php }
                          ?>
		  </div>

        </div>
        </div>
     
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
		 </div>
   <?php include("userfooter.php"); ?>   