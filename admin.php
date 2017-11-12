
<?php
session_start();
if(!isset($_SESSION['user'])){
  header("location: badrequest.php?error=RESTRICTED_ACCESS");
}
include("functions/class/userclass.php");
$person = new User;
$person = unserialize($_SESSION['user']);
if ($person->user_role < 2) {
    header("location: badrequest.php?error=RESTRICTED_ACCESS");
}
x_log("access", .$_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'] ,$person->user_id);

    
?>

<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="utf-8" />
    <link rel="icon" sizes="76x76" href="./assets/img/tradoc_logo.png">
    <link rel="icon" type="image/png" href="./assets/img/tradoc_logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Admin</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/css/now-ui-kit.css" rel="stylesheet" />
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
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
                <a class="navbar-brand" href="#" >
                    TRADOC-PA Web Portal
                </a>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" >
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#" title="Admin">
                            <i class="now-ui-icons business_bank"></i>
                            <p>Admin</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./files.php" title="Files">
                            <i class="now-ui-icons files_paper"></i>
                            <p>Files</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./messages.php" title="Messages">
                            <i class="now-ui-icons ui-1_email-85"></i>
                            <p>Messages</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php" title="Profile">
                            <i class="now-ui-icons users_circle-08"></i>
                            <p>Profile</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="settings.php" title="Settings">
                            <i class="now-ui-icons ui-1_settings-gear-63"></i>
                            <p>Settings</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="logout();">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                            <p>Log Out</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    
   <!-- End Navbar -->
   <div class="space-50"></div>
<div class="main">
    <div class="panel">
    <div class="container">
       <table class="table">
            <tr><th>Menu</th></tr>
            <tr class="tblcontent" onclick="gotouser()"><td>Manage Users</td></tr>
            <tr class="tblcontent" onclick="gotofile()"><td>Manage Files</td></tr>
            <tr class="tblcontent" onclick="gotologs()"><td>View Logs</td></tr>
            <tr class="tblcontent" onclick="gotostat()"><td>View System Status</td></tr>
        </table>
    </div>
    </div>
    <div class="max">
          <iframe  src="" id="content1" onload="resizeIframe(this)" scrolling="no">  </iframe>
    </div>
</div>
<script type="text/javascript">
    function gotouser(){
        document.getElementById('content1').src = "functions/admin/manageusers.php";
    }
    function gotofile(){
        document.getElementById('content1').src = "functions/admin/managefiles.php";
    }
    function gotologs(){
        document.getElementById('content1').src = "functions/admin/viewlogs.php";
    }
    function gotostat(){
        document.getElementById('content1').src = "functions/admin/viewsysstat.php";
    }
    
  function resizeIframe(iframe) {
    iframe.height = iframe.contentWindow.document.body.scrollHeight + "px";
  }
</script>
<style type="text/css">
a:hover{
    
        color: white
    
    
}
iframe{
    flex-grow: 1; margin: 0; padding: 0;background-color: white;
}
.max{
    max-width: 84%;
    min-height: 500px;
    float: right;
    display: flex; width: 100%; height: 100%; flex-direction: column;
}
    .panel{
        max-width: 15%;
        float: left;
        min-height: 100%;
    }
    .tblcontent:hover{
        color: white;
        background-color: #41533b;
    }
</style>
</body>
<script src="./assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="./assets/js/core/tether.min.js" type="text/javascript"></script>
<script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="./assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="./assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="./assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="./assets/js/now-ui-kit.js" type="text/javascript"></script>
<script type="text/javascript">
    var t;

function logout() {
        window.location.href = 'logout.php';
    }

    setInterval(function(){
        $.ajax({
            url: "functions/amilocked.php",
            dataType: 'json',
            success: function(data) {
                if (data.return) {
                    logout();
                } else {
                    //alert("return is false");
                }
            }
        });
        
    }, 3000);
    clearTimeout(t);
    
     window.onerror = function(message, url, lineNumber) {  
        // code to execute on an error  
        return true; // prevents browser error messages  
    };
    function idleLogout() {
   
    window.onload = resetTimer;
    window.onmousemove = resetTimer;
    window.onmousedown = resetTimer; // catches touchscreen presses
    window.onclick = resetTimer;     // catches touchpad clicks
    window.onscroll = resetTimer;    // catches scrolling with arrow keys
    window.onkeypress = resetTimer;

    
    function resetTimer() {
        clearTimeout(t);
        t = setTimeout(logout,  60000);
    }
}
idleLogout();
</script>
</html>