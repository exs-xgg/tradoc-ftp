<?php
include 'db_con.php';
session_start();
if(!isset($_SESSION['user'])){
  header("location: ../badrequest.php?error=RESTRICTED_ACCESS");
}
include("class/userclass.php");
$person = new User;
$person = unserialize($_SESSION['user']);
$unread_json = array('' => '');
$sql = "SELECT DISTINCT users.USER_NAME as usn FROM messages inner join users on messages.M_SENDER = users.USER_ID where M_RCVR='$person->user_id' AND M_READ=0";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	$unread_json  = array();
    while($row = $result->fetch_assoc()) {
        array_push($unread_json, $row['usn']);
    }
    
}
echo json_encode($unread_json);
?>