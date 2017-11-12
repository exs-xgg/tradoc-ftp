<?php
include 'db_con.php';
session_start();
if(!isset($_SESSION['user'])){
  header("location: ../badrequest.php?error=RESTRICTED_ACCESS");
}
include("class/userclass.php");
$person = new User;
$person = unserialize($_SESSION['user']);

$sql = "SELECT DISTINCT FROM messages where M_RCVR='$person->user_id' AND M_READ=0";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	$unread_json  = array();
    while($row = $result->fetch_assoc()) {
        $r_id = $row['USER_ID'];

    }
}
?>