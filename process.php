<?php 
    if(isset($_GET['status']))
    {
        //* check payment status
        if($_GET['status'] == 'cancelled')
        {
            // echo 'YOu cancel the payment';
            header('Location: index.php');
        }
        elseif($_GET['status'] == 'successful')
        {
            $txid = $_GET['transaction_id'];

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/{$txid}/verify",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                  "Content-Type: application/json",
                  "Authorization: Bearer FLWSECK_TEST-6c66cf061fce2dad00a3ff8ef4552073-X"
                ),
              ));
              
              $response = curl_exec($curl);
              
              curl_close($curl);
              
              $res = json_decode($response);
              // echo '<pre>';print_r($res);die();
              if($res->status)
              {
                $amountPaid = $res->data->charged_amount;
                $amountToPay = $res->data->meta->price;
                if($amountPaid >= $amountToPay)
                { 

                  include('operation/controller.php');
                  if(isset($res->data->meta->text) && !empty($res->data->meta->text)){    
                  if($res->data->meta->text=='business'){
                        $id=$res->data->meta->uid;$amount=$res->data->meta->price;
                       $busdetail = new Users;
                      $bdata=$busdetail->getwheredata('business', 'id',$id );
                      $rno=$busdetail->makerecipt($bdata[0]['state'], $bdata[0]['government'],'BUS');
                     $qrcode=$busdetail->qrcode($rno,'business'); 
                       $businesslist=$busdetail->getbusinessbilltable($bdata[0]['type'], $bdata[0]['size'], $bdata[0]['state'],$bdata[0]['government']);
                       $list= json_encode($businesslist);
                      $type=$busdetail->getwheredata('typeofbusiness', 'id',$bdata[0]['type'] );  
                     $generatebill=new mainfuntion;
                     $bill=$generatebill->insertbusinessbill($bdata[0]['id'],$bdata[0]['userid'] , $bdata[0]['name'], $bdata[0]['address'], $bdata[0]['size'], $type[0]['typeofbusiness'], $bdata[0]['personcontact'], $bdata[0]['personmobile'], $bdata[0]['email'], $bdata[0]['businessmobile'], $bdata[0]['state'], $bdata[0]['government'], $bdata[0]['yearvalidity'], $amount, $rno, $qrcode, $list,$_GET['status'],$_GET['tx_ref'],$_GET['transaction_id'],$res->data->meta->price);
                  }
                   
                  if($res->data->meta->text=='vehicle'){
                        $id=$res->data->meta->uid;$amount=$res->data->meta->price;
                       $busdetail = new Users;
                      $bdata=$busdetail->getwheredata('vehicle','id',$id );
                      $rno=$busdetail->makerecipt($bdata[0]['state'], $bdata[0]['government'],'VEH');
                     $qrcode=$busdetail->qrcode($rno,'vehicle'); 
                       $businesslist=$busdetail->getvehiclebilltable($bdata[0]['usetype'], $bdata[0]['state'],$bdata[0]['government']);
                       $list= json_encode($businesslist); 
                     $generatebill=new mainfuntion;
                     $bill=$generatebill->insertvehiclebill($bdata[0]['userid'],$bdata[0]['ownername'], $bdata[0]['vehicleregistrationno'], $bdata[0]['chasisno'], $bdata[0]['vehiclemake'], $bdata[0]['manufactureyear'], $bdata[0]['government'], $bdata[0]['state'], $bdata[0]['usetype'], $bdata[0]['validityyear'], $rno,$amount,$qrcode,$bdata[0]['id'],$list,$_GET['status'],$_GET['tx_ref'],$_GET['transaction_id'],$res->data->meta->price);
                     }
                  if($res->data->meta->text=='property'){
                        $id=$res->data->meta->uid;$amount=$res->data->meta->price;
                       $busdetail = new Users;
                      $bdata=$busdetail->getwheredata('property', 'id',$id );
                      $rno=$busdetail->makerecipt($bdata[0]['state'],$bdata[0]['government'],'PRO');
                      $qrcode=$busdetail->qrcode($rno,'property'); 
                       $businesslist=$busdetail->getpropertybilltable($bdata[0]['propertytype'],$bdata[0]['state'],$bdata[0]['government']);
                       $list= json_encode($businesslist); 
                     $generatebill=new mainfuntion;
                     $bill=$generatebill->insertpropertybill($bdata[0]['userid'],$bdata[0]['title'], $bdata[0]['mobile'], $bdata[0]['address1'], $bdata[0]['address2'],$bdata[0]['state'],$bdata[0]['government'], $bdata[0]['propertytype'],$bdata[0]['validityyear'], $rno,$amount,$qrcode,$bdata[0]['id'],$list,$_GET['status'],$_GET['tx_ref'],$_GET['transaction_id'],$res->data->meta->price);
                                   
                  }   
                  }
              ?>
              <?php include("userheader.php");   include("operation/convertnoinword.php"); ?>
 <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
   <?php include("sidebar.php"); ?>
   <div class="main-panel" id="yourdiv">
        <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Official E-Receipt</h3>
            </div>
     <?php  
                     $paybill=new Users; 
                     if($res->data->meta->text=='business'){
                     $paymentbill = $paybill->getwheredata('business_bill', 'bid', $res->data->meta->uid);                                     
                     foreach ($paymentbill as $value) {
                         for($i=0;$i<1;$i++){
                                          ?>
          <div class="dashboard-table-list inner-business-list-table pybill-table-list">
        <div class="row">
          <div class="col-md-6">
        <div class="payment-bill-report">
        <div class="payment-bill-name">
          <h3><span>PCN No</span> : <?php echo $value['receiptno'];?></h3>
          </div>
          <div class="payment-bill-name">
          <h3><span>Date</span> : <?php echo $db_date=date("d M Y", strtotime($value["createat"])); ?></h3>
          </div>
          <div class="payment-bill-name">
          <h3><span>Business Name</span> :<?php echo $value['name'];?> </h3>
          </div>
           <div class="payment-bill-name">
          <h3><span>Business Address</span> : <?php echo $value['address'];?> </h3>
          </div>
           <div class="payment-bill-name">
          <h3><span>Business Mobile Number</span> : <?php echo $value['businessmobile'];?> </h3>
          </div>
           <div class="payment-bill-name">
          <h3><span>Business Mail</span> : <?php echo $value['email'];?> </h3>
          </div>
        </div>
        </div>
         <div class="col-md-6">
         <div class="qr-code text-right">
          <img src="operation/qr/temp/<?php echo $value['qrcode'];?>" alt="">
         </div>
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
          
      <?php 
                        $type=$paybill->getwheredata('typeofbusiness', 'typeofbusiness', $value['type']); 
                        $businesslist=$paybill->getbusinessbilltable($type[0]['id'], $value['size'], $value['state'],$value['government']); 
                                   echo '<tr> <td>BUSINESS IDENTIFICATION FEE </td><td>'.$businesslist['bidenticationfee'].'</td></tr>'
                                                  . '<tr> <td>HSE LEVY </td><td>'.$businesslist['hselevy'].'</td></tr>'
                                                  . '<tr> <td>PROFESSIONAL LEVY  </td><td>'.$businesslist['professionallevy'].'</td></tr>'
                                                  . '<tr> <td>REFUSE DISPOSAL</td><td>'.$businesslist['refusedisposal'].'</td></tr>'
                                                  . '<tr> <td>BILLBOARD </td><td>'.$businesslist['billboard'].'</td></tr>'
                                                  . '<tr> <td>FIRE  </td><td>'.$businesslist['fire'].'</td></tr>'
                                                  . '<tr> <td>PRIVATE ENTERPRISE </td><td>'.$businesslist['privateenterprise'].'</td></tr>'
                                                  . '<tr> <td>ENVIRONMENTAL SANITATION  </td><td>'.$businesslist['evssanitation'].'</td></tr>';
                                             
                                 ?>
            <tr>
                <td colspan="4">
           <div class="payment-amount">
            <h5>Total Amount Paid In Figure: <span> <?php echo 'NGN '.$value['amount']; 
            $_result= convert_number_to_words($value['amount']);
             $r=$_result;
            ?></span></h5>
           <h5>Total Amount Paid In Words: <span><?php   echo strtoupper($r).' NAIRA ONLY'; ?></span></h5>
           </div>
                     </td>      
           </tr>
          </tbody>
        </table>
                     <?php } }  ?>
        </div>
      <div class="table-all-see-btn business-inner-button">
        <a href="#" onclick="PrintElem('#yourdiv')">Print Bill</a>
                          <a href="userindex.php" class="pay-download">Go To Deshboard</a>
        </div>
        
        <div class="watermark-bill"><img src="images/watermark.png" alt=""></div>
        </div>
         <?php } ?>
         <?php if($res->data->meta->text=='vehicle'){  
         $paymentbill = $paybill->getwheredata('vehicle_bill','vid', $res->data->meta->uid);
         // echo '<pre>';print_r($paymentbill)die();                            
                     foreach ($paymentbill as $value) {
                         for($i=0;$i<1;$i++){
                      ?><div class="dashboard-table-list inner-business-list-table  pybill-table-list">
        <div class="row">
          <div class="col-md-6">
        <div class="payment-bill-report">
        <div class="payment-bill-name">
          <h3><span>PCN No</span> : <?php echo $value['receiptno'];?></h3>
          </div>
          <div class="payment-bill-name">
          <h3><span>Owner Name</span> : <?php echo $value['ownername'];?> </h3>
          </div>
           <div class="payment-bill-name">
          <h3><span>Vehicle Registration no. </span> : <?php echo $value['vehicleregistrationno'];?></h3>
          </div>
           <div class="payment-bill-name">
          <h3><span>Chasis Number</span> : <?php echo $value['chasisno'];?></h3>
          </div>
          <div class="payment-bill-name">
          <h3><span>Vehicle Make Model</span> : <?php echo $value['vehiclemake'];?></h3>
          </div>
          <div class="payment-bill-name">
          <h3><span>State Of Compliance</span> : <?php echo $value['state'];?></h3>
          </div>
          <div class="payment-bill-name">
          <h3><span>LGA Of Compliance</span> : <?php echo $value['government'];?></h3>
          </div>
           <div class="payment-bill-name">
          <h3><span>Year Of Compliance</span> : <?php echo $value['manufactureyear'];?></h3>
          </div>
          
          <div class="payment-bill-name">
          <h3><span>Date of Compliance</span> : <?php
          echo $db_date=date("d M Y", strtotime($value["createat"])); ?></h3>
          </div>
        </div>
        </div>
        
         <div class="col-md-6">
         <div class="qr-code text-right">
          <img src="operation/qr/temp/<?php echo $value['qrcode'];?>" alt="">
         </div>
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
            <?php           
                                       $vehiclelist=$paybill->getvehiclebilltable($value['usetype'],$value['state'],$value['government']);
                                       echo '<tr> <td>'.$vehiclelist['type'].'</td>'
                                                  . '<td> N '.$vehiclelist['rate'].'</td></tr>';
                                               $amount=$vehiclelist['rate'];
                                           ?>  
            
            <tr>
               <td colspan="4">
           <div class="payment-amount">
            <h5>Total Amount Paid In Figure: <span> <?php echo 'NGN '. $value['amount']; 
            $_result= convert_number_to_words($value['amount']);
             $r=$_result;
            ?></span></h5>
           <h5>Total Amount Paid In Words: <span><?php   echo strtoupper($r).' NAIRA ONLY'; ?></span></h5>
           </div>
                     </td>             
           </tr>
          </tbody>
        </table>
        
<div class="table-all-see-btn business-inner-button">
        <a href="#" onclick="PrintElem('#yourdiv')">Print Bill</a>
                          <a href="userindex.php" class="pay-download">Go To Deshboard</a>
        </div>
         <div class="watermark-bill"><img src="images/watermark.png" alt=""></div> 
      </div>
      
                                 <?php } } } ?>
        <?php if($res->data->meta->text=='property'){  
         $paymentbill = $paybill->getwheredata('property_bill', 'pid', $res->data->meta->uid);                                     
                     foreach ($paymentbill as $value) {
                         for($i=0;$i<1;$i++){  ?>
      <div class="dashboard-table-list inner-business-list-table  pybill-table-list">
        <div class="row">
          <div class="col-md-6">
        <div class="payment-bill-report">
        <div class="payment-bill-name">
          <h3><span>PCN No</span> : <?php echo $value['receiptno'];?></h3>
          </div>
         
          <div class="payment-bill-name">
          <h3><span>Title</span> : <?php echo $value['title'];?> </h3>
          </div>
           <div class="payment-bill-name">
          <h3><span>Contact Person tel.</span> : <?php echo $value['mobile'];?> </h3>
          </div>
           <div class="payment-bill-name">
          <h3><span>Property LGA </span> : <?php echo $value['government'];?></h3>
          </div>
           <div class="payment-bill-name">
          <h3><span>Property Address</span> : <?php echo $value['address1'];?></h3>
          </div>
           <div class="payment-bill-name">
          <h3><span>Validity Year</span> : <?php echo $value['validityyear'];?></h3>
          </div>
          <div class="payment-bill-name">
          <h3><span>Property Type</span> : <?php echo $value['propertytype'];?></h3>
          </div>
           <div class="payment-bill-name">
          <h3><span>Date of Complaince</span> : <?php
          echo $db_date=date("d M Y", strtotime($value["createat"])); ?></h3>
          </div>
        </div>
        </div>
        
         <div class="col-md-6">
         <div class="qr-code text-right">
          <img src="operation/qr/temp/<?php echo $value['qrcode'];?>" alt="">
         </div>
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
      
                              <?php   $amount=0;
                                   $propertyamountlist=$paybill->getpropertybilltable($value['propertytype'],$value['state'],$value['government']);
                                                 echo '<tr> <td>PROPERTY  IDENTIFICATION </td><td>'.$propertyamountlist['identification'].'</td></tr>'
                                                  . '<tr> <td>LAND USE </td><td>'.$propertyamountlist['landuse'].'</td></tr>'
                                                  . '<tr> <td>SEWAGE AND HUMAN WASTE SYSTEMS  </td><td>'.$propertyamountlist['wastesystem'].'</td></tr>'
                                                  . '<tr> <td>RADIO UV RADIATIONS FEES</td><td>'.$propertyamountlist['radiationfee'].'</td></tr>'
                                                  . '<tr> <td>INFRASTRUCTURAL USE </td><td>'.$propertyamountlist['infrastructre'].'</td></tr>'
                                                  . '<tr> <td>ENVIRONMENTAL POLLUTION  </td><td>'.$propertyamountlist['polution'].'</td></tr>';
                                               $amount=$propertyamountlist['identification']+$propertyamountlist['landuse']+$propertyamountlist['wastesystem']+$propertyamountlist['radiationfee']+$propertyamountlist['infrastructre']+$propertyamountlist['polution'];
                                       
                              
                                         ?>
            <tr>
                <td colspan="4">
           <div class="payment-amount">
            <h5>Total Amount Paid In Figure: <span> <?php echo 'NGN '.$value['amount']; 
            $_result= convert_number_to_words($value['amount']);
             $r=$_result;
            ?></span></h5>
           <h5>Total Amount Paid In Words: <span><?php   echo strtoupper($r).' NAIRA ONLY'; ?></span></h5>
           </div>
                     </td>                 
           </tr>
          </tbody>
        </table>
        </div>
        <div class="table-all-see-btn business-inner-button">
        <a href="#" onclick="PrintElem('#yourdiv')">Print Bill</a>
                          <a href="userindex.php" class="pay-download">Go To Deshboard</a>
        </div>
          <div class="watermark-bill"><img src="images/watermark.png" alt=""></div>
      </div>
      
                          <?php } } } ?>
      
      
      
  
      
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
    
              <?php
                    // echo 'Payment successful';

                    //* Continue to give item to the user
                }
                else
                {
                    echo 'Fraud transactio detected';
                }
              }
              else
              {
                  echo 'Can not process payment';
              }
        }
    }
?>