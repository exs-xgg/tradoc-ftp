<?php
session_start();
include("db_con.php");
$usn = $_REQUEST['usn'];
$sql =  "UPDATE users set USER_LOCK = 1 where USER_NAME='$usn'";
if($conn->query($sql)){
  header("location: ../badrequest.php?error=MAX_TRIES_ACHIEVED_ACCOUNT_LOCKED: $usn")
}
?>