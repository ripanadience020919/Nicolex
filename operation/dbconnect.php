<?php

define('DB_SERVER','localhost');
define('DB_USER','blackcod_nicol');
define('DB_PASS' ,'AdA?-6sWDXDd');
define('DB_NAME', 'blackcod_nicol');
class dbconnect{
       
        function __construct(){
         $con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
$this->db=$con;
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
	
           
       }
}

?>