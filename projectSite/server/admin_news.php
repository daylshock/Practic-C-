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
    <title>Админ-панель - Новости</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>

    <div class="container">

        <nav>
            <a href="admin_users.php">Пользователи</a>
			<a href="index.php">Главная</a>
        </nav>

        <section class="content active" id="news">
            <h2>Новости</h2>
            
            <table>
                <tr>
                    <th>Заголовок</th>
                    <th>Дата создания</th>
                    <th>Действия</th>
                </tr>
				<?php
					require_once "inc/connectdb.php";
						
						$selection_article = "SELECT `id_article`, `title`, `date` FROM `aritcle`";
						$check_article = mysqli_query($con, $selection_article);
							
							if(mysqli_num_rows($check_article) > 0)
							{
								$user = mysqli_fetch_assoc($check_article);
								foreach($check_article as $row)
								{
									print('<tr>');
										echo "<th>" . $row["title"] . "</th>";
										echo "<th>" . $row["date"] . "</th>";
										echo "<td><form action='inc/delarticle.php' method='post'>
										<input type='hidden' name='id_article' value='" . $row["id_article"] . "' />
										<input type='submit' value='Удалить'>
										</form></td>";
										echo "<td><form action='edit_news.php' method='post'>
										<input type='hidden' name='id_article' value='" . $row["id_article"] . "' />
										<input type='submit' value='Обновить'>
										</form></td>";
									print('<tr>');	
								}
							}
							else
							{
								echo " database is empty";
							}
							mysqli_close($con);
							
					?>
            </table>
            <a href="add_news1.php" class="add-news-btn">Добавить новость</a>
        </section>

    </div>

</body>
</html>