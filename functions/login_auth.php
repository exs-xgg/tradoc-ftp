<?php
/*
DESCRIPTION: LOGIN AUTHENTICATOR
ORIGINAL PLACE: /functions/login_auth.php
AUTHOR: ROMEO MANUEL E. DAVID, EXISTENCE INNOVATIONS
DATE WRITTEN: 10/20/17
INSTRUCTIONS: 
The caller must send a POST REQUEST to this API with the following variables:
user_name as username
passwd as password
The caller must prepare a reciever with ?grant=true/false&mark=xxx to verify the connection, and must initiate a session_start() line

Insert this script on grant=true for your convenience:

//==============================================================
if(isset($_REQUEST['mark']) && ($_REQUEST['mark'] == $_SESSION['mark']){

//JUST LEAVE THIS HERE

}else{
	header("location: ./badrequest.php?error=LOGIN_FINGERPRINT_MISMATCH");
}
//==============================================================
LOGIN_FINGERPRINT_MISMATCH = a security measure that throws an error when login fingerprint hashes do not match. 


STATUS: READY
**/


if (!isset($_POST['submit'])) {
	header("../badrequest.php?error=INVALID_REQUEST");
}
include('./crypto.php');
include('./db_con.php');
include('./class/userclass.php');
session_start();
$person = new User;
if (isset($_SESSION['user'])) {
	header("location: index.php");
}
if(isset($_POST['user_name']) && isset($_POST['passwd'])){
	$uname = fin(strip_tags($_POST['user_name']));
	$pw = md5(fin(strip_tags($_POST['passwd'])));
	$sql = "SELECT *, COUNT(*) as ct FROM users INNER JOIN office ON users.USER_OFC=office.OF_ID WHERE USER_NAME='$uname' and USER_PW='$pw'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                    		if ($row['ct'] == 1 && $row['USER_LOCK']==0){

							$uri = strtok($_SERVER['HTTP_REFERER'],'?');
							$mark = generateRandomString();
							$_SESSION['mark'] = $mark;
							
							$person->user_id = $row['USER_ID'];
							$person->user_name = $row['USER_NAME'];
							$person->user_fname = $row['USER_FNAME'];
							$person->user_lname = $row['USER_LNAME'];
							$person->user_role = $row['ROLE_ID'];
							$person->user_office = $row['OF_NAME'];
							$person->user_pw = $row['USER_PW'];

							x_log("Login",$person->user_id);
							$_SESSION['user'] = serialize($person);
							
							header("location: ".$uri."?grant=true&mark=".$mark);
						}else{
							$uri = strtok($_SERVER['HTTP_REFERER'],'?');
							header("location: ".$uri."?grant=false");
							session_destroy();
						}
                    }
                }




	
}else{
	header("location: ../badrequest.php?error=UNAUTHORIZED_ACCESS");
	
}
?>
