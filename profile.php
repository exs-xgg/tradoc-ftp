
<?php  
include('functions/crypto.php');
include('functions/db_con.php');
include('functions/class/userclass.php');
session_start();
if(!isset($_SESSION['user'])){
  header("location: badrequest.php?error=RESTRICTED_ACCESS");
}

if (isset($_REQUEST['id'])) {
  # code to view other person's profle
} else {

$person = unserialize($_SESSION['user']);




//NOTES:
/*

I THINK WE SHOULD GET THE INITIAL PROFILE DATA FIRST, AND THEN TIMELINE INFO VIA AJAX 
TO LESSEN THE LOADING TIME OF THE PAGE

**/



}


?>
<!DOCTYPE html>
<html lang="en">
<head>    
    <meta charset="utf-8" />
    <link rel="icon" sizes="76x76" href="./assets/img/tradoc_logo.png">
    <link rel="icon" type="image/png" href="./assets/img/tradoc_logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title id=" "><?php  echo $person->user_fname . " " . $person->user_lname ?></title>
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
<body class="profile-page sidebar-collapse">
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
                <a class="navbar-brand" href="/index.html" >
                    TRADOC-PA Web Portal
                </a>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" >
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <?php 
                        if ($person->user_role > 2) {
                         ?>
<a class="nav-link" href="admin.php" title="Admin">
                            <i class="now-ui-icons business_bank"></i>
                            <p>Admin</p>
                        </a>

                         <?php 
                        }
                        ?>
                        
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
   <div class="wrapper"><div class="space-50"></div></div>
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
    <!-- Navbar -->

    <div class="wrapper">
        <div class="page-header page-header-small" filter-color="orange">
            <div class="page-header-image" data-parallax="true" style="background-image: url('./assets/img/bg1.jpg');"></div>
            <div class="container">
                <div class="content-center">
                    <div class="photo-container">
                        <img src="sheri.jpg" alt="">
                    </div>
                    <h3 class="profileid title">Sheribels</h3> <!--return the profile details here-->
                    <p class="category">G6 Office</p>
                     
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="button-container">
                    
                    <a href="messages.php" class="btn btn-default btn-round btn-lg btn-icon" rel="tooltip" title="Send me a message.">
                        <i class="now-ui-icons ui-1_send"></i>
                    </a>

                </div>
                <h3 class="title">About me</h3>
                <h5 class="description">Some details here</h5>
        </div>        
            </div>
        <div class="profilepane">
                <div class="pane1">
                    <div class="pinnedfiles">
                        <div ><h4 >Pinned Files &nbsp; </h4></div>
                        <div id ="pinnedfiles" style="padding-left: 3%;padding-right: 3%; text-align: left;">
                            <table class="table" >
                            <tbody>
                                <tr><th>Document ID</th><th>Document Name</th><th>Date Uploaded</th><th>Uploaded By</th><th>Document Tags</th></tr>
                                <tr class="tb" data-toggle="modal" data-target="#myModal"><td>43248</td><td>Test File.docx</td><td>10/17/2017 7:53PM</td><td>Corporal Sherry Rigor</td><td>file, test file, tradoc, alligator</td></tr>
                            </tbody>
                            </table>
                        </div>
             
                    </div>
                </div>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                        </button>
                        <h4 class="title title-up">43248 - Test File.docx</h4>
                    </div>
                    <div class="modal-body">
                        <p>Description: This file contains porn</p>
                        <p>ID: 43248</p>
                        <p>Uploader: Corporal Sherry Rigor</p>
                        <p>Date Uploaded: 10/17/2017 7:53PM</p>
                        <p>&nbsp;<span class="badge badge-primary">file</span>&nbsp;<span class="badge badge-primary">test file</span>&nbsp;<span class="badge badge-primary">tradoc</span>&nbsp;<span class="badge badge-primary">alligator</span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Nice Button</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
             </div>
            </div>

                
                <!--<div class="pane2">
                  <div ><h4 >Timeline &nbsp;</h4></div>
                  <div style="padding-left: 3%;padding-right: 3%; text-align: left;">
                  <table class="table" >
                        <tbody>
                            <tr><th>File ID</th><th>Name</th><th>Uploader</th><th>Date</th><th>Metatags</th></tr>
                            <tr><td>43248</td><td>Test File.docx</td><td>Juan Luna</td><td>10/17/2017 7:53PM</td><td>Test File.docx</td>
                            </tr>
                        </tbody>
                        </table>
                  </div>      
                </div>

              </div>  -->
        </div>
    </div>
    
    </div>    
    <div class="navbottom">
      <a href="bop2.php"  rel="tooltip" title="Upload a new File?">
        <i class="now-ui-icons files_paper"></i>
      </a>
    </div>
    
</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="../assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Share Library etc -->
<script src="../assets/js/plugins/jquery.sharrre.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>

</html>
