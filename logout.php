<?php

session_start();

include("functions/class/userclass.php");
$person = new User;
$person = unserialize($_SESSION['user']);
include 'functions/crypto.php';
$id = $person->user_id;
x_log("Logout",$person->user_id);
include 'functions/db_con.php';
$sql = "UPDATE users set ONLINE=0 where USER_ID=$person->user_id";
if($conn->query($sql)){
			echo "";
}
unset($_SESSION['user']);

session_unset();

session_destroy();

header("location: ./login.php");
?>