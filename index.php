<!DOCTYPE html>
<?php
include('con-db.php');
session_start();
if (!isset($_SESSION['id'])) {
   header("location: ./login.php");
}


?>


