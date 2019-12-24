<?php
define('DATA',dirname(__DIR__).DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR);
require DATA.'dbo.php';
// $server = "localhost";
// $user = "mfaeconp_root";
// $password = "xps120130";
// $database = "mfaeconp_globnetwork";
//
// $conn = new mysqli($server,$user,$password,$database);
// mysqli_set_charset($conn,"UTF8");

$sql_cur ="SELECT * FROM yaer ";
$query_cur = $conn->query($sql_cur);
$current = $query_cur->fetch_array();

function head()
{
	require 'head.php';
}
function sidebar()
{
        require 'sidebar_admin.php';
}

function foot()
{
	require 'foot.php';
}

function check()
{
	require 'check_role.php';
}
?>
