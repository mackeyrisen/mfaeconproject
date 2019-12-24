<?php 
ob_start();
require 'dbconfig.php';

if($_GET['id']!=" ")
{
	$query=$conn->query("UPDATE `kruathai_report` SET `place5` =2 WHERE `report_id`='".$_GET['id']."' ");

	if($query=='true')
	{
		header("location:report.php");
	}
	
}

ob_end_flush();
?>