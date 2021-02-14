<?php
//fetch_user.php
require_once('operation/controller.php');
include('database_connection.php');

$output1 = "";     
$bizcard=new Users;
if($_POST['code']!='')
{
	$user=$bizcard->getwheredata('user', 'id', $_POST['code']);
    $table=substr($_POST['code'],6,3);
    $support=$bizcard->checkpcn($_SESSION['id'],$_POST['code'],$table); 
    // echo '<pre>';print_r($support);die();
    if (!empty($support)) {
    
    $user=$bizcard->getwheredata('user', 'id', $_SESSION['id']);
    $ap=$user[0]['bizcardapproval'];
    if($ap=='N'){
        $support=$bizcard->getcomparepcn($_SESSION['id'],$_POST['code'],$table);
        if($support=='done'){
         	foreach ($user as $userbiz) {
    			$output1.='<div class="col-lg-6">
			      	<div class="mybizcard-box">
				    <div class="row">
					<div class="col-sm-4">
				        <a href="userprofile.php?id='.$userbiz["id"].'">
						  	<div class="mybiz-img">
						    <img src="images/user/'.$userbiz["image"].'" alt="">';
	                        if($userbiz['image']==''){ 
	                         	$output1.='<img src="images/edit-pic.png" alt="image">';
	                        }else{
	                         	$output1.='<img src="images/user/'.$userbiz["image"].' alt="">';
	                        }
						  	$output1.='</div>
					  	</a>
			  		</div>
				  	<div class="col-sm-8">
				  	<div class="mybizcrd-txt">
			     	<h3>'.$userbiz['name'].'
	     			<span class="count-symbol notification-counter bg-danger">';
						if (count_unseen_message_total($_SESSION['id'], $connect) != ''){
							count_unseen_message_total($_SESSION['id'], $connect);
						}else{
							'0';
						}       
                  	$output1.='</span>
					     </h3>
						 <p>'.$userbiz['about'].'</p>
						 <a href="#">Card Not Approved </a>
					  </div>
					  </div>
					</div>
				  	</div>
		    	</div>';
            }
        }else{
         	$output1.='<div class="business-warning"> <p>Invalid PCN Number.</p> </div>'; 
     	}
	}else{
			$usertax=$bizcard->getbizcarddata($_SESSION['id']);
			if($usertax=='nodata'){ 
				$output1.='<div class="col-lg-12"> <div class="business-warning"> <p>No Other Person Of Your Business Category.</p> </div></div>';
			}elseif($usertax=='pay'){
			$output1.='<div class="col-lg-12"> <div class="business-warning"> <p>Please Pay the Tax First.</p> </div></div>';
		}else{    
			foreach ($usertax as $usertaxvalue) {
				$userbiz=$bizcard->getuserdata($usertaxvalue['userid']);
			   	$output1.='<div class="col-lg-6">
			      	<div class="mybizcard-box">
					    <div class="row">
							<div class="col-sm-4">
						        <a href="userprofile.php?id='.$userbiz["id"].'">
							  		<div class="mybiz-img">
							     		<img src="images/user/'.$userbiz['image'].'" alt="">';
							     		if($userbiz['image']==''){ 
							     			$output1.='<img src="images/edit-pic.png" alt="image">';
							     		}else{
							     			$output1.='<img src="images/user/'.$userbiz['image'].' alt="">';
							     		}                                            
							  		$output1.='</div>
							  	</a>
						  	</div>
						  	<div class="col-sm-8">
							  	<div class="mybizcrd-txt">
							     	<h3>'.$userbiz['name'].'  <span class="count-symbol notification-counter bg-success">'.count_unseen_message($userbiz['id'], $_SESSION['id'], $connect).'</span>'.fetch_is_type_status($userbiz['id'], $connect).'</h3>';

							     		$status = '';
										$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
										$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
										$user_last_activity = fetch_user_last_activity($userbiz['id'], $connect);
										if($user_last_activity > $current_timestamp)
										{
											$status = '<span class="label label-success">Online</span>';
										}
										else
										{
											$status = '<span class="label label-danger">Offline</span>';
										}

							     	$output1.='<small>'.$status.'</small>
								 	<p>'.$userbiz['about'].'</p>
								 	<a href="#" class="start_chat" data-touserid="'.$userbiz['id'].'" data-tousername="'.$userbiz['name'].'">Chat </a>
							  	</div>
						  	</div>
						</div>
				  	</div>
		     	</div>';
			} ///////foreach
     	}  ///user tax condition
 	} /////////if approval=y
}
else
{
	$output1='Please Enter A Valid PCN Number.';
}
}
else
{
	$output1='Please Enter Your PCN Number.';
}
echo($output1);
?>