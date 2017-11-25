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


	//check authorization
	if (!($_POST['password']==$person->user_pw)) {
		$uri = strtok($_SERVER['HTTP_REFERER'],'?');
		header("location: ".$uri."?success=no");
	}


	$filetrack = fin($_POST['filetrack']);
	$desc = fin(strip_tags($_POST['desc']));
	$tagz = explode("\r\n", (strip_tags(str_replace("'", "",$_POST['tags']))));
	array_push($tagz, date("m/d/Y"));
	array_push($tagz, $person->user_fname . " " . $person->user_lname);
	$tags = json_encode($tagz);
	echo $tags.'<br>';
	$file_orig = noCancerPls($_FILES['filex']['name']);
	$file_orig = fin(strip_tags($file_orig));


	//CHECK FOR FILE EXTENSION
	//THESE ARE THE ALLOWED EXTENSIONS
	//RECOMMENDATION: PULL EXTENSIONS FROM DATABASE

	
	$sql = "SELECT * FROM ok_files";
	$rs = $conn->query($sql);
	$exts = array(1 => ".doc");
	while($row = $rs->fetch_assoc()) {
		array_push($exts,$row['EXT']);
	}

	if(!in_array(end(explode('.', $file_orig)), $exts)){
		$uri = strtok($_SERVER['HTTP_REFERER'],'?');
		x_log("deny", $file_orig, $person->user_id);
		header("location: ".$uri."?success=no");
	}else{





	echo $file_orig.'<br>';
	$file =$_FILES['filex']['tmp_name'];

	//generate unique filename;
	$randomString = generateRandomString()."_".$file_orig;

	$server_file_name = "/var/www/html/tradoc-ftp/files/".$randomString;
	if (move_uploaded_file($file,$server_file_name) or true) {

		shell_exec("/var/www/html/tradoc-ftp/files/pack.sh $server_file_name");


		$uri = strtok($_SERVER['HTTP_REFERER'],'?');
		
		$ofc = $person->user_office;
		if (isset($_POST['conf'])) {
			$conf = 1;
		}else{
			$conf = 0;
		}
		$sql = 	"INSERT INTO file(F_TRACK_NO,F_NAME_ORIG,F_NAME_SERVER,F_DESC,F_UPLOADER,F_OFFICE,F_TAGS,FILE_X,F_DATE_LAST_CHECKED)
		VALUES('$filetrack','$file_orig','$randomString', '$desc',$person->user_id, '$ofc','$tags',$conf,NOW())";
		echo '<br><br>'.$sql;
		if($conn->query($sql)){
			x_log("upload", $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'] ,$person->user_id);
			if($conf==1){
				$sql = "insert into pinned(PIN_FILE, PIN_USER) SELECT F_ID, $person->user_id FROM file WHERE F_NAME_SERVER='$randomString'";
				$conn->query($sql);
			}
					header("location: ".$uri."?success=yes");
		}else{
			header("location: ".$uri."?success=no");
		}


	} else {
		$uri = strtok($_SERVER['HTTP_REFERER'],'?');
		header("location: ".$uri."?success=no");

	
	}

}
}else{
header("location: ../badrequest.php");

}



?>
