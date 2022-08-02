<?php
include 'include/navbar.php';

$msg = '';
if (isset($_POST['add_data'])) {
    $st_id = $_POST['st_id'];
    $st_name = $_POST['st_name'];
    $st_number = $_POST['st_number'];
    $st_email = $_POST['st_email'];
    $st_birth = $_POST['st_birth'];
        $sql = "UPDATE `student` SET `st_name`='$st_name',`st_email`='$st_email',`st_birth`='$st_birth',`st_number`='$st_number' WHERE `st_id`='$st_id'";

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
                <td><input type="text" name="st_name" required value="<?php echo $st_name ?>" autocomplete="off"></td>
            </tr><tr>
                <th>Number:</th>
                <td><input type="text" name="st_number" required value="<?php echo $st_number ?>" autocomplete="off"></td>
            </tr><tr>
                <th>Email:</th>
                <td><input type="email" name="st_email" style="text-transform: none;" required value="<?php echo $st_email ?>" autocomplete="off"></td>
            </tr><tr>
                <th>Birt hDay:</th>
                <td><input type="date" name="st_birth" required value="<?php echo $st_birth ?>" autocomplete="off"></td>
            </tr>
            <input type="hidden" name="st_id" required value="<?php echo $st_id ?>">
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