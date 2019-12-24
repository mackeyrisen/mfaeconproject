<?	ob_start();
	require 'dbconfig.php';

	$id = $_POST['id'];
	$pass = base64_encode($_POST['password']);
	$name = $_POST['name'];
	$lastname = $_POST['lastname'];
	$voip = $_POST['voip'];
	$name2 = $_POST['name2'];
	$lastname2 = $_POST['lastname2'];
	$voip2 = $_POST['voip2'];
	$email = $_POST['email'];

	$sql = "UPDATE member SET password='$pass', u_name = '$name', u_lastname = '$lastname', u_voip = '$voip', u_mail = '$email' ,u_name2 = '$name2', u_lastname2 = '$lastname2', u_voip2 = '$voip2' WHERE id = '$id' ";
	$query = $conn->query($sql);

	if ($query) {
		header("location:profile.php?success=on");

	}
	else
	{
		echo "Error!".$sql;
	}
	ob_end_flush();
?>