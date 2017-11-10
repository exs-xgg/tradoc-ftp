<!DOCTYPE html>
<html>
<head> 
    <meta charset="utf-8" />
    <link rel="icon" sizes="76x76" href="./assets/img/tradoc_logo.png">
    <link rel="icon" type="image/png" href="./assets/img/tradoc_logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>INVALID REQUEST</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/css/now-ui-kit.css" rel="stylesheet" />
    <link href="./assets/css/msg-css.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="./assets/css/demo.css" rel="stylesheet" />
</head>
<body style="background-color: lightred ">

    
</div>    
    <nav class="navbar navbar-toggleable-md bg-primary fixed-top">
        <div class="container">
            <div class="logo-trad">
                  <a href="index.php" title="Home">
                    <i class=""> <img src="./assets/img/tradoc_logo.png"></i>
                  </a>
            </div>
            <div class="navbar-translate">
                
                <a class="navbar-brand" href="#" >
                    TRADOC-PA Web Portal
                </a>
            </div>
            
        </div>


    </nav>
<div class="space-100"></div>
<h1 align="center">ACCESS DENIED!</h1>
<p align="center">If you think this is a mistake, contact your IT administrator</p>
<?php
if (isset($_REQUEST['error'])){
//GET IP ADDRESS OF MACHINE 
	

	$err= $_REQUEST['error'];
	$ip = getenv('HTTP_CLIENT_IP')?:
	getenv('HTTP_X_FORWARDED_FOR')?:
	getenv('HTTP_X_FORWARDED')?:
	getenv('HTTP_FORWARDED_FOR')?:
	getenv('HTTP_FORWARDED')?:
	getenv('REMOTE_ADDR');
	echo '<div align="center"><h2>'.$ip.'</h2>';
	echo '<i>'.strip_tags($err).'</i><br><br><a class="btn btn-primary" href="index.php">Back to Home</a></div>';
//LOG ERROR ON APACHE SERVER LOGS
// `cat /var/log/httpd/error_log | grep  _ERROR_ `
//	error_log("[ _ERROR_ ]" . $_REQUEST['error'] . " on [" . $ip . "]" . gethostbyaddr($_SERVER['REMOTE_ADDR']), 1);
}
?>

</body>
</html>