<?php
include 'include/navbar.php';

$msg = '';
if (isset($_POST['add_data'])) {
    $c_name = $_POST['c_name'];
    $c_code = $_POST['c_code'];
    $c_description = $_POST['c_description'];
    $file = $_FILES['c_pic']; //DEAL WITH A FILE...not use post,use $_files

    //print_r($_file); using error found
    $filename = $file['name'];
    $filepath = $file['tmp_name'];
    $fileerror = $file['error'];

    if ($fileerror == 0) {
        $destfile  = '../upload_img/' . $filename;
        move_uploaded_file($filepath, $destfile);
    }

    $sql = "INSERT INTO `course`(`c_name` ,`c_code`,`c_description`, `c_pic`) VALUES ('$c_name', '$c_code','$c_description','$destfile')";
    if (!mysqli_query($con, $sql)) {
        $msg = "Not Inserted";
    } else {
        $msg = "Sucessfully Add ";
    }
}
?>


<form action="" method="POST" enctype="multipart/form-data">
    <div class="contain">
        <h2>Course Detail</h2><br>
        <table align="center" cellpadding="" class="display">
        <tr>
                <th>Course Name:</th>
                <td><input type="text" name="c_name" placeholder="Type Course Name" required></td>
            </tr><tr>
                <th>Course Code:</th>
                <td><input type="text" name="c_code" placeholder="Type Course Code" required></td>
            </tr>
            <tr>
                <th>Description:</th>
                <td><input type="text" name="c_description" placeholder="Type Description" required></td>
            </tr>
            <tr>
                <th>Picture</th>
                <td><input type="file" name="c_pic" required></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="add_data" class="button" value="Add Course"></td>
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