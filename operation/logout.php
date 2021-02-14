<?php 
include ("controller.php");
$logout=new Users;
$res=$logout->setuserlogout($_SESSION['id']);
if($res){
header("location:../index.php");
}
?>
