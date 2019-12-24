<?php
ob_start();
include 'dbconfig.php';
$status = $_POST['status'];
$id = $_POST['id'];
$year = $_POST['year'];
$sql = "UPDATE `kruathai_report` SET `place5`=$status WHERE `report_id` = '$id'";
$query = $conn->query($sql);

if($query)
{
	header('location:admin_report.php?year='.$year);
}
else{
	echo 'Error: '.$sql;
}

ob_end_flush();
?>