<?php
// error_reporting(0);
ob_start();
session_start();
include '../include/config.php';
if(!isset($_SESSION['f_email']))
	{
		header("Location:login.php");
	}
$userprofile = $_SESSION['f_email'];
$pro = "SELECT * FROM `faculty` WHERE `f_email` = '$userprofile'";
$sql = mysqli_query($con, $pro);
$result = mysqli_fetch_assoc($sql);
$f_name = $result['f_name'];
$f_email = $result['f_email'];
$f_designation = $result['f_designation'];
$f_id = $result['f_id'];

?>
<!DOCTYPE html>
<html>

<head>
<title>Online Lecture Scheduling Application</title>
    <link href="../fonts/css/all.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body style="  background: url('../img/bg.jpg') fixed center;
    background-size: cover;">
    <nav class="stick">
    <h1>Lecture Scheduling</h1>
    <div class="navmid">
        Welcome <?php echo $f_name; ?>
    </div>
        <div class="std_detail">
           <ul>
               <li><a href="../include/logout.php">Logout</a></li>
           </ul>
        </div>
    </nav>
    <div class="sidebar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="course.php">Course List</a></li>
            <li><a href="#" class="pro_btn">Profile</a>
                <span class="fas fa-caret-down second"></span>
                <ul class="pro_show">
                    <li><a href="profileedit.php">Edit Profile</a></li>
                    <li><a href="changepass.php">Change Password</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="main">
    <script>
        $('.sef_btn').click(function() {
            $('.sidebar ul .sef_show').toggleClass("show");
            $('.sidebar ul .first').toggleClass("rotate");
        });
        $('.pro_btn').click(function() {
            $('.sidebar ul .pro_show').toggleClass("show1");
            $('.sidebar ul .second').toggleClass("rotate");
        });
        $('.post_btn').click(function() {
            $('.sidebar ul .post_show').toggleClass("show2");
            $('.sidebar ul .third').toggleClass("rotate");
        });
    </script>
    <body>
