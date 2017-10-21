<?php
/*
ESCRIPTION: UPLOAD FILE API
ORIGINAL PLACE: /functions/post_file.php
AUTHOR: ROMEO MANUEL E. DAVID, EXISTENCE INNOVATIONS
DATE WRITTEN: 10/21/17
INSTRUCTIONS: 
The caller must send the filename using an input type="file" with id `filex`

STATUS: NOT READY

MISSING THE SHELL SCRIPT TO COMPRESS THE FILE

**/

include("../db_con.php");
include("../crypto.php");
include("../class/userclass.php");
session_start();
if(isset($_SESSION['user'])){
	$person = new User;
	$person = unserialize($_SESSION['user']);

	//INIT SCRIPTS OVER HERE

	$file = $_FILES['filex']['tmp_name'].'<br>';
	$prefix_address = "/var/www/html/tradoc-ftp/files/";
	if (move_uploaded_file($_FILES['filex']['tmp_name'],$prefix_address . generateRandomString().".anyfuckingfile" )) {
	 echo "successfully uploaded $file\n";
	} else {
	 error_log("[ X ] There was a problem while uploading $file\n",1);
	}

}




?>
