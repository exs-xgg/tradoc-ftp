<?php
include '../../functions/db_con.php';
include '../../functions/crypto.php';
x_log("access", $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'] ,$person->user_id);

header("location: ../index.php")

?>