<?php include("header.php"); 
$cont=new Users;
if(isset($_POST['contact'])){
    $query=$cont->setcontactform($_POST['name'], $_POST['email'],$_POST['mobile'],$_POST['state'],$_POST['government'],$_POST['msg']);
    if($query=='done'){     header("location:contactsuccess.php");  }
}
?>



<section class="contact-section" id="contact">
 <div class="container">
 <div class="page_head">
   <h2>Get<span> In Touch </span></h2>
   <?PHP  
        $contact=$cont->getdata('contactus');      
        foreach ($contact as $contct) {
		?>
   <p><?php echo $contct['text'];?> </p>
   </div>

   <div class="row contact_details">
   <div class="col-md-5">
   <div class="con_info">
   <h2 class="form_head"> Contact Info!</h2>
   </div>
   <div class="row d-flex header-info">
     <div class="d-flex header_icon">
                            <div class="icon mr-2 d-flex"><span class="icon_img"><i class="fas fa-phone-alt"></i></span></div>
                           <a href="tel:236459872" target="blank" class="text"><?php echo $contct['mobile'];?></a>
                        </div>
						<div class="d-flex header_icon">
                            <div class="icon mr-2 d-flex"><span class="icon_img"><i class="fas fa-envelope"></i></span></div>
                            <a href="mailto:medical@yourdomain.com" target="blank" class="text"><?php echo $contct['email'];?></a>
                        </div>
						<div class="d-flex header_icon">
                            <div class="icon mr-2 d-flex"><span class="icon_img"><i class="fas fa-envelope"></i></span></div>
                            <a href="mailto:medical@yourdomain.com" target="blank" class="text"><?php echo $contct['web'];?></a>
                        </div>
						<div class="d-flex header_icon">
                                    <div class="icon mr-2 d-flex"><span class="icon_img"><i class="fas fa-map-marker-alt"></i></span></div>
                                    <a href="#" class="text address d-flex"><?php echo $contct['address1'];?></a>
                                </div>
								<div class="d-flex header_icon">
                                    <div class="icon mr-2 d-flex"><span class="icon_img"><i class="fas fa-map-marker-alt"></i></span></div>
                                    <a href="#" class="text address d-flex"><?php echo $contct['address2'];?></a>
                                </div>
								<div class="d-flex header_icon">
                                    <div class="icon mr-2 d-flex"><span class="icon_img"><i class="fas fa-map-marker-alt"></i></span></div>
                                    <a href="#" class="text address d-flex"><?php echo $contct['address3'];?></a>
                                </div>
        <?php } ?>
   </div>
   </div>
       
   <div class="col-md-7">
    <form class="contact_form"  method="post" action="" enctype="multipart/form-data" >
           
	<h2 class="form_head"> Send us message!</h2>
	
	<div class="form-cntrl">
	  <input type="text" class="input-group" placeholder="Your Name" name="name" required>
	</div>
	<div class="form-cntrl">
	  <input type="email" class="input-group" placeholder="Your email Id" name="email" required>
	</div>
	<div class="form-cntrl">
	  <input type="text" class="input-group" placeholder="Your Mobile Number" name="mobile" required>
	</div>
	<div class="form-cntrl">
	    <select name="state" id="state"  class="input-group" required>
					   <?php	
                                    $tob=$cont->getstate(); 
                                   foreach ($tob as $row) {
            for($i=0;$i<1;$i++){ 
                echo '<option value="'.$row['state'].'" >'.$row['state'].'</option>';
		 } 
                 } ?>
                     </select>
        </div>
	<div class="form-cntrl"> 
                      <select  name="government" id="government" class="input-group" >
        <option>Select State first</option>
		</select>
	</div>
		<div class="form-cntrl">
	  <textarea class="input-group" placeholder="Write Your Message" name="msg"  required></textarea>
	</div>
		<div class="form-cntrl">
	  <input type="submit" class="submit_con" value="submit" name="contact">
	</div>
	</form>
   </div>
   </div>
 </div>
</section>

<style>
    select.input-group {
    border: 0;
    background: #efefef;
    padding: 15px;
    margin-bottom: 16px;
    color: #111;
}
</style>
<?php include("footer.php"); ?>
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
				//	alert(html);
                    $('#government').html(html);
                }
            }); 
        }else{
            $('#government').html('<option value="">Select State first</option>');
        }
    });
  });
</script>