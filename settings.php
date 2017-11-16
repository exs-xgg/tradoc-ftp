
<?php  
include('functions/class/userclass.php');
include('functions/crypto.php');
include 'functions/db_con.php';
session_start();
if(!isset($_SESSION['user'])){
  header("location: badrequest.php?error=RESTRICTED_ACCESS");
}

if (isset($_REQUEST['id'])) {
  
} else {

$person = unserialize($_SESSION['user']);

if (isset($_REQUEST['rs'])) {
    ?>
<nav class="navbar fixed-bottom bg-info" id="notif" onclick="$('#notif').hide('slow');">
                            <div class="container">
                                <div class="navbar-translate" data-dismiss="modal">
                                     <a class="navbar-brand" href="#">ACCOUNT CHANGE SUCCESSFUL. Log in again to view changes (click to dismiss notification)</a>
                                </div>
                                <div class="collapse navbar-collapse justify-content-end" id="example-navbar-danger">
                                    
                                </div>
                            </div>
                        </nav>

    <?php
}

x_log("access", $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'] ,$person->user_id);



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
                            <p id="adm">Admin</p>
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
                            <p id="msg">Messages</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php" title="Profile">
                            <i class="now-ui-icons users_circle-08"></i>
                            <p>Profile</p>
                        </a>
                    </li>
                    <li class="nav-item active">
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
   <div class="wrapper"><div class="space-100"></div></div>
   
    <!-- Navbar -->
    <div class="connt">
        <h2 class="head">Edit Account Settings</h2>
        <div class="midform">
            <form class="myform" action="functions/admin/goUser.php?action=mod" method="post">
            <p class="nopad"><b>Username</b></p>
            <input class="myform" type="text" name="uname" value=<?php echo '"'.$person->user_name.'"';?>><br>
            <p class="nopad"><b>Serial Number</b></p>
            <input class="myform" type="text" name="sn" value=<?php echo '"'.$person->user_sn.'"';?>><br>
            <p class="nopad"><b>First Name</b></p>
            <input class="myform" type="text" name="fname" value=<?php echo '"'.$person->user_fname.'"';?>><br>
            <p class="nopad"><b>Last Name</b></p>
            <input class="myform" type="text" name="lname" value=<?php echo '"'.$person->user_lname.'"';?>><br><hr><br>
            <p class="nopad"><b>Current Password</b></p>
            <input class="myform" type="password" name="pw1"><br>
            <p class="nopad"><b>New Password</b></p>
            <input class="myform" type="password" name="pw2"><br>
            <input class="myform" type="password" name="uid" value=<?php echo '"'.$person->user_id.'"';?> hidden>
            

            <p class="nopad"><b>OFFICE ASSIGNED: </b></p><select class="form form-control" name="office">
            <?php
            
            $sql = "SELECT * FROM OFFICE";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {

                        echo '<option value="' . $row['OF_ID'] . '">' . $row['OF_NAME'] .'</option>';
                    }
                }
            ?>
            </select>
            <input class="form form-control" type="submit" name="submit">
        </form>
        </div>
        
    </div>
    
    <style type="text/css">
    .nopad{
        margin-bottom: 0px;
        padding-top: 20px;
    }
    .myform{
         border-color: gray;
         border-width: 2px;
         border-radius: 10px;
         padding: 5px;
         width: 500px
    }
        .form{
            font-size: 15px;
        }
        .connt{
            border-color: black;
            border-width: 5px;
        }
        .midform{ 
            padding-left: 20%;
            padding-right: 20%;
            float: center;
           
        }
    </style>
</body>

<script>
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
        $.ajax({
            url: "functions/ismsg.php",
            success: function(data){
                    if (data != 0) {

                   $('#msg').text("Messages ( "+ data +" )"); 
                    }
                
            }
        });
        $.ajax({
            url: "functions/isadm.php",
            success: function(data){
                if (data.return) {
                    var msga = document.getElementById('adm').value;
                    msga = msga + ' (*)'; 
                }
            }
        });
        
    }, 3000);
    clearTimeout(t);
    
    
    function idleLogout() {
   
    window.onload = resetTimer;
    window.onmousemove = resetTimer;
    window.onmousedown = resetTimer; // catches touchscreen presses
    window.onclick = resetTimer;     // catches touchpad clicks
    window.onscroll = resetTimer;    // catches scrolling with arrow keys
    window.onkeypress = resetTimer;

    
    function resetTimer() {
        clearTimeout(t);
        t = setTimeout(logout,  <?php if ($person->user_role > 2) {
                         ?>90000 );<?php }else{ ?>300000);  <?php }?>
    }
}
idleLogout();
</script>
<!--   Core JS Files   -->
<script src="./assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="./assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="./assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="./assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Share Library etc -->
<script src="./assets/js/plugins/jquery.sharrre.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="./assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>

</html>
