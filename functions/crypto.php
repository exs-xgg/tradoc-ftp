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
function noCancerPls($str){
    $ar_str = split("", $str);
    for ($i=0; $i < $ar_str.length; $i++) { 
        switch ($ar_str[i]) {
            case " ":
                $ar_str[i] = "_";
                break;
            case "'":
                $ar_str[i] = "";
                break;
            case "(":
                $ar_str[i] = "-";
                break;
            case ")":
                $ar_str[i] = "-";
                break;
            case "{":
                $ar_str[i] = "-";
                break;
            case "}":
                $ar_str[i] = "-";
                break;
            case "<":
                $ar_str[i] = "-";
                break;
            case ">":
                $ar_str[i] = "-";
                break;
            case "[":
                $ar_str[i] = "-";
                break;
            case "]":
                $ar_str[i] = "-";
                break;
            case "@":
                $ar_str[i] = "at";
                break;
            case "%":
                $ar_str[i] = "";
                break;
            case "$":
                $ar_str[i] = "S";
                break;
            
            default:
                # code...
                break;
        }
    }

    return join("",$ar_str);
}
?>
