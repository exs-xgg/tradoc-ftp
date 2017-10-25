<?php
/*
DESCRIPTION: UPLOAD FILE API
ORIGINAL PLACE: /functions/post_file.php
AUTHOR: ROMEO MANUEL E. DAVID, EXISTENCE INNOVATIONS
DATE WRITTEN: 10/21/17
INSTRUCTIONS: 
The caller must send the filename using an input type="file" with id `filex`
The caller must prepare a receiver ?success with values [yes] or [no]
STATUS: NOT READY

MISSING THE SHELL SCRIPT TO COMPRESS THE FILE

**/

include("db_con.php");
include("crypto.php");
include("class/userclass.php");
session_start();



	//INIT SCRIPTS OVER HERE

if (isset($_SESSION['user']) && isset($_POST['submit'])){
//if (isset($_POST['submit'])){
	$person = new User;
	$person = unserialize($_SESSION['user']);
	$desc = $_POST['desc'];
	$tags = json_encode(explode("\r\n", (strip_tags($_POST['tags']))));
	echo $tags.'<br>';
	$file_orig =  $_FILES['filex']['name'];
	echo $file_orig.'<br>';
	$file = $_FILES['filex']['tmp_name'];

	//generate unique filename;
	$randomString = generateRandomString();

	$server_file_name = "../files/".$randomString;
	if (move_uploaded_file($file,$server_file_name)) {
		$uri = strtok($_SERVER['HTTP_REFERER'],'?');
		

		$sql = 	"INSERT INTO FILE(F_NAME_ORIG,F_NAME_SERVER,F_UPLOADER,F_TAGS,FILE_X)
		VALUES('$file_orig','$randomString',$person->userid,'$tags',0)";
		echo '<br><br>'.$sql;
		if($conn->query($sql)){
					header("location: ".$uri."?success=yes");

		}


	} else {
		$uri = strtok($_SERVER['HTTP_REFERER'],'?');
		header("location: ".$uri."?success=no");

	
	}


}else{
header("location: ../badrequest.php");
}



?>
