<?php include("userheader.php"); include('operation/function.php');  ?>
 <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
   <?php include("sidebar.php"); 
   $bussinesslist=new Users;
   ?>
     <div class="main-panel">
          <div class="content-wrapper">
 
            <div class="page-header">
              <h3 class="page-title">List of Exemptions  Registered to this  profile</h3>
            </div>
			<div class="dashboard-table-list inner-business-list-table">
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
           if($allvalue['permission'] != 1){ 
               echo '--';}else{
               $_result3= gettime(date('Y-m-d', strtotime($allvalue['updateat']))); 
               echo $_result3; 
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
           if($allvalue['permission'] != 1){ 
               echo '--';}else{
               $_result3= gettime(date('Y-m-d', strtotime($allvalue['createat']))); 
               echo $_result3; 
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
           if($allvalue['permission'] != 1){ 
               echo '--';}else{
               $_result3= gettime(date('Y-m-d', strtotime($allvalue['createat']))); 
               echo $_result3; 
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
			</div>
			
	
			
		  </div>

   
   
    <?php include("userfooter.php"); ?>
        </div>