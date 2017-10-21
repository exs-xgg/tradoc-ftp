<?php 
// set up basic connection 
$ftp_server = "192.168.0.14"; 
$conn_id = ftp_connect($ftp_server) or die("Could not connect to $ftp_server"); 

// login with username and password 
$ftp_user_name = "tradoc"; 
$ftp_user_pass = "tradocpassword"; 
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass); 
ftp_pasv($conn_id, true); 
$dirs =  ftp_nlist($conn_id , "/" );
echo $dirs;
//check connection 

// 	if (ftp_get($conn_id, "./test.file", "index.php", FTP_BINARY)) {
//     		echo "Successfully written to \n";

    		
// 		} else {
//     		echo "There was a problem\n";}
// if ((!$conn_id) || (!$login_result)) { 
     
// }


    

ftp_close($conn_id);  
?>