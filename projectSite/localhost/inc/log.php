<?php
	session_start();
	
	require_once "connectdb.php";
	
	$username = trim($_POST['username']);
	$password = trim(md5($_POST['password']));
	$selection = "SELECT * FROM `users` WHERE `user` = '$username' AND `password` = '$password'";
	$checkuser = mysqli_query($con, $selection);
	
	if(mysqli_num_rows($checkuser) > 0)
	{
		$user = mysqli_fetch_assoc($checkuser);
		
		$_SESSION['user'] = [
			"username" => $user['user']
		];
		header("Location: ../index.php");
	}
	else
	{
		$_SESSION['message'] = 'Неверный никнейм или пароль';
		header("Location: ../login.php");
	}
	mysqli_close($con);
?>
