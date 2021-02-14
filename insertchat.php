<?php
$db = new mysqli("localhost","blackcod_nicol","AdA?-6sWDXDd","blackcod_nicol");

// Check connection
if ($db -> connect_errno) {
  echo "Failed to connect to MySQL: " . $db -> connect_error;
  exit();
}
if($_POST['action']=='insert'){
$uid=$_POST['userid'];
$chat=$_POST['chat_message'];
 $query = "
    INSERT INTO adminchat(userid, msg, status) VALUES ('$uid', '$chat', '1')
";
$sql1=mysqli_query($db,$query);
if($sql1)
{
$sql1=mysqli_query($db,"select * from adminchat where userid='$uid'");
    while($row= mysqli_fetch_array($sql1)){
    echo '<div class="direct-chat-text" id="chathistory">'.$row['msg'].'</div>';
    }
}
}

if($_POST['action']=='fetch'){
    $uidf=$_POST['userid'];
    $sql1=mysqli_query($db,"select * from adminchat where userid='$uidf'");
    while($row= mysqli_fetch_array($sql1)){
        echo $row['msg'];
    }
}

?>
