<?php

session_start();
if(!isset($_SESSION['user'])){
  header("location: badrequest.php?error=RESTRICTED_ACCESS");
}
include("../class/userclass.php");
$person = new User;
    $person = unserialize($_SESSION['user']);
    if ($person->user_role < 2) {
        header("location: badrequest.php?error=RESTRICTED_ACCESS");
    }


  ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<link rel="icon" sizes="76x76" href="../../assets/img/tradoc_logo.png">
    <link rel="icon" type="image/png" href="../../assets/img/tradoc_logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../../assets/css/now-ui-kit.css" rel="stylesheet" />
    <link href="../../assets/css/msg-css.css" rel="stylesheet" />
 <body>
 	<a href="#pending" class="btn btn-primary" style="color: white;">View Pending Account Requests</a>&nbsp;<a href="#" class="btn btn-info" style="color: white;">Modify Users</a>&nbsp;<a href="#" class="btn btn-success" style="color: white;">Who's online?</a>
 	<br><br>
 	<div class="alert alert-info" role="alert">
        <div class="container">
            
            <strong>USERS</strong> 

        </div>
    </div>
     <table class="table">
            	<tr><th>UID</th><th>Username</th><th>First Name</th><th>Last Name</th><th>Role</th><th>Office</th></tr>
            	<form action="#" method="post"><tr><td><input type="text" name="uid" value="9231" readonly  width="50px"></td><td><input type="text" name="uid" value="9231" readonly></td><td><input type="text" name="uid" value="9231" readonly></td><td><input type="text" name="uid" value="9231" readonly></td><td><input type="text" name="uid" value="9231" readonly></td><td><input type="text" name="uid" value="9231" readonly></td></tr></form>
            </table>
    <div class="alert alert-success" role="alert" id="#pending">
        <div class="container">
            
            <strong>PENDING APPROVAL</strong> 

        </div>
    </div>
     <table class="table">
            	<tr><th>UID</th><th>Username</th><th>First Name</th><th>Last Name</th><th>Role</th><th>Office</th></tr>
            	<form action="#" method="post"><tr><td><input type="text" name="uid" value="9231" readonly  width="50px"></td><td><input type="text" name="uid" value="9231" readonly></td><td><input type="text" name="uid" value="9231" readonly></td><td><input type="text" name="uid" value="9231" readonly></td><td><input type="text" name="uid" value="9231" readonly></td><td><input type="text" name="uid" value="9231" readonly></td></tr></form>
            </table>
 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
 
 </body>




 </html>