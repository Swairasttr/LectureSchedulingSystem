<?php
session_start();
include '../include/config.php';
$msg = '';
if(isset($_POST['reg_user'])) {
	$st_name = $_POST['st_name'];
	$st_email = $_POST['st_email'];
	$st_password = $_POST['st_password'];
	$st_birth = $_POST['st_birth'];
	$st_number = $_POST['st_number'];

    // $query = "Select * from register where st_name = '$st_name'";
    // $res = mysqli_query($con, $query);
    // $check = mysqli_num_rows($res);
    // if($check > 0){
    //     $msg = "This username is already available, Please Change username";
    // }else{
	
	$register = "INSERT INTO `student`(`st_name`, `st_password`, `st_email`, `st_number` , `st_birth`  ) VALUES ('$st_name','$st_password','$st_email' , '$st_number' , '$st_birth')";
	$reg_query = mysqli_query($con , $register);
		if($reg_query){
			$_SESSION['st_email']=$st_email;
			header("location: index.php");
            //$msg =  "Successfully Register";
			}else
            $msg =  "Sorry! the data is not inserted";
            }
        // }

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
		<li><a href="register.php">Register</a></li>
		<li><a href="../all_login.php">Login</a></li>
	</ul>
	</div>
	<div class="std_detail">
		<h2>Designed by:</h2>
		<h2>Swaira Sattar(BC170403555)</h2>
	</div>
</nav>
<body  style="  background: url('img/2s.webp') fixed center;
    background-size: cover;">
    <form action="" method="POST">
        <div class="contain dw">
            <table align="center" cellpadding="7" class="display">
                <h2>Registration Form</h2>
                <tr>
                    <td><label>Username</label></td>
                    <td><input type="text" name="st_name" placeholder="Enter Your Name" class="inputbox" required="required" autocomplete="off"></td>
                </tr>
                <tr>
                    <td><label>Email</label></td>
                    <td><input type="email" name="st_email" placeholder="Enter Email" class="inputbox emal" required="required" autocomplete="off"></td>
                </tr>
                <tr>
                    <td><label>Number</label></td>
                    <td><input type="text" name="st_number" placeholder="Enter Your Number" class="inputbox" required="required" autocomplete="off"></td>
                </tr><tr>
                    <td><label>Birth Date</label></td>
                    <td><input type="date" name="st_birth" placeholder="Enter Your Birth Date" class="inputbox" required="required" autocomplete="off"></td>
                </tr>
                <tr>
                    <td><label>Password</label></td>
                    <td><input type="password" name="st_password" placeholder="Enter Password" class="inputbox emal" required="required"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="reg_user" class="button" value="Sign Up"></td>
                </tr>

            </table>
            <span><?php echo $msg;?></span>
        </div>
    </form>
</body>