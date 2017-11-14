<?php
if (!isset($_SERVER['HTTP_REFERER'])) {
	header("location: ../index.html");
}
include 'db_con.php';
include 'crypto.php';
include 'class/userclass.php';
session_start();
if (isset($_SESSION['user'])) {
	$person = new User;
	$person = unserialize($_SESSION['user']);
		
	$sql = "SELECT COUNT(DISTINCT messages.M_SENDER) as ct  FROM messages inner join users on messages.M_SENDER = users.USER_ID where M_RCVR='$person->user_id' AND M_READ=0";	
	//$sql = "SELECT COUNT(*) as ct  FROM users";

		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
                    // output data of each row
            while($row = $result->fetch_assoc()) {
            	
            		$return = $row['ct'];
            	
				}
		}else{
			$return = "0";
		}
	
}else{
	$return = "0";
}
echo $return;


?>