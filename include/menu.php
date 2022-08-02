<?php
error_reporting(0);
ob_start();
session_start();
include 'include/config.php';
if (!isset($_SESSION['u_email'])) {
    header("Location: login.php");
}
else{
$userprofile = $_SESSION['u_email'];
$pro = "SELECT * FROM `register` WHERE `u_email` = '$userprofile'";
$sql = mysqli_query($con, $pro);
$result = mysqli_fetch_assoc($sql);
$u_name = $result['u_name'];
$u_id = $result['u_id'];
$u_email = $result['u_email'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Faculty Info</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body
style="  background: url('img/bg.jpg') fixed center;
    background-size: cover;">
    <nav>
        <h1>Online Faculty Info</h1>
        <div class="std_detail">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="#">Add Detail</a>
            <ul>
                <li><a href="add_detail.php">Personal Detail</a></li>
                <li><a href="qualification_add.php">Add Qualification Detail</a></li>
                <li><a href="qualification_update.php"> Update Qualification Detail</a></li>
            </ul></li>
                <li><a href="edit_profile.php">Edit Profile</a></li>
                <li><a href="include/logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
