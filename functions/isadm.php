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
		
	$sql = "SELECT COUNT(*) as ct  FROM users where USER_LOCK=1";	
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