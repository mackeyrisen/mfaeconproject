<?php 
session_start();
ob_start();
date_default_timezone_set("Asia/Bangkok");
include ('dbconfig.php');

if($_GET['status']=="1")
	{$sql = "UPDATE `request` SET status ='2' WHERE `request_id` ='".$_GET['id']."'";
$query = $conn->query($sql);}
elseif ($_GET['status']==7) {
	$sql = "UPDATE `request` SET status ='6' WHERE `request_id` ='".$_GET['id']."'";
$query = $conn->query($sql);
}

if($_GET['status2']=="1")
{
$sql2 = "UPDATE `request2` SET status ='2' WHERE `request_id` ='".$_GET['id2']."'";
$query2 = $conn->query($sql2);
}
elseif ($_GET['status2']==7) {
	$sql = "UPDATE `request2` SET status ='6' WHERE `request_id` ='".$_GET['id2']."'";
$query = $conn->query($sql);
}

header("location:confirm.php");


ob_end_flush();

?>