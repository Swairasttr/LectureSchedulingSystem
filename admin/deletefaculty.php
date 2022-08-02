<?php 
ob_start();
error_reporting();
session_start();
include '../include/config.php';
// using for faculty delete query
$f_id = $_GET['f_id'];
$query = "DELETE FROM faculty where f_id = '$f_id'";
mysqli_query($con , $query);
header("location: listfaculty.php");
?>