<!DOCTYPE html>
<html>
<head>
	<title>asd</title>
</head>
<body>
	<h1>Upload fucken file</h1>
<form action="functions/post_file.php" method="post" enctype="multipart/form-data">
<label>Choose file to upload</label><br><input type="file" name="filex" id="filex"><br><br>
<label>File Desc (max 200)</label><br><textarea name="desc" rows="5" cols="50" maxlength="200"></textarea><br>
<label>Tags <small>(separate each by ENTER)</small></label><br><textarea id="tags" name="tags" rows="5" cols="50" maxlength="200" rows="300" ></textarea><br>

<input type="submit" name="submit" value="submit">

</form>

</body>
</html>
