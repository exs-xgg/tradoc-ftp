<!DOCTYPE html>
<html>
<head>
	<title>BAD REQUEST!</title>
</head>
<body>
<h1 align="center">ACCESS DENIED!</h1>\
<p align="center">If you think this is a mistake, contact your IT administrator</p>
<?php
if (isset($_REQUEST['error'])){
//GET IP ADDRESS OF MACHINE 
	$ip = getenv('HTTP_CLIENT_IP')?:
	getenv('HTTP_X_FORWARDED_FOR')?:
	getenv('HTTP_X_FORWARDED')?:
	getenv('HTTP_FORWARDED_FOR')?:
	getenv('HTTP_FORWARDED')?:
	getenv('REMOTE_ADDR');
//LOG ERROR ON APACHE SERVER LOGS
// `cat /var/log/httpd/error_log | grep  _ERROR_ `
	error_log("[ _ERROR_ ]" . $_REQUEST['error'] . " on [" . $ip . "]" . gethostbyaddr($_SERVER['REMOTE_ADDR']), 1);
}
?>
</body>
</html>