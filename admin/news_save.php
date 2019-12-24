<?php 
ob_start();
date_default_timezone_set("Asia/Bangkok");
include 'dbconfig.php';

$id = date("Ymdhis");
$title = $_POST['title'];
$url = $_POST['url'];
$status = 1 ;
$detail = "-";
$category = $_POST['category'];

$sql = "INSERT INTO `link`(`link_id`, `title`, `url`, `detail`, `status`, `category`) VALUES ('".$id."','".$title."','".$url."','".$detail."','".$status."','".$category."')";
$query = $conn->query($sql);

if ($query) {
	header("location:admin_news.php");
}
elseif (condition) {
	echo "insert error!!! <br>".$query;
}

ob_end_flush();
?>