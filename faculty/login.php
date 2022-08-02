<?php
session_start();
include '../include/config.php';
$msg = '';
if (isset($_POST['login'])) {
    $f_email = $_POST['f_email'];
    $f_password = $_POST['f_password'];
    $query = "SELECT * FROM `faculty` WHERE f_email='$f_email' && f_password='$f_password'";
    $data = mysqli_query($con, $query);
    $total = mysqli_num_rows($data);

    if ($total == 1) {
        $_SESSION['f_email'] = $f_email;
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
                    <h2>Faculty Login</h2>
                    <tr>
                        <td><label>Email</label></td>
                        <td><input type="text" name="f_email" placeholder="Enter Email"   style=" text-transform: none;" class="inputbox" required="required" autocomplete="off"></td>
                    </tr>
                    <tr>
                        <td><label>Password</label></td>
                        <td><input type="password" name="f_password" placeholder="Enter Password" class="inputbox emal" required="required"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="login" class="button" value="Login"></td>
                    </tr>

                </table>
                <span><?php echo $msg; ?></span>
            </div>
        </form>
    </body>