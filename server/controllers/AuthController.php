<?php

include_once(ROOT . '/models/Auth.php');

class AuthController
{
	public function actionLogin()
	{
		$title_view_auth = "Авторизация";
			$error_view_auth = "";
		
		if($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			if(isset($_POST['email']) && isset($_POST['password']))
			{
				if($_POST['token'] === $_SESSION['token_id'])
				{
					$email_post = strip_tags(trim($_POST['email']));
					$password_post = strip_tags(trim($_POST['password']));

					$result_list_login = Auth::loginCheck($email_post);

					$count_email = $result_list_login['email_count'];
					$email_data = $result_list_login['email_data'];

					$password_hash = $email_data['password'];
					$username = $email_data['user'];
					$email = $email_data['email'];
					$status_admin = $email_data['status_admin'];

					if($count_email > 0)
					{
						if(password_verify($password_post, $password_hash))
						{
							$_SESSION['successfully_message'] = "Вы успешно авторизовались";
							unset($_SESSION['token_id']);
							header("Location: /login");
							$_SESSION['AUTH'] = true;
							$_SESSION['user'] = array(
								'username' => $username,
								'email' => $email,
								'status_admin' => $status_admin
							);
							exit();
						}
						else
						{
							$error_view_auth .= "Неверный пароль";
						}
					}
					else
					{
						$error_view_auth .= "Такой пользователь не найден!";
					}
				}
				else
				{
					$error_view_auth .= "Токен !=";
				}
				
			}
			else
			{
				$error_view_auth .= "Заполните все поля!";
			}
		}
		include_once(ROOT . '/views/auth/login.php');
	}
	public function actionRegister()
	{
		$title_view_reg = "Регистрация";
			$error_view_reg = "";

		if($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_confirm']))
			{
				if($_POST['token'] === $_SESSION['token_id'])
				{
					$username = null;
					$email = null;
					$password = null;
					$password_confirm = null;
					$password_hash = null;

					$valid_username = false; 
					$valid_email = false;
					$valid_password = false;
					$validation = false;

					if(preg_match('/^[a-z0-9-_]{5,20}$/i', $_POST['username']))
					{
						$valid_username = true;
						$username = strip_tags(trim($_POST['username']));
					}
					else
					{
						$error_view_reg .= "Некоректный никнейм!";
					}
						if(preg_match('/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/', $_POST['email']))
						{
							$valid_email = true;
							$email = strip_tags(trim($_POST['email']));
						}
						else
						{
							$error_view_reg .= "Некоректная почта!";
						}

							if(preg_match('/^[a-z0-9]{6,12}$/i', $_POST['password']))
							{
								if($_POST['password'] == $_POST['password_confirm'])
								{
									$valid_password = true;
									$password = strip_tags(trim($_POST['password']));
									$password_confirm = strip_tags(trim($_POST['password_confirm']));
									$password_hash = password_hash($password, PASSWORD_BCRYPT);
								}
								else
								{
									$error_view_reg .= "Пароли не совпадают!";
								}
							}
							else
							{
								$error_view_reg .= "Некоректный пароль!";
							}

					if($valid_username)
					{
						if($valid_email)
						{
							if($valid_password)
							{
								$validation = true;
							}
						}
					}

					echo "<div>{$valid_username}:{$valid_email}:{$valid_password}:{$validation}</div>";
					
					if($validation)
					{
						$result_list_register = Auth::registerCheck($username, $email, $password_hash);

						$user_count = $result_list_register['user_count'];
						$email_count = $result_list_register['email_count'];

						if($user_count > 0)
						{
							$error_view_reg .= "Пользователь с таким ником уже занят!";
						}
							if ($email_count > 0)
							{
								$error_view_reg .= "Пользователь с такой почтой уже занят!";
							}
								if(empty($error_view_reg))
								{
									$result_insert_data = Auth::insertData($username, $email, $password_hash);
									$_SESSION['successfully_message'] = "Вы успешно зарегистрировались";
									unset($_SESSION['token_id']);
									header("Location: /login");
									exit();
								}
					}else
					{
						$error_view_reg .= "Валидация данных не прошла успешно!";
					}
				}
				else
				{
					$error_view_reg .= "Токен !=";
				}

			}
			else
			{
				$error_view_reg .= "Заполните все поля!";
			}

		}
		include_once(ROOT . '/views/auth/register.php');
	}
}
?>