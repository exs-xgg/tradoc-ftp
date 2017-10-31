
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
    <link rel="icon" sizes="76x76" href="./assets/img/tradoc_logo.png">
    <link rel="icon" type="image/png" href="./assets/img/tradoc_logo.png">
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
                        include("functions/class/userclass.php");
                        $person = new User;
                        $person = unserialize($_SESSION['user']);
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
<form action="#">
             <div class="section section-tabs" style="background-color: white">
                <div class="container">
                    <?php if (isset($_REQUEST['q'])) {
                            echo '<p>'. 'Top 20 results returned for keyword "' . $_REQUEST['q'] . '"</p>';
                        }?>
                    <div class="input-group form-group-no-border" >
                        <input class="form-control" type="text" name="q" placeholder="Enter keyword here..." style="font-size: 20px;" <?php if (isset($_REQUEST['q'])) {
                            echo 'value="'. $_REQUEST['q'] . '"';
                        }?>>
                        <span class="input-group-addon" ><button class="btn btn-primary btn-round" type="submit"><i class="now-ui-icons ui-1_zoom-bold"></i>&nbsp;Search</button></span></form>
                        <span class="input-group-addon" ><a class="btn btn-primary btn-round"  href="upload.php"><i class="now-ui-icons arrows-1_share-66"></i>&nbsp;Upload</a></span>
                    </div>
                
                
                </div>
            </div>

            <div id="files" style="padding-left: 5%;padding-right: 5%">
                <table class="table">
                <tr><th>Tracking No.</th><th>Document Name</th><th>Date Uploaded</th><th>Uploaded By</th><th>Uploaded From</th><th width="30%">Document Tags</th></tr>


                <?php 
                if (isset($_REQUEST['q'])) {
                    include 'functions/db_con.php'; 
                    $q = $_REQUEST['q'];
                    $sql = "SELECT * FROM FILE INNER JOIN USERS ON FILE.F_UPLOADER = USERS.USER_ID  INNER JOIN OFFICE ON USERS.USER_OFC = OFFICE.OF_ID where FILE.F_NAME_ORIG like '%$q%' LIMIT 20";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {

                        $tags = json_decode($row["F_TAGS"]);

                        echo '<tr class="tb"  data-toggle="modal" data-target="#m'. $row["F_ID"] .'"><td>' . $row["F_TRACK_NO"]. '</td><td>' .  $row["F_NAME_ORIG"] . "</td><td>" . $row["F_UPLOAD_DATE"] . '</td><td>' . $row["USER_FNAME"]. " ". $row["USER_LNAME"] . '</td><td>'. $row['OF_NAME'] .'</td><td>';
                        $tag_decode = "";
                        for ($i=0; $i < count($tags); $i++) { 
                            $tag_decode .= '<span class="badge badge-primary">' . $tags[$i] . '</span>&nbsp;';
                        }
                        echo $tag_decode;
                        echo '</td></tr>';
                        ?>


            <div class="modal fade" <?php echo 'id="m'.$row["F_ID"].'"'?> tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header justify-content-center">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <i class="now-ui-icons ui-1_simple-remove"></i>
                        </button>
                        <h4 class="title title-up"><?php echo $row["F_NAME_ORIG"];?></h4>
                    </div>
                    <div class="modal-body">
                        <p>Description: <?php echo $row["F_DESC"];?></p>
                        <p>Tracking No: <?php echo $row["F_TRACK_NO"];?></p>
                        <p>Uploader: <?php echo $row["USER_FNAME"]. " ". $row["USER_LNAME"] . ", " .$row['OF_NAME'];?></p>
                        <p>Date Uploaded: <?php echo $row["F_UPLOAD_DATE"];?></p>
                        <p>&nbsp;<?php echo $tag_decode; ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Nice Button</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
             </div>
            </div>

                        <?php 



                    }
                } else {
                   
                }
            $conn->close();



                }
               

                ?>
                

                </table> 
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
        
</html>