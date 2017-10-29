<?php
session_start();
if(!isset($_SESSION['user'])){
  header("location: badrequest.php?error=RESTRICTED_ACCESS");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Files</title>
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



<body style="background-color: lightred">
     <nav class="navbar navbar-toggleable-md bg-primary fixed-top">
        <div class="container">
            <div class="navbar-translate">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
                <a class="navbar-brand" href="/index.html" rel="tooltip" >
                    TRADOC-PA Web Portal
                </a>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" >
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="now-ui-icons business_bank"></i>
                            <p>Admin</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./files.php">
                            <i class="now-ui-icons files_paper"></i>
                            <p>Files</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./messages.php">
                            <i class="now-ui-icons ui-1_email-85"></i>
                            <p>Messages</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">
                            <i class="now-ui-icons users_circle-08"></i>
                            <p>Profile</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
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


    <div class="wrapper">

        <div class="space-50">

        </div>
         
    </div>
    <div class="main" >

             <div class="section section-tabs" style="background-color: white">
                <div class="container">
                    <div class="input-group form-group-no-border" >
                        <input class="form-control" type="text" name="keyword" placeholder="Enter keyword here..." style="font-size: 20px;">
                        <span class="input-group-addon" ><button class="btn btn-primary btn-round" onclick=""><i class="now-ui-icons ui-1_zoom-bold"></i>&nbsp;Search</button></span><span class="input-group-addon" ><button class="btn btn-primary btn-round"  data-toggle="modal" data-target="#uploadModal"><i class="now-ui-icons arrows-1_share-66"></i>&nbsp;Upload</button></span>
                    </div>
                
                
                </div>
            </div>

            <div style="padding-left: 5%;padding-right: 5%">
                <table class="table">
                <tr><th>Document ID</th><th>Document Name</th><th>Date Uploaded</th><th>Uploaded By</th><th>Document Tags</th></tr>


                <?php 
                if (isset($_REQUEST['q'])) {
                    include 'functions/db_con.php'; 
                    include 'functions/class/userclass.php';
                    $q = $_REQUEST['q'];
                    $sql = "SELECT * FROM FILE INNER JOIN USERS ON FILE.F_UPLOADER = USERS.USER_ID where FILE.F_NAME_ORIG like '%$q%'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo '<tr class="tb"  data-toggle="modal" data-target="#myModal"><td>' . $row["F_ID"]. '</td><td>' .  $row["F_NAME_ORIG"] . "</td><td>" . $row["F_UPLOAD_DATE"] . '</td><td>' . $row["USER_FNAME"]. " ". $row["USER_LNAME"] . '</td><td>'. $row["F_TAGS"];
                    }
                } else {
                   
                }
            $conn->close();



                }
               

                ?>
                

                </table> 
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
    </div>        
</body>
<style type="text/css">
    .tb:hover{
        background-color: rgba(222, 222, 222, 0.5)
    }
</style>





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
   
</script>
           

<!--UPLOAD DIALOG MODAL-->
           <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
</html>