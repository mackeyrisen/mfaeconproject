<?php 
ob_start();
session_start();
include('admin/dbconfig.php');
$username = $_POST['user'];
$pass = base64_encode($_POST['password']);

$sql = "SELECT * FROM member WHERE user='".$username."' AND password='".$pass."'";
$query = $conn->query($sql);
$result = $query->fetch_array();

if ($result[1]==$username&&$result[4]==$pass) {
	$_SESSION['user'] = $result[1] ;
	$_SESSION['role'] = $result['role'];
	if($result['role']=='user'){
	    header("location:user\homepage.php");
    }
    else{
 		header("location:admin\admin_news.php");
    }
}
else{
	header("location:index.php");
}
ob_end_flush();
?>