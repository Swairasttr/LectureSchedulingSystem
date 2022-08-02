<?php
session_start();
include '../include/config.php';
$msg = '';
if (isset($_POST['login'])) {
    $a_name = $_POST['a_name'];
    $a_password = $_POST['a_password'];
    $query = "SELECT * FROM `admin` WHERE a_name='$a_name' && a_password='$a_password'";
    $data = mysqli_query($con, $query);
    $total = mysqli_num_rows($data);

    if ($total == 1) {
        $_SESSION['a_name'] = $a_name;
        header("location: index.php");
    } else {
        $msg = "Login Failed";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
<title>Online Lecture Scheduling Application</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body style="  background: url('../img/bg.jpg') fixed center;
    background-size: cover;">
 	<nav>
     <h1>Lecture Scheduling</h1>
    <div class="mid">
	<ul>
		<li><a href="../index.php">Home</a></li>
		<li><a href="../student/register.php">Register</a></li>
		<li><a href="../all_login.php">Login</a></li>
	</ul>
	</div>
	<div class="std_detail">
		<h2>Designed by:</h2>
		<h2>Swaira Sattar(BC170403555)</h2>
	</div>
</nav>

    <body>
        <form action="" method="POST">
            <div class="contain dw">
                <table align="center" cellpadding="7" class="display">
                    <h2>Admin Login</h2>
                    <tr>
                        <td><label>Username</label></td>
                        <td><input type="text" name="a_name" placeholder="Enter Name"  style=" text-transform: none;" class="inputbox" required="required" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td><label>Password</label></td>
                        <td><input type="password" name="a_password" placeholder="Enter Password" class="inputbox emal" required="required"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="login" class="button" value="Login"></td>
                    </tr>

                </table>
                <span><?php echo $msg; ?></span>
            </div>
        </form>
    </body>