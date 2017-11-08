<?php
include '../db_con.php';
include '../crypto.php';
include '../class/userclass.php';
session_start();
$result = false;
if (isset($_SESSION['user']) && isset($_POST['pw'])) {
	$person = new User;
	$person = unserialize($_SESSION['user']);
	if ($_POST['pw']==$person->user_pw) {
		$result = true;
	}
}
die(json_encode(array('return' => $result)));
?>