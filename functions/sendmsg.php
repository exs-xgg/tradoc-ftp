<?php
if(isset($_POST['data'])){
	if(isset($_SESSION['user'])){

	}
}else{
	echo json_encode("ERROR: ILLEGAL_API_ACCESS");
}

include 'con-db.php';
$user = stripslashes(htmlspecialchars($_REQUEST['uname'])) ;
$msg = stripslashes(htmlspecialchars($_REQUEST['msg'])) ;	
mysqli_query($conn, 'INSERT INTO messages (M_SENDER, M_MSG) VALUES ('.$user.','.$msg.')');

$result = mysqli_query($conn, "SELECT M_SENDER, M_MSG, M_TIME, M_RCVR, users.USER_ID, users.USER_NAME,users.USER_FNAME  FROM messages INNER JOIN users ON messages.M_SENDER=users.USER_ID WHERE M_SENDER AND M_RCVR = '$user' ORDER by M_TIME DESC "); 

while ($extract = mysqli_fetch_array($result)){
	$sender = $extract['USER_FNAME'];
	$userid = $extract['USER_ID'];
	$msgs = $extract['M_MSG'];
	$time = $extract['M_TIME'];
	if($userid != $user){
	echo "<div><h5 class =\"text-success\" title =\"".$time."\">".$sender.":&nbsp;    ".$msgs."</h5></div>";	
	}
	else{
	echo "<div class =\" text-primary \" ><h5 title =\"".$time."\"style= \"text-align:right\">".$sender.": &nbsp;".$msgs."</h5></div>";	
	}



?>