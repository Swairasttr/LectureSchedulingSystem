<?php
include 'include/navbar.php';

$msg = '';
if (isset($_POST['add_data'])) {
    $f_id = $_POST['f_id'];
    $c_id = $_POST['c_id'];
    $r_id = $_POST['r_id'];
    $days = $_POST['days'];
    $chkstr = implode(",", $days);
    $starttime= $_POST['starttime'];
    $endtime = $_POST['endtime'];

    $existing_Query ="SELECT * FROM `schedule` inner join faculty on schedule.f_id = faculty.f_id inner join room on schedule.r_id = room.r_id inner join course on schedule.c_id = course.c_id WHERE (schedule.starttime = '$starttime') or (schedule.f_id = '$f_id' and schedule.starttime = '$starttime' and schedule.days = '$chkstr') or (schedule.r_id = '$r_id' and  schedule.starttime = '$starttime'and schedule.days = '$chkstr') or (schedule.c_id = '$c_id') or (schedule.r_id = '$r_id' and  schedule.starttime = '$starttime')";
    
	$existing_Result = mysqli_query($con, $existing_Query);
    $total = mysqli_num_rows($existing_Result);
	if($total > 0){
		echo '<script type="text/javascript">
                      alert("Your entry is already in the table/list. please choose another schedule.");
                         window.location="index.php";
                           </script>';
	}
else{
 $sql = "INSERT INTO `schedule`( `f_id`, `c_id`, `r_id`, `days`, `starttime`, `endtime`) VALUES ('$f_id','$c_id','$r_id','$chkstr','$starttime','$endtime')";

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
        <h2>Set Schedule</h2><br>
        <table align="center" cellpadding="" class="display">
            <tr>
                <th>Faculty:</th>
                <td><select name="f_id" id="" class="selt" required>
                    <option value="" selected disabled>Select Faculty</option>
                        <?php
                        $f = "SELECT * FROM FACULTY";
                        $query_f = mysqli_query($con, $f);
                        while ($rowf = mysqli_fetch_array($query_f)) {
                        ?>
                            <option value=<?php echo $rowf['f_id']; ?>><?php echo $rowf['f_name']; ?></option>
                        <?php
                        }
                        ?>
                    </select></td>
            </tr>
            <tr>
                <th>Course:</th>
                <td><select name="c_id" id="" class="selt" required>
                    <option value="" selected disabled>Select Course</option>
                        <?php
                        $c = "SELECT * FROM COURSE";
                        $query_c = mysqli_query($con, $c);
                        while ($rowc = mysqli_fetch_array($query_c)) {
                        ?>
                            <option value=<?php echo $rowc['c_id']; ?>><?php echo $rowc['c_name']; ?></option>
                        <?php
                        }
                        ?>
                    </select></td>
            </tr>
            <tr>
                <th>Room:</th>
                <td><select name="r_id" id="" class="selt" required>
                    <option value="" selected disabled>Select Room</option>
                        <?php
                        $r = "SELECT * FROM room";
                        $query_r = mysqli_query($con, $r);
                        while ($rowr = mysqli_fetch_array($query_r)) {
                        ?>
                            <option value=<?php echo $rowr['r_id']; ?>><?php echo $rowr['r_name']; ?></option>
                        <?php
                        }
                        ?>
                    </select></td>
            </tr>
            <tr>
                <th>Day:</th>
                <td>
                    <div class="weekDays-selector">
                        <input type="checkbox" id="weekday-mon" value="mon" name="days[]" class="weekday" />
                        <label for="weekday-mon">M</label>
                        <input type="checkbox" id="weekday-tue" value="tues" name="days[]" class="weekday" />
                        <label for="weekday-tue">T</label>
                        <input type="checkbox" id="weekday-wed" value="wed" name="days[]" class="weekday" />
                        <label for="weekday-wed">W</label>
                        <input type="checkbox" id="weekday-thu" value="thurs" name="days[]" class="weekday" />
                        <label for="weekday-thu">T</label>
                        <input type="checkbox" id="weekday-fri" value="fri" name="days[]" class="weekday" />
                        <label for="weekday-fri">F</label>
                        <input type="checkbox" id="weekday-sat" value="sat" name="days[]" class="weekday" />
                        <label for="weekday-sat">S</label>
                        <input type="checkbox" id="weekday-sun" value="sun" name="days[]" class="weekday" />
                        <label for="weekday-sun">S</label>
                    </div>
                </td>
            </tr>
            <tr>
                <th>Time start:</th>
                <td><input type="time" name="starttime" placeholder="Type Designation" required></td>
            </tr>
            <tr>
                <th>Time End:</th>
                <td><input type="time" name="endtime" placeholder="Type Designation" required></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="add_data" class="button" value="Set Schedule"></td>
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

    .weekDays-selector input {
        display: none !important;
    }

    .weekDays-selector input[type=checkbox]+label {
        display: inline-block;
        border-radius: 6px;
        background: blue;
        height: 40px;
        width: 60px;
        margin-right: 3px;
        line-height: 40px;
        text-align: center;
        cursor: pointer;
    }

    .weekDays-selector input[type=checkbox]:checked+label {
        background: #2AD705;
        color: #ffffff;
    }
</style>