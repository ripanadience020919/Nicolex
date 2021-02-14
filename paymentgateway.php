<?php include("userheader.php"); ?>
 <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
   <?php include("sidebar.php"); ?>   <!-- partial -->
<?php 
// if(isset($_POST['pay']))
// {
    $id = $_GET['id'];
    $amount = $_GET['amount'];
    $text = $_GET['text'];

    //* Prepare our rave request
    $request = [
        'tx_ref' => time(),
        'amount' => $amount,
        'currency' => 'NGN',
        'payment_options' => 'card',
        // 'redirect_url' => 'http://localhost/nicolex/paymentbill.php?id="'.$id.'"&text="'.$text,
        'redirect_url' => 'http://localhost/nicolex/process.php',
        'customer' => [
            'email' => 'test@gmail.com',
            'name' => 'Zubdev'
        ],
        'meta' => [
            'price' => $amount,
            'uid' => $id,
            'text' => $text
        ],
        'customizations' => [
            'title' => 'Paying for a sample product',
            'description' => 'sample'
        ]
    ];



    //* Ca;; f;iterwave emdpoint
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.flutterwave.com/v3/payments',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => json_encode($request),
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer FLWSECK_TEST-6c66cf061fce2dad00a3ff8ef4552073-X',
        'Content-Type: application/json'
    ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    
    $res = json_decode($response);
    // echo '<pre>';print_r($res);die();
    if($res->status == 'success')
    {
        $link = $res->data->link;
        header('Location: '.$link);
    }
    else
    {
        echo 'We can not process your payment';
    }
// }

?>
			
				   <div class="col-md-12">
                                       
              <div id="government"></div>
				  <div class="submit-form-btn">
                                      
				   <a  onclick="bill('<?php echo $_GET['id'];?>','<?php echo $_GET['text']; ?>','<?php echo $_GET['amount'];?>')">   <input type="button" id="send" value="Pay"></a>
					 </div>
				  </div>
                            </div>
			 </div>
<script>
    function bill(id,text,amount){
         var button = $('#send');
    button.prop('disabled', true);
        //  alert(id,text); 
       var dataString ='id='+id+'&text='+text+'&amount='+amount;
         $.ajax({
                type:'POST',
                url:'ajaxdata.php',
                data: dataString,
                success:function(html){
                // alert(html);
				window.location.assign("http://localhost/nicolex/paymentbill.php?id="+id+"&text="+text);
               }
            }); 
    }
    </script>
			 <div class="vehicle-register business-new">
			  <form class="net-banking">
			     <h3>Welcome To Personal Banking</h3>
				 <div class="row personal-banking-row">
				 <div class="col-md-12">
				 <div class="welcome-head">Login</div>
				 </div>
				  <div class="col-md-12">
				       <div class="input-field">
					   <label class="input-label">Select Bank  <sup> *</sup></label>
					  <select id="Business-selector" name="bank">
                        <option value="ACCESS BANK">ACCESS BANK</option>
                        <option value="CITI BANK">CITI BANK</option>
                        <option value=" ECO BANK"> ECO BANK</option>
                        <option value="FCMB ">FCMB</option>
                        <option value="FIDELITY  BANK">FIDELITY  BANK</option>
                        <option value=" FIRST  BANK"> FIRST  BANK</option>
                        <option value="GTB">GTB</option>
                        <option value="HERITAGE  BANK">HERITAGE  BANK</option>
                        <option value=" KEYSTONE  BANK"> KEYSTONE  BANK</option>
                        <option value="POLARIS  BANK">POLARIS  BANK</option>
                        <option value="PROVIDUS  BANK">PROVIDUS  BANK</option>
                        <option value=" STANBIC  BANK"> STANBIC  BANK</option>
                        <option value="STANDARD CHARTERED  BANK">STANDARD CHARTERED  BANK</option>
                        <option value=" STERLING   BANK"> STERLING   BANK</option>
                        <option value="SUN TRUST  BANK">SUN TRUST  BANK</option>
                        <option value="UBA">UBA</option>
                        <option value=" UNION   BANK"> UNION   BANK</option>
                        <option value=" UNITY   BANK"> UNITY   BANK</option>
                        <option value="WEMA   BANK">WEMA   BANK</option>
                        <option value="ZENITH   BANK">ZENITH   BANK</option>
                     </select>
					 </div>
				   </div>
				  <div class="col-md-12">
				       <div class="input-field">
					   <label class="input-label"> User Name  <sup> *</sup></label>
					   <input type="text" class="">
					 </div>
				   </div>
				    <div class="col-md-12">
				       <div class="input-field">
					   <label class="input-label">Password  <sup> *</sup></label>
					   <input type="text" class="">
					 </div>
				   </div>
				   
				   <div class="col-md-12">
				   <div class="table-all-see-btn business-inner-button text-center">
			       <a href="#" class="pay-download">Login</a>
				    <a href="#" class="view-list">Reset</a>
			  </div>
			  </div>
			  <div class="col-md-12">
			  <div class="net-banking-link">
			  <a href="#">New User ?  Click here</a>
			  <a href="#">Forgot Password?</a>
			  </div>
			  </div>
				 </div>
			  </form>
			 </div>
		  </div>
         <?php include("userfooter.php"); ?>    
        </div>
      </div>
    </div>
   <script>
$(document).ready(function(){
    $('.radio-button-choose input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".business-new").not(targetBox).hide();
        $(targetBox).show();
    });
});
</script>
  </body>
</html>