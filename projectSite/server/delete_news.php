<?php
	session_start();
	if(!isset($_SESSION['user']) || isset($_SESSION['user']) && $_SESSION['user']['status'] != 1)
	{
		header("Location: ../index.php");
		exit;
	}
?>
 <html>
<body>
 <h1>Удалить новость</h1>
 <p>Вы уверены, что хотите удалить новость?</p>
 <form method="post" action="..."> 
 <input type="hidden" name="news_id" value="..."> 
<button type="submit">Удалить</button>
 <a href="admin_news.php">Отмена</a>
 </form>
</body>
 </html>