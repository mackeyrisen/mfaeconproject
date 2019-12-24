<?php 
date_default_timezone_set("Asia/Bangkok");
session_start();
ob_start();
include ('dbconfig.php');

$id = $_SESSION['user']."_2018"; //0 
$project = $_POST['project']; //1
$project2 = $_POST['project2'];
$project3 = $_POST['project3'];
$project4 = $_POST['project4'];
$project5 = $_POST['project5']; 
$date = $_POST['date']; // 6
$date2 = $_POST['date2'];
$date3 = $_POST['date3'];
$date4 = $_POST['date4'];
$date5 = $_POST['date5'];  
$used = $_POST['used']; // 11
$used2 = $_POST['used2'];
$used3 = $_POST['used3'];
$used4 = $_POST['used4'];
$used5 = $_POST['used5']; 
$guest = $_POST['guest']; //16
$guest2 = $_POST['guest2'];
$guest3 = $_POST['guest3'];
$guest4 = $_POST['guest4'];
$guest5 = $_POST['guest5']; 
$place = $_POST['place']; //21
$place2 = $_POST['place2']; 
$place3 = $_POST['place3']; 
$place4 = $_POST['place4']; 
$place5 = $_POST['place5']; 
$total = $used+$used2+$used3+$used4+$used5 ; //26
$balance = $_POST['budget']-$total; //27
$percent = 100-((($_POST['budget']-$total)/$_POST['budget'])*100); //$_POST['percent']; //28
$a = $_POST['A']; //29
$b = $_POST['B'];
$c = $_POST['C'];
$d = $_POST['D'];
$e = $_POST['E'];
$f = $_POST['F'];
$g = $_POST['G'];
$h = $_POST['H'];
//$date = date("Y-m-d");
$yaer = $current[0];

$sql = "SELECT * FROM kruathai_report WHERE report_id = '".$id."'";
$query = $conn->query($sql);
$result = $query->fetch_array();

if($result[0]==""){

	$save = "INSERT INTO `kruathai_report`(`report_id`, `project`, `project2`, `project3`, `project4`, `project5`, `time`, `time2`, `time3`, `time4`, `time5`, `used`, `used2`, `used3`, `used4`, `used5`, `guest_amount`, `guest_amount2`, `guest_amount3`, `guest_amount4`, `guest_amount5`, `place`, `place2`, `place3`, `place4`, `place5`, `total`, `balance`, `percent`, `A`, `B`, `C`, `D`, `E`, `F`, `G`, `H`) VALUES ('".$id."','".$project."','".$project2."','".$project3."','".$project4."','".$project5."','".$date."','".$date2."','".$date3."','".$date4."','".$date5."','".$used."','".$used2."','".$used3."','".$used4."','".$used5."','".$guest."','".$guest2."','".$guest3."','".$guest4."','".$guest5."','".$place."','".$place2."','".$place3."','".$place4."','1','".$total."','".$balance."','".$percent."','".$a."','".$b."','".$c."','".$d."','".$e."','".$f."','".$g."','".$h."')";
	$conn->query($save);
	echo $save;
}
elseif($result[0]!=""){

	$update = "UPDATE `kruathai_report` SET `project`='".$project."',`project2`='".$project2."',`project3`='".$project3."',`project4`='".$project4."',`project5`='".$project5."',`time`='".$date."',`time2`='".$date2."',`time3`='".$date3."',`time4`='".$date4."',`time5`='".$date5."',`used`='".$used."',`used2`='".$used2."',`used3`='".$used3."',`used4`='".$used4."',`used5`='".$used5."',`guest_amount`='".$guest."',`guest_amount2`='".$guest2."',`guest_amount3`='".$guest3."',`guest_amount4`='".$guest4."',`guest_amount5`='".$guest5."',`place`='".$place."',`place2`='".$place2."',`place3`='".$place3."',`place4`='".$place4."',`total`='".$total."',`balance`='".$balance."',`percent`='".$percent."',`A`='".$a."',`B`='".$b."',`C`='".$c."',`D`='".$d."',`E`='".$e."',`F`='".$f."',`G`='".$g."',`H`='".$h."' WHERE `report_id` ='".$id."'";
	$conn->query($update);
	echo $update;
}
else{
 header("location:report.php");	
}
 header("location:report.php");
 ob_end_flush();
?>