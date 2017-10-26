<?php


/**

NEEDS FURTHER PROCESSING
MISSING: SHELL SCRIPT EXECUTION


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


    $db_file_name = fin(strip_tags($_GET['filex']));

    $sql = "SELECT *, COUNT(*) as ct FROM FILE WHERE F_NAME_SERVER='$db_file_name'";

    $result = $conn->query($sql);

    $rs = $result->fetch_assoc();
    if (($rs['FILE_X'] == 1)) {
        if ($person->$user_role < 3 ) {
            header("location: badrequest.php?error=RESTRICTED_FILE_ACCESS");
        }
    }
    $real_name = $rs['F_NAME_ORIG'];

    if ($rs['ct'] == 1) {
        //DCHECK FOR CROSS COMPATIBILITY
        if (shell_exec("/var/www/html/tradoc-ftp/files/unpack.sh $db_file_name.zst $real_name") == 1) {
            $real_name = "/var/www/html/tradoc-ftp/files/$real_name";
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
                shell_exec("rm -rf /var/www/html/tradoc-ftp/files/temp");
                $uri = strtok($_SERVER['HTTP_REFERER'],'?');
                header("location: ".$uri);
        }else{
            header("location: badrequest.php?error=FILE_NOT_FOUND_ON_SERVER")
        }
        
        }

    
    }else{
        header("location: badrequest.php?error=FILE_NOT FOUND_FROM_DATABASE")
    }





}else{
    header("location: badrequest.php?error=UNAUTHORIZED_ACCESS_TO_DOWNLOAD")
}

?>
