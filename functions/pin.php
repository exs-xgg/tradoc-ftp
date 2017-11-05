<?php
/**
DESCRIPTION: THIS FILE RECEIVES THE AJAX-POST REQUESTS TO ADD ENTITIES TO PINNED TABLE
In layman's terms, this function does the magic that makes people think they pinned a file.
WRITTEN BY: ROMEO MANUEL E. DAVID
INSTRUCTIONS:
Do a post ajax call to this API containing the file ID and the file nickname. 
Returns 1 if successful and 0 if not.
ex. pin.php?fid=231&nick=foobar
*/
if (!isset($_SERVER['HTTP_REFERER'])) {
	header("location: ../index.html");
}
include 'db_con.php';
include 'crypto.php';
include 'class/userclass.php';
session_start();
if (isset($_SESSION['user'])) {
	if (isset($_REQUEST['fid'])) {
		//GET OTHER REQUEST VARIABLES
		//NICKNAME
		$nick = $_REQUEST['nick'];

		//FILE ID
		$fid = $_REQUEST['fid'];

		//UNSERIALIZE SESSION
		$person = new User;
		$person = unserialize($_SESSION['user']);
		$uid = $person->user_id;

		//QUERY TO DATABASE IF PIN
		$sql = 	"INSERT INTO pinned(PIN_USER,PIN_FILE,PIN_NICKNAME)
		VALUES($uid,$fid,'$nick')";

		//QUERY TO DATABASE IF UNPIN
		if (isset($_REQUEST['x'])) {
			$sql = 	"DELETE FROM pinned where PIN_FILE=$fid and PIN_USER=$uid";
		}
		//EXECUTE QUERY
		if($conn->query($sql)){
					echo 1;

		}else{
			echo 0;
		}
	}else{
		echo 0;
	}
}else{
	echo 0;
}


?>