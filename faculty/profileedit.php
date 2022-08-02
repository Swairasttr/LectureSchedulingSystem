<?php
include 'include/navbar.php';

$msg = '';
if (isset($_POST['add_data'])) {
    $f_id = $_POST['f_id'];
    $f_name = $_POST['f_name'];
    $f_designation = $_POST['f_designation'];
    $f_email = $_POST['f_email'];
        $sql = "UPDATE `faculty` SET `f_name`='$f_name',`f_email`='$f_email',`f_designation`='$f_designation' WHERE `f_id`='$f_id'";

        if (!mysqli_query($con, $sql)) {
            $msg = "Not Updated";
        } else {
            $msg = "Sucessfully Update ";
        }
    }
?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="contain">
        <h2>Edit Profile</h2><br>
        <table align="center" cellpadding="" class="display">
        <tr>
                <th>Name:</th>
                <td><input type="text" name="f_name" required value="<?php echo $f_name ?>" autocomplete="off"></td>
            </tr><tr>
                <th>Number:</th>
                <td><input type="text" name="f_designation" required value="<?php echo $f_designation ?>" autocomplete="off"></td>
            </tr><tr>
                <th>Email:</th>
                <td><input type="email" name="f_email" style="text-transform: none;" required value="<?php echo $f_email ?>" autocomplete="off"></td>
            </tr>
            <input type="hidden" name="f_id" required value="<?php echo $f_id ?>">
            <tr>
                <td colspan="2"><input type="submit" name="add_data" class="button" value="Update Profile"></td>
            </tr>

        </table>
        <span><?php echo $msg; ?></span>
    </div>
</form>
</div>
</body>
<style>
    td a:hover {
        border: 2px solid white;
        padding: 3px;

    }
</style>