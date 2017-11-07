<?php
include 'db_con.php';
session_start();
if(!isset($_SESSION['user'])){
  header("location: ../badrequest.php?error=RESTRICTED_ACCESS");
}
include("class/userclass.php");
$person = new User;
$person = unserialize($_SESSION['user']);
if (isset($_REQUEST['r'])) {
    $r = $_REQUEST['r'];
}
$sql = "SELECT USER_ID FROM users where USER_NAME='$r';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $r_id = $row['USER_ID'];

    }
}

  ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<link rel="icon" sizes="76x76" href="../assets/img/tradoc_logo.png">
    <link rel="icon" type="image/png" href="../assets/img/tradoc_logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-kit.css" rel="stylesheet" />
    <link href="../assets/css/msg-css.css" rel="stylesheet" />
</head>
 <body>

<?php
$sql = "SELECT * FROM messages INNER JOIN users on messages.M_RCVR=users.USER_ID WHERE (M_RCVR=$person->user_id) and (M_SENDER=$r_id) or (M_RCVR=$r_id and M_SENDER=$person->user_id) order by M_ID ASC";
$result1 = $conn->query($sql);
if ($result1->num_rows > 0) {
while($row = $result1->fetch_assoc()) {
    if ($row['M_SENDER']==$r_id) {
        echo '<p><b>'.$r."</b> (".$row['M_TIME']."):&nbsp;&nbsp;&nbsp;&nbsp;".$row['M_MSG']. '</p><br>';
    }else{
        echo "<p><b>You</b> (".$row['M_TIME']."):&nbsp;&nbsp;&nbsp;&nbsp;".$row['M_MSG']. '</p><br>';
        
    }
    }
}
?>
<p id="bot"></p>
</body>
<script type="text/javascript">
  
   window.scrollTo(0,document.body.scrollHeight);

</script>
</html>