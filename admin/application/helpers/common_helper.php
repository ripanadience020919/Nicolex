<?php
function send_verication($sc_code,$mobile_number)
{
	/*$text='Your verification code for saveonmedical is  '.$sc_code;
	$url="http://bhashsms.com/api/sendmsg.php?user=9716886012&pass=ann123&sender=TESTTO&phone=".$mobile_number."&text=".$text."&priority=ndnd&stype=unicode";
	
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_HTTPGET, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);       
	curl_close($ch);
	echo $output;*/
	
	$text='Your verification code for activating mishutt.com account is  '.$sc_code;
	//$mobile_number = '9547780500';
	$url = "http://trans.smsfresh.co/api/sendmsg.php";
	
	$ch = curl_init(); // initialize curl handle 
	curl_setopt($ch, CURLOPT_URL,$url); // set url to post to 
	curl_setopt($ch, CURLOPT_FAILONERROR, 1); 
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);// allow redirects 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); // return into a variable 
	curl_setopt($ch, CURLOPT_TIMEOUT, 60); // times out after 4s 
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
	curl_setopt($ch, CURLOPT_MAXREDIRS, 5); 
	curl_setopt($ch, CURLOPT_POST, 1); // set POST method 
	curl_setopt($ch, CURLOPT_POSTFIELDS, "user=Mishutt&pass=123456&sender=MISHUT&phone=".$mobile_number."&text=".$text."&priority=ndnd&stype=normal" ); 
	$result = curl_exec($ch); // run the whole process 
	curl_close($ch); 
	
	//echo $result;die;
	
	
}

function get_perticular_field_value($tablename,$filedname,$where=""){

		$CI =& get_instance();	

		$str="select ".$filedname." from ".$tablename." where 1=1 ".$where;

		//echo $str."<br/>";

		$query=$CI->db->query($str);

		$record="";

		if($query->num_rows()>0){

			

			foreach($query->result_array() as $row){

				$field_arr=explode(" as ", $filedname);

				if(count($field_arr)>1){

					$filedname=$field_arr[1];

				}else{

					$filedname=$field_arr[0];

				}

				$record=$row[$filedname];

			}

			

		}

		return $record;

	

	}
   	 function getStates(){
   	 	$CI =& get_instance();	

		$str="select DISTINCT `state` from `statewithgovernment`";
		$query=$CI->db->query($str);

		if($query->num_rows()> 0)
		{
			foreach($query->result_array() as $row)
			{
				$data[]=$row['state'];
			}
			return $data;
		}
	}

	function getGovernments(){
   	 	$CI =& get_instance();	

		$str="select DISTINCT `government` from `statewithgovernment`";
		$query=$CI->db->query($str);

		if($query->num_rows()> 0)
		{
			foreach($query->result_array() as $row)
			{
				$data[]=$row['government'];
			}
			return $data;
		}
	}

	function get_specific_field_value($id,$pname,$category)
	{
		$CI =& get_instance();	

		$str="select * from `user_portfolios` where `uid`='".$id."' and `pname`='".$pname."' and `pcat`='".$category."'";
		$query=$CI->db->query($str);

		if($query->num_rows()> 0)
		{
			foreach($query->result_array() as $row)
			{
				$data[]=$row;
			}
			return $data;
		}
	}
	function get_all_field_value($tablename,$where=""){

		$CI =& get_instance();	

		$str="select * from ".$tablename." where 1=1 ".$where;
		$query=$CI->db->query($str);

		if($query->num_rows()> 0)
		{
			foreach($query->result_array() as $row)
			{
				$data[]=$row;
			}
			return $data;
		}

	

	}

	function getempname($id){

		$CI =& get_instance();
        $sql="select * from `employee` where `id`='".$id."'";
	    $query=$CI->db->query($sql);
		if($query->num_rows()> 0)
		{
			foreach($query->row_array() as $row)
			{
				$data[]=$row;
			}
			return $data;
		}

	}

	function getwishloan($loanid,$uid)
	{
		$CI =& get_instance();
        $sql="select * from `wishloan` where `loanid`='".$loanid."' and `uid`='".$uid."'";
	    $query=$CI->db->query($sql);
		if($query->num_rows()> 0)
		{
			foreach($query->row_array() as $row)
			{
				$data[]=$row;
			}
			return $data;
		}
	}

	function getwishinv($loanid,$uid)
	{
		$CI =& get_instance();
        $sql="select * from `wishinv` where `invid`='".$loanid."' and `uid`='".$uid."'";
	    $query=$CI->db->query($sql);
		if($query->num_rows()> 0)
		{
			foreach($query->row_array() as $row)
			{
				$data[]=$row;
			}
			return $data;
		}
	}

	function getwishins($loanid,$uid)
	{
		$CI =& get_instance();
        $sql="select * from `wishins` where `insid`='".$loanid."' and `uid`='".$uid."'";
	    $query=$CI->db->query($sql);
		if($query->num_rows()> 0)
		{
			foreach($query->row_array() as $row)
			{
				$data[]=$row;
			}
			return $data;
		}
	}

	function homesubcategory($maincatid){

	$CI =& get_instance();
         echo  $sql="select * from `categorymaster` where `parentid`='".$maincatid."' and `subparentid`!='0'";
	    $query=$CI->db->query($sql);
		if($query->num_rows()> 0)
		{
			foreach($query->result_array() as $row)
			{
				$data[]=$row;
			}
			return $data;
		}
	}
	function getcategorylist(){

		$CI =& get_instance();
        $sql="select * from `category`";
	    $query=$CI->db->query($sql);
		if($query->num_rows()> 0)
		{
			foreach($query->result_array() as $row)
			{
				$data[]=$row;
			}
			return $data;
		}
	}


	function getdistinctportfolio($id){
			$CI =& get_instance();

           $sql="select * from `user_portfolios` where `uid`='".$id."' group by `pname`";

	        $query=$CI->db->query($sql);
				if($query->num_rows()> 0)

				{
					foreach($query->result_array() as $row)
					{
						$data[]=$row;
					}
					return $data;
				}
	}


	function gettestearncategorylist($id){
			$CI =& get_instance();

           $sql="select expcategory,SUM(earning) from `expence` where `earning`>'".'0.00'."' and `userid`='".$id."' group by `expcategory`";

	        $query=$CI->db->query($sql);
				if($query->num_rows()> 0)

				{
					foreach($query->result_array() as $row)
					{
						$data[]=$row;
					}
					return $data;
				}
	}

	function gettestspentcategorylist($id){
			$CI =& get_instance();

           $sql="select expcategory,SUM(spent) from `expence` where `spent`>'".'0.00'."' and `userid`='".$id."' group by `expcategory`";

	        $query=$CI->db->query($sql);
				if($query->num_rows()> 0)

				{
					foreach($query->result_array() as $row)
					{
						$data[]=$row;
					}
					return $data;
				}
	}

	function getsubcategorylist(){
		$CI =& get_instance();
           $sql="select * from `subcategory`";
	        $query=$CI->db->query($sql);
		if($query->num_rows()> 0)
		{
			foreach($query->result_array() as $row)
			{
				$data[]=$row;
			}
			return $data;
		}
}

function getextra(){
$CI =& get_instance();

           $sql="select * from `productdesctab` group by `description`";

	        $query=$CI->db->query($sql);

	

		 

		if($query->num_rows()> 0)

		{

			

			foreach($query->result_array() as $row)

			{

				$data[]=$row;

								

			}

			

			return $data;

			

		}


}


function getcategory($id){
$CI =& get_instance();

           $sql="select * from `category` where `brandid`='".$id."'";

	        $query=$CI->db->query($sql);

	

		 

		if($query->num_rows()> 0)

		{

			

			foreach($query->result_array() as $row)

			{

				$data[]=$row;

								

			}

			

			return $data;

			

		}


}
function getsubcategory($id){
$CI =& get_instance();

           $sql="select * from `subcategory` where `cid`='".$id."'";

	        $query=$CI->db->query($sql);

	

		 

		if($query->num_rows()> 0)

		{

			

			foreach($query->result_array() as $row)

			{

				$data[]=$row;

								

			}

			

			return $data;

			

		}


}

function getbrand(){

	$CI =& get_instance();

           $sql="select * from `brand`";

	        $query=$CI->db->query($sql);

	

		 

		if($query->num_rows()> 0)

		{

			

			foreach($query->result_array() as $row)

			{

				$data[]=$row;

								

			}

			

			return $data;

			

		}



}

function courier(){

	$CI =& get_instance();

           $sql="select * from `courier` where `courier_st`='1'";

	        $query=$CI->db->query($sql);

	

		 

		if($query->num_rows()> 0)

		{

			

			foreach($query->result_array() as $row)

			{

				$data[]=$row;

								

			}

			

			return $data;

			

		}



}

	function getundercategory(){

	 $CI =& get_instance();

           $sql="select * from `categorymaster` where `parentid`!=0 and `subparentid`='0'";

	        $query=$CI->db->query($sql);

	

		 

		if($query->num_rows()> 0)

		{

			

			foreach($query->result_array() as $row)

			{

				$data[]=$row;

								

			}

			

			return $data;

			

		}

     

   // return $data;



}

	function get_perticular_count($tablename,$where=""){

		$CI =& get_instance();	

		$str="select * from ".$tablename." where 1=1 ".$where;

		//echo $str;

		$query=$CI->db->query($str);

		$record=$query->num_rows();

		return $record;

	

	}

	function get_perticular_count_all($tablename,$where=""){

		$CI =& get_instance();	

		$str="select * from ".$tablename." where 1=1 ".$where;

		//echo $str;

		$query=$CI->db->query($str);

		$record=$query->num_rows();

		return $record;

	

	}

function getmaincategory(){

 $CI =& get_instance();

           $sql="select * from `categorymaster` where `parentid`='0' and `subparentid`='0'";

	        $query=$CI->db->query($sql);

	

		 

		if($query->num_rows()> 0)

		{

			

			foreach($query->result_array() as $row)

			{

				$data[]=$row;

								

			}

			

			return $data;

			

		}

     

   // return $data;

    

}


function getallcategory(){

	 $CI =& get_instance();

           $sql="select * from `categorymaster` where `parentid`!=0 and `subparentid`!='0'";

	        $query=$CI->db->query($sql);

	

		 

		if($query->num_rows()> 0)

		{

			

			foreach($query->result_array() as $row)

			{

				$data[]=$row;

								

			}

			

			return $data;

			

		}

     

  

  

	}

	function getallproduct($catid)

	{

		$CI =& get_instance();

            $sql="select * from `productmaster` where `category` = '".$catid."' and `productstatus`='1'";

	        $query=$CI->db->query($sql);

	

		 

		if($query->num_rows()> 0)

		{

			

			foreach($query->result_array() as $row)

			{

				$data[]=$row;

								

			}

			

			return $data;

			

		}

     

   // return $data;

    

	}

	function getadd($r)

	{

		$CI =& get_instance();

            $sql="select * from `userinfo` where `id` = '".$r."'";

	        $query=$CI->db->query($sql);

	

		 

		if($query->num_rows()> 0)

		{

			

			foreach($query->result_array() as $row)

			{

				$data[]=$row;

								

			}

			

			return $data;

			

		}

     

   // return $data;

    

	}

	function getorderitem($orderitem){
		$CI =& get_instance();
        $sql="select * from `orderitem` where `orderid` = '".$orderitem."'";
        $query=$CI->db->query($sql);
		if($query->num_rows()> 0)
		{
			foreach($query->result_array() as $row)
			{
				$data[]=$row;
			}
			return $data;
		}
   // return $data;
	}

	function getproductimage($productimg){

		$CI =& get_instance();
        $sql="select * from `productmaster` where `productid` = '".$productimg."'";
        $query=$CI->db->query($sql);
		if($query->num_rows()> 0)
		{
			foreach($query->result_array() as $row)
			{
				$data[]=$row;
			}
			return $data;
		}
   // return $data;
	}

	function gettagproduct(){

		$CI =& get_instance();

            $sql="select `tagproduct` from `productmaster`";

	        $query=$CI->db->query($sql);
		if($query->num_rows()> 0)
		{
			foreach($query->result_array() as $row)
			{
				$data[]=$row;
			}
			return $data;
		}
   // return $data;
	}

	function getcatproduct($id){

		$CI =& get_instance();

            $sql="SELECT * FROM `productmaster` WHERE `category` = '".$id."'";

	        $query=$CI->db->query($sql);
		if($query->num_rows()> 0)

		{
			foreach($query->result_array() as $row)

			{
				$data[]=$row;
			}
			return $data;
		}
   // return $data;
	}

		function gethomecatergory($id){

		$CI =& get_instance();

            $sql="SELECT * FROM `categorymaster` WHERE `parentid` = '".$id."' and `subparentid`='0'";

	        $query=$CI->db->query($sql);
		if($query->num_rows()> 0)

		{
			foreach($query->result_array() as $row)

			{
				$data[]=$row;
			}
			return $data;
		}
   // return $data;
	}

	function gethomesubcatergory($id){

		$CI =& get_instance();

        $sql="SELECT * FROM `categorymaster` WHERE `parentid` = '".$id."' and `subparentid`!='0'";

	     $query=$CI->db->query($sql);

		if($query->num_rows()> 0)

		{
			foreach($query->result_array() as $row)
			{
				$data[]=$row;
			}
			return $data;
		}
	}

	function getordersummaryitem($id){

			$CI =& get_instance();

            $sql="SELECT * FROM `orderitem` WHERE `orderid` = '".$id."' ";

	        $query=$CI->db->query($sql);

		if($query->num_rows()> 0)

		{
			foreach($query->result_array() as $row)

			{
				$data[]=$row;
			}
			return $data;
		}
	}

	function getuserorderadd($addid){

		$CI =& get_instance();

            $sql="SELECT * FROM `userinfo` WHERE `id` = '".$addid."' ";

	        $query=$CI->db->query($sql);
		if($query->num_rows()> 0)

		{
			foreach($query->result_array() as $row)

			{
				$data[]=$row;
			}
			return $data;
		}
	}

	function gettagproductdetail($tag){

	  //  echo $tag;

			$CI =& get_instance();

            $sql="SELECT * FROM `productmaster` WHERE `tagproduct` = '".$tag."' ";

	        $query=$CI->db->query($sql);
		if($query->num_rows()> 0)
		{
			foreach($query->result_array() as $row)

			{
				$data[]=$row;
			}
			return $data;
		}
	}

	function getrandomloans($loan)
	{
			$CI =& get_instance();

            $sql="SELECT * FROM `loan_details` WHERE `typeofloan` = '".$loan."' ORDER BY RAND() LIMIT 2";

	        $query=$CI->db->query($sql);
		if($query->num_rows()> 0)
		{
			foreach($query->result_array() as $row)

			{
				$data[]=$row;
			}
			return $data;
		}
	}

	function getrandominvs($inv)
	{
			$CI =& get_instance();

            $sql="SELECT * FROM `investment_details` WHERE `typeofinvestment` = '".$inv."' ORDER BY RAND() LIMIT 2";

	        $query=$CI->db->query($sql);
		if($query->num_rows()> 0)
		{
			foreach($query->result_array() as $row)

			{
				$data[]=$row;
			}
			return $data;
		}
	}
	
	function verify_adhaar($adhaar_no){
		$curl = curl_init();
		// $header[] = "Accept: application/json";
		// $header[] = "Content-Type: application/json"; 
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://kyc-api.aadhaarkyc.io/api/v1/aadhaar-validation/aadhaar-validation",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS =>"{\n\t\"id_number\":  \"".$adhaar_no."\"\n}",
		  CURLOPT_HTTPHEADER => array(
		    "Content-Type: application/json",
		    "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJmcmVzaCI6ZmFsc2UsImV4cCI6MTkwOTU2NDYwMywidHlwZSI6ImFjY2VzcyIsIm5iZiI6MTU5NDIwNDYwMywiaWF0IjoxNTk0MjA0NjAzLCJqdGkiOiJmYTEyODkyYS0xZjQ0LTQ5ZmUtODYzOS1jZGQxMjYzMjI3MWUiLCJ1c2VyX2NsYWltcyI6eyJzY29wZXMiOlsicmVhZCJdfSwiaWRlbnRpdHkiOiJkZXYubmVhdGZveEBhYWRoYWFyYXBpLmlvIn0.RulZhsMgP15XBiIRjEJ2ICCYzogOURSCxKAuE3qED9U"
		  ),
		));

		$response = curl_exec($curl);


		curl_close($curl);
		//echo '<pre>';
		//print_r($response); 
		return json_decode($response);
	}

	function verify_pan($pan){
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://kyc-api.aadhaarkyc.io/api/v1/pan/pan",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS =>"{\n\t\"id_number\": \"".$pan."\"\n}",
		  CURLOPT_HTTPHEADER => array(
		    "Content-Type: application/json",
		    "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJmcmVzaCI6ZmFsc2UsImV4cCI6MTkwOTU2NDYwMywidHlwZSI6ImFjY2VzcyIsIm5iZiI6MTU5NDIwNDYwMywiaWF0IjoxNTk0MjA0NjAzLCJqdGkiOiJmYTEyODkyYS0xZjQ0LTQ5ZmUtODYzOS1jZGQxMjYzMjI3MWUiLCJ1c2VyX2NsYWltcyI6eyJzY29wZXMiOlsicmVhZCJdfSwiaWRlbnRpdHkiOiJkZXYubmVhdGZveEBhYWRoYWFyYXBpLmlvIn0.RulZhsMgP15XBiIRjEJ2ICCYzogOURSCxKAuE3qED9U",
		    "Accept: application/json"
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		// echo $response;
		return json_decode($response);
	}