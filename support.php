<?php include("userheader.php"); ?>
 <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
   <?php include("sidebar.php"); ?>
   <!-- partial -->
   
           <div class="main-panel">
          <div class="content-wrapper">
 
            <div class="page-header">
              <h3 class="page-title">Hello. What can we help you with? </h3>
            </div>
           <?php  if(isset($_POST['support'])){ $sup=new mainfuntion;
                                 if($_POST['name']!='' && $_POST['email']!='' && $_POST['mobile']!='' && $_POST['query']!=''){
                                     if($_POST['pcnno']!=''){
                                         $pcncheck=new Users;
                                     $table=substr($_POST['pcnno'],6,3);
                                          $support1=$pcncheck->getcomparepcn($_SESSION['id'],$_POST['pcnno'],$table);
                                 if($support1=='done'){
                                     $support=$sup->insertsupport($_SESSION['id'],$_POST['name'],$_POST['email'],$_POST['mobile'],$_POST['query'],$_POST['pcnno']);
                                 if($support!=''){
                                      echo '<div class="business-warning"> <p>Successfully Submitted. We Will Contact You As soon as Possible</p></div>';
                                 } }else{
                                      echo ' <div class="business-warning"> <p>Please Enter the Valid PCN number.</p> </div>';
                                 }  
                                 }else{
                                 $support=$sup->insertsupport($_SESSION['id'],$_POST['name'],$_POST['email'],$_POST['mobile'],$_POST['query'],$_POST['pcnno']);
                                 if($support!=''){
                                      echo '<div class="business-warning"> <p>Successfully Submitted. We Will Contact You As soon as Possible</p></div>';
                                 			}
                                    	}
                                 	}
                                }
                             ?>
			<div class="dashboard-select">
			 <div class="row">
			   <div class="col-lg-6">
			      <div class="mybizcard-box" data-toggle="modal" data-target="#myModal">
				    <div class="row">
					<div class="col-sm-4">
					  <div class="mybiz-img">
					     <img src="images/card-2.jpg" alt="">
					  </div>
					  </div>
					  <div class="col-sm-8">
					  <div class="mybizcrd-txt">
					     <h3>Your Payments</h3>
						 <p>Tax Invoice Detail</br>Edit or cancel Taxes</p>
					  </div>
					  </div>
					</div>
				  </div>
			   </div>	
			  <div class="col-lg-6">
			      <div class="mybizcard-box"  data-toggle="modal" data-target="#account">
				    <div class="row">
					<div class="col-sm-4">
					  <div class="mybiz-img">
					     <img src="images/user-chat.png" alt="">
					  </div>
					  </div>
					  <div class="col-sm-8" >
					  <div class="mybizcrd-txt">
					     <h3>Account Settings</h3>
						 <p>Change email or password
                        </br>Update login information</p>
					  </div>
					  </div>
					</div>
				  </div>
			   </div>
			 <div class="col-lg-6">
			      <div class="mybizcard-box"  data-toggle="modal" data-target="#services">
				    <div class="row">
					<div class="col-sm-4">
					  <div class="mybiz-img">
					     <img src="images/icon-2.png" alt="">
					  </div>
					  </div>
					  <div class="col-sm-8">
					  <div class="mybizcrd-txt">
					     <h3>Services and Support</h3>
						 <p>Any Query help & support
                        </p>
					  </div>
					  </div>
					</div>
				  </div>
			   </div>
			   
			  <div class="col-lg-6">
			      <div class="mybizcard-box"  data-toggle="modal" data-target="#advert" >
				    <div class="row">
					<div class="col-sm-4">
					  <div class="mybiz-img">
					     <img src="images/icon-3.png" alt="">
					  </div>
					  </div>
					  <div class="col-sm-8">
					  <div class="mybizcrd-txt">
					     <h3>Advertisement Detail</h3>
						 <p>Council Mail Support
                        </br>Information</p>
					  </div>
					  </div>
					</div>
				  </div>
			   </div>
			   
			  <div class="modal fade" id="services" role="dialog">
                       <div class="modal-dialog">
                      <div class="modal-content">
                       <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Query For Services and Support</h4>
                   </div>
                  <div class="modal-body">
	 <form class="business-post-form"  method="post" action="" enctype="multipart/form-data">
                                                <input type="hidden" class="" name="pcnno" value="">
					    <div class="row">
					        <div class="col-md-12">
						 <div class="input-field">
					  <label class="input-label">Name <sup> *</sup></label>
					  <input type="text" class="" name="name" required>
					 </div>
						 </div>
					          <div class="col-md-12">
						 <div class="input-field">
					  <label class="input-label">Mobile <sup> *</sup></label>
					 <input type="tel" class="" name="mobile" maxlength="10" size="10"  pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required style="">
					 </div>
						 </div>
						  <div class="col-md-12">
						 <div class="input-field">
					  <label class="input-label">Email <sup> *</sup></label>
					  <input type="email" class="" name="email" required>
					 </div>
						 </div>
						 <div class="col-md-12">
						 <div class="input-field">
					  <label class="input-label">Query<sup> *</sup></label>
					  <textarea class="popup-post-text" name="query" required></textarea>
					 </div>
						 </div>
						 </div>
						 <div class="col-md-12">
						   <div class="input-submit text-center">
						   <input type="submit" value="Save" name="support">
						   </div>
						 </div>
					   </form>
					   </div>
                  </div>
      </div>
    </div>
                           
			  <div class="modal fade" id="account" role="dialog">
                       <div class="modal-dialog">
                      <div class="modal-content">
                       <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Query About Your Account Settings</h4>
                   </div>
                  <div class="modal-body">
					    <form class="business-post-form"  method="post" action="" enctype="multipart/form-data">
                                                <input type="hidden" class="" name="pcnno" value="">
					    <div class="row">
						 <div class="col-md-12">
						 <div class="input-field">
					  <label class="input-label">Name <sup> *</sup></label>
					  <input type="text" class="" name="name" required>
					 </div>
						 </div>
					          <div class="col-md-12">
						 <div class="input-field">
					  <label class="input-label">Mobile <sup> *</sup></label>
					 <input type="tel" class="" name="mobile" maxlength="10" size="10"  pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required style="">
					 </div>
						 </div>
						  <div class="col-md-12">
						 <div class="input-field">
					  <label class="input-label">Email <sup> *</sup></label>
					  <input type="email" class="" name="email" required>
					 </div>
					 </div>
					 <div class="col-md-12">
						 <div class="input-field">
					  <label class="input-label">Query<sup> *</sup></label>
					  <textarea class="popup-post-text" name="query" required></textarea>
					 </div>
						 </div>
						 </div>
						 <div class="col-md-12">
						   <div class="input-submit text-center">
						   <input type="submit" value="Save" name="support">
						   </div>
						 </div>
					   </form>
					   </div>
                  </div>
      </div>
    </div>
			  <div class="modal fade" id="myModal" role="dialog">
                       <div class="modal-dialog">
                      <div class="modal-content">
                       <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Query About Your Payments</h4>
                   </div>
                  <div class="modal-body">
					    <form class="business-post-form"  method="post" action="" enctype="multipart/form-data">
					    <div class="row">
						 <div class="col-md-12">
						 <div class="input-field">
					  <label class="input-label">PCN Number <sup> *</sup></label>
					  <input type="text" class="" name="pcnno" required>
					 </div>
						 </div>
						 <div class="col-md-12">
						 <div class="input-field">
					  <label class="input-label">Name <sup> *</sup></label>
					  <input type="text" class="" name="name" required>
					 </div>
						 </div>
					          <div class="col-md-12">
						 <div class="input-field">
					  <label class="input-label">Mobile <sup> *</sup></label>
				 <input type="tel" class="" name="mobile" maxlength="10" size="10"  pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required style="">
						 </div>
						 </div>
						  <div class="col-md-12">
						 <div class="input-field">
					  <label class="input-label">Email <sup> *</sup></label>
					  <input type="email" class="" name="email" required>
					 </div>
						 </div>
						 <div class="col-md-12">
						 <div class="input-field">
					  <label class="input-label">Query<sup> *</sup></label>
					  <textarea class="popup-post-text" name="query" required></textarea>
					 </div>
						 </div>
						 </div>
						 <div class="col-md-12">
						   <div class="input-submit text-center">
						   <input type="submit" value="Save"  name="support">
						   </div>
						 </div>
					   </form>
					   </div>
                  </div>
      </div>
    </div>
			  <div class="modal fade" id="advert" role="dialog">
                       <div class="modal-dialog">
                      <div class="modal-content">
                       <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Query For Advertisement Detail</h4>
                   </div>
                  <div class="modal-body">
					    <form class="business-post-form"  method="post" action="" enctype="multipart/form-data">
					    <div class="row">
						 <div class="col-md-12">
						 <div class="input-field">
					  <label class="input-label">PCN Number <sup> *</sup></label>
					  <input type="text" class="" name="pcnno" required>
					 </div>
						 </div>
						 <div class="col-md-12">
						 <div class="input-field">
					  <label class="input-label">Name <sup> *</sup></label>
					  <input type="text" class="" name="name" required>
					 </div>
						 </div>
					          <div class="col-md-12">
						 <div class="input-field">
					  <label class="input-label">Mobile <sup> *</sup></label>
				 <input type="tel" class="" name="mobile" maxlength="10" size="10"  pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required style="">
						 </div>
						 </div>
						  <div class="col-md-12">
						 <div class="input-field">
					  <label class="input-label">Email <sup> *</sup></label>
					  <input type="email" class="" name="email" required>
					 </div>
						 </div>
						 <div class="col-md-12">
						 <div class="input-field">
					  <label class="input-label">Query<sup> *</sup></label>
					  <textarea class="popup-post-text" name="query" required></textarea>
					 </div>
						 </div>
						 </div>
						 <div class="col-md-12">
						   <div class="input-submit text-center">
						   <input type="submit" value="Save"  name="support">
						   </div>
						 </div>
					   </form>
					   </div>
                  </div>
      </div>
    </div>

			  </div>
			</div>
		 </div>
     </div>
         
        </div>
        <style>
            
        </style>
<style>/*
#advert,#account,#services .modal-content{background:#fff; border-radius:0; }
#advert,#account,#services .modal-content h4.modal-title {    width: 100%;}
#advert,#account,#services .modal-dialog{max-width:750px}
 #advert,#account,#services .modal-content .modal-header .close{position:absolute; right:45px} 
#advert,#account,#services .modal-content .modal-header .close{margin:-20px -26px -25px auto} 
*/
   .faq-section{
    margin: 40px 0;
    position: relative;
  }

  /*Hide the paragraphs*/
  .faq-section p{
    display: none;
  }

  /*Hide the checkboxes */
  .faq-section input{
    position: absolute;
    z-index: 2;
    cursor: pointer;
    opacity: 0;
    display: none\9; /* IE8 and below */
    margin: 0;
    width: 100%;
    height: 36px;
  }

  /*Show only the clipped intro */
  .faq-section label+p{
    display: block;
    color: #999;
    font-size: .85em;
    transition: all .15s ease-out;
    /* Clipping text */
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
  }

  /*If the checkbox is checked, show all paragraphs*/
  .faq-section input[type=checkbox]:checked~p{
    display: block;
    color: #444;
    font-size: 1em;
    /* restore clipping defaults */
    text-overflow: clip;
    white-space: normal;
    overflow: visible;
  }

  /*Style the label*/
  .faq-section label{
    font-size: 1.2em;
    background: #fff;
    display: block;
    position: relative;
    height: 60px;
    padding: 7px 10px;
    font-weight: bold;
    border: 1px solid #ddd;
    border-left: 3px solid #888;
    text-shadow: 0 1px 0 rgba(255,255,255,.5);
    transition: all .15s ease-out;
  }

  /*Remove text selection when toggle-ing*/
  .faq-section label::selection{
    background: none;
  }

  .faq-section label:hover{
    background: #f5f5f5;
  }

  /*If the checkbox is checked, style the label accordingly*/
  .faq-section input[type=checkbox]:checked~label{
    border-color: #ff7f50;
    background: #f5deb4;
    background-image: linear-gradient(to bottom, #fff, #f5deb4);
    box-shadow: 0 0 1px rgba(0,0,0,.4);
  }

  /*Label's arrow - default state */
  .faq-section label::before{
    content: '';
    position: absolute;
    right: 4px;
    top: 50%;
    margin-top: -6px;
    border: 6px solid transparent;
    border-left-color: inherit;
  }

  /*Update the right arrow*/
  .faq-section input[type=checkbox]:checked~label::before{
    border: 6px solid transparent;
    border-top-color: inherit;
    margin-top: -3px;
    right: 10px;
  }
</style>


   <?php include('userfooter.php'); ?>