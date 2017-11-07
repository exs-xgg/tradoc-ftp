<?php
include 'db_con.php';
include 'crypto.php';
session_start();
if(!isset($_SESSION['user'])){
  header("location: ../badrequest.php?error=RESTRICTED_ACCESS");
}
include("class/userclass.php");
$person = new User;
$person = unserialize($_SESSION['user']);

if ((isset($_POST['BODY']))) {
	
	$body = fin(strip_tags($_POST['BODY']));
	$r = $_POST['TO'];
	$sql = "SELECT USER_ID FROM users where USER_NAME='$r';";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	        $r_id = $row['USER_ID'];
	    }

	    $sql = "INSERT into messages(M_RCVR,M_MSG,M_SENDER) VALUES($r_id,'$body',$person->user_id)";
		if($conn->query($sql)){
					$result = true;

		}else{
			$result = false;
		}
		}else{
			x_log("XQRY: ". $sql,$person->user_id);
			$result = false;
		}

}else{
	$result = false;
}
die(json_encode(array('return' => $result)));

?>