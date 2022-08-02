<?php
// error_reporting(0);
ob_start();
session_start();
include '../include/config.php';
if(!isset($_SESSION['a_name']))
	{
		header("Location:login.php");
	}
$userprofile = $_SESSION['a_name'];
$pro = "SELECT * FROM `admin` WHERE `a_name` = '$userprofile'";
$sql = mysqli_query($con, $pro);
$result = mysqli_fetch_assoc($sql);
$a_name = $result['a_name'];
// $a_id = $result['a_id'];

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
        Welcome <?php echo $a_name; ?>
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
            <li><a href="addfaculty.php">Faculty</a></li>
            <li><a href="addcourse.php" class="pro_btn">Course</a>
            <li><a href="addroom.php" class="pro_btn">Room</a>
            <li><a href="schedule.php" class="pro_btn">Schedule</a>
            <li><a href="#" class="pro_btn">View Lists</a>
                <span class="fas fa-caret-down second"></span>
                <ul class="pro_show">
                    <li><a href="listfaculty.php">Faculty List</a></li>
                    <li><a href="listcourse.php">Course List</a></li>
                    <li><a href="listroom.php">Room List</a></li>
                    <li><a href="liststudent.php">Register Student List</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="main">
    <script>
        $('.sea_btn').click(function() {
            $('.sidebar ul .sea_show').toggleClass("show");
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
