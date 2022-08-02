<?php
include 'include/navbar.php';
$sr = 1;
if (isset($_POST['search'])) {
    $searchKey = $_POST['search'];
    //search query
    $show_op =  "SELECT * FROM course WHERE c_name LIKE '%$searchKey%'";
} else {
    $show_op = "SELECT * FROM course";
    $searchKey = "";
}
$result = mysqli_query($con, $show_op); ?>
<div class="form_list">
    <table class="view_list">
        <tr>
            <td>
                <h2>Course List</h2>
            </td>
            <td>
                <form action="" method="post">
                    <input type="text" name="search" size="50" height="20" placeholder="Search By Course Name.." autocomplete="off" class="search"value="<?php echo $searchKey ?>">
                    <input type="button" name="search" value="Search" class="se_button">
                </form>
            </td>
        </tr>
    </table>

<div class="view" style="margin-top: -0px;">
    <table class="display">
        <tr>
            <th>No.</th>
            <th>Course Name</th>
            <th>Course Code</th>
            <th>Picture</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        <?php
        $total  = mysqli_num_rows($result);
        if ($total > 0) {
            //display query
            while ($res = mysqli_fetch_array($result)) {
            
        ?>
                <tr>
                    <td><?php echo $sr; ?></td>
                    <td style="text-transform: capitalize;"><b><?php echo $res['c_name'] ?></b></td>
                    <td><?php echo $res['c_code'] ?></td>
                    <td><img class="pic_upload" src="<?php echo $res['c_pic']; ?>" alt=""></td>
                    <td style="text-transform: capitalize;"><?php echo $res['c_description'] ?></td>
                    <td><a href="deletecourse.php?c_id=<?php echo $res['c_id']; ?>""> Delete
                    </td>

        <?php
                $sr++;
            }
        } else {
            echo "<tr><td colspan=\"8\" style=\"font-weight:bold; height: 50px; color:red; text-align:center;font-size:24px;\"> No Course Add Yet</td></tr>";
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