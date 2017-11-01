<?php
/*
DESCRIPTION: UPLOAD FILE API
ORIGINAL PLACE: /functions/post_file.php
AUTHOR: ROMEO MANUEL E. DAVID, EXISTENCE INNOVATIONS
DATE WRITTEN: 10/21/17
INSTRUCTIONS: 
The caller must send the filename using an input type="file" with id `filex`
The caller must prepare a receiver ?success with values [yes] or [no]

STATUS:  READY


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
	$filetrack = $_POST['filetrack'];
	$tags = json_encode(explode("\r\n", (strip_tags($_POST['tags']))));
	echo $tags.'<br>';
	$file_orig =  $_FILES['filex']['name'];
	echo $file_orig.'<br>';
	$file = $_FILES['filex']['tmp_name'];

	//generate unique filename;
	$randomString = generateRandomString();

	$server_file_name = "/var/www/html/tradoc-ftp/files/".$randomString;
	if (move_uploaded_file($file,$server_file_name)) {

		shell_exec("/var/www/html/tradoc-ftp/files/pack.sh $server_file_name");


		$uri = strtok($_SERVER['HTTP_REFERER'],'?');
		
		$ofc = $person->user_office;
		$sql = 	"INSERT INTO file(F_TRACK_NO,F_NAME_ORIG,F_NAME_SERVER,F_UPLOADER,F_OFFICE,F_TAGS,FILE_X)
		VALUES('$filetrack','$file_orig','$randomString', $person->user_id, '$ofc','$tags',0)";
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
