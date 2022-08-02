<?php
include 'include/navbar.php';
$sr = 1;
if (isset($_POST['search'])) {
    $searchKey = $_POST['search'];
    //search query
    $show_op =  "SELECT * FROM `course` inner join schedule on course.c_id = schedule.c_id INNER JOIN faculty ON faculty.f_id = schedule.f_id INNER JOIN room on room.r_id = schedule.r_id  WHERE c_name LIKE '%$searchKey%'";
} else {
    $show_op = "SELECT * FROM `course` inner join schedule on course.c_id = schedule.c_id INNER JOIN faculty ON faculty.f_id = schedule.f_id INNER JOIN room on room.r_id = schedule.r_id ";
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
                    <input type="text" name="search" size="50" height="20" placeholder="Search By Course Name.." autocomplete="off" class="search" value="<?php echo $searchKey ?>">
                    <input type="button" name="search" value="Search" class="se_button">
                </form>
            </td>
        </tr>
    </table>

    <div class="view" style="margin-top: 50px;">
        <?php
        $total  = mysqli_num_rows($result);
        if ($total > 0) {
            //display query
            while ($res = mysqli_fetch_array($result)) {

        ?>
                <div class="card_course">
                    <div class="c_name"><b><?php echo $res['c_name'] ?></b></div>
                    <div class="c_img"><img class="pic_upload" src="<?php echo $res['c_pic']; ?>" alt="">
                        <div class="c_detail"><b>Course Code: </b><?php echo $res['c_code'] ?><br><br>
                            <b>Description: </b> <span class="des"><?php echo $res['c_description'] ?></span>
                        </div>
                    </div>
                    <div class="c_name"><center><b><a href="course_detail.php?c_id=<?php echo $res['c_id']?>">Detail</a></b></center></div>
                </div>

        <?php
                $sr++;
            }
        } else {
            echo "<tr><td colspan=\"8\" style=\"font-weight:bold; height: 50px; color:red; text-align:center;font-size:24px;\"> No Course Added Yet</td></tr>";
        }

        ?>
    </div>
</div>
</div>