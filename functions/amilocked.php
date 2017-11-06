<?php 
/*
DESCRIPTION: CHECKS OF USER IS LOCKED REALTIME
WRITTEN BY: ROMEO MANUEL E. DAVID
INSTRUCTIONS: CALL THIS THING VIA AJAX ANY METHOD WILL DO
				RETURNS 1 IF YOU ARE LOCKED
				RETURNS 0 IF YOU ARE NOT LOCKED

**/
include 'db_con.php';
include 'crypto.php';
include("class/userclass.php");
session_start();
$person = new User;
$person = unserialize($_SESSION['user']);

$uid = $person->user_id;

$sql = "SELECT USER_LOCK FROM users where USER_ID=$uid LIMIT 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    	if ($row['USER_LOCK']=='1') {
    		$return = true;
    	}else{
    		$return = false;
    	}
    }
}else{
	$return = false;
}
die(json_encode(array('return' => $return)));

 ?>