<?php 
date_default_timezone_set("Asia/Bangkok");
session_start();
ob_start();
include ('dbconfig.php');

$id = $_SESSION['user']."_".$current[0];
$project = $_POST['projname'];
$typepro = $_POST['typepro'];
$org = $_POST['org'];
$budget = $_POST['budget'];
$type = $_POST['type'];
$activity = $_POST['activity'];
$produce = $_POST['produce'];
$plan = $_POST['plan'];
$a = $_POST['principle'];
$b = $_POST['object'];
$c = $_POST['location'];
$d = $_POST['target'];
$e = $_POST['method'];
$f = $_POST['duration'];
$g = $_POST['pay'];
$h = $_POST['recieve'];
$i = $_POST['pass'];
$date = date("Y-m-d");
$yaer = $current[0];

$sql = "SELECT * FROM request WHERE request_id = '".$id."'";
$query = $conn->query($sql);
$result = $query->fetch_array();

if($result[0]==""){
	
	$save = "INSERT INTO `request`(`request_id`, `project`, `type`, `organize`, `budget`, `type_budget`, `activity`, `produce`, `plan`, `A`, `B`, `C`, `D`, `E`, `F`, `G`, `H`, `I`,`status`, `date`, `year`) VALUES ('".$id."','".$project."','".$typepro."','".$org."','".$budget."','".$type."','".$activity."','".$produce."','".$plan."','".$a."','".$b."','".$c."','".$d."','".$e."','".$f."','".$g."','".$h."','".$i."',1,'".$date."','".$yaer."')";
	$conn->query($save);
	echo $save;
}
elseif($result[0]!=""){
	$id2 = $_POST['id'];
	$update = "UPDATE `request` SET `project`='".$project."',`type`='".$typepro."',`organize`='".$org."',`budget`='".$budget."',`type_budget`='".$type."',`activity`='".$activity."',`produce`='".$produce."',`plan`='".$plan."',`A`='".$a."',`B`='".$b."',`C`='".$c."',`D`='".$d."',`E`='".$e."',`F`='".$f."',`G`='".$g."',`H`='".$h."',`I`='".$i."',`status`= 1,`date`='".$date."',`year`='".$yaer."' WHERE request_id = '".$id2."'";
	$conn->query($update);
	echo $update;
}
else{
 header("location:require.php");	
}
 header("location:status.php");
 ob_end_flush();
?>