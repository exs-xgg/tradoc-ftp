<?php
session_start();
include 'con-db.php';
$id= $_POST['id'];
$pass= $_POST['pwd'];
$sql = "SELECT * FROM USERS WHERE USER_NAME='$id' AND USER_PW='$pass'";
$result = $conn->query($sql);
 
if (!$row = $result->fetch_assoc()){
    echo '<script language="javascript">';
    echo 'alert("Your username or password is incorrect! Try again.")';
    echo '</script>';
    header("Location: ./login.php");
}    

else{
    $r = $result->fetch_assoc();   
    $_SESSION['id'] = $row['USER_ID'];
    $_SESSION['USER_FNAME'] = $row['USER_FNAME'];
    $_SESSION['USER_LNAME'] = $row['USER_LNAME'];
    echo $_SESSION['USER_FNAME'];
    header("Location: ./profile.php");
}

?>