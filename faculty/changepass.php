<?php
include 'include/navbar.php';

$msg = '';
if(isset($_POST['add_data']))
{
	$oldpass =  $_POST['oldpass'];
	$newpass =  $_POST['newpass'];
	$conpass =  $_POST['conpass'];

	$query = "SELECT f_password FROM `faculty` WHERE  f_email = '$f_email'";
	$result = mysqli_query($con , $query);

	while ($row = mysqli_fetch_array($result)) {
		$pass  = $row['f_password'];
		if ($pass ==  $oldpass) {
			
			if ($newpass == $conpass) 
		{
				
				$q = "UPDATE `faculty`  SET `f_password`='$conpass' where f_email = '$f_email'";
				$update = mysqli_query($con , $q);

				if (!mysqli_query($update))
				 {
                    $msg = "Successfully Update Password";
					//header("location: index.php");
				}else
					{
						$msg = "Not Update Password";
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
            <input type="hidden" name="f_id" required value="<?php echo $f_id ?>">
            <tr>
                <td colspan="2"><input type="submit" name="add_data" class="button" value="Update Password"></td>
            </tr>

        </table>
        <span><?php echo $msg; ?></span>
    </div>
</form>
</div>
</body>
