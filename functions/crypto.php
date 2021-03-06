<?php
/**
STATUS: READY
DESCRIPTION: holds all functions necessary for input control
WRITTEN BY: Romeo Manuel E. David
Instuctions:
Just include it in the php file and call the functions.
*/

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return ($randomString);
}
function x_log($act,$obj,$uid){
    include("db_con.php");
    $ip = $_SERVER['REMOTE_ADDR'];
    $sql =  "INSERT INTO activity(ACT_NAME,ACT_OBJECT,UID,IP_ADDR) VALUES('$act','$obj',$uid,'$ip')";
    if($conn->query($sql)){
        echo "";
    }
}
function fin($str){
	return mysql_real_escape_string($str);
}
function noCancerPls($str){
    $str = str_replace("'", "", $str); 
    $str = str_replace(" ", "_", $str); 
    $str = str_replace("(", "-",  $str); 
    $str = str_replace(")", "-",  $str); 
    $str = str_replace("[", "-",  $str); 
    $str = str_replace("]", "-",  $str); 
    $str = str_replace("{", "-",  $str); 
    $str = str_replace("}", "-",  $str); 
    $str = strip_tags($str); 
    return $str; 
}
?>
