<?php
	session_start();
	
	require_once "connectdb.php";
	
	if(isset($_POST['username']) && isset($_POST['password']))
	{
		$username = strip_tags(trim($_POST['username']));
		$password = strip_tags(trim(md5($_POST['password'])));
		$selection = "SELECT `user`, `password`, `status_admin` FROM `users` WHERE `user` = '$username' AND `password` = '$password'";
		$checkuser = mysqli_query($con, $selection);
	
		if(mysqli_num_rows($checkuser) > 0)
		{
			$user = mysqli_fetch_assoc($checkuser);
			
			$_SESSION['user'] = [
				"username" => $user['user'],
				"status" => $user['status_admin']
			];
			
			$_SESSION['last_activity'] = time();
			header("Location: ../index.php");
		}
		else
		{
			$_SESSION['message'] = 'Неверный никнейм или пароль';
			header("Location: ../login.php");
		}
		mysqli_close($con);
	}
	
?>
