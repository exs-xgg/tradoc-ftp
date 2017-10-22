<?php 
include 'con-db.php';
$user = $_REQUEST['uname'];
$msg = $_REQUEST['msg'];
$sql = "INSERT INTO messages (`M_SENDER`, `M_MSG`, `M_RCVR`) VALUES (`$user`,`$msg`, `$user`)"; 
$result = $conn->query($sql);
$result1 = mysql_query("SELECT * FROM messages ORDER by M_TIME DESC"); 

while ($extract = mysql_fetch_array($result1)){
	echo $extract['M_SENDER'] . ": " . $extract['M_MSG'] . "</br>";
}
?>