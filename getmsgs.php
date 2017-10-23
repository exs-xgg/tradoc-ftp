<?php 
include 'con-db.php';
$user = $_REQUEST['uname'];
$msg = $_REQUEST['msg'];
echo $user;	
mysqli_query($conn, 'INSERT INTO messages (M_SENDER, M_MSG) VALUES ('.$user.','.$msg.')');
if (!$check1_res) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
$result = mysqli_query($conn, "SELECT M_SENDER, M_MSG, M_TIME, M_RCVR, users.USER_ID, users.USER_NAME  FROM messages INNER JOIN users ON messages.M_SENDER=users.USER_ID WHERE users.USER_NAME=".$user." ORDER by M_TIME DESC"); 

while ($extract = mysqli_fetch_array($result)){
	echo $extract['USER_NAME'] . ": " . $extract['M_MSG'] . "</br>";
}
?>