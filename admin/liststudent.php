<?php
include 'include/navbar.php';
$sr = 1;
if (isset($_POST['search'])) {
    $searchKey = $_POST['search'];
    //search query
    $show_op =  "SELECT * FROM student WHERE st_name LIKE '%$searchKey%'";
} else {
    $show_op = "SELECT * FROM student";
    $searchKey = "";
}
$result = mysqli_query($con, $show_op); ?>
<div class="form_list">
    <table class="view_list">
        <tr>
            <td>
                <h2>Student List</h2>
            </td>
            <td>
                <form action="" method="post">
                    <input type="text" name="search" size="50" height="20" placeholder="Search By Name " autocomplete="off" class="search"value="<?php echo $searchKey ?>">
                    <input type="button" name="search" value="Search" class="se_button">
                </form>
            </td>
        </tr>
    </table>

<div class="view" style="margin-top: -0px; width:100%;">
    <table class="display">
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Password</th>
            <th>Email</th>
            <th>Birthday</th>
        </tr>
        <?php
        $total  = mysqli_num_rows($result);
        if ($total > 0) {
            //display query
            while ($res = mysqli_fetch_array($result)) {
            
        ?>
                <tr>
                    <td><?php echo $sr; ?></td>
                    <td style="text-transform: capitalize;"><b><?php echo $res['st_name'] ?></b></td>
                    <td style="text-transform: capitalize;"><?php echo $res['st_number'] ?></td>
                    <td><?php echo $res['st_password'] ?></td>
                    <td><?php echo $res['st_email'] ?></td>
                    <td><?php echo $res['st_birth'] ?></td>

        <?php
                $sr++;
            }
        } else {
            echo "<tr><td colspan=\"8\" style=\"font-weight:bold; height: 50px; color:red; text-align:center;font-size:24px;\"> No Student Register Yet</td></tr>";
        }

        ?>
    </table>
</div></div>
</div>
<style>
    td a{
        text-decoration: none;
    }
    td a:hover{
        color: red;
    }
</style>