<?php

if (!isset($_SERVER['HTTP_REFERER'])) {
	header("location: ../index.php");
}
include '../db_con.php';
include '../crypto.php';
include '../class/userclass.php';
session_start();
if (isset($_SESSION['user'])) {
	if (isset($_REQUEST['uid'])) {
		
		//UNSERIALIZE SESSION
		$person = new User;
		$person = unserialize($_SESSION['user']);
		$uid = $person->user_id;
		$uid = $_REQUEST['uid'];
		//QUERY TO DATABASE IF PIN
		$sql = 	"UPDATE users set USER_PW=md5('password') where USER_ID=$uid";

		if($conn->query($sql)){
x_log("modify",  $_SERVER['REQUEST_URI'] ,$person->user_id);
					header("location: manageusers.php");

		}else{
			$return = false;
		}
	}else{
		$return = false;
	}
}else{
	$return = false;
}
die(json_encode(array('return' => $return)));


?>