<?php
//this api processes the account details

/*
USAGE:
												THERE ARE ALL POST REQUESTS
                   /-- lock [ locks a user ]	&uid={userid}
goUser.php?action= --- allow [ unlocks a user ]	&uid={userid}
                   \-- mod [ change useri info ]&uid={userid}&fname={firstname}&lname={lastname}&office={officeid}
                   								&uname={username}
**/

session_start();
include '../db_con.php';
include '../crypto.php';
include '../class/userclass.php';
//check if user session exists
if (isset($_SESSION['user'])) {
	$person = new User;
	$person = unserialize($_SESSION['user']);
	$id = $person->user_id;
	x_log("modify", $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'] ,$person->user_id);

//ALLOW USER
if(!isset($_REQUEST['action'])){
	header("location: ../../badrequest.php?error=NO_PARAMETERS_SET");
}
if ($_REQUEST['action']=="allow") {
	$uid = $_REQUEST['uid'];
	$sql =  "UPDATE users SET USER_LOCK=0,USER_PW_ATTEMPT=3 where USER_ID= $uid";
    if($conn->query($sql)){
        $uri = strtok($_SERVER['HTTP_REFERER'],'?');
		header("location: ".$uri."?rs=ok");
    }else{
    	$uri = strtok($_SERVER['HTTP_REFERER'],'?');
    	x_log("modify",$_SERVER['REQUEST_URI']." $sql",$person->user_id);
		header("location: ".$uri."?rs=no&er=QUERY_FAILED");
    }
//LOCK USER
}elseif ($_REQUEST['action']=="lock") {
	$uid = $_POST['uid'];
	$sql =  "UPDATE users SET USER_LOCK=1 where USER_ID= $uid";
    if($conn->query($sql)){
         $uri = strtok($_SERVER['HTTP_REFERER'],'?');
		header("location: ".$uri."?rs=ok");
    }else{
    	$uri = strtok($_SERVER['HTTP_REFERER'],'?');
    	x_log("modify",$_SERVER['REQUEST_URI']." $sql",$person->user_id);
		header("location: ".$uri."?rs=no&er=QUERY_FAILED");
    } 
//MODIFY USER INFO
}elseif ($_REQUEST['action']=="mod") {
	$uid = $_POST['uid'];
	echo $uid;
	$sn = "";
	$fname = "";
	$lname = "";
	$office = "";
	$uname = "";
	$ppw = "";
	$role="";
	if (isset($_POST['fname'])) {
		$fname = " USER_FNAME='".$_POST['fname']. "', ";
	}
	if (isset($_POST['lname'])) {
		$lname = " USER_LNAME='".$_POST['lname']. "', ";
	}
	if (isset($_POST['sn'])) {
		$sn = " USER_SN='".$_POST['sn']. "', ";
	}
	if (isset($_POST['uname'])) {
		$uname = " USER_NAME='".$_POST['uname']. "', ";
	}
	if (isset($_POST['office'])) {
		$office = " USER_OFC=".$_POST['office']. ", ";
	}
	if (isset($_POST['role'])) {
		$role = " ROLE_ID=".$_POST['role']. ", ";
	}
	if (isset($_POST['pw1'])) {
		$pw1 = $_POST['pw1'];
		$pw2 = $_POST['pw2'];
		if(md5($pw1)==$person->user_pw){
			$pw2 = md5($pw2);
			$ppw = " USER_PW='$pw2', ";
		}else{
			header("location: ../../badrequest.php?error=WRONG_PARAMETERS");
		}
	}

	$sql = "update users set $fname $lname $office $sn $role $uname $ppw USER_LOCK=0 where USER_ID=$uid;";
	echo $sql;

	if($conn->query($sql)){
        $uri = strtok($_SERVER['HTTP_REFERER'],'?');
		header("location: ".$uri."?rs=ok");
    }else{
    	$uri = strtok($_SERVER['HTTP_REFERER'],'?');
    	x_log("modify",$_SERVER['REQUEST_URI']." $sql",$person->user_id);
		header("location: ".$uri."?rs=no&er=QUERY_FAILED");

    }
}else{
	$uri = strtok($_SERVER['HTTP_REFERER'],'?');
	x_log("modify",$_SERVER['REQUEST_URI']." $sql",$person->user_id);
	header("location: ".$uri."?rs=no&er=WRONG_ARGUMENTS");
}

}else{
header("location: ../../badrequest.php?error=RESTRICTED_ACCESS");
}


?>