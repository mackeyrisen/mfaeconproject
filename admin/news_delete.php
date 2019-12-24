<?php 
ob_start();
include 'dbconfig.php' ;

$id = $_POST['id'];


$sql = "DELETE FROM `link` WHERE `link_id` = $id";
$query = $conn->query($sql);

if ($query) {
	header("location:admin_news.php");
}
else{

echo "unsuccessful!".$sql;
}
ob_end_flush();
?>