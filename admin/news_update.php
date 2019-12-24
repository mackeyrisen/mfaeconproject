<?php 
ob_start();
include 'dbconfig.php' ;

$id = $_POST['id'];
$title = $_POST['title'];
$url = $_POST['url'];
$status = $_POST['status'];
$category = $_POST['category'];

$sql = "UPDATE `link` SET  `title`='".$title."',`url`='".$url."',`status`='".$status."',`category`='".$category."' WHERE `link_id` = $id";
$query = $conn->query($sql);

if ($query) {
	header("location:admin_news.php");
}
else{

echo "unsuccessful!".$sql;
}
ob_end_flush();
?>