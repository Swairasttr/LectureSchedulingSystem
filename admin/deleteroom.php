<?php 
ob_start();
error_reporting();
session_start();
include '../include/config.php';
// using for room delete query
$r_id = $_GET['r_id'];
$query = "DELETE FROM room where r_id = '$r_id'";
mysqli_query($con , $query);
header("location: listroom.php");
?>