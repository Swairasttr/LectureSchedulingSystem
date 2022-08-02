<?php 
ob_start();
error_reporting();
session_start();
include '../include/config.php';
// using for faculty delete query
$c_id = $_GET['c_id'];
$query = "DELETE FROM course where c_id = '$c_id'";
mysqli_query($con , $query);
header("location: listcourse.php");
?>