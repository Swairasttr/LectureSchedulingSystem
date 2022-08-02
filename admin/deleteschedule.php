<?php 
ob_start();
error_reporting();
session_start();
include '../include/config.php';
// using for schedule delete query
$s_id = $_GET['s_id'];
$query = "DELETE FROM schedule where s_id = '$s_id'";
mysqli_query($con , $query);
header("location: schedule.php");
?>