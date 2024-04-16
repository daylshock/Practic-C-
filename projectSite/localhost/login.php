<!DOCTYPE html>
<?php 
session_start();
if(isset($_SESSION['user']))
{
	header("Location: ../index.php");
	exit;
}
?>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="styles/style2.css">
  <title>Авторизация</title>
</head>

<body>
  <div class="login-page">
    <div class="login-form">
      <h2>Авторизация</h2>
      <form id="form" action="inc/log.php" method="post">
        <input name="username" type="text" placeholder="Введите Никнейм" required />
        <input name ="password" type="password" placeholder="Введите пароль" required />
        <button type="submit">Войти</button>
      </form>
      <p>Нет аккаунта? <a href="register.php">Зарегистрируйтесь</a></p>
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