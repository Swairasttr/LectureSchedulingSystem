<?php
include 'include/navbar.php';
$sr = 1;

$show_op = "SELECT * FROM `schedule` inner join faculty on schedule.f_id = faculty.f_id inner join room on schedule.r_id = room.r_id inner join course on schedule.c_id = course.c_id where faculty.f_id = '$f_id'";
$searchKey = "";
$result = mysqli_query($con, $show_op); ?>
<div class="form_list">
    <table class="view_list">
        <tr>
            <td>
                <h2>Schedule List</h2>
            </td>
            <td>
            <a href="download_sch.php?f_id=<?php echo $f_id; ?>"><input type="button" name="search" value="Export" class="sebutton"></a>
            </td>
        </tr>
    </table>

    <div class="view" style="margin-top: -0px; width:100%;">
        <table class="display">
            <tr>
                <th>No.</th>
                <th>Faculty Name</th>
                <th>Room</th>
                <th>Course</th>
                <th>Days</th>
                <th>Time</th>
            </tr>
            <?php
            $total  = mysqli_num_rows($result);
            if ($total > 0) {
                //display query
                while ($res = mysqli_fetch_array($result)) {

            ?>
                    <tr>
                        <td><?php echo $sr; ?></td>
                        <td style="text-transform: capitalize;"><?php echo $res['f_name'] ?></td>
                        <td><?php echo $res['r_name'] ?></td>
                        <td style="text-transform: capitalize;"><?php echo $res['c_name'] ?></td>
                        <td style="text-transform: capitalize;"><?php echo $res['days'] ?></td>
                        <td><?php echo $res['starttime'] ?></td>
                <?php
                    $sr++;
                }
            } else {
                echo "<tr><td colspan=\"8\" style=\"font-weight:bold; height: 50px; color:red; text-align:center;font-size:24px;\"> No Schedule Add Yet</td></tr>";
            }

                ?>
        </table>
    </div>
</div>
</div>
<style>
    td a {
        text-decoration: none;
    }

    td a:hover {
        color: red;
    }
</style>