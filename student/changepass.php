<?php
include 'include/navbar.php';

$msg = '';
if(isset($_POST['add_data']))
{
	$oldpass =  $_POST['oldpass'];
	$newpass =  $_POST['newpass'];
	$conpass =  $_POST['conpass'];

	$query = "SELECT st_password FROM `student` WHERE  st_email = '$st_email'";
	$result = mysqli_query($con , $query);

	while ($row = mysqli_fetch_array($result)) {
		$pass  = $row['st_password'];
		if ($pass ==  $oldpass) {
			
			if ($newpass == $conpass) 
		{
				
				$q = "UPDATE `student`  SET `st_password`='$conpass' where st_email = '$st_email'";
				$update = mysqli_query($con , $q);

				if (!mysqli_query($update))
				 {
                    $msg = "Successfully Updated";
					//header("location: index.php");
				}else
					{
						$msg = "Not Updated";
					}
		}
		else
			{ 
                $msg = "Confirm And New Password is not Match";
			}
		}
		else
			{ 
                $msg = "Old password is  wrong";
			}	
	 } 
	}
?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="contain">
        <h2>Change Password</h2><br>
        <table align="center" cellpadding="" class="display">
        <tr>
                <th>Old Password:</th>
                <td><input type="password" name="oldpass" required placeholder="Enter Old Password" autocomplete="off"></td>
            </tr><tr>
                <th>New Password:</th>
                <td><input type="password" name="newpass" required placeholder="Enter New Password" autocomplete="off"></td>
            </tr><tr>
                <th>Confirm Password:</th>
                <td><input type="password" name="conpass" required placeholder="Enter Confirm Password" autocomplete="off"></td>
            </tr>
            <input type="hidden" name="st_id" required value="<?php echo $st_id ?>">
            <tr>
                <td colspan="2"><input type="submit" name="add_data" class="button" value="Update Password"></td>
            </tr>

        </table>
        <span><?php echo $msg; ?></span>
    </div>
</form>
</div>
</body>
