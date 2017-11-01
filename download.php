<?php

/**
STATUS: READY FOR TESTING ON SERVER

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


    $db_file_name = fin(strip_tags($_REQUEST['filex']));

    $sql = "SELECT *, count(*) as ct FROM file WHERE F_NAME_SERVER='$db_file_name'";

    $result = $conn->query($sql);

    $rs = $result->fetch_assoc();
    if (($rs['FILE_X'] == 1)) {
        if ($person->$user_role < 3 ) {
            header("location: badrequest.php?error=RESTRICTED_FILE_ACCESS");
        }
    }
    $server_file_name = $rs['F_NAME_SERVER'];
  $real_name = $rs['F_NAME_ORIG'];
echo $real_name . "<br>";  
  echo shell_exec("/var/www/html/tradoc-ftp/files/unpack.sh $server_file_name $real_name");
    if ($rs['ct'] == 1) {
        //DCHECK FOR CROSS COMPATIBILITY
        if ( 1 == 1) {
            $real_name = "/var/www/html/tradoc-ftp/files/temp/$real_name";
            if (file_exists($real_name)) {
                set_time_limit(0);
                header('Connection: Keep-Alive');
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="'.basename($real_name).'"');
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                header('Pragma: public');
                header('Content-Length: ' . filesize($real_name));
                ob_clean();
                flush();
                readfile($real_name);
                //shell_exec("rm -rf /var/www/html/tradoc-ftp/files/temp/*");
                $uri = strtok($_SERVER['HTTP_REFERER'],'?');
                header("location: ".$uri);
        }else{
echo $real_name;
//            header("location: badrequest.php?error=FILE_NOT_FOUND_ON_SERVER");
        }
        
        }

    
    }else{
     
   header("location: badrequest.php?error=FILE_NOT FOUND_FROM_DATABASE");
    }





}else{
    header("location: badrequest.php?error=UNAUTHORIZED_ACCESS_TO_DOWNLOAD");
}

?>
