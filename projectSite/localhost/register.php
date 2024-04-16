<?php 
session_start();
if(isset($_SESSION['user']))
{
	header("Location: ../index.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="styles/style2.css">
  <title>Регистрация</title>
</head>

<body>
  <div class="login-page">
    <div class="login-form">
      <h2>Регистрация</h2>
      <form id="form" action="inc/reg.php" method="post">
        <input name="username" type="text" placeholder="Введите Никнейм" required />
        <input name="email" type="text" placeholder="Введите Email" required />
        <input name="password" type="password" placeholder="Введите пароль" required />
		<input name="password_confirm" type="password" placeholder="Введите пароль еще раз " required />
        <button type="submit">Войти</button>
      </form>
      <p>Уже есть аккаунт? <a href="login.php">Вход</a></p>
	   <?php 
	   if (isset($_SESSION['message']))
		{
		   echo '<p>' . $_SESSION['message'] . '</p>'; 
		}  
	   unset($_SESSION['message']);
	   ?>  
    </div>
  </div>
</body>

</html>