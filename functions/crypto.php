<?php
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return ($randomString);
}
function x_log($act,$uid){
    include("db_con.php");
    $sql =  "INSERT INTO activity(ACT,UID) VALUES('$act',$uid)";
    if($conn->query($sql)){
        echo "";
    }
}
function fin($str){
	return mysql_real_escape_string($str);
}
?>
