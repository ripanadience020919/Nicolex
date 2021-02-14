<?php
function gettime($paydate)
 {   
$datestr = date('Y-m-d', strtotime($paydate .'+1 years'));
$date=strtotime($datestr);
$diff=$date-time();//time returns current time in seconds
$days=floor($diff/(60*60*24));//seconds/minute*minutes/hour*hours/day)
$hours=round(($diff-$days*60*60*24)/(60*60));
$returndate=$days.' days '.$hours.' hours';
 return $returndate;
 }     

 function gettime_for_oneyear($paydate)
 {   
$datestr = date('Y-m-d', strtotime($paydate .'+1 years'));
$date=strtotime($datestr);
$diff=$date-time();//time returns current time in seconds
$days=floor($diff/(60*60*24));//seconds/minute*minutes/hour*hours/day)
$hours=round(($diff-$days*60*60*24)/(60*60));
$returndate=$days.' days '.$hours.' hours';
 return $returndate;
 }

 function gettime_for_6months($paydate)
 {   
$datestr = date('Y-m-d', strtotime($paydate .'+6 months'));
$date=strtotime($datestr);
$diff=$date-time();//time returns current time in seconds
$days=floor($diff/(60*60*24));//seconds/minute*minutes/hour*hours/day)
$hours=round(($diff-$days*60*60*24)/(60*60));
$returndate=$days.' days '.$hours.' hours';
 return $returndate;
 }

 function gettime_for_3months($paydate)
 {   
$datestr = date('Y-m-d', strtotime($paydate .'+3 months'));
$date=strtotime($datestr);
$diff=$date-time();//time returns current time in seconds
$days=floor($diff/(60*60*24));//seconds/minute*minutes/hour*hours/day)
$hours=round(($diff-$days*60*60*24)/(60*60));
$returndate=$days.' days '.$hours.' hours';
 return $returndate;
 }

 function gettime_for_1month($paydate)
 {   
$datestr = date('Y-m-d', strtotime($paydate .'+1 month'));
$date=strtotime($datestr);
$diff=$date-time();//time returns current time in seconds
$days=floor($diff/(60*60*24));//seconds/minute*minutes/hour*hours/day)
$hours=round(($diff-$days*60*60*24)/(60*60));
$returndate=$days.' days '.$hours.' hours';
 return $returndate;
 }

 function gettime_for_1week($paydate)
 {   
$datestr = date('Y-m-d', strtotime($paydate .'+1 week'));
$date=strtotime($datestr);
$diff=$date-time();//time returns current time in seconds
$days=floor($diff/(60*60*24));//seconds/minute*minutes/hour*hours/day)
$hours=round(($diff-$days*60*60*24)/(60*60));
$returndate=$days.' days '.$hours.' hours';
 return $returndate;
 }

 function gettime_for_1day($paydate)
 {   
$datestr = date('Y-m-d', strtotime($paydate .'+1 day'));
$date=strtotime($datestr);
$diff=$date-time();//time returns current time in seconds
$days=floor($diff/(60*60*24));//seconds/minute*minutes/hour*hours/day)
$hours=round(($diff-$days*60*60*24)/(60*60));
$returndate=$days.' days '.$hours.' hours';
 return $returndate;
 }
?>