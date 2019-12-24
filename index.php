<?
session_start();
ob_start();
//header("location:https://www.mfaeconproject.com");
if($_SESSION['role']=="admin")
{
	header("location:admin/admin_news.php");
}
elseif($_SESSION['role']=="user")
{
	header("location:user/homepage.php");
}
ob_end_flush();
?>
<!DOCTYPE html>
<html>
<head>
	<title>MFA Econ Project</title>
	<meta charset="utf-8">
   	<meta name="viewport" content="width=device-width, initial-scale=1">
   	<link rel="shortcut icon" href="favicon.ico">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" align="center" style="margin-top:30px">
	<img src="/images/mfa.png" class="img-responsive" width="100px">
	<h1>MFA Econ Project</h1>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-4"></div> 
		<div class="col-sm-4">
			<hr>
			<form action="login.php" method="POST">
				<label for="user">Username</label>
				<input type="text" name="user" id="user" class="form-control" required="required">
				<label for="password">Password</label>
				<input type="password" name="password" id="password" class="form-control">
				<hr>
			    <center><button type="submit" class="btn btn-success">Login <span class="glyphicon glyphicon-log-in"></span></button></center>
			</form>
			<br>
			
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>
</body>
</html>