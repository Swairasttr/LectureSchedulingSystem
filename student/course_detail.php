<?php
include 'include/navbar.php';
$c_id = $_GET['c_id'];
$q = "SELECT * FROM `course` inner join schedule on course.c_id = schedule.c_id INNER JOIN faculty ON faculty.f_id = schedule.f_id INNER JOIN room on room.r_id = schedule.r_id where course.c_id = '$c_id'";
$result = mysqli_query($con, $q);
?>
<?php 
$msg = '';
if(isset($_POST['submit'])) {
	$st_id = $_POST['st_id'];
	$c_id = $_POST['c_id'];
     $query = "Select * from select_course where c_id = '$c_id' and st_id = '$st_id'";
    $res = mysqli_query($con, $query);
    $check = mysqli_num_rows($res);
    if($check > 0){
        $msg = "You are already enroll this course";
    }else{
	$register = "INSERT INTO `select_course`(`st_id`, `c_id` ) VALUES ('$st_id','$c_id')";
	$reg_query = mysqli_query($con , $register);
		if($reg_query){
			// header("location: index.php");
            $msg =  "Successfully Enrolled";
			}else
            $msg =  "Sorry! the data is not inserted";
            }
        }

?>
<div class="view">
    <?php
    //display query
    while ($res = mysqli_fetch_array($result)) {

    ?>
        <center>
            <h1 class="hss"><?php echo $res['c_name'] ?> Course</h1>
        </center>
        <div class="detail_course">
            <!-- <div class="c_name"><b><?php echo $res['c_name'] ?></b></div>
                        <div class="c_img"><img class="pic_upload" src="<?php echo $res['c_pic']; ?>" alt="">
                            <div class="c_detail"><b>Course Code: </b><?php echo $res['c_code'] ?><br><br>
                                <b>Description: </b> <span class="des"><?php echo $res['c_description'] ?></span>
                            </div>
                        </div>
                        <div class="c_name">
                            <center><b><a href="course_detail.php">Detail</a></b></center>
                        </div> -->
            <div class="left_table">
                <table>
                    <tr>
                        <th>Course Code</th>
                        <td style="text-transform: capitalize;"><?php echo $res['c_code']; ?></td>
                    </tr>
                    <tr>
                        <th>Faculty Name</th>
                        <td style="text-transform: capitalize;"><?php echo $res['f_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Room</th>
                        <td><?php echo $res['r_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Days</th>
                        <td style="text-transform: capitalize;"><?php echo $res['days']; ?></td>
                    </tr>
                    <tr>
                        <th>Timing</th>
                        <td><?php echo $res['starttime']; ?></td>
                    </tr>
                </table>
            </div>
            <div class="right_table">
                <img class="pic_upload" src="<?php echo $res['c_pic']; ?>" alt="">
            </div>
            <div>
                <table style="margin-top: -40px;">
                    <tr>
                        <th>Description</th>
                        <td><?php echo $res['c_description'] ?></td>
                    </tr>
                    <tr><form action="" method="POST">
                        <input type="hidden" name="c_id" value="<?php echo $res['c_id']?>">
                        <input type="hidden" name="st_id" value="<?php echo $st_id; ?>">
                        <td colspan="2"><input type="submit" value="Enroll Now" name="submit" class="enrollment"> </td>
                    </form></tr>
                </table>
                <span style="color : black"><?php echo $msg;?></span>
            </div>
        </div>
</div>
<?php }
?>
</div>
</div>
