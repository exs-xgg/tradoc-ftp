<?php

// if (!isset($_SERVER['HTTP_REFERER'])) {
// 	header("location: ../index.php");
// }
include '../db_con.php';
include '../crypto.php';
include '../class/userclass.php';
session_start();
if (isset($_SESSION['user'])) {
	if (isset($_REQUEST['fid'])) {
		
		//UNSERIALIZE SESSION
		$person = new User;
		$person = unserialize($_SESSION['user']);
		$uid = $person->user_id;
		$fid = $_REQUEST['fid'];
		//QUERY TO DATABASE IF PIN

		$sql = 	"DELETE FROM file where F_ID=$fid";

		if($conn->query($sql)){
					echo 'EDIT SUCCESSFUL &nbsp;&nbsp;<a href="'. $_SERVER['HTTP_REFERER'] .'">Go Back</a>';
		}else{
			echo $sql;
			echo 'Something Went Wrong. &nbsp;&nbsp;<a href="'. $_SERVER['HTTP_REFERER'] .'">Go Back</a>';
		}
	}else{
		echo 'Something Went Wrong. &nbsp;&nbsp;<a href="'. $_SERVER['HTTP_REFERER'] .'">Go Back</a>';
	}
}else{
	echo 'Something Went Wrong. &nbsp;&nbsp;<a href="'. $_SERVER['HTTP_REFERER'] .'">Go Back</a>';
}
die(json_encode(array('return' => $return)));


?>