<?php
	session_start();

	if(isset($_SESSION['user']))
	{
		if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > 15*60) 
		{
			header("Location: logout.php");
		}
		$_SESSION['last_activity'] = time();
	}

?>