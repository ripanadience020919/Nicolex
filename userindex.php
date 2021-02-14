<?php include("userheader.php");  include('operation/function.php');?>
 <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
   <?php include("sidebar.php"); 
   if(isset($_GET['tm']) && $_GET['tm']=='99'){
       ?>
       
    <link rel="stylesheet" href="css/html.css">
    <body onload="lightbox_open();">
<div id="light" >
  <a class="boxclose" id="boxclose" onclick="lightbox_close();"></a>
  <video id="VisaChipCardVideo" width="600" controls autoplay="autoplay" muted >
      <source src="images/WhatsApp Video 2020-06-05 at 8.15.57 PM.mp4" type="video/mp4">
      <source src="images/WhatsApp Video 2020-06-05 at  8.15.57 PM.ogg" type="video/ogg">
      <!--Browser does not support <video> tag -->
    </video>
  <div class="skipbtn">
        <button class="btn btn-info"  onclick="lightbox_close();">skip</button>
  </div>
</div>
    <div id="fade" > </div>
    
<script>
function lightbox_open() {
  var lightBoxVideo = document.getElementById("VisaChipCardVideo");
  window.scrollTo(0, 0);
      lightBoxVideo.play();
  document.getElementById('light').style.display = 'block';
  document.getElementById('fade').style.display = 'block';
}

function lightbox_close() {
  var lightBoxVideo = document.getElementById("VisaChipCardVideo");
  document.getElementById('light').style.display = 'none';
  document.getElementById('fade').style.display = 'none';
  lightBoxVideo.pause();
}
</script>
  <?php }   ?>
  
   <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
 
            <div class="page-header">
              <h3 class="page-title">Dashboard </h3>
            </div>
			<div class="dashboard-select">
			 <div class="row">
			   <div class="col-md-6">
			   <label class="dropdown-date-time">
                <div class="dd-button"><img src="images/calender-icon.png" alt="">   <?php date_default_timezone_set("Africa/Lagos"); echo date('l, F j, Y' ).' | '.date('h:i A' ); ?>  </div>
                   <input type="checkbox" class="dd-input" id="test">
                  <ul class="dd-menu">
                       <li>
                   <?php echo date('l, F j, Y' ).' | '.date('h:i A' );
                   ?></li>
                   </ul>
              </label>
			   </div>
			   <div class="col-md-6">
  			   <label class="dropdown-date-time">
                  <div class="dd-button"><img src="images/register-icon.png" alt="">   Register New  </div>
                   <input type="checkbox" class="dd-input" id="test">
                    <ul class="dd-menu">
                        <li><a href="business.php?text=b">Business</a></li>
            					   <li><a href="business.php?text=p">Property</a></li>
            						<li><a href="business.php?text=v">Vehicle Radio & Parking Permit</a></li>
                        <li><a href="business.php?text=e">Exemptions</a></li>
                    </ul>
          </label>
			   </div>
         <!-- <div class="col-md-4">
           <label class="dropdown-date-time">
                  <div class="dd-button"><img src="images/register-icon.png" alt="">   Exemptions  </div>
                   <input type="checkbox" class="dd-input" id="test">
                    <ul class="dd-menu">
                        <li><a href="exemptions.php?text=p">Property Exemptions</a></li>
                        <li><a href="exemptions.php?text=b">Business Exemptions</a></li>
                        <li><a href="exemptions.php?text=v">Vehicle Radio & Parking Permit Exemptions</a></li>
                        <li><a href="exemptions.php?text=c">Click To Print Exemption Permit</a></li>
                    </ul>
          </label>
         </div> -->
			 </div>
			</div>
			<div class="dashboard-table-list">
			  <div class="dashboard-table-list-title">
			    <h2>List of Business, Property and Vehicle Radio & Parking Permit Registered to this  profile</h2>
			  </div>
			  <div class="table-responsive">
			    <table class="table dashboard-business-table">
				  <thead>
				   <tr>
				    <th>S No</th>
					 <th>Property / Business / Vehicle Name</th>
					 <th>Pay</th>
					 <th>Payment Amount</th>
					 <th>Next Renewal(Countdown)</th>
					 <th>Download / View Bill</th>
           <th>State </th>
           <th>Local Government</th>
				   </tr>
				  </thead>
				  <tbody>
				  <?php	
                    $buss=new Users;
                    $busin=$buss->getwheredata('business', 'userid', $_SESSION['id'].' order by id desc limit 0,2');
                     $c=1;
    foreach ($busin as $allvalue) { 
                   for ($i=0;$i<1;$i++) {
            echo '<tr> <td>'.$c.'</td>'.
                 '<td>'.$allvalue['name'].'</td>'.
                 '<td class="pay-button">';
            if($allvalue['billid']!='0' || !is_null($allvalue['billid'])){ echo '<a href="renewbusiness.php?id='.$allvalue['id'].'&text=b">Renew</a><a href="viewbill.php?id='.$allvalue['id'].'&text=business">View</a>';}
            else{ echo '<a href="viewbill.php?id='.$allvalue['id'].'&text=business">Pay</a>';  }
           echo '</td>';
            $busamount=$buss->getbusinessbilltable($allvalue['type'], $allvalue['size'], $allvalue['state'], $allvalue['government']); 
                    echo '<td>'.$busamount['total'].'</td><td>';
           if($allvalue['paymentdate']=='0000-00-00' || is_null($allvalue['paymentdate'])){ 
               echo '--';}else{
               $_result3= gettime($allvalue['paymentdate']); 
               echo $_result3; 
               } 
              echo '</td><td>';
                if($allvalue['billstatus']=='C'){ 
                    $busqrcode=$buss->getwheredata('business_bill', 'bid', $allvalue['id']); 
                     echo '<a href="operation/qr/download.php?file='.$busqrcode[0]['qrcode'].'" class="download-button-table"><i class="fas fa-download"></i></a>';
                    echo '<a href="paymentbill.php?id='.$allvalue['id'].'&text=business" class="view-button-table"><i class="fas fa-eye"></i></a></td>';         
           }else{
           echo 'NOT PAID YET</td>' ;        
           }
           echo '<td>'.$allvalue['state'].'</td>'
                   .'<td>'.$allvalue['government'].'</td>';
                }   
                
             $c++;         }
            
                        $busin=$buss->getwheredata('vehicle', 'userid', $_SESSION['id'].' order by id desc limit 0,2');
    foreach ($busin as $allvalue) { 
                   for ($i=0;$i<1;$i++) {
            echo '<tr> <td>'.$c.'</td>'.
                 '<td>'.$allvalue['ownername'].'</td>'.
                 '<td class="pay-button">';
            if($allvalue['billid']!='0' || is_null($allvalue['billid'])){ echo '<a href="renewbusiness.php?id='.$allvalue['id'].'&text=v">Renew</a><a href="viewbill.php?id='.$allvalue['id'].'&text=vehicle">View</a>';}
            else{ echo '<a href="viewbill.php?id='.$allvalue['id'].'&text=vehicle">Pay</a>';  }
           echo '</td>';
            $busamount=$buss->getvehiclebilltable($allvalue['usetype'], $allvalue['state'], $allvalue['government']);
                    echo '<td>'.$busamount['rate'].'</td><td>';
               
           if($allvalue['paymentdate']=='0000-00-00' || is_null($allvalue['paymentdate'])){ 
               echo '--';}else{
               $_result3= gettime($allvalue['paymentdate']); 
               echo $_result3; 
               }
               echo '</td><td>';
               if($allvalue['billstatus']=='C'){ 
                    $busqrcode=$buss->getwheredata('vehicle_bill', 'vid', $allvalue['id']); 
                     echo '<a href="operation/qr/download.php?file='.$busqrcode[0]['qrcode'].'" class="download-button-table"><i class="fas fa-download"></i></a>';
                    echo '<a href="paymentbill.php?id='.$allvalue['id'].'&text=vehicle" class="view-button-table"><i class="fas fa-eye"></i></a></td>';         
           }else{
           echo 'NOT PAID YET</td>' ;        
           }
           echo '<td>'.$allvalue['state'].'</td>'
                   .'<td>'.$allvalue['government'].'</td>';
                }   
                
             $c++;         }
                
                        $busin=$buss->getwheredata('property','userid',$_SESSION['id'].' order by id desc limit 0,2');
                        // echo '<pre>';print_r($busin);
    foreach ($busin as $allvalue) { 
                   for ($i=0;$i<1;$i++) {
            echo '<tr> <td>'.$c.'</td>'.
                 '<td>'.$allvalue['title'].'</td>'.
                 '<td class="pay-button">';
            if($allvalue['billid']!='0' || is_null($allvalue['billid'])){
             echo '<a href="renewbusiness.php?id='.$allvalue['id'].'&text=p">Renew</a><a href="viewbill.php?id='.$allvalue['id'].'&text=property">View</a>';}
            else{ echo '<a href="viewbill.php?id='.$allvalue['id'].'&text=property">Pay</a>';  }
           echo '</td>';
            $busamount=$buss->getpropertybilltable($allvalue['propertytype'], $allvalue['state'], $allvalue['government']);
            // echo '<pre>';print_r($busamount);               
                    echo '<td>'.$busamount['total'].'</td><td>';
           if($allvalue['paymentdate']=='0000-00-00' || is_null($allvalue['paymentdate'])){ 
               echo '--';}else{
               $_result3= gettime($allvalue['paymentdate']); 
               echo $_result3; 
               }
              echo '</td><td>';
                if($allvalue['billstatus']=='C'){ 
                    $busqrcode=$buss->getwheredata('property_bill', 'pid', $allvalue['id']); 
                     echo '<a href="operation/qr/download.php?file='.$busqrcode[0]['qrcode'].'" class="download-button-table"><i class="fas fa-download"></i></a>';
                echo '<a href="paymentbill.php?id='.$allvalue['id'].'&text=property" class="view-button-table"><i class="fas fa-eye"></i></a></td>';         
           }else{
           echo 'NOT PAID YET</td>' ;        
           }
           echo '<td>'.$allvalue['state'].'</td>'
                   .'<td>'.$allvalue['government'].'</td>';
                }   
                
             $c++;         }       
             
             
            	?>
		</tbody>
				</table>
			  </div>
			  <div class="table-all-see-btn"><a href="businesslist.php">See All List</a></div>
			</div>

      <div class="dashboard-table-list">
        <div class="dashboard-table-list-title">
          <h2>Exemption Permits Granted to this Profile</h2>
        </div>
        <div class="table-responsive">
          <table class="table dashboard-business-table">
          <thead>
           <tr>
            <th>S No</th>
           <th>Property / Business / Vehicle Name</th>
           <th>Permit</th>
           <!-- <th>Payment Amount</th> -->
           <th>Next Renewal(Countdown)</th>
           <th>Exemption Status</th>
           <th>State </th>
           <th>Local Government</th>
           </tr>
          </thead>
          <tbody>
          <?php 
                    $buss=new Users;
                    $busin=$buss->getwheredata('business_exemptions', 'userid', $_SESSION['id'].' order by id desc limit 0,2');
                     $c=1;
    foreach ($busin as $allvalue) { 
                   for ($i=0;$i<1;$i++) {
            echo '<tr> <td>'.$c.'</td>'.
                 '<td>'.$allvalue['name'].'</td>'.
                 '<td class="pay-button">';
                 // if (($allvalue['code'] != 0) && ($allvalue['code'] != '')) {
                  echo '<a href="business.php?text=e">view</a>';
                 // }else{
                 //  echo 'Pending';
                 // }
            echo '</td>';
            // $busamount=$buss->getbusinessbilltable($allvalue['type'], $allvalue['size'], $allvalue['state'], $allvalue['government']); 
            //         echo '<td>'.$busamount['total'].'</td>';
            echo '<td>';
           if($allvalue['permission'] == 1)
           { 
            if ($allvalue['duration'] == 'One Year'){
              $_result3= gettime_for_oneyear(date('Y-m-d', strtotime($allvalue['updateat']))); 
               echo $_result3;
            }elseif($allvalue['duration'] == '6 Months'){
                $_result3= gettime_for_6months(date('Y-m-d', strtotime($allvalue['updateat']))); 
               echo $_result3;
            }elseif($allvalue['duration'] == 'Quarterly'){
              $_result3= gettime_for_3months(date('Y-m-d', strtotime($allvalue['updateat']))); 
               echo $_result3;
            }elseif($allvalue['duration'] == '1 Month'){
              $_result3= gettime_for_1month(date('Y-m-d', strtotime($allvalue['updateat']))); 
               echo $_result3;
             }elseif($allvalue['duration'] == '1 Week'){
              $_result3= gettime_for_1week(date('Y-m-d', strtotime($allvalue['updateat']))); 
               echo $_result3;
             }elseif($allvalue['duration'] == 'Daily'){
              $_result3= gettime_for_1day(date('Y-m-d', strtotime($allvalue['updateat']))); 
               echo $_result3;
             }
            }
            else
            {
                echo '--';
            } 
              echo '</td><td>';
                if($allvalue['permission'] == 1)
                 { 
                 echo 'Approved</td>';         
                 }
                 elseif($allvalue['permission'] == 2)
                 {
                  echo 'Denied</td>';
                 }
                 else
                 {
                 echo 'Pending</td>' ;        
                 }
           echo '<td>'.$allvalue['state'].'</td>'
                   .'<td>'.$allvalue['government'].'</td>';
                }   
                
             $c++;         }
            
                        $busin=$buss->getwheredata('vehicle_exemption', 'userid', $_SESSION['id'].' order by id desc limit 0,2');
    foreach ($busin as $allvalue) { 
                   for ($i=0;$i<1;$i++) {
            echo '<tr> <td>'.$c.'</td>'.
                 '<td>'.$allvalue['ownername'].'</td>'.
                 '<td class="pay-button">';
                  // if (($allvalue['code'] != 0) && ($allvalue['code'] != '')) {
                  echo '<a href="business.php?text=e">view</a>';
                 // }else{
                 //  echo 'Pending';
                 // }
            echo '</td>';
            // $busamount=$buss->getvehiclebilltable($allvalue['usetype'], $allvalue['state'], $allvalue['government']);
            //         echo '<td>'.$busamount['rate'].'</td>';
               echo '<td>';
           if($allvalue['permission'] == 1)
           { 
            if ($allvalue['duration'] == 'One Year'){
              $_result3= gettime_for_oneyear(date('Y-m-d', strtotime($allvalue['updateat']))); 
               echo $_result3;
            }elseif($allvalue['duration'] == '6 Months'){
                $_result3= gettime_for_6months(date('Y-m-d', strtotime($allvalue['updateat']))); 
               echo $_result3;
            }elseif($allvalue['duration'] == 'Quarterly'){
              $_result3= gettime_for_3months(date('Y-m-d', strtotime($allvalue['updateat']))); 
               echo $_result3;
            }elseif($allvalue['duration'] == '1 Month'){
              $_result3= gettime_for_1month(date('Y-m-d', strtotime($allvalue['updateat']))); 
               echo $_result3;
             }elseif($allvalue['duration'] == '1 Week'){
              $_result3= gettime_for_1week(date('Y-m-d', strtotime($allvalue['updateat']))); 
               echo $_result3;
             }elseif($allvalue['duration'] == 'Daily'){
              $_result3= gettime_for_1day(date('Y-m-d', strtotime($allvalue['updateat']))); 
               echo $_result3;
             }
            }
            else
            {
                echo '--';
               }
               echo '</td><td>';
               if($allvalue['permission'] == 1)
                 { 
                 echo 'Approved</td>';         
                 }
                 elseif($allvalue['permission'] == 2)
                 {
                  echo 'Denied</td>';
                 }
                 else
                 {
                 echo 'Pending</td>' ;        
                 }
           echo '<td>'.$allvalue['state'].'</td>'
                   .'<td>'.$allvalue['government'].'</td>';
                }   
                
             $c++;         }
                
                        $busin=$buss->getwheredata('property_exemption', 'userid', $_SESSION['id'].' order by id desc limit 0,2');
    foreach ($busin as $allvalue) { 
                   for ($i=0;$i<1;$i++) {
            echo '<tr> <td>'.$c.'</td>'.
                 '<td>'.$allvalue['title'].'</td>'.
                 '<td class="pay-button">';
                  // if (($allvalue['code'] != 0) && ($allvalue['code'] != '')) {
                  echo '<a href="business.php?text=e">view</a>';
                 // }else{
                 //  echo 'Pending';
                 // }
            echo '</td>';
            // $busamount=$buss->getpropertybilltable($allvalue['propertytype'], $allvalue['state'], $allvalue['government']);               
            //         echo '<td>'.$busamount['total'].'</td>';
            echo '<td>';
           if($allvalue['permission'] == 1)
           { 
            if ($allvalue['duration'] == 'One Year'){
              $_result3= gettime_for_oneyear(date('Y-m-d', strtotime($allvalue['updateat']))); 
               echo $_result3;
            }elseif($allvalue['duration'] == '6 Months'){
                $_result3= gettime_for_6months(date('Y-m-d', strtotime($allvalue['updateat']))); 
               echo $_result3;
            }elseif($allvalue['duration'] == 'Quarterly'){
              $_result3= gettime_for_3months(date('Y-m-d', strtotime($allvalue['updateat']))); 
               echo $_result3;
            }elseif($allvalue['duration'] == '1 Month'){
              $_result3= gettime_for_1month(date('Y-m-d', strtotime($allvalue['updateat']))); 
               echo $_result3;
             }elseif($allvalue['duration'] == '1 Week'){
              $_result3= gettime_for_1week(date('Y-m-d', strtotime($allvalue['updateat']))); 
               echo $_result3;
             }elseif($allvalue['duration'] == 'Daily'){
              $_result3= gettime_for_1day(date('Y-m-d', strtotime($allvalue['updateat']))); 
               echo $_result3;
             }
            }
            else
            {
                echo '--';
            }
              echo '</td><td>';
                if($allvalue['permission'] == 1)
                 { 
                 echo 'Approved</td>';         
                 }
                 elseif($allvalue['permission'] == 2)
                 {
                  echo 'Denied</td>';
                 }
                 else
                 {
                 echo 'Pending</td>' ;        
                 }
           echo '<td>'.$allvalue['state'].'</td>'
                   .'<td>'.$allvalue['government'].'</td>';
                }   
                
             $c++;         }       
             
             
              ?>
    </tbody>
        </table>
        </div>
        <div class="table-all-see-btn"><a href="exemptionlist.php">See All List</a></div>
      </div>
			
			<div class="dashboard-slider">
			<div class="advertisement-slider owl-carousel owl-theme">
			     <?php $ad=new Users;
                                    $addes=$ad->getadvertisement();
                                     // print_r($addes);
                                    foreach ($addes as $row9) {
                                        for($i=0;$i<1;$i++){
                                   echo '<div class="item"><img src="images/'.$row9['file'].'" alt="" height="200px"></div>';
               }
               }
                                    ?>
				     </div>
			</div>
			<div class="dashborad-message">
			 <div class="dashborad-msg-img text-right">
			   <img src="images/message-box.png" alt="" id="addClass">
			 </div>
			</div>
		  </div>
       
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.4.1.min.js"></script> 
<script>
$(document).ready(function(){
$("#addClass").click(function () {
          $('#qnimate').addClass('popup-box-on');
            });
          
            $("#removeClass").click(function () {
          $('#qnimate').removeClass('popup-box-on');
            });
        });
</script>

<link rel="stylesheet" href="css/chat.css">
<div class="popup-box chat-popup " id="qnimate">
    		 <div class="popup-head">
                     <div class="popup-head-left pull-left"><img src="images/user-chat.png" alt="iamgurdeeposahan">May I help You</div>
					  <div class="popup-head-right pull-right">
						<button data-widget="remove" id="removeClass" class="chat-header-button pull-right" type="button">
						<i class="fa fa-power-off" aria-hidden="true"></i></button>
                      </div>
			  </div>
			<div class="popup-messages">
			<div class="direct-chat-messages">
					<div class="chat-box-single-line">
								<abbr class="timestamp"><?php echo date('l, F j, Y'); ?></abbr>
					</div>
				<div class="direct-chat-text">
                        Hello! May i help you?
                      </div>	
					
					<!-- Message. Default to the left -->
                    <div class="direct-chat-msg doted-border">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left"><?php echo $row['name']; ?></span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img alt="message user image" src="images/user-chat.png" class="direct-chat-img"><!-- /.direct-chat-img -->
                      <div id="chathistory">

                      </div>
					 
                      <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg 
					
					
					<div class="chat-box-single-line">
						<abbr class="timestamp">October 9th, 2015</abbr>
					</div>
			
					
					
    <!---                <div class="direct-chat-msg doted-border">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">Osahan</span>
                      </div>
                      <img alt="iamgurdeeposahan" src="images/user-chat.png" class="direct-chat-img">
                      <div class="direct-chat-text">
                        Hey bro, how�s everything going ?
                      </div>
					  <div class="direct-chat-info clearfix">
                        <span class="direct-chat-timestamp pull-right">3.36 PM</span>
                      </div>
						<div class="direct-chat-info clearfix">
                                                    <img alt="iamgurdeeposahan" src="images/user-chat.png" class="direct-chat-img big-round">
						<span class="direct-chat-reply-name">Singh</span>
						</div>
                    </div>----------->
                    <!-- /.direct-chat-msg -->
                  </div>
			</div>
<p id="chat_history_<?php echo $_SESSION['id'];?>"></p>
			<div class="popup-messages-footer">
			<textarea id="status_message" placeholder="Type a message..." rows="10" cols="40" name="message"></textarea>
                        <div class="btn-footer">
                            <a href="#" class="send_chat btn btn-info" id="<?php echo $_SESSION['id'];?>" onclick="done('<?php echo $_SESSION['id'];?>');"  style="
    padding: 8px;float:right;">Send </a>
			</div>
			</div>
	  </div>
  <?php include("userfooter.php"); ?>  
 
       