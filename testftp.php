<?php 
// set up basic connection 
$ftp_server = "192.168.1.44"; 
$conn_id = ftp_connect($ftp_server); 

// login with username and password 
$ftp_user_name = "tradoc-server"; 
$ftp_user_pass = "tradocpassword"; 
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass); 
ftp_pasv($conn_id, true); 

//check connection 
if (ftp_get($conn_id, "./test.file", "index.php", FTP_BINARY)) {
    		echo "Successfully written to \n";

    		
		} else {
    		echo "There was a problem\n";}
if ((!$conn_id) || (!$login_result)) { 
     
}
    

ftp_close($conn_id);  
?>