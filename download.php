<?php

/**
STATUS: READY

error codes
FILE_NOT_FOUND_ON_SERVER = the file is not found on the server
FILE_NOT_FOUND_ON_DATABASE = the file does not exist on database
*/
include('functions/crypto.php');
include('functions/db_con.php');
include('functions/class/userclass.php');
session_start();
if (isset($_SESSION['user'])) {
    $person = new User;
    $person = unserialize($_SESSION['user']);
    
    $id = $person->user_id;
    


    $db_file_name = fin(strip_tags($_REQUEST['filex']));
x_log("download", $db_file_name ,$person->user_id);
    $sql = "SELECT *, count(*) as ct FROM file WHERE F_NAME_SERVER='$db_file_name'";

    $result = $conn->query($sql);

    $rs = $result->fetch_assoc();
    if (($rs['FILE_X'] == 1)) {
        if ($person->$user_role < 3 ) {
            header("location: badrequest.php?error=RESTRICTED_FILE_ACCESS");
        }
    }
    $server_file_name = $rs['F_NAME_SERVER'];
  
  echo shell_exec("/var/www/html/tradoc-ftp/files/unpack.sh $server_file_name $server_file_name");
    if ($rs['ct'] == 1) {
        
                header('location: files/temp/'.$server_file_name);
          
       
        
        

    
    }else{
     
   header("location: badrequest.php?error=FILE_NOT FOUND_FROM_DATABASE");
    }





}else{
    header("location: badrequest.php?error=UNAUTHORIZED_ACCESS_TO_DOWNLOAD");
}

?>
