<?php include("userheader.php"); ?>
 <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
   <?php include("sidebar.php");    ?>
      <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
 
         <div class="page-header">
		 
              <h3 class="page-title">Post Your Business Advertisement</h3>
            </div>
            <form class="business-form"  method="post" action="" enctype="multipart/form-data" id="pcnform">
                 <input type="hidden" name="page" value="business" />
			     <div class="row">
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
				   </div>
				   </form>

              <?php       
    if(isset($_POST['submit2'])){
                                 if($_POST['code']!=''){
                                     $table=substr($_POST['code'],6,3);
                                 $pcncheck=new Users;
                                 $support=$pcncheck->getcomparepcn($_SESSION['id'],$_POST['code'],$table);
                                 if($support=='done'){
                                      echo '<button type="button" class="btn btn-info btn-lg button-your-post" data-toggle="modal" data-target="#myModal">Add Your Post</button>
';
                                 }else{ echo ' <div class="business-warning"> <p>Invalid PCN Number.</p> </div>'; }
                                 }
                                 }
                                 
     if(isset($_POST['add'])){
                $ad=new mainfuntion;
                $add=$ad->insertadd($_SESSION['id'], $_POST['name'], $_POST['description'], $_FILES['file']['name'], $_FILES['file']['tmp_name']);
                if($add){ echo 'Successfully Submit';}
    }   
                           ?>				   
		  <div class="modal fade" id="myModal" role="dialog">
                       <div class="modal-dialog">
                      <div class="modal-content">
                       <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Your Post</h4>
                   </div>
                  <div class="modal-body">
					    <form class="business-post-form"  method="post" action="" enctype="multipart/form-data">
					    <div class="row">
						 <div class="col-md-12">
						 <div class="input-field">
					  <label class="input-label">Enter Business Name <sup> *</sup></label>
                                          <input type="text" class="" name="name" required>
					 </div>
						 </div>
						 <div class="col-md-12">
						 <div class="input-field">
					  <label class="input-label">Post Description <sup> *</sup></label>
                                          <textarea class="popup-post-text" name="description" required></textarea>
					 </div>
						 </div>
						 <div class="col-md-12">
						 <div id="formdiv" >
                         <div id="filediv" class="input-field">
						  <label class="input-label">Attach a restricted number of photos<sup> *</sup></label>
                                                  <input type="file" id="file" name="file" multiple="multiple" accept="image/*" title="Select Images To Be Uploaded" required>
                       <br>
                      </div>
                     </div>
						 </div>
						 <div class="col-md-12">
						   <div class="input-submit text-center">
						   <input type="submit" value="Save" name="add">
						   </div>
						 </div>
						</div>
					   </form>
                  </div>
                 
      </div>
      
    </div>
  </div>
			 
			 
		 </div>
   <?php include("userfooter.php"); ?>
      </div>
    