<?php
include '../db_con.php';
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
 	
 	<div class="alert alert-info" role="alert">
        <div class="container">
            
            <strong>USERS</strong> 

        </div>
    </div>
    <table class="table">
        <tr><th>Change Roles</th><th>Access Control</th></tr>
        <tr><td>
             <table>
                <tr><th>Username</th><th>Role</th><th>Action</th></tr>
                <form action="goUser.php?action=mod" method="post">
                <tr>
                    <td>
                <select class="form-control" name="uid">
                    <?php 
                        $sql = "SELECT * FROM users where USER_LOCK=0";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<option value="'. $row['USER_ID'] .'">' . $row['USER_NAME']. ' ('. $row['USER_FNAME'] .' ' . $row['USER_LNAME'] . ')</option>';
                            }
                        }

                    ?>
                    
                </select>
                    </td>
                    
                    <td>
                        <select class="form-control" name="role">
                            <option value="1">Staff</option>
                            <option value="2">Admin</option>
                        </select>
                    </td>
                    
                    <td>
                        <input class="btn btn-success" type="submit" name="submit" value="Go">
                    </td>
                </tr>
                </form>
                
            </table>

        </td>
        <td>
            
             <table>
                <tr><th>Username</th><th>Action</th><th</tr>
                <form action="goUser.php?action=lock" method="post">
                <tr>
                    <td>
                <select class="form-control" name="uid">
                    <?php 
                        $sql = "SELECT * FROM users where USER_LOCK=0";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<option value="'. $row['USER_ID'] .'">' . $row['USER_NAME']. ' ('. $row['USER_FNAME'] .' ' . $row['USER_LNAME'] . ')</option>';
                            }
                        }

                    ?>
                </select>
                    </td>
                    
                    <td>
                        <input class="btn btn-danger" type="submit" name="submit" value="Lock">
                    </td>
                </tr>
                </form>
                
            </table>
        </td></tr>
    </table>
    
            <style type="text/css">
                td, th{
                    padding-left: 20px;
                    padding-right: 20px;
                }
            </style>
            <br><hr><br>
    <div class="alert alert-success" role="alert" id="#pending">
        <div class="container">
            
            <strong>PENDING APPROVAL / LOCKED ACCOUNTS</strong> 

        </div>
    </div>
     <table class="table">
            	<tr><th>Username</th><th>First Name</th><th>Last Name</th><th>Office</th><th>Action</th></tr>
                <?php
                    $sql = "SELECT * FROM users inner join office on users.USER_OFC=office.OF_ID where users.USER_LOCK=1";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<form action="goUser.php?action=allow&uid='. $row['USER_ID'] .'" method="post">';
                            echo '<tr><td>' . $row['USER_NAME']. '</td><td>'. $row['USER_FNAME'] .'</td><td>' . $row['USER_LNAME'] . '</td><td>'. $row['OF_NAME'] .'</td><td><input class="btn btn-primary" type="submit" value="Approve"></td></tr></form>';
                        }
                    }

                ?>
                
     </table>
     <div class="alert alert-success" role="alert" id="#pending">
        <div class="container">
            
            <strong></strong> 

        </div>
    </div>
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