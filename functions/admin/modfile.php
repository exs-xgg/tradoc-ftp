<?php
include '../db_con.php';
include '../crypto.php';
include '../class/userclass.php';
session_start();

if ((isset($_REQUEST['r']))) {
		$trkno = $_POST['trkno'];
		$svname = $_POST['svname'];
		$origname = $_POST['origname'];
		$desc = $_POST['desc'];
		$tags = json_encode(explode("\r\n", (strip_tags(str_replace("'", "",$_POST['tags'])))));
		$uid = $_POST['fid'];
		$sql = "UPDATE file set F_TRACK_NO='$trkno', F_NAME_SERVER='$svname', F_NAME_ORIG='$origname',F_DESC='$desc', F_TAGS='$tags' where F_ID = $uid";
		if ($conn->query($sql)) {
			echo "EDIT SUCCESSFUL";
		}else{
			echo "Edit Failed ".$sql;
		}
	}

if (isset($_SESSION['user']) && (isset($_REQUEST['filex']))) {
	$person = new User;
	$person = unserialize($_SESSION['user']);
	if ($person->user_role < 2) {
		header("location: ../../badrequest.php?error=RESTRICTED_ACCESS");	
	}
	else{
		
		$file_id = $_REQUEST['filex'];
$sql = "SELECT * FROM file where F_ID = $file_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	// output data of each row
	while($row = $result->fetch_assoc()) {
		?>

<!DOCTYPE html>
<html>
<head>
	<title>Modify File</title>
</head>
<body>
<table class="table"><form action="modfile.php?r=1" method="post">
	<tr><th>File ID</th><td><input type="text" name="fid" readonly value="<?php echo $row['F_ID']; ?>"></td></tr>
	<tr><th>File Tracking No.</th><td><input required type="text" name="trkno" value="<?php echo ($row['F_TRACK_NO']); ?>"></td></tr>
	<tr><th>File Server Name</th><td><input required type="text" name="svname" readonly value="<?php echo $row['F_NAME_SERVER']; ?>"></td></tr>
	<tr><th>File Original Name</th><td><input required type="text" name="origname" value="<?php echo $row['F_NAME_ORIG']; ?>"></td></tr>
	<tr><th>File Desc</th><td><input type="text" name="desc" value="<?php echo $row['F_DESC']; ?>"></td></tr>
	<tr><th>File Tags</th><td><textarea rows="5" type="text" name="tags" value="<?php echo json_encode($row['F_TAGS']); ?>"></textarea></td></tr>



</table>

<input type="submit" name="submit" value="Save Changes">
</form>
</body>
</html>

		<?php

	}

}

	}
}
?>