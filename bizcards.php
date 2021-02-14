<?php include("userheader.php"); ?>
 <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
   <?php include("sidebar.php"); 
   $bizcard=new Users;


   if(isset($_POST['send_mail']))
        {
            $sender = $_POST['send_name'];
            // echo $sender;die();
            $mail_to = $_POST['mail_to'];
            $mail_from = $_POST['mail_from'];
            $mail_body = $_POST['mail_body'];
            $to = $mail_to;
            $message = $mail_body;
            $header = 'From:'.$mail_from;

            mail($to,$sender,$message,$header);
            if (mail($to,$sender,$message,$header)) {
                // $fire = mysqli_query($link,$query);
                header("location:userindex.php");
                // echo 'Mail send.';
            }
            else{
                echo 'Mail not send.';
            }
            
        }
          
 ?>
 	<head>
 		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  		<script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
  		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script> -->
  	</head>
   <!-- partial -->
   
        <div class="main-panel">
          <div class="content-wrapper">
 
            <div class="page-header">
              <h3 class="page-title">MyBizCards </h3>
            </div>
			<div class="dashboard-select">
                
			    <div class="row" >
		            <form class="business-form"  method="post" action="" enctype="multipart/form-data" id="pcnform" >
		                 <input type="hidden" name="page" value="business" />
						   <div class="col-md-12">
						     <div class="input-field">
							  <label class="input-label">Enter Your Valid PCN Code<sup> *</sup></label>
							  <input type="text" class="form-control" name="code" required>
							 </div>
						   </div>
						    <div class="col-md-12">
						  <div class="submit-form-btn">
							   <input type="submit" Value="Submit" name="submit2" />
							 </div>
						  </div>
						   </form>
				   </div><br>
				   
			 <div class="row">
              				<?php       
    							if(isset($_POST['submit2'])){
                                 if($_POST['code']!=''){
                                 	$user=$bizcard->getwheredata('user', 'id', $_POST['code']);
								    $table=substr($_POST['code'],6,3);
								    $support=$bizcard->checkpcn($_SESSION['id'],$_POST['code'],$table); 
								    // echo '<pre>';print_r($support);die();
								    if (!empty($support)) {
                                     $table=substr($_POST['code'],6,3); 
                                 $user=$bizcard->getwheredata('user', 'id', $_SESSION['id']);
                                 $ap=$user[0]['bizcardapproval'];
                                 if($ap=='N'){
                                 $support=$bizcard->getcomparepcn($_SESSION['id'],$_POST['code'],$table);
                                 if($support=='done'){
                                 	foreach ($user as $userbiz) {
                            ?>
								    <div class="col-lg-6">
								      <div class="mybizcard-box">
									    <div class="row">
										<div class="col-sm-4">
									        <a href="userprofile.php?id=<?php echo $userbiz['id'];?>">
										  <div class="mybiz-img">
										     <img src="images/user/<?php echo $userbiz['image'];?>" alt="">
					                         <?php if($userbiz['image']==''){ echo '<img src="images/edit-pic.png" alt="image">';}else{echo '<img src="images/user/'.$userbiz['image'].' alt="">';}?>
										  </div>
										  </a>
										  </div>
										  <div class="col-sm-8">
										  <div class="mybizcrd-txt">
										     <h3><?php echo $userbiz['name']; ?></h3>
											 <p><?php echo $userbiz['about'];?></p>
											 <a href="#">Card Not Approved </a>
											 <!-- <a href="#">mail </a> -->
										  </div>
										  </div>
										</div>
									  </div>
								    </div>
                                   
                                     <?php
                                     }
                                }
                                else
                                {
                                 echo ' <div class="business-warning"> <p>Invalid PCN Number.</p> </div>'; 
                             	}
                    }else{
                                     ///////////// y h then show kr do 
                               
                                 ?>
			 	<?php 
                   $usertax=$bizcard->getbizcarddata($_SESSION['id']);
                   if($usertax=='nodata')
                   	{ 
                   		echo '<div class="col-lg-12"> <div class="business-warning"> <p>No Other Person Of Your Business Category.</p> </div></div>';
                   	}
                   elseif($usertax=='pay')
                   {
                    echo '<div class="col-lg-12"> <div class="business-warning"> <p>Please Pay the Tax First.</p> </div></div>';
                	}
                   else
                   {    
                   	// echo '<pre>';print_r($usertax);die(); 
                       foreach ($usertax as $usertaxvalue) {
                       // echo '<pre>';print_r($usertaxvalue['userid']);die();   
                           // for ($i = 0; $i<1; $i++) { 
                           $userbiz=$bizcard->getuserdata($usertaxvalue['userid']);
                           // echo '<pre>';print_r($userbiz);die();      
                ?>
				   <div class="col-lg-6">
			      <div class="mybizcard-box">
				    <div class="row">
					<div class="col-sm-4">
				        <a href="userprofile.php?id=<?php echo $userbiz['id'];?>">
					  <div class="mybiz-img">
					     <img src="images/user/<?php echo $userbiz['image'];?>" alt="">
                                             <?php if($userbiz['image']==''){ echo '<img src="images/edit-pic.png" alt="image">';}else{echo '<img src="images/user/'.$userbiz['image'].' alt="">';}?>
                                             
					  </div>
					  </a>
					  </div>
					  <div class="col-sm-8">
					  <div class="mybizcrd-txt">
					     <h3><?php echo $userbiz['name']; ?></h3>
						 <p><?php echo $userbiz['about'];?></p>
						 <!-- <a href="#" class="btn btn-info btn-xs start_chat" data-touserid="<?php echo $userbiz['id'];?>" data-tousername="<?php echo $userbiz['name']; ?>">Chat </a> -->
						 <a href="#" data-toggle="modal" data-target="#exampleModalCenter<?php echo $userbiz['id']; ?>">Mail </a>
					  </div>
					  </div>
					</div>
				  </div>
				     </div>
			   <?php
                                 } ///////foreach
                                 foreach ($usertax as $usertaxvalue) {
                       // echo '<pre>';print_r($usertaxvalue['userid']);die();   
                           // for ($i = 0; $i<1; $i++) { 
                           $userbiz=$bizcard->getuserdata($usertaxvalue['userid']);
                                 ?>

                                 <div class="modal fade" id="exampleModalCenter<?php echo $userbiz['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
								  <div class="modal-dialog modal-dialog-centered" role="document">
								    <div class="modal-content">
								      <!-- <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div> -->
								      <div class="row">
								      	<div class="col-md-1"></div>
								      	<div class="col-md-10">
								      		<div class="modal-body">
										        <form method="post" action="<?php $_SERVER['PHP_SELF']?>">
										        	<input type="hidden" class="form-control" name="send_name" value="<?php echo $_SESSION['name']; ?>"><br>
										        	<input type="hidden" class="form-control" name="mail_to" value="<?php echo $userbiz['email']; ?>"><br>
										        	<textarea class="form-control" name="mail_body" rows="10"></textarea><br>
										        	<input type="hidden" class="form-control" name="mail_from" value="<?php echo $_SESSION['email']; ?>"><br>
										        	<input type="submit" class="form-control btn btn-primary" value="Send Mail" name="send_mail"><br>
										        	<input type="button" class="form-control btn btn-secondary" value="Close" data-dismiss="modal">
										        </form>
										    </div>
										</div>
										<div class="col-md-1"></div>
								      </div>
								      <!-- <div class="modal-footer">
								        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								        <button type="button" class="btn btn-primary">Save changes</button>
								      </div> -->
								    </div>
								  </div>
								</div>
									<?php
										}
                                 	}  ///user tax condition
                                } /////////if approval=y
                       		}
                       		else
                       		{
                       			echo 'Please Enter A Valid PCN Number.';
                       		}
                        }
                        else
                        {
                        	echo 'Please Enter Your PCN Number.';
                        }
                    }
                    ?>
			 </div>
			</div>
		 </div>

			
        
   <?php include("userfooter.php"); ?>     
        </div>
   