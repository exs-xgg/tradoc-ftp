<?php

// if (!isset($_SERVER['HTTP_REFERER'])) {
// 	header("location: ../index.html");
// }
include 'db_con.php';
include 'crypto.php';
include 'class/userclass.php';
		$names = array('0');
		$sql = 	"SELECT USER_SN FROM users";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        	array_push($names, $row['USER_SN']);
        }
    }
	
echo json_encode($names);


?>