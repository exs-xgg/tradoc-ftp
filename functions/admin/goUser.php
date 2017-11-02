<?php
//this api processes the account details

/*
USAGE:
                   /-- lock [ locks a user ] &uid= {userid}
goUser.php?action= --- allow [ unlocks a user ] &uid= {userid}
                   \-- mod [ change user info ] &uid= {userid}
**/
include '../db_con.php';
include '../crypto.php';
include '../class/userclass.php';
//check if user session exists
if (isset($_SESSION['user'])) {
	$person = new User;
	$person = unserialize($_SESSION['user']);
	$id = $person->user_id;
	x_log("Accessed " .$_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'] ,$person->user_id);

	//check if user has privileges
	if ($person->user_role < 2) {
		header("location: ../../badrequest.php?error=RESTRICTED_ACCESS");
	}
}else{
header("location: ../../badrequest.php?error=RESTRICTED_ACCESS");
}
//ALLOW USER
if ($_REQUEST['action']=="allow") {
	$uid = $_REQUEST['uid'];
	$sql =  "UPDATE users SET USER_LOCK=0 where USER_ID= $uid";
    if($conn->query($sql)){
        echo "Unlocked!";
    }
//LOCK USER
}elseif ($_REQUEST['action']=="lock") {
	$uid = $_REQUEST['uid'];
	$uid = $_REQUEST['uid'];
	$sql =  "UPDATE users SET USER_LOCK=1 where USER_ID= $uid";
    if($conn->query($sql)){
        echo "Locked!";
    }
//MODIFY USER INFO
}elseif ($_REQUEST['action']=="mod") {
	$uid = $_REQUEST['uid'];
	//GET JSON
}


?>