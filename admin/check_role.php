<? 	ob_start() ;
	session_start();

	if ($_SESSION['role']=="user") {
		header('location:main.php');
	}

	ob_end_flush();

