<?php 
include ('dbconfig.php');

$year = $_POST['year'];
$old = $_POST['oldyear'];
$sql = "UPDATE `yaer` SET `year_budget`= $year WHERE `year_budget` = $old" ;
$query = $conn->query($sql);
if ($query) {
	header('location:setting.php');
}
else{
	echo "Error ".$query ;
}

?>