<?php
include 'include/navbar.php';
?>
<?php
$msg = '';
if (isset($_POST['add_data'])) {
    $r_name = $_POST['r_name'];
$query = "Select * from room where r_name = '$r_name'";
    $res = mysqli_query($con, $query);
    $check = mysqli_num_rows($res);
    if($check > 0){
        $msg = "This room is already available";
    }else{
    $sql = "INSERT INTO room (r_name) VALUES ( '$r_name')";

    if (!mysqli_query($con, $sql)) {
        $msg = "Not Inserted";
    } else {
        $msg = "Sucessfully Add ";
    }
}
}
?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="contain">
        <h2>Room Detail</h2><br>
        <table align="center" cellpadding="" class="display">
            <tr>
                <th>Name:</th>
                <td><input type="text" name="r_name" placeholder="Type Room Name" required autocomplete="off"></td>
            </tr>
            
            <tr>
                <td colspan="2"><input type="submit" name="add_data" class="button" value="Add Room"></td>
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