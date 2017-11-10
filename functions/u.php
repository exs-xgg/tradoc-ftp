<?php
include 'db_con.php';
include 'crypto.php';
include 'class/userclass.php';
session_start();
if (isset($_SESSION['user'])) {
	$person = new User;
	$person = unserialize($_SESSION['user']);

	if (isset($_POST['prxpw'])) {
		if (md5($_POST['prxpw'])==$person->user_pw) {
			$filex = $_SESSION['filex'];
			header("location: ../download.php?filex=".$filex);
			unset($_POST['prxpw']);
		}else{
			header("location: ../badrequest.php?error=INVALID_REQUEST");
		}
		}
	}
	if (isset($_REQUEST['filex'])) {
	$_SESSION['filex'] = $_REQUEST['filex'];
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Password</title>
	</head>
	<body align="center">
		<h1>Enter Your Password</h1>
	<form action="#" method="post">
		<input type="password" name="prxpw"><br><br>
		<input type="submit" name="submit" value="Enter">
	</form>
	</body>
	</html>

	<?php
	

}else{
	echo "missing";
	//header("location: ../badrequest.php?error=INVALID_REQUEST");
}


?>