<?php 
ob_start();
include 'dbconfig.php';
$status = $_POST['status'];
$id = $_POST['id'];
$user = $_POST['user'];

if($status == 7)
{
	$query ="INSERT INTO `halal_backup`(`request_id`, `project`, `type`, `organize`, `budget`, `type_budget`, `activity`, `produce`, `plan`, `A`, `B`, `C`, `D`, `E`, `F`, `G`, `H`, `I`, `status`, `date`, `year`)
SELECT `request_id`, `project`, `type`, `organize`, `budget`, `type_budget`, `activity`, `produce`, `plan`, `A`, `B`, `C`, `D`, `E`, `F`, `G`, `H`, `I`, `status`, `date`, `year` FROM request2 WHERE request_id = '".$id."'";
  	$conn->query($query);

  	echo $query;
}

$sql = "UPDATE `request2` SET `status`='".$status."' WHERE `request_id` ='".$id."'";
$conn->query($sql);

if($user!="")
{
	header("location:halal_view.php?id=".$id."&user=".$user); 
}
else
{
	header("location:admin_progress2.php#nav-profile");
	//echo $sql ;
}
ob_end_flush();
?>