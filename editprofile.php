<?php include("userheader.php"); ?>
 <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
   <?php include("sidebar.php"); ?>
        <div class="main-panel">
          <div class="content-wrapper">
		  <?php if(isset($_SESSION['msg'])){ echo '<div class="business-warning"><p></p> </div>';}?>
            <div class="page-header">
              <h3 class="page-title">Edit Profile</h3>
            </div>
			<?php
			$profile=new Users;
			if(isset($_POST['editprofile'])){
				$about=$_POST['about'];
				$a = str_replace("'", "''", "$about");
	              if($_FILES['image']['name']==''){
	                  $editpro=$profile->setprofile($_POST['name'], $_POST['email'], $_POST['mobile'], $_POST['state'], $_POST['government'], $_POST['address1'], $_POST['address2'], $a, $_POST['img'], $_SESSION['id']);
	              }else{
	                $image=$_FILES['image']['name'];
					$path="images/user/";
					$img=rand(99,1000).$image;
					$upload=$path.$img;
				if(move_uploaded_file($_FILES['image']['tmp_name'],$upload))
                {        $editpro=$profile->setprofile($_POST['name'], $_POST['email'], $_POST['mobile'], $_POST['state'], $_POST['government'], $_POST['address1'], $_POST['address2'], $a, $img, $_SESSION['id']);
                      echo '<div class="business-warning"><p>'.$editpro.'</p> </div>';
                       }else{  echo '<div class="business-warning"><p>There is an error on image uploading</p> </div>';}  
                          }
                       }
                   ?>
			<form class="edit-profile"  method="post" action="" enctype="multipart/form-data">
			<div class="row">
			<div class="col-md-12">
			<h4 class="change-headin">Change Profile Picture</h4>
            <div class="edit-profile-img">
                <div class="circle">
				<?php 
                          $pro=$profile->getwheredata('user', 'id', $_SESSION['id']);
                                if($pro[0]['image']!=''){echo '<img class="profile-pic" src="images/user/'.$pro[0]['image'].'" alt="">';}else{echo '<img class="profile-pic" src="images/edit-pic.png" alt="">';} ?>
               
          </div>
                
                 <input type="hidden" name="img" value="<?php echo $pro[0]['image'];?>" />
         <div class="p-image">
             <i class="fa fa-camera upload-button"></i>
            <input class="file-upload" type="file" name="image" accept="image/*"/>
        </div>
		</div>
     </div>
	  <div class="col-md-12">
				     <div class="input-field">
					  <label class="input-label">Name  <sup> *</sup></label>
					  <input type="text" class="" name="name" value="<?php echo $pro[0]['name'];?>" required>
					 </div>
	 </div>
	  <div class="col-md-6">
	  <div class="input-field">
					  <label class="input-label">Email  <sup> *</sup></label>
					  <input type="mail" class=""  name="email" value="<?php echo $pro[0]['email'];?>" required>
					 </div>
	 </div>
	 	 <div class="col-md-6">
	  <div class="input-field">
					  <label class="input-label">Mobile Number  <sup> *</sup></label>
					  <input type="text" class="" name="mobile" value="<?php echo $pro[0]['mobile'];?>" required>
					 </div>
	 </div> <div class="col-md-6">
				     <div class="input-field">
					  <label class="input-label"> State<sup> *</sup></label>
					              <select name="state" id="state" required>
					 <?php	 $state=$profile->getstate();  
         foreach ($state as $row) {
            for($i=0;$i<1;$i++){ 
                echo '<option value="'.$row['state'].'" >'.$row['state'].'</option>';
		 } 
                 } ?>
                     </select>
					 </div>
				   </div>
				   <div class="col-md-6">
				     <div class="input-field">
					  <label class="input-label">Local Government Authority  <sup> *</sup></label>
					  <select  name="government" id="government"  required>
        <option>Select State first</option>
		</select>
					 </div>
				   </div>
	 <div class="col-md-12">
				     <div class="input-field">
					  <label class="input-label">Address 1  <sup> *</sup></label>
					  <input type="text" class="" name="address1" value="<?php echo $pro[0]['address1'];?>"  required>
					 </div>
	 </div>
	  <div class="col-md-12">
				     <div class="input-field">
					  <label class="input-label">Address 2  <sup> *</sup></label>
					  <input type="text" class="" name="address2" value="<?php echo $pro[0]['address2'];?>" >
					 </div>
	 </div>
	 <div class="col-md-12">
				     <div class="input-field">
					  <label class="input-label">About You <sup> *</sup></label>
					  <input type="text" class="" name="about" value="<?php echo $pro[0]['about'];?>"  required>
					 </div>
	 </div>
	 <div class="col-md-12">
				  <div class="submit-form-btn">
					   <input type="submit" value="Save Changes" name="editprofile">
					 </div>
				  </div>
	 </div>
	 </form>
             <div class="page-header">
              <h3 class="page-title">Change Password</h3>
            </div>
              <?php
                if(isset($_POST['changepass'])){
                         if($pro[0]['password']==md5($_POST['oldpass'])){
                             $pass=$profile->setpassword(md5($_POST['newpass']), $_SESSION['id']);
                           echo '<div class="business-warning"><p>'.$pass.'</p> </div>';
                         }else{
                           echo '<div class="business-warning"><p>Old Password Not Match</p> </div>';
                         }
                     }   
			
              ?>
			<form class="chang-password" method="post" action="" enctype="multipart/form-data">
			  <div class="row">
			    <div class="col-md-6">
	  <div class="input-field">
					  <label class="input-label">Old Password  <sup> *</sup></label>
					  <input type="text" class="" name="oldpass">
					 </div>
	 </div>
	 	 <div class="col-md-6">
	  <div class="input-field">
					  <label class="input-label">New Password <sup> *</sup></label>
					  <input type="text" class="" name="newpass">
					 </div>
	 </div>
	 <div class="col-md-12">
				  <div class="submit-form-btn">
					   <input type="submit" value="Change Password" name="changepass">
					 </div>
				  </div>
			  </div>
			</form>
 </div>

        	 
    <?php include("userfooter.php"); ?>     																	
        </div>
    
		<script src="js/datepicker.min.js"></script>
   <script>
      $( function() {
	$( "#datepicker" ).datepicker({
		dateFormat: "dd-mm-yy"
		,	duration: "fast"
	});
} );
   $('.advertisement-slider.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
	autoplay:true,
	nav:false,
	 responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:2,
            nav:false
        },
        1000:{
            items:3,
            nav:true,
            loop:false
        }
    }
})
$(document).ready(function() {

    
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    

    $(".file-upload").on('change', function(){
        readURL(this);
    });
    
    $(".upload-button").on('click', function() {
       $(".file-upload").click();
    });
});
</script>
 <script>
  $(document).ready(function(){
    $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxdata.php',
                data:'state_id='+stateID,
                success:function(html){
					//alert(html);
                    $('#government').html(html);
                }
            }); 
        }else{
            $('#government').html('<option value="">Select State first</option>');
        }
    });
	 });
	 </script><?php 
