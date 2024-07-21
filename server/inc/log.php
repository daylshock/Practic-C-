<?php
	session_start();
	require_once "connectdb.php";

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if(isset($_POST['username']) && isset($_POST['password']))
		{
			$username = strip_tags(trim($_POST['username']));
			$password = strip_tags(trim(md5($_POST['password'])));
			$selection = "SELECT `user`, `password`, `status_admin` FROM `users` WHERE `user` = '$username' AND `password` = '$password'";
			$checkuser = mysqli_query($con, $selection);
		
			if(mysqli_num_rows($checkuser) > 0)
			{
				$user = mysqli_fetch_assoc($checkuser);
				
				$_SESSION['user'] = array("username" => $user['user'],
					"status" => $user['status_admin']);
				
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
	}
	else
	{
		die("error_POST_REQUEST_METHOD!");
	}
?>
