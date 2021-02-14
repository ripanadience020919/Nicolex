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
              <h3 class="page-title">List of Business  Registered to this  profile</h3>
            </div>
			<div class="dashboard-table-list inner-business-list-table">
			   <div class="table-responsive">
			    <table class="table dashboard-business-table">
				  <thead>
				   <tr>
				     <th>S No</th>
					 <th> Property Name</th>
					 <th>Pay</th>
					 <th>Next Renewal(Countdown)</th>
				   </tr>
				  </thead>
				  <tbody>
				   <?php	
				   if(isset($_GET['text'])){ 
				   if($_GET['text']=='business'){	
                 $bsnlt=$bussinesslist->getwheredata('business', 'userid', $_SESSION['id']);
            if($bsnlt=='nodata'){ echo ' No Data Found'; exit();}else{
                $c=1;
    foreach ($bsnlt as $value) { 
    for ($i=0;$i<1;$i++) {
            echo '<tr> <td>'.$c.'</td>'.
                 '<td>'.$value['name'].'</td>'.
                 '<td class="pay-button">';
            if($value['billid']!='0'){ echo '<a href="business.php?text=b">Renew</a>   <a href="paymentbill.php?id='.$value['id'].'&text=business">View</a>';}
            else{ echo '<a href="viewbill.php?id='.$value['id'].'&text=business">Pay</a>';  }
           echo '</td><td>';
           if($value['paymentdate']=='0000-00-00'){ echo '--';}else{
               $_result= gettime($value['paymentdate']); 
               echo $_result;
           }
}
$c++; }
         } 	
				   }
               if($_GET['text']=='vehicle'){	
                                    $vhclt=$bussinesslist->getwheredata('vehicle', 'userid', $_SESSION['id']);
                                  if($vhclt=='nodata'){ echo ' No Data Found'; exit();}else{
                                      $c=1;
    foreach ($vhclt as $value1) { 
    for ($i=0;$i<1;$i++) {
            echo '<tr> <td>'.$c.'</td>'.
                 '<td>'.$value1['ownername'].'</td>'.
                 '<td class="pay-button">';
            if($value1['billid']!='0'){ echo '<a href="business.php?text=v">Renew</a>   <a href="paymentbill.php?id='.$value1['id'].'&text=vehicle">View</a>';}
            else{ echo '<a href="viewbill.php?id='.$value1['id'].'&text=vehicle">Pay</a>';  }
           echo '</td><td>';
           if($value1['paymentdate']=='0000-00-00'){ echo '--';}else{
               $_result1= gettime($value1['paymentdate']); 
               echo $_result1;
           }
}
$c++; }
         }  
         }
				   if($_GET['text']=='property'){	
         $prtylt=$bussinesslist->getwheredata('property', 'userid', $_SESSION['id']);
                                  if($prtylt=='nodata'){ echo ' No Data Found'; exit();}else{
                                      $c=1;
    foreach ($prtylt as $value2) { 
    for ($i=0;$i<1;$i++) {
            echo '<tr> <td>'.$c.'</td>'.
                 '<td>'.$value2['title'].'</td>'.
                 '<td class="pay-button">';
            if($value2['billid']!='0'){ echo '<a href="business.php?text=p">Renew</a><a href="paymentbill.php?id='.$value2['id'].'&text=property">View</a>';}
            else{ echo '<a href="viewbill.php?id='.$value2['id'].'&text=property">Pay</a>';  }
           echo '</td><td>';
           if($value2['paymentdate']=='0000-00-00'){ echo '--';}else{
               $_result2= gettime($value2['paymentdate']); 
               echo $_result2;
           }
}
$c++; }
         }
	   }
				   }
				  else{
            $alllt=$bussinesslist->getallpbvlist($_SESSION['id']);
                                  if($alllt=='nodata'){ echo ' No Data Found'; exit();}else{
                                      $c=1;
    foreach ($alllt as $allvalue) { 
    for ($i=0;$i<1;$i++) { 
            echo '<tr> <td>'.$c.'</td>'.
                 '<td>'.$allvalue['name'].'</td>'.
                 '<td class="pay-button">';
                 if($allvalue['itis']=='business'){$t='b';}elseif($allvalue['itis']=='property'){$t='p';}elseif($allvalue['itis']=='vehicle'){$t='v';}
            if($allvalue['billid']!='0'){ 
                echo '<a href="renewbusiness.php?id='.$allvalue['id'].'&text='.$t.'">Renew</a><a href="paymentbill.php?id='.$allvalue['id'].'&text='.$allvalue['itis'].'">View</a>';}
            else{ echo '<a href="viewbill.php?id='.$allvalue['id'].'&text='.$allvalue['itis'].'">Pay</a>';  }
           echo '</td><td>';
           if($allvalue['paymentdate']=='0000-00-00'){ echo '--';}else{
               $_result3= gettime($allvalue['paymentdate']); 
               echo $_result3;
           }
}
$c++; }
         }
                                  }
				  ?>
				  </tbody>
				</table>
			  </div>
			</div>
			
	
			
		  </div>

   
   
    <?php include("userfooter.php"); ?>
        </div>