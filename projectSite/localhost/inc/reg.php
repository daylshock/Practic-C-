<?php
	session_start();
	
	require_once "connectdb.php";
	
	$username = trim($_POST['username']);
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);
	$password_confirm = trim($_POST['password_confirm']);
	
	$selection_email = "SELECT * FROM `users` WHERE `email` = '$email'";
	$check_email = mysqli_query($con, $selection_email);
	
	if(mysqli_num_rows($check_email) > 0)
	{
		$_SESSION['message'] = 'Пользователь с указанной почтой уже существует';
		header("Location: ../login.php");
		exit;
	}
	else
	{
		if(strlen($password) < 6)
		{
			$_SESSION['message'] = 'Пароль не должен иметь длину меньше 6 символов!';
			header("Location: ../register.php");
		}
		else
		{
			if($password === $password_confirm){
				$password = md5($password);
				$sql = "INSERT INTO `users` (`id`, `user`, `email`, `password`) VALUES (NULL, '$username', '$email', '$password')";
				$query = mysqli_query($con, $sql);
			
			if (!$query) {
				echo mysqli_error($db_connect);
			}
			
			$_SESSION['message'] = 'Регистрация прошла успешно';
			header("Location: ../login.php");
			exit;
		}
			else
			{
				$_SESSION['message'] = 'Пароли не совпадают!';
				header("Location: ../register.php");
			}
		}
		
	}
	mysqli_close($con);
?>
