<?php
include '../db_con.php';
include '../crypto.php';
include '../class/userclass.php';
session_start();
if (isset($_SESSION['user']) && isset($_REQUEST['filex'])) {
	$person = new User;
	$person = unserialize($_SESSION['user']);
	if ($person->user_role < 2) {
		header("location: ../../badrequest.php?error=RESTRICTED_ACCESS");	
	}else{
		$file_id = $_REQUEST['filex'];
		

	}

}else{
	header("location: ../../badrequest.php?error=RESTRICTED_ACCESS");	
}
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
<table class="table"><form>
	<tr><th>File ID</th><td><input type="text" name="fid" value="<?php echo $row['F_ID']; ?>"></td></tr>
	<tr><th>File Tracking No.</th><td><input type="text" name="fid" value="<?php echo ($row['F_TRACK_NO']); ?>"></td></tr>
	<tr><th>File Server Name</th><td><input type="text" name="fid" value="<?php echo $row['F_NAME_SERVER']; ?>"></td></tr>
	<tr><th>File Original Name</th><td><input type="text" name="fid" value="<?php echo $row['F_NAME_ORIG']; ?>"></td></tr>
	<tr><th>File Desc</th><td><input type="text" name="fid" value="<?php echo $row['F_DESC']; ?>"></td></tr>
	<tr><th>File Date Uploaded</th><td><input type="text" name="fid" value="<?php echo ($row['F_UPLOAD_DATE']); ?>"></td></tr>
	<tr><th>File Tags</th><td><input type="text" name="fid" value="<?php echo json_encode($row['F_TAGS']); ?>"></td></tr>



</table>

<input type="submit" name="submit" value="Save Changes">
</form>
</body>
</html>

		<?php
	}
}
?>