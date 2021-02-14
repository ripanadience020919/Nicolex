<?php include("userheader.php"); ?>
 <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
   <?php include("sidebar.php"); 
    $insertb=new mainfuntion;
if(isset($_POST['bsubmit']))
{
if($_POST['name']!='' && $_POST['address']!='' && $_POST['size']!='' && $_POST['type']!='' && $_POST['pname']!='' && $_POST['pno']!='' && $_POST['email']!='' && $_POST['bno']!='' && $_POST['state']!='' && $_POST['government']!='' && $_POST['year']!='')
{ 
$sql=$insertb->updatebusiness($_GET['id'],$_POST['name'],$_POST['address'],$_POST['size'],$_POST['type'],$_POST['pname'], $_POST['pno'],$_POST['email'], $_POST['bno'],$_POST['state'],$_POST['government'],$_POST['year']);
if($sql){
    $id=$sql;
    header("location:success.php?text=b&id=".$id."");}else{ echo "<script>alert('Something wrong');</script>";
        }
    }
}

if(isset($_POST['vsubmit']))
{   
if($_POST['ownername']!='' && $_POST['registrationno']!='' && $_POST['chasisno']!='' && $_POST['make']!='' && $_POST['manufactureyear']!='' && $_POST['vgovernment']!='' && $_POST['vstate']!='' && $_POST['type']!='' && $_POST['year']!='')
{
$sql=$insertb->updatevehicle($_GET['id'],$_POST['ownername'],$_POST['registrationno'],$_POST['chasisno'],$_POST['make'],$_POST['manufactureyear'],$_POST['vgovernment'],$_POST['vstate'],$_POST['type'],$_POST['year']);
if($sql){
    $id=$sql;
    header("location:success.php?text=v&id=".$id."");}else{echo "<script>alert('Something wrong');</script>";}
}
}
if(isset($_POST['psubmit']))
{   
if($_POST['title']!='' && $_POST['mobile']!='' && $_POST['address1']!='' && $_POST['address2']!='' && $_POST['pgovernment']!='' && $_POST['pstate']!='' && $_POST['type']!='' && $_POST['year']!='')
{ $mobile='+234'.$_POST['mobile'];
$sql=$insertb->updateproperty($_GET['id'],$_POST['title'],$mobile,$_POST['address1'],$_POST['address2'],$_POST['pgovernment'],$_POST['pstate'],$_POST['type'],$_POST['year']);
if($sql){
    $id=$sql;
    header("location:success.php?text=p&id=".$id."");}else{echo "<script>alert('Something wrong');</script>";}
}
}?>   
   <!-- partial -->
   <div class="main-panel">
          <div class="content-wrapper">
 
            <div class="page-header">
              <h3 class="page-title">Business Registration </h3>
            </div>
               <div class="business-warning">
			   <p>Warning!!! It is a punishable offence to give false declaration of your Business, Property, Vehicle use type.<br> Commercial Activities & Properties within Religious Premises other than that used for Worship or Parsonage are NOT EXEMPTED</p>
			 </div>
		
			<div class="radio-button-choose business-button-choose">
			 <input type="radio" id="business-register" name="new-register" value="business-register" <?php if(isset($_GET['text']) && $_GET['text']=='b'){ echo 'checked'; }?>> <label for="business-register">Business</label>
             <input type="radio" id="vehicle-register" name="new-register" value="vehicle-register" <?php if(isset($_GET['text']) && $_GET['text']=='v'){ echo 'checked'; }?>> <label for="vehicle-register">Vehicle Radio</label>
            <input type="radio" id="property-register" name="new-register" value="property-register" <?php if(isset($_GET['text']) && $_GET['text']=='p'){ echo 'checked'; }?>> <label for="property-register">Property</label>
			</div>
				 
			 <div class="business-register business-new <?php if(isset($_GET['text']) && $_GET['text']=='b'){ echo 'show" style="display: block;"'; }?>">
			     <?php $backdata=new Users;
                                     $busdata=$backdata->getwheredata('business', 'id', $_GET['id']);
                                    ?>
			    <form class="business-form"  method="post" action="" enctype="multipart/form-data">
               
			     <div class="row">
				   <div class="col-md-12">
				     <div class="input-field">
					  <label class="input-label">Name of Business <sup> *</sup></label>
					  <input type="text" class="" name="name" value="<?php echo $busdata[0]['name']?>" required>
					 </div>
				   </div>
				   <div class="col-md-12">
				     <div class="input-field">
					  <label class="input-label"> Business Address<sup> *</sup></label>
					  <input type="text" class="" name="address" value="<?php echo $busdata[0]['address']?>"  required>
					 </div>
				   </div>
				    <div class="col-md-6">
				   <div class="input-field">
				     <label class="input-label">Size of Business<sup> *</sup></label>
                      <select id="Business-selector" name="size" required>
                          <option value="<?php echo $busdata[0]['size']?>"> <?php echo $busdata[0]['size']?> </option>
                       <option></option>
                        <option value="small">Small (Self Managed With less than 2 support staff)</option>
                        <option value="medium">Medium (Self managed with less than 4 support Staff) </option>
                        <option value="large">Large ( Self managed with 4 staffs and above)</option>
                     </select>
				   </div>
				   </div>
				   <div class="col-md-6">
				   <div class="input-field">
				     <label class="input-label"> Business Type<sup> *</sup></label>
                      <select id="Business-selector" name="type" required>
							<?php	
                                    $tob=$backdata->getdata('typeofbusiness'); 
                                    foreach ($tob as $row) {
                                         ?>
					   <option value="<?php echo $row['id'];?>" ><?php echo $row['typeofbusiness'];?></option>
								<?php } ?>
                     </select>
				   </div>
				   </div>
				 
			  <div class="col-md-6">
				     <div class="input-field">
					  <label class="input-label"> Contact Person<sup> *</sup></label>
					  <input type="text" class="" name="pname"  value="<?php echo $busdata[0]['personcontact']?>"  required>
					 </div>
				   </div>
				   <div class="col-md-6">
                                       <div class="input-field"  id="mobilecode">
					  <label class="input-label">Contact Person Tel( xxxxxxxxxx) <sup> *</sup></label>
					 <input type="tel" class="" name="pno"   value="<?php echo $busdata[0]['personmobile']?>"  required >
					 </div>				     
				   </div>
				     <div class="col-md-6">
				     <div class="input-field">
					  <label class="input-label"> Business Mail<sup> *</sup></label>
					  <input type="email" class="" name="email" value="<?php echo $busdata[0]['email']?>"  required>
					 </div>
				   </div>
				   <div class="col-md-6">
                                            <div class="input-field"  id="mobilecode">
					  <label class="input-label">Business Tel( xxxxxxxxxx) <sup> *</sup></label><input type="tel" class="" name="bno"  value="<?php echo $busdata[0]['businessmobile']?>"   required >
					 </div>
				   </div> 
				 <div class="col-md-6">
				     <div class="input-field">
					  <label class="input-label"> State where business is located<sup> *</sup></label>
					  
                   <select name="state" id="state" required>
                       <option value="<?php echo $busdata[0]['state']?>"> <?php echo $busdata[0]['state']?> </option>
                       <option></option>
					  <?php	 $state=$backdata->getstate();  
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
					  <label class="input-label">Local Government Authority  where business is located <sup> *</sup></label>
					  <select  name="government" id="government">
                                              <option value="<?php echo $busdata[0]['government']?>"> <?php echo $busdata[0]['government']?></option>    
        <option></option>
		</select>
					 </div>
				   </div>
		
				   <div class="col-md-12">
				     <div class="input-field">
					  <label class="input-label">Year of Validity   <sup> *</sup></label>
                                          <input type="text" class="" name="year"  value="<?php echo $busdata[0]['yearvalidity']?>"  required>
					 </div>
				   </div>
				  <div class="col-md-12">
				  <div class="submit-form-btn">
					   <input type="submit" Value="Done" name="bsubmit">
					 </div>
				  </div>
				 </div>
			   </form>
			 </div>
            
			 <div class="vehicle-register business-new <?php if(isset($_GET['text']) && $_GET['text']=='v'){ echo 'show" style="display: block;"'; }?>">
	<?php  $vecdata=$backdata->getwheredata('vehicle', 'id', $_GET['id']);?>
                             <form class="business-form"  method="post" action="" enctype="multipart/form-data">
			     <div class="row">
				   <div class="col-md-12">
				     <div class="input-field">
					  <label class="input-label">Name of Owner <sup> *</sup></label>
					  <input type="text" class="" name="ownername" value="<?php echo $vecdata[0]['ownername']?>" required>
					 </div>
				   </div>
				   <div class="col-md-12">
				     <div class="input-field">
					  <label class="input-label"> Vehicle Registration Number <sup> *</sup></label>
					  <input type="text" class="" name="registrationno" value="<?php echo $vecdata[0]['vehicleregistrationno']?>"  required>
					 </div>
				   </div>
				   <div class="col-md-12">
				     <div class="input-field">
					  <label class="input-label">Chasis Number <sup> *</sup></label>
					   <input type="text" class="" name="chasisno" value="<?php echo $vecdata[0]['chasisno']?>"  required>
					 </div>
				   </div>
				   <div class="col-md-6">
				     <div class="input-field">
					  <label class="input-label">Vehicle Make <sup> *</sup></label>
					   <input type="text" class="" name="make"  value="<?php echo $vecdata[0]['vehiclemake']?>"  required>
					 </div>
				   </div>
				  
				   <div class="col-md-6">
				     <div class="input-field">
					  <label class="input-label">Year of Manufacture <sup> *</sup></label>
					  <input type="text" class="" name="manufactureyear" value="<?php echo $vecdata[0]['manufactureyear']?>"  required>
					 </div>
				   </div> <div class="col-md-6">
				     <div class="input-field">
					  <label class="input-label"> Vehicle State of Residence<sup> *</sup></label>
					              <select name="vstate" id="vstate" required>
                                <option value="<?php echo $vecdata[0]['state']?>"> <?php echo $vecdata[0]['state']?> </option>
                       <option></option>
		
					   <?php	 $state1=$backdata->getstate();  
         foreach ($state1 as $row) {
            for($i=0;$i<1;$i++){ 
                echo '<option value="'.$row['state'].'" >'.$row['state'].'</option>';
		 } 
                 } ?>
                     </select>
					 </div>
				   </div>
				   <div class="col-md-6">
				     <div class="input-field">
					  <label class="input-label">Vehicle LGA of Residence<sup> *</sup></label>
                                          <select  name="vgovernment" id="vgovernment" required>
                                             <option value="<?php echo $vecdata[0]['government']?>"> <?php echo $vecdata[0]['government']?></option>    
        <option></option>
		</select>
					 </div>
				   </div>

				  <div class="col-md-6">
				     <div class="input-field">
					  <label class="input-label"> Use Type<sup> *</sup></label>
					  <select name="type" required>
                                               <option value="<?php echo $vecdata[0]['usetype']?>"> <?php echo $vecdata[0]['usetype']?> </option>
                       <option></option>
                        <option value="Private">Private (N 1500)</option>
					   <option value="INTRA - STATE COMMERCIAL">INTRA - STATE COMMERCIAL (N 3000)</option>
					   <option value="INTER - STATE COMMERCIAL">INTER - STATE COMMERCIAL (N 5000)</option>
					   <option value="Tricycle(KEKE NAPEP or KEKE MARWA)">Tricycle (KEKE NAPEP or KEKE MARWA)(N500)</option>
					   <option value="Vehicles other than Mini Buses and Vans">Vehicles other than Mini Buses and Vans e.g Trucks, Luxury Buses, etc (N2000)</option>
					

					  </select>
					 </div>
				   </div>
				  
			
				  
				   <div class="col-md-6">
				     <div class="input-field">
					  <label class="input-label">Year of Validity   <sup> *</sup></label>
					   <input type="text" class="" name="year"  value="<?php echo $vecdata[0]['validityyear']?>"  required>
					 </div>
				   </div>
				  <div class="col-md-12">
				  <div class="submit-form-btn">
					   <input type="submit" Value="Done" name="vsubmit" >
					 </div>
				  </div>
				 </div>
			   </form>
			 </div>
			 
			 <div class="property-register business-new <?php if(isset($_GET['text']) && $_GET['text']=='p'){ echo 'show" style="display: block;"'; }?>">
	<?php  $prodata=$backdata->getwheredata('property', 'id', $_GET['id']);
                                     print_r($prodata);?>
      		 
			   <form class="business-form"  method="post" action="" enctype="multipart/form-data">
			     <div class="row">
				   <div class="col-md-12">
				     <div class="input-field">
					  <label class="input-label">Property Title <sup> *</sup></label>
					  <input type="text" class="" name="title"  value="<?php echo $prodata[0]['title']?>"  required>
					 </div>
				   </div>
				   <div class="col-md-12">
				     <div class="input-field">
					  <label class="input-label"> Address Line 1  <sup> *</sup></label>
					  <input type="text" class="" name="address1" value="<?php echo $prodata[0]['address1']?>"  required>
					 </div>
				   </div>
				   <div class="col-md-12">
				     <div class="input-field">
					  <label class="input-label">Address Line 1  <sup> *</sup></label>
					   <input type="text" class="" name="address2" value="<?php echo $prodata[0]['address2']?>"   required>
					 </div>
				   </div>
                                 
				   <div class="col-md-12">
                                        <div class="input-field"  id="mobilecode">
					  <label class="input-label">Contact Person Number( xxxxxxxxxx) <sup> *</sup></label>
					 <span class="btn btn-secondary">+234</span><input type="tel" class="" value="<?php echo $prodata[0]['mobile']?>"   name="mobile" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" maxlength="10" size="10" required >
					 </div>
				   </div>
				   <div class="col-md-6">
				     <div class="input-field">
					  <label class="input-label">State where Property is located<sup> *</sup></label>
					    <select name="pstate" id="pstate" required>
                                           <option value="<?php echo $prodata[0]['state']?>"> <?php echo $prodata[0]['state']?> </option>
                       <option></option>
		
					     <?php	 $state2=$backdata->getstate();  
         foreach ($state2 as $row) {
            for($i=0;$i<1;$i++){ 
                echo '<option value="'.$row['state'].'" >'.$row['state'].'</option>';
		 } 
                 } ?>
					  </select>
					 </div>
				   </div>
				   <div class="col-md-6">
				     <div class="input-field">
					  <label class="input-label">Local Government where Property is located<sup> *</sup></label>
					    <select name="pgovernment" id="pgovernment" required>
				 <option value="<?php echo $prodata[0]['government']?>"> <?php echo $prodata[0]['government']?> </option>
                       <option></option>
			  </select>
					 </div>
				   </div>
				  
				 
				  
				   	   <div class="col-md-6">
					     <div class="input-field">
				     <label class="input-label"> Type of Property<sup> *</sup></label>
                        <select name="type" required>
                             <option value="<?php echo $prodata[0]['propertytype']?>"> <?php echo $prodata[0]['propertytype']?> </option>
                       <option></option>
                                                <option value="small">Small(Small Rooms apartment, Bedsitters, self-contain)</option>
						<option value="medium">Medium(Bungalow of not more than 3 bedrooms, storey building of not more than 4 units, Duplexes of not more than 4 bedrooms)</option>
						<option value="large">Large(Duplexes of more than 4 bedrooms, storey buildings of more than 4 units, Plazas, Warehouse)</option>
						<option value="multipurpose">Multipurpose: (Hotels, Owned school premises, Event Halls & Tent, Resort and Relaxation centers, Hospital, Ultra Mart, Medical Centres etc.)</option>
			
                
						</select>	</div>
				   </div>

				   <div class="col-md-6">
				     <div class="input-field">
					  <label class="input-label">Year of Validity   <sup> *</sup></label>
					   <input type="text" class="" name="year" value="<?php echo $prodata[0]['validityyear']?>"   required>
					 </div>
				   </div>
				  <div class="col-md-12">
				  <div class="submit-form-btn">
					   <input type="submit" Value="Done" name="psubmit">
					 </div>
				  </div>
				 </div>
			   </form>
			 </div>
			 
		  </div>
		 
    <?php include("userfooter.php"); ?>     
 
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
	$('#vstate').on('change',function(){
        var vstateID = $(this).val();
        if(vstateID){
            $.ajax({
                type:'POST',
                url:'ajaxdata.php',
                data:'state_id='+vstateID,
                success:function(html){
					//alert(html);     
                    $('#vgovernment').html(html);
                }
            }); 
        }else{
            $('#vgovernment').html('<option value="">Select State first</option>');
        }
    });
	$('#pstate').on('change',function(){
        var pstateID = $(this).val();
        if(pstateID){
            $.ajax({
                type:'POST',
                url:'ajaxdata.php',
                data:'state_id='+pstateID,
                success:function(html){
					//alert(html);     
                    $('#pgovernment').html(html);
                }
            }); 
        }else{
            $('#pgovernment').html('<option value="">Select State first</option>');
        }
    });
});
</script>   <script>
$(document).ready(function(){
    $("select#Business-selector").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue){
                $(".business-type-size").not("." + optionValue).hide();
                $("." + optionValue).show();
            } else{
                $(".business-type-size").hide();
            }
        });
    }).change();
}); 

$(document).ready(function(){
    $('.business-button-choose input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".business-new").not(targetBox).hide();
        $(targetBox).show();
    });
});
('.dropdown-submenu > a').on("click", function(e) {
    var submenu = $(this);
    $('.dropdown-submenu .dropdown-menu').removeClass('show');
    submenu.next('.dropdown-menu').addClass('show');
    e.stopPropagation();
});

$('.dropdown').on("hidden.bs.dropdown", function() {
    // hide any open menus when parent closes
    $('.dropdown-menu.show').removeClass('show');
});


</script>