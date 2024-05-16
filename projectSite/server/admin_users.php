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
    <title>Админ-панель - Пользователи</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>

    <div class="container">

        <nav>
            <a href="admin_news.php">Новости</a>
			<a href="index.php">Главная</a>
        </nav>

        <section class="content active" id="users">
            <h2>Пользователи</h2>
            <table>
                <thead>
                    <tr>
                        <th>Никнейм</th>
                        <th>Почта</th>
                        <th>Пароль (зашифрованный)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
						<?php
							require_once "inc/connectdb.php";
							
							$selection = "SELECT `user`, `email`, `password` FROM `users`";
							$result = mysqli_query($con, $selection);
							
							if(mysqli_num_rows($result) > 0)
							{
								$user = mysqli_fetch_assoc($result);
								foreach($result as $row)
								{
									echo "<tr>";
										echo "<td>" . $row["user"] . "</td>";
										echo "<td>" . $row["email"] . "</td>";
										echo "<td>" . $row["password"] . "</td>";
									echo "<tr>";
								}
							}
							else
							{
								echo "Ошибка: " . mysqli_error($con);
							}
							mysqli_close($con);
						?>
                    </tr>
                </tbody>
            </table>
        </section>

    </div>

</body>
</html>