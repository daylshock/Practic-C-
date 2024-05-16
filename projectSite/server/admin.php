<?php
	session_start();
	if(!isset($_SESSION['user']) || isset($_SESSION['user']) && $_SESSION['user']['status'] != 1)
	{
		header("Location: ../index.php");
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Админ-панель</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>

    <div class="container">

        <nav>
            <a href="admin_users.php">Пользователи</a>
            <a href="admin_news.php">Новости</a>
			<a href="index.php">Главная</a>
        </nav>

    </div>

</body>
</html>