<?php

session_start();
if(!isset($_SESSION['user'])){
  header("location: badrequest.php?error=RESTRICTED_ACCESS");
}
include("../class/userclass.php");
$person = new User;
$person = unserialize($_SESSION['user']);
x_log("access", .$_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI'] ,$person->user_id);

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
            
            <strong>LOGS</strong> 

        </div>
    </div>
    <table class="table">
        <tr><th>User</th><th>Time</th><th>Activity</th></tr>
    
 <?php
include '../db_con.php';
$sql = "SELECT * FROM activity inner join users on users.USER_ID = activity.UID order by TIME DESC limit 30";
$result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<tr><td>'.$row['USER_NAME'].'</td><td>'.$row['TIME'].'</td><td>'.$row['ACT'].'</td></tr>';
        }
    }
 ?>
 </table>
 </body>
 </html>