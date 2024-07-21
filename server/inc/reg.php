<?php
	session_start();
	
	require_once "connectdb.php";

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_confirm']))
		{
			$username = strip_tags(trim($_POST['username']));
			$email = strip_tags(trim($_POST['email']));
			$password = strip_tags(trim(md5($_POST['password'])));
			$password_confirm = strip_tags(trim(md5($_POST['password_confirm'])));
			
			$selection_email = "SELECT * FROM `users` WHERE `email` = '$email'";
			$check_email = mysqli_query($con, $selection_email);
			
			$selection_password = "SELECT `password` FROM `users` WHERE password = '$password'";
			$check_password = mysqli_query($con, $selection_password);
			
			if(mysqli_num_rows($check_email) > 0)
			{
				$_SESSION['message'] = 'Пользователь с указанной почтой уже существует';
				header("Location: ../login.php");
				exit;
			}
			
			if(mysqli_num_rows($check_password) > 0)
			{
				$_SESSION['message'] = 'Пароль уже занят, попробуйте другой';
				header("Location: ../register.php");
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
						
						$sql = "INSERT INTO `users` (`id`, `user`, `email`, `password`, `status_admin`) VALUES (NULL, '$username', '$email', '$password', '0')";
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
		}
	}
	else
	{
		die("error_POST_REQUEST_METHOD!");
	}	

	
?>
