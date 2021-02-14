<?php if(!isset($_SESSION)){ session_start(); }
ob_start();
// define('DB_SERVER','localhost');
// define('DB_USER','biswa_nicolex');
// define('DB_PASS' ,'nicolex@123');
// define('DB_NAME', 'biswa_blackcod_nicol');
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'blackcod_nicol');
class Users {
    
      function __construct()
  {
            
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
$this->db=$con;
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
  }
   public function setpassword($password,$uid)
 {  $today=date("Y-m-d");
 $res="update user set password='".$password."'  where id='$uid'";
   $sql1=mysqli_query($this->db,$res);
   $msg="Password Changed Successfully ";
 return $msg;
 } 
   public function setprofile($name,$email,$mobile,$state,$government,$address1,$address2,$about,$image,$uid)
 {  $today=date("Y-m-d");
  $res="update user set name='".$name."',email='".$email."',address1='".$address1."',address2='".$address2."',mobile='".$mobile."',image='".$image."',state='".$state."',government='".$government."',about='$about'  where id='$uid'";
   $sql1=mysqli_query($this->db,$res);
   $msg="Profile Successfully Updated";
 return $msg;
 } 
          
public function  qrcode($rno,$text){
include('operation/qr/libs/phpqrcode/qrlib.php');
    function getUsernameFromEmail($email) {
  $find = '/';
  $pos = strpos($email, $find);
  $username = substr($email, 0, $pos);
  return $username.rand(9999,100000);
}
 $tempDir = 'operation/qr/temp/'; 
  $filename = getUsernameFromEmail($rno);
   // $codeContents = 'http://rendementdev.xyz/nicolex/scanqr.php?receiptno='.$rno.'&type='.$text.''; 
  $codeContents = 'http://localhost/nicolex/scanqr.php?receiptno='.$rno.'&type='.$text.'';
  QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
   $qr=$filename.'.png';
  return $qr;
}

public function  qrcode_exem($rno,$text){
include('operation/qr/libs/phpqrcode/qrlib.php');
    function getUsernameFromEmail($email) {
  $find = '/';
  $pos = strpos($email, $find);
  $username = substr($email, 0, $pos);
  return $username.rand(9999,100000);
}
 $tempDir = 'operation/qr_exem/'; 
  $filename = getUsernameFromEmail($rno);
   // $codeContents = 'http://rendementdev.xyz/nicolex/scanqr.php?receiptno='.$rno.'&type='.$text.''; 
  $codeContents = 'http://localhost/nicolex/scanqr_exem.php?receiptno='.$rno.'&type='.$text.'';
  QRcode::png($codeContents, $tempDir.''.$filename.'.png', QR_ECLEVEL_L, 5);
   $qr=$filename.'.png';
  return $qr;
}

public function makerecipt($state,$government,$text)
 {    
     $str=$state;
     $count=str_word_count($str);
     if($count=='1'){ $letter=substr($str,0,2);}
     else{
     $words = explode(" ", $str); $letter = "";
        foreach ($words as $value) {   $letter .= substr($value, 0, 1);} 
      }
    $g=$government;
     $count1=str_word_count($g);
    if($count1=='1'){ $letter1=substr($g,0,2);}else{
      $words1 = explode(" ", $g);$letter1 = "";
    foreach ($words1 as $value1) {   $letter1 .= substr($value1, 0, 1);} }
     $rno= $letter.'/'.$letter1.'/'.$text.'/'.rand(9999,100000);
     return $rno;
 }

 public function makerecipt_exem($state,$government,$text)
 {    
     $str=$state;
     $year = substr(date('Y'), 2, 4);
     $count=str_word_count($str);
     if($count=='1'){ $letter=substr($str,0,2);}
     else{
     $words = explode(" ", $str); $letter = "";
        foreach ($words as $value) {   $letter .= substr($value, 0, 1);} 
      }
    $g=$government;
     $count1=str_word_count($g);
    if($count1=='1'){ $letter1=substr($g,0,2);}else{
      $words1 = explode(" ", $g);$letter1 = "";
    foreach ($words1 as $value1) {   $letter1 .= substr($value1, 0, 1);} }
     $rno= $letter.'/'.$letter1.'/'.$text.'/'.'EXN/'.$year.'/'.rand(100000,999999);
     return $rno;
 }


 public function getallpaytaxlist($userid)
 {  $user=array();
        $sql="select id,name,createat,qrcode from business_bill where userid=".$userid."  union select id,title,createat,qrcode from property_bill where userid=".$userid." union select id,ownername,createat,qrcode from vehicle_bill where userid=".$userid."";
 $result=mysqli_query($this->db,$sql);
         $rowcount=mysqli_num_rows($result);
 if($rowcount>0){
 while ($row = mysqli_fetch_assoc($result)) {
     array_push($user,$row);
 }
 return $user;
 }else{ return 'nodata';}
 }     
     
 public function getcomparepcn($userid,$code,$table)
 {  if($table=='BUS'){ $sql="select * from business_bill where receiptno='$code' and userid='$userid'";}
elseif($table=='PRO'){ $sql="select * from property_bill where receiptno='$code' and userid='$userid'";}  
else{ $sql="select * from vehicle_bill where receiptno='$code' and userid='$userid'";}
$result=mysqli_query($this->db,$sql);
         $rowcount=mysqli_num_rows($result);
 if($rowcount>0)
 {
  return 'done';
 }
 else
  { 
    return 'nodata';
  }
 }

 public function checkpcn($userid,$code,$table)
 {
  $user=array();
  if($table=='BUS'){ $sql="select * from business_bill where receiptno='$code' and userid='$userid'";}
elseif($table=='PRO'){ $sql="select * from property_bill where receiptno='$code' and userid='$userid'";}  
else{ $sql="select * from vehicle_bill where receiptno='$code' and userid='$userid'";}
$result=mysqli_query($this->db,$sql);
         $rowcount=mysqli_num_rows($result);
 if($rowcount>0)
 {
  while ($row = mysqli_fetch_assoc($result)) {
                 array_push($user,$row);
             }
            return $user;
 }
 else
  { 
    return false;
  }
 } 
 
   public function getallpbvlist($userid)
 {  $user=array();
  $sql="select id,name,paymentdate,billid,itis from business where userid=".$userid."  union select id,title,paymentdate,billid,itis from property where userid=".$userid." union select id,ownername,paymentdate,billid,itis from vehicle where userid=".$userid."";
 $result=mysqli_query($this->db,$sql);
         $rowcount=mysqli_num_rows($result);
 if($rowcount>0){
 while ($row = mysqli_fetch_assoc($result)) {
     array_push($user,$row);
 }
 return $user;
 }else{ return 'nodata';}
 }     
 public function getpropertybilltable($type,$state,$government)
 {  
  $_user1=array();
     $sql="SELECT * from propertyrate where type='".$type."' and state='".$state."' and government='".$government."'";
 $result=mysqli_query($this->db,$sql);
 while($row = mysqli_fetch_assoc($result)){
     $user1=$row;
 }
 return $user1;
 }        
   public function getvehiclebilltable($type,$state,$government)
 {  $user1=array();
     $sql="SELECT * from vehiclerate where type='".$type."' and state='".$state."' and government='".$government."'";
     // echo $sql;die();
 $result=mysqli_query($this->db,$sql);
 while($row = mysqli_fetch_assoc($result)){
     $user1=$row;
 }
 return $user1;
 }        
  public function getbusinessbilltable($businesstype,$size,$state,$government)
 {  
  // echo '<pre>'; print_r($_POST);die();
        $sql="SELECT * from businessrate where bid='".$businesstype."' and  category='".$size."' and state='".$state."' and government='".$government."'";
 $result=mysqli_query($this->db,$sql);
 $row = mysqli_fetch_assoc($result);
     $user1=$row;
 return $user1;
 }   
  public function getfilterdata($from,$too,$userid)
 {  $user=array();
        $sql="SELECT id,name,createat,qrcode FROM business_bill where createat between '".$from."' and '".$too."' and userid='".$userid."' union  SELECT id,title,createat,qrcode FROM property_bill where createat between '".$from."' and '".$too."' and userid='".$userid."' union SELECT id,ownername,createat,qrcode FROM vehicle_bill where createat between '".$from."' and '".$too."' and userid='".$userid."'";
 $result=mysqli_query($this->db,$sql);
         $rowcount=mysqli_num_rows($result);
 if($rowcount>0){
 while ($row = mysqli_fetch_assoc($result)) {
     array_push($user,$row);
 }
 return $user;
 }else{ return 'nodata';}
 }   
  public function setcontactform($name,$email,$mobile,$state,$government,$msg)
 {  $today=date("Y-m-d");
   $sql="insert into `webcontact`(`name`, `email`, `mobile`, `msg`, `state`, `government`, `dateat`) values ('$name','$email','$mobile','$msg','$state','$government','$today')";
  $result = mysqli_query($this->db,$sql);
 return 'done';
 }
 public function update_password($id,$cpass){
  mysqli_query($this->db,"update user set password='".$cpass."' where id=".$id);
  return true;
 }
 public function get_details($username,$email)
 {
    $sql="SELECT * from user where username='".$username."' AND email='".$email."'";
      $result=mysqli_query($this->db,$sql);
        $rowcount=mysqli_num_rows($result);
         if($rowcount>0)
         {
            $row = mysqli_fetch_array($result);
            return $row['id'];
         }
         else
         {
          return false;
         }
 }   
    public function getlogin($username,$password)
 { 
  $today=date("Y-m-d H:i:s");
        $sql="SELECT * from user where username='".$username."' ";
 $result=mysqli_query($this->db,$sql);
         $rowcount=mysqli_num_rows($result);
 if($rowcount>0)
 {
  $row = mysqli_fetch_array($result);     
     if(($password==$row['password']) && ($row['status']=='Y'))
     {
      $status='1';$msg="Login"; 
     $_SESSION['name']=$row['name'];  $_SESSION['id']=$row['id']; $_SESSION['email']=$row['email'];
     $update= mysqli_query($this->db,"update user set lastlogin='".$today."' where id='".$row['id']."'");
     // $update_login_details= mysqli_query($this->db,"INSERT INTO login_details (user_id) VALUES ('".$row['id']."')
     //    ");
     include('database_connection.php');
     $sub_query = "
        INSERT INTO login_details 
          (user_id) 
          VALUES ('".$row['id']."')
        ";
        $statement = $connect->prepare($sub_query);
        $statement->execute();
        $_SESSION['login_details_id'] = $connect->lastInsertId();
     // $sub_query = "
     //    INSERT INTO login_details 
     //      (user_id) 
     //      VALUES ('".$row['user_id']."')
     //    ";
     }
     else{
      $status='0';$msg='Password Not Match';
   }
 }
 else
  { 
    $status='0';$msg='Username Not Exist'; 
  }
  
 return array($status,$msg);
 }    
  public function getdata($tablename)
 { 
    $sql="select * from ".$tablename."";
    // echo $sql;
     $result=mysqli_query($this->db,$sql);
     // echo $result;
     while ($row = mysqli_fetch_array($result)) {
         $user[]=$row;
     }
    return false;
 }
 public function getdata_new($tablename)
 { 
  $sql="select * from ".$tablename." where `status`= 'A'";
 $result=mysqli_query($this->db,$sql);
 while ($row = mysqli_fetch_array($result)) {
     $user[]=$row;
 }
 return false;
 }
 public function getcontact_us()
 { 
        $user=array();
        $sql="SELECT * from `contactus`";
 $result=mysqli_query($this->db,$sql);
 while ($row = mysqli_fetch_array($result)) {
     $user[]=$row;
 }
 return $user;
 }
 public function getinfo()
 { 
        $user=array();
        $sql="SELECT * from `info` where `status`='A'";
 $result=mysqli_query($this->db,$sql);
 while ($row = mysqli_fetch_array($result)) {
     $user[]=$row;
 }
 return $user;
 }
 public function getfaq()
 { 
        $user=array();
        $sql="SELECT * from `faq` where `status`='A'";
 $result=mysqli_query($this->db,$sql);
 while ($row = mysqli_fetch_array($result)) {
     $user[]=$row;
 }
 return $user;
 }
 public function getadvertisement()
 { 
        $user=array();
        $sql="SELECT * from `advertisement`";
 $result=mysqli_query($this->db,$sql);
 while ($row = mysqli_fetch_array($result)) {
     $user[]=$row;
 }
 return $user;
 }
 public function getstate()
 { 
        $user=array();
        $sql="SELECT * from `statewithgovernment` GROUP BY state ";
 $result=mysqli_query($this->db,$sql);
 while ($row = mysqli_fetch_array($result)) {
     $user[]=$row;
 }
 return $user;
 }

 public function getbusinesstype()
 { 
        $user=array();
        $sql="SELECT * from `typeofbusiness`";
 $result=mysqli_query($this->db,$sql);
 while ($row = mysqli_fetch_array($result)) {
     $user[]=$row;
 }
 return $user;
 }

 public function getgovt()
 { 
        $user=array();
        $sql="SELECT * from `statewithgovernment` GROUP BY government ";
 $result=mysqli_query($this->db,$sql);
 while ($row = mysqli_fetch_array($result)) {
     $user[]=$row;
 }
 return $user;
 }

  public function getbizcarddata($userid)
 { 
        $user=array();
        $sql="SELECT distinct(size) from business_bill where userid='".$userid."' ";
          $result=mysqli_query($this->db,$sql);
          // echo mysqli_num_rows($result);die();
            if(mysqli_num_rows($result)>0)
            {
              while ($row = mysqli_fetch_array($result))
              {
                $sql1="SELECT distinct(userid) from business_bill where size='".$row['size']."' and userid!=".$userid." ";
                  $res=mysqli_query($this->db,$sql1);
                  // echo '<pre>';print_r($res);die();
                  // echo mysqli_num_rows($res);die();
                    if(mysqli_num_rows($res)>0)
                    {
                      while ($row1 = mysqli_fetch_assoc($res))
                      {
                        array_push($user,$row1);
                      }
                    }
                    else
                    { 
                      return 'nodata';
                    }
              }
              return $user;
            }
            else
            {
             return 'pay';
            }
 }
 public function getwheredata($tablename,$wherename,$matchname)
 { 
        $user=array();
          $sql="SELECT * from ".$tablename." where ".$wherename."='".$matchname."'";
           $result=mysqli_query($this->db,$sql);
                   $rowcount=mysqli_num_rows(mysqli_query($this->db,$sql));
           if(0 < $rowcount){
             while ($row = mysqli_fetch_assoc($result)) {
                 array_push($user,$row);
             }
            return $user;
           }else{ return false;}
 }
 public function insert($name,$username,$email,$mobile,$gender,$dob,$address1,$address2,$password)
  {
     $sql="INSERT INTO `user`(`name`, `username`, `email`, `mobile`, `gender`, `dob`, `address1`, `address2`, `password`) VALUES ('$name','$username','$email','$mobile','$gender','$dob','$address1','$address2','$password')";
  $result = mysqli_query($this->db,$sql);
  $id= mysqli_insert_id($this->db);
        $_SESSION['name']=$name; $_SESSION['email']=$email;  $_SESSION['id']=$id;
        mysqli_query($this->db,"update user set status='Y' where id=".$_SESSION['id']);
        return $result;
  }
  public function getuserdata($id)
 { 
        $sql="select * from user where id='".$id."'";
 $result=mysqli_query($this->db,$sql);
$row = mysqli_fetch_assoc($result);
     $userdata=$row;
 return $userdata;
 }
 public function setuserlogout()
 { 
        // mysqli_query($this->db,"update user set status='N' where id=".$_SESSION['id']);
  unset($_SESSION['id']);
  unset($_SESSION['name']);
  unset($_SESSION['email']);
  session_destroy();
 return 'done';
 }
 }

 
 class mainfuntion
{
     function __construct()
  {
            
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
$this->db=$con;
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
  }
     public function insertbusiness($userid,$name,$address,$size,$type,$pname,$pno,$email,$bno,$state,$government,$year)
  {
            $ret=mysqli_query($this->db,"insert into `business`(`name`, `address`, `type`, `email`, `size`, `businessmobile`, `personcontact`, `personmobile`, `state`, `government`, `yearvalidity`, `userid` ,`itis`) VALUES  ('$name','$address','$type','$email','$size','$bno','$pname','$pno','$state','$government','$year','$userid','business')");
  $id= mysqli_insert_id($this->db);
      $sql=mysqli_query($this->db,"update user set business=business+1 where id='$userid'");
        return $id;
  }

  public function insertbusiness_exemptions($userid,$name,$address,$size,$type,$pno,$email,$state,$government,$year,$town,$duration,$tell_us)
  {
            $ret=mysqli_query($this->db,"insert into `business_exemptions`(`name`, `address`, `type`, `email`, `size`, `personmobile`, `state`, `government`, `yearvalidity`, `userid`,`town`,`duration`,`tell_us`) VALUES  ('$name','$address','$type','$email','$size','$pno','$state','$government','$year','$userid','$town','$duration','$tell_us')");
          $id= mysqli_insert_id($this->db);
          return $id;
  }
        public function insertbusinessbill($bid,$userid,$name,$address,$size,$type,$pname,$pno,$email,$bno,$state,$government,$year,$amount,$rno,$qrcode,$description,$pstatus,$tx_ref,$transaction_id,$trans_amount)
  {   $date= date("Y-m-d H:i:s");       $today=date("Y-m-d");
        $sql="SELECT * from business_bill where bid='".$bid."' ";
 $result=mysqli_query($this->db,$sql);
 if(mysqli_num_rows($result)>0){  return 'no';  }else{
            $query="insert into `business_bill`(`bid`,`name`, `address`, `type`, `email`, `size`, `businessmobile`, `personcontact`, `personmobile`, `state`, `government`, `yearvalidity`, `createat`, `userid`, `amount`, `receiptno`, `qrcode`, `description`,`payment_status`,`tx_ref`,`transaction_id`,`trans_amount`) VALUES ('$bid','$name','$address','$type','$email','$size','$bno','$pname','$pno','$state','$government','$year','$date','$userid','$amount','$rno','$qrcode','$description','$pstatus','$tx_ref','$transaction_id','$trans_amount')";
            $ret=mysqli_query($this->db,$query);
            $id= mysqli_insert_id($this->db);
            $sql=mysqli_query($this->db,"update business set billstatus='C', billid='$id',paymentdate='$today',payment_status='$pstatus',tx_ref='$tx_ref',transaction_id='$transaction_id',trans_amount='$trans_amount' where id='$bid'");
            $sql1 = mysqli_query($this->db,"update user set bizcardapproval='Y' where id='".$_SESSION['id']."'");
        return $id;
  }
  }
   public function updatebusiness($id,$name,$address,$size,$type,$pname,$pno,$email,$bno,$state,$government,$year)
  {
            $ret=mysqli_query($this->db,"update business set name='$name',address='$address',type='$type',email='$email',size='$size',businessmobile='$bno',personcontact='$pno',state='$state',government='$government',yearvalidity='$year' where id='$id'");
         $id=$id;
            return $id;
  }

  public function updatebusinessexemptionqr($id,$qrcode,$exemption_id)
  {
            $ret=mysqli_query($this->db,"update business_exemptions set qrcode='$qrcode',exemption_id='$exemption_id' where id='$id'");
         $id=$id;
            return $id;
  }

  public function updatevehicleexemptionqr($id,$qrcode,$exemption_id)
  {
            $ret=mysqli_query($this->db,"update vehicle_exemption set qrcode='$qrcode',exemption_id='$exemption_id' where id='$id'");
         $id=$id;
            return $id;
  }

  public function updatepropertyexemptionqr($id,$qrcode,$exemption_id)
  {
            $ret=mysqli_query($this->db,"update property_exemption set qrcode='$qrcode',exemption_id='$exemption_id' where id='$id'");
         $id=$id;
            return $id;
  }


  public function insertvehicle($userid,$name,$registrationno,$chasisno,$vehiclemake,$manufactreyear,$government,$state,$usetype,$year,$address,$mobile,$duration,$town,$email)
  { 
  $ret=mysqli_query($this->db,"INSERT INTO `vehicle`( `userid`, `ownername`, `vehicleregistrationno`, `chasisno`, `vehiclemake`, `manufactureyear`, `government`, `state`, `usetype`,`validityyear`,`itis`,`address`,`mobile`,`duration`,`town`,`email`)VALUES('$userid','$name','$registrationno','$chasisno','$vehiclemake','$manufactreyear','$government','$state','$usetype','$year','vehicle','$address','$mobile','$duration','$town','$email')");
  $id= mysqli_insert_id($this->db);
      $sql=mysqli_query($this->db,"update user set vehicle=vehicle+1 where id='$userid'");
        return $id;
  }
  public function insertvehicle_exemption($userid,$name,$registrationno,$chasisno,$vehiclemake,$manufactreyear,$government,$state,$year,$address,$mobile,$duration,$town,$email,$tell_us)
  { 
  $ret=mysqli_query($this->db,"INSERT INTO `vehicle_exemption`( `userid`, `ownername`, `vehicleregistrationno`, `chasisno`, `vehiclemake`, `manufactureyear`, `government`, `state`,`validityyear`,`address`,`mobile`,`duration`,`town`,`email`,`tell_us`)VALUES('$userid','$name','$registrationno','$chasisno','$vehiclemake','$manufactreyear','$government','$state','$year','$address','$mobile','$duration','$town','$email','$tell_us')");
  $id= mysqli_insert_id($this->db);
        return $id;
  }
  public function insertvehiclebill($userid,$name,$registrationno,$chasisno,$vehiclemake,$manufactreyear,$government,$state,$usetype,$year,$rno,$amount,$qrcode,$vid,$desc,$pstatus,$tx_ref,$transaction_id,$trans_amount)
  {  
    $date= date("Y-m-d H:i:s"); $today= date("Y-m-d");
    $sql="SELECT * from vehicle_bill where vid='".$vid."' ";
 $result=mysqli_query($this->db,$sql);
 if(mysqli_num_rows($result)>0){  return 'no';  }else{
  $query="INSERT INTO `vehicle_bill`( `userid`, `ownername`, `vehicleregistrationno`, `chasisno`, `vehiclemake`, `manufactureyear`, `government`, `state`, `usetype`,`validityyear`,`createat`, `receiptno`, `amount`,`qrcode`, `vid`, `description`,`payment_status`,`tx_ref`,`transaction_id`,`trans_amount`)VALUES('$userid','$name','$registrationno','$chasisno','$vehiclemake','$manufactreyear','$government','$state','$usetype','$year','$date','$rno','$amount','$qrcode','$vid','$desc','$pstatus','$tx_ref','$transaction_id','$trans_amount')";
  $ret=mysqli_query($this->db,$query);
            $id= mysqli_insert_id($this->db);
            $sql=mysqli_query($this->db,"update vehicle set billstatus='C', billid='$id',paymentdate='$today',validityyear='$year',payment_status='$pstatus',tx_ref='$tx_ref',transaction_id='$transaction_id',trans_amount='$trans_amount' where id='$vid'");
            $sql1 = mysqli_query($this->db,"update user set bizcardapproval='Y' where id='".$_SESSION['id']."'");
       return $id;
  } }
         public function updatevehicle($id,$name,$registrationno,$chasisno,$vehiclemake,$manufactreyear,$government,$state,$usetype,$year,$address,$mobile)
  {
  $ret=mysqli_query($this->db,"update vehicle set `ownername`='$name', `vehicleregistrationno`='$registrationno', `chasisno`='$chasisno', `vehiclemake`='$vehiclemake', `manufactureyear`='$manufactreyear', `government`='$government', `state`='$state', `usetype`='$usetype',`validityyear`='$year',`address`='$address',`mobile`='$mobile' where id='$id'");
       return $id;
  }
  public function insertproperty($userid,$title,$mobile,$address1,$address2,$state,$government,$usetype,$year)
  { 
  $ret=mysqli_query($this->db,"INSERT INTO `property`(`userid`, `title`,`mobile`, `address1`, `address2`,`state`,`government`,`propertytype`, `validityyear`,`itis`)VALUES('$userid','$title','$mobile','$address1','$address2','$state','$government','$usetype','$year','property')");
  $id= mysqli_insert_id($this->db);
      $sql=mysqli_query($this->db,"update user set property=property+1 where id='$userid'");
        return $id;
  }

  public function insertproperty_exemption($userid,$title,$mobile,$address1,$government,$state,$usetype,$year,$town,$email,$tell_us,$cperson,$duration)
  { 
  $ret=mysqli_query($this->db,"INSERT INTO `property_exemption`(`userid`, `title`,`mobile`, `address1`,`government`,`state`,`propertytype`, `validityyear`,`itis`,`town`,`email`,`tell_us`,`cperson`,`duration`)VALUES('$userid','$title','$mobile','$address1','$government','$state','$usetype','$year','$property','$town','$email','$tell_us','$cperson','$duration')");
  $id= mysqli_insert_id($this->db);
        return $id;
  }

  public function updateproperty($id,$title,$mobile,$address1,$address2,$government,$state,$usetype,$year)
  { 
  $ret=mysqli_query($this->db,"update property set `title`='$title',`mobile`='$mobile', `address1`='$address1', `address2`='$address2', `state`='$state',`government`='$government',`propertytype`='$usetype', `validityyear`='$year' where id='$id'");
      return $id;
  }
          public function insertpropertybill($userid,$title,$mobile,$address1,$address2,$state,$government,$propertytype,$validityyear,$rno,$amount,$qrcode,$pid,$desc,$pstatus,$tx_ref,$transaction_id,$trans_amount)
  {  
      
    $date= date("Y-m-d H:i:s"); $today= date("Y-m-d");
  
    $sql="SELECT * from property_bill where pid='".$pid."' ";
 $result=mysqli_query($this->db,$sql);
 
 if(mysqli_num_rows($result)>0){
   return 'no';  
 }else{
  $ret1="INSERT INTO `property_bill`(`userid`, `title`,`mobile`, `address1`, `address2`,`state`,`government`,`propertytype`, `validityyear`,`receiptno`, `amount`,`description`, `qrcode`,`pid`,`payment_status`,`tx_ref`,`transaction_id`,`trans_amount`)VALUES('$userid','$title','$mobile','$address1','$address2','$state','$government','$propertytype','$validityyear','$rno','$amount','$desc','$qrcode','$pid','$pstatus','$tx_ref','$transaction_id','$trans_amount')";
  $ret=mysqli_query($this->db,$ret1);
            $id= mysqli_insert_id($this->db);
            $sql1=mysqli_query($this->db,"update property set billstatus='C', billid='$id',paymentdate='$today',validityyear='$validityyear',payment_status='$pstatus',tx_ref='$tx_ref',transaction_id='$transaction_id',trans_amount='$trans_amount' where id='$pid'");
            $sql2 = mysqli_query($this->db,"update user set bizcardapproval='Y' where id='".$_SESSION['id']."'");
       return $id;
  }
     }
         public function insertsupport($userid,$name,$email,$mobile,$query,$pcnno)
  { 
 $today= date('Y-m-d');
    $rt="INSERT INTO  `support`(`name`, `email`, `mobile`, `query`, `pcnno`, `userid`, `dateat`) VALUES ('".$name."','".$email."','".$mobile."','".$query."','".$pcnno."','".$userid."','$today')";
      $ret=mysqli_query($this->db,$rt);
                $id= mysqli_insert_id($this->db);
    return $id;
  }
   public function insertadd($userid,$name,$desc,$filename,$filetmp)
  { 
 $today= date('Y-m-d');
$image=$filename;
    $path="images/";
    $img=rand(99,1000).$image;
    $upload=$path.$img;
    if($image!="")
    { move_uploaded_file($filetmp,$upload); 
  $rt="INSERT INTO `advertisement`(`userid`, `name`, `description`, `file`,`dateat`) VALUES ('$userid','".$name."','".$desc."','$img','$today')"; 
        $ret=mysqli_query($this->db,$rt);
        $id= mysqli_insert_id($this->db);
    return $id;
  } 
        }
}
ob_flush();
?>