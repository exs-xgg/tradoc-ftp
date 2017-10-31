<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password,'tradoc');
if ($conn->connect_error) {
    error_log("[ X ] Connection failed: " . $conn->connect_error, 0);
} 



?>