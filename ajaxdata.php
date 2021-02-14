<?php include('operation/controller.php');

if(isset($_POST["state_id"]) && !empty($_POST["state_id"])){
   $sid=$_POST['state_id'];
    $state = new Users;
    $data=$state->getwheredata('statewithgovernment', 'state',$sid );      
    echo '<option value="">Select Government</option>';
    foreach ($data as $row1) { 
            echo '<option value="'.$row1['government'].'">'.$row1['government'].'</option>';
    }
}
if(isset($_POST["text"]) && !empty($_POST["text"])){    
if($_POST['text']=='business'){
      $id=$_POST["id"];$amount=$_POST["amount"];
     $busdetail = new Users;
    $bdata=$busdetail->getwheredata('business', 'id',$id );
    $rno=$busdetail->makerecipt($bdata[0]['state'], $bdata[0]['government'],'BUS');
   $qrcode=$busdetail->qrcode($rno,'business'); 
     $businesslist=$busdetail->getbusinessbilltable($bdata[0]['type'], $bdata[0]['size'], $bdata[0]['state'],$bdata[0]['government']);
     $list= json_encode($businesslist);
    $type=$busdetail->getwheredata('typeofbusiness', 'id',$bdata[0]['type'] );  
   $generatebill=new mainfuntion;
   $bill=$generatebill->insertbusinessbill($bdata[0]['id'],$bdata[0]['userid'] , $bdata[0]['name'], $bdata[0]['address'], $bdata[0]['size'], $type[0]['typeofbusiness'], $bdata[0]['personcontact'], $bdata[0]['personmobile'], $bdata[0]['email'], $bdata[0]['businessmobile'], $bdata[0]['state'], $bdata[0]['government'], $bdata[0]['yearvalidity'], $amount, $rno, $qrcode, $list);
}
 
if($_POST['text']=='vehicle'){
      $id=$_POST["id"];$amount=$_POST["amount"];
     $busdetail = new Users;
    $bdata=$busdetail->getwheredata('vehicle','id',$id );
    $rno=$busdetail->makerecipt($bdata[0]['state'], $bdata[0]['government'],'VEH');
   $qrcode=$busdetail->qrcode($rno,'vehicle'); 
     $businesslist=$busdetail->getvehiclebilltable($bdata[0]['usetype'], $bdata[0]['state'],$bdata[0]['government']);
     $list= json_encode($businesslist); 
   $generatebill=new mainfuntion;
   $bill=$generatebill->insertvehiclebill($bdata[0]['userid'],$bdata[0]['ownername'], $bdata[0]['vehicleregistrationno'], $bdata[0]['chasisno'], $bdata[0]['vehiclemake'], $bdata[0]['manufactureyear'], $bdata[0]['government'], $bdata[0]['state'], $bdata[0]['usetype'], $bdata[0]['validityyear'], $rno,$amount,$qrcode,$bdata[0]['id'],$list);
   }
if($_POST['text']=='property'){
      $id=$_POST["id"];$amount=$_POST["amount"];
     $busdetail = new Users;
    $bdata=$busdetail->getwheredata('property', 'id',$id );
    $rno=$busdetail->makerecipt($bdata[0]['state'],$bdata[0]['government'],'PRO');
    $qrcode=$busdetail->qrcode($rno,'property'); 
     $businesslist=$busdetail->getpropertybilltable($bdata[0]['propertytype'],$bdata[0]['state'],$bdata[0]['government']);
     $list= json_encode($businesslist); 
   $generatebill=new mainfuntion;
   $bill=$generatebill->insertpropertybill($bdata[0]['userid'],$bdata[0]['title'], $bdata[0]['mobile'], $bdata[0]['address1'], $bdata[0]['address2'],$bdata[0]['state'],$bdata[0]['government'], $bdata[0]['propertytype'],$bdata[0]['validityyear'], $rno,$amount,$qrcode,$bdata[0]['id'],$list);
                 
}   
}
?>