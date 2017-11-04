
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
                    <li class="nav-item">
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
                        <a class="nav-link" href="#" title="Settings">
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

    <script type="text/javascript">
                    function logout(){
                       var answer = confirm("Logout?");
                        if (answer) {
                            window.location.href = "./logout.php";
                        }
                        else {
                            //some code
                        }
                    }
                </script>
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
          <iframe  src="" id="content1">  </iframe>
    </div>
</div>
<script type="text/javascript">
    function gotouser(){
        document.getElementById('content1').src = "functions/admin/manageusers.php"
    }
    function gotofile(){
        document.getElementById('content1').src = "functions/admin/managefiles.php"
    }
    function gotologs(){
        document.getElementById('content1').src = "functions/admin/viewlogs.php"
    }
    function gotostat(){
        document.getElementById('content1').src = "functions/admin/viewsysstat.php"
    }
</script>
<style type="text/css">
iframe{
    background-color: white;
}
a:hover{
    
        color: white
    
    
}
iframe{
    flex-grow: 1; border: none; margin: 0; padding: 0;
}
.max{
    max-width: 72%;
    min-height: 500px;
    float: right;
    overflow-y: scroll;
    display: flex; width: 100%; height: 100%; flex-direction: column; background-color: blue; overflow: hidden;
}
    .panel{
        max-width: 25%;
        float: left;
        box-shadow: 2px 2px 2px gray;
    }
    .tblcontent:hover{
        color: white;
        background-color: #41533b;
    }
</style>
</body>
</html>