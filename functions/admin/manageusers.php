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
<script type="text/javascript">
    parent.iframeLoaded();
</script>

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
      <tr><th>User SN</th><th>Username</th><th>Name</th><th>Office</th><th>Privilege</th><th>Status</th><th>Action</th></tr>
      <?php 
                        $sql = "SELECT * FROM users inner join office on users.USER_OFC=office.OF_ID inner join role on users.ROLE_ID=role.ROLE_ID";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<tr><td>'. $row['USER_SN'].'</td><td>'.$row['USER_NAME'].'</td><td>'.$row['USER_LNAME'].', '.$row['USER_FNAME'].'</td><td>'.$row['OF_NAME'].'</td><td>';
                                if($row['ROLE_NAME']>=2){
                                    echo 'ADMIN</td><td';
                                }else{
                                    echo 'STAFF</td><td';
                                }

                                if($row['USER_LOCK']==1){
                                   echo  ' style="color:red;font-weight:bold">LOCKED</td><td><a href="goUser.php?action=allow&uid='. $row['USER_ID'] .'" class="btn btn-success">ALLOW</a>';
                                }else{
                                     echo  ' style="color:green;font-weight:bold">ALLOWED</td><td><a href="goUser.php?action=lock&uid='. $row['USER_ID'] .'" class="btn btn-danger">LOCK</a>';
                                }
                                echo ' <a class="btn btn-default" href="resetpw.php?uid='. $row['USER_ID'] .'">Reset PW</a></td></tr>';
                            }
                        }

                    ?>
    </table>
    
            <style type="text/css">
                td, th{
                    padding-left: 20px;
                    padding-right: 20px;
                }
            </style>
    <div class="alert alert-primary" role="alert" id="#pending">
        <div class="container">
            
            <strong>PENDING APPROVAL</strong> 

        </div>
    </div>
     <table class="table">
                <tr><th>SN</th><th>Username</th><th>First Name</th><th>Last Name</th><th>Office</th><th>Action</th></tr>
                <?php
                    $sql = "SELECT * FROM users inner join office on users.USER_OFC=office.OF_ID where users.USER_LOCK=3";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '';
                            echo '<tr><td>' . $row['USER_SN']. '</td><td>' . $row['USER_NAME']. '</td><td>'. $row['USER_FNAME'] .'</td><td>' . $row['USER_LNAME'] . '</td><td>'. $row['OF_NAME'] .'</td><td><form action="goUser.php?action=allow&uid='. $row['USER_ID'] .'" method="post"><input class="btn btn-primary" type="submit" value="Approve"></form></td></tr>';
                        }
                    }

                ?>
                
     </table>
     
    <div class="alert alert-success" role="alert" id="#pending">
        <div class="container">
            
            <strong>CHANGE PRIVILEGE</strong> 

        </div>
    </div>
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
                            <option value="3">Admin</option>
                        </select>
                    </td>
                    
                    <td>
                        <input class="btn btn-success" type="submit" name="submit" value="Go">
                    </td>
                </tr>
                </form>
                
            </table>
     
 <p><br><br></p>
 </body>



<style type="text/css">
    tr:nth-child(odd){
        background-color: #f0f0f0;
    }
</style>
 </html>