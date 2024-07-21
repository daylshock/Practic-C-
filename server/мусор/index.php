<!DOCTYPE html >
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
    <div class="navbar">
        <a href="index.php">Главная</a>
        <a href="category.php">Категории</a>
        <a href="search.php">Поиск</a>
		
		<?php
		if(isset($_SESSION['user']))
		{
			echo "<a class='right'>{$_SESSION["user"]["username"]} {$_SESSION["user"]["status"]} </a>";

			if($_SESSION['user']['status'] != 0)
			{
				require_once "templates/adminpanelhtml.php";
			}
			
			require_once "templates/logouthtml.php";
		}
		else
		{
			require_once "templates/authviewhtml.php";
		}
		?>
    </div>
    <div class="advertisement">
        <a href="https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwiIu5LSq_aEAxXWUUEAHcVZDH4QFnoECAcQAQ&url=https%3A%2F%2Fbetboom.ru%2F&usg=AOvVaw0FmhyQRzOfCeGjqUXt-D1H&opi=89978449">
            <img src="assets/betboom.gif" alt="Left Banner" class="left-banner" width="300" height="750">
        </a>
		<a href="https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwiIu5LSq_aEAxXWUUEAHcVZDH4QFnoECAcQAQ&url=https%3A%2F%2Fbetboom.ru%2F&usg=AOvVaw0FmhyQRzOfCeGjqUXt-D1H&opi=89978449">
			<img src="assets/betboom.gif" alt="Right Banner" class="right-banner" width="300" height="750">
		</a>
    </div>
    <div class="container">
        <div class="header">
            <img class="logo" src="assets/qwe2.jpg" alt="ytr" width="300" height="300">
        </div>
        <div class="content">
        </div>
        <div class="centered-content">
            <div class="news-container">
                <div class="news">
                    Новости трекера
					<?php
						require_once "inc/connectdb.php";
						
						$sql = "SELECT `id_article`, `title`, `date`, `description` FROM `aritcle`";
						
						$stmt = $conn->prepare($sql);
						$result = $stmt->execute();

						if($stmt->rowCount() > 0)
						{
							foreach($stmt as $row)
							{
								echo "<div>{$row['title']}</div>";
								echo "<div>{$row['date']}</div>";
								echo "<div>{$row['description']}</div>";
							}
						}
						else
						{
							echo "<div>Empty!</div>";
						}
						$conn = null;
					?>
					<div>
                </div>
            </div>
        </div>
    </div>
	
    <div class="footer">
        <div class="creators-info">
            <h3>Информация о создателях</h3>
            <p>Имя: Иван Петров</p>
            <p>Телефон: +7 (123) 456-78-90</p>
            <p>Email: example@example.com</p>
        </div>
    </div>
    </div>
    </div>
    </div>
	</body>

</html>