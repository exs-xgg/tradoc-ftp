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

include 'db_con.php';
include 'crypto.php';
include 'class/userClass.php';
session_start();
if (isset($_SESSION['user'])) {
	if (isset($_POST['fid'])) {
		//GET OTHER POST VARIABLES
		//NICKNAME
		$nick = $_POST['nick'];

		//FILE ID
		$fid = $_POST['fid'];

		//UNSERIALIZE SESSION
		$person = new User;
		$person = unserialize($_SESSION['user']);
		$uid = $person->user_id;

		//QUERY TO DATABASE
		$sql = 	"INSERT INTO pinned(PIN_USER,PIN_FILE,PIN_NICKNAME)
		VALUES($uid,$fid,'$nick')";

		//EXECUTE QUERY
		if($conn->query($sql)){
					return 1;

		}else{
			return 0;
		}
	}else{
		return 0;
	}
}else{
	return 0;
}


?>