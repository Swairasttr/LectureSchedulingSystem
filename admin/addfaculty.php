<?php
include 'include/navbar.php';
?>
<?php
$msg = '';
if (isset($_POST['add_data'])) {
    $f_name = $_POST['f_name'];
    $f_email = $_POST['f_email'];
    $f_designation = $_POST['f_designation'];
    $string = "abcdefghijklmanopqrstuvwxyzACDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    //syntax -  substr (string, start, length)
    $f_password = substr(str_shuffle($string), 0, 6);

    $sql = "INSERT INTO faculty (f_name, f_email , f_designation , f_password ) VALUES ( '$f_name','$f_email' , '$f_designation' , '$f_password' )";

    if (!mysqli_query($con, $sql)) {
        $msg = "Not Inserted";
    } else {
        $msg = "Sucessfully Add ";
    }
}
?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="contain">
        <h2>Faculty Detail</h2><br>
        <table align="center" cellpadding="" class="display">
            <tr>
                <th>Name:</th>
                <td><input type="text" name="f_name" placeholder="Type Faculty Name" required></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><input type="text" name="f_email" placeholder="Type Email" required></td>
            </tr>
            <tr>
                <th>Designation:</th>
                <td><input type="text" name="f_designation" placeholder="Type Designation" required></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="add_data" class="button" value="Add Faculty"></td>
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