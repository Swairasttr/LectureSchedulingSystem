<?php
require('../vendor/autoload.php');
ob_start();
session_start();
include '../include/config.php';
$f_id = $_GET['f_id'];
$sr = 1;
$res=mysqli_query($con,"SELECT * FROM `schedule` inner join faculty on schedule.f_id = faculty.f_id inner join room on schedule.r_id = room.r_id inner join course on schedule.c_id = course.c_id where faculty.f_id = '$f_id'");

if(mysqli_num_rows($res)>0){
    $html= '<style>h1{text-transform: capitalize;letter-spacing: 1.2px; color: #273746;text-align: center;}</style><center><h1> Lecture Scheduling</h1></center>';
	$html.='<style>.table{ width: 100%;margin: auto; padding: 10px; border:2px solid  #273746;}</style><table class="table" border="1px" cellspacing="0" cellpadding="3"}>';
		$html.='<style> .tr{background: #212F3D}.th{padding: 10px;color: white;text-align: center;
    font-size: 16px;}</style><tr class="tr"><th class="th">Sr.</th><th class="th">Faculty Name</th><th class="th">Room</th><th class="th">Course</th><th class="th">Days</th><th class="th">Timing</th></tr>';
		while($row=mysqli_fetch_assoc($res)){
			$html.='<style>.td{ padding: 10px;text-transform: capitalize; text-align: center;color: black; border: 2px solid black;}</style><tr><td class="td">'.$sr.'</td><td class="td">'.$row['f_name'].'</td><td class="td">'.$row['r_name'].'</td><td class="td">'.$row['c_name'].'</td><td class="td">'.$row['days'].'</td><td class="td">'.$row['starttime'].'</td></tr>';
            $sr++;
        }
    } else {
        $html= '<style>h1{text-transform: capitalize;letter-spacing: 1.2px; color: #273746;text-align: center;}</style><center><h1> Lecture Scheduling</h1></center>';
        $html.='<style>.table{ width: 100%;margin: auto; padding: 10px; border:2px solid  #273746;}</style><table class="table" border="1px" cellspacing="0" cellpadding="3"}>';
            $html.='<style> .tr{background: #212F3D}.th{padding: 10px;color: white;text-align: center;
        font-size: 16px;}</style><tr class="tr"><th class="th">Sr.</th><th class="th">Faculty Name</th><th class="th">Room</th><th class="th">Course</th><th class="th">Days</th><th class="th">Timing</th></tr>';
        $html.='<style>.td{font-weight:bold; height: 50px; color:red; text-align:center;font-size:24px;}</style><tr><td colspan="8" class="td"> No Schedule Set Yet</td></tr>';
    }
	$html.='</table>';
$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file='lecture/'.time().'.pdf';
$mpdf->output($file,'D');
//D
//I
//F
//S
?>