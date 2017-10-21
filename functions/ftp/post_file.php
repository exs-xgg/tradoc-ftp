<?php
/*
DESCRIPTION: FILE UPLOADER CONTROLLER
ORIGINAL PLACE: /ftp/post_file.php
AUTHOR: ROMEO MANUEL E. DAVID, EXISTENCE INNOVATIONS
DATE WRITTEN: 10/21/17
INSTRUCTIONS: 
The caller must send a POST REQUEST to this API with the following variables:
file_name as file name WITH FULL ADDRESS of the file to be uploaded
the $_SESSION['person'] must be complete
This file will return status codes:
[0] fail upload. check error logs on the server
[1] upload successful

**/

include("../db_con.php");
include("../crypto.php");
include("../class/userclass.php");
session_start();
$person = new User;
$person = unserialize($_SESSION['user']);

?>
