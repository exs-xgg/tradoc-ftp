<?php 
// set up basic connection 
$ftp_server = "192.168.0.18"; 
$conn_id = ftp_connect($ftp_server) or die("Could not connect to $ftp_server"); 

// login with username and password 
$ftp_user_name = "tradoc"; 
$ftp_user_pass = "tradocpassword"; 
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass); 
ftp_pasv($conn_id, true); 
$dirs =  ftp_nlist($conn_id , "/home/tradoc" );
print_r( $dirs);
$dd=explode("\n", `cd /home/tradoc; ls`);
foreach($dd as &$v ){
echo '<br>'. $v;
}
echo '<pre>'; print_r($dd);echo '</pre>';
echo json_encode($dd);



$remote_file = "/var/www/html/tradoc-ftp/login.php";
if (ftp_put($conn_id, $remote_file, $_FILES['filex']['tmp_name'], FTP_BINARY)) {
 echo "successfully uploaded $file\n";
} else {
 echo "There was a problem while uploading $file\n";
}



//check connection 

// 	if (ftp_get($conn_id, "./test.file", "index.php", FTP_BINARY)) {
//     		echo "Successfully written to \n";

    		
// 		} else {
//     		echo "There was a problem\n";}
// if ((!$conn_id) || (!$login_result)) { 
     
// }


    

ftp_close($conn_id);  
?>
