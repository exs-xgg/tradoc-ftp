<?php 
include 'functions/crypto.php';
$dd=explode("\n", `cd /home/tradoc; ls`);
foreach($dd as &$v ){
echo '<br>'. $v;
}
echo '<pre>'; print_r($dd);echo '</pre>';
echo json_encode($dd);



$file = $_FILES['filex']['tmp_name'].'<br>';
$prefix_address = "/var/www/html/tradoc-ftp/files/";
if (move_uploaded_file($_FILES['filex']['tmp_name'],$prefix_address . generateRandomString().".anyfuckingfile" )) {
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


    
  
?>
