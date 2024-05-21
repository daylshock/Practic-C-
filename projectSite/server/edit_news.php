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
    <title>Редактировать новость</title>
    <link rel="stylesheet" href="style.css"> </head>
<body>

<div class="container">
    <h2>Редактировать новость</h2>
    <form action="inc/uparticle.php" method="post"> 
        <div>
			<?php
				if(isset($_POST["id_article"]))
				{
					$id_article = $_POST["id_article"];
				}
				else
				{
					header("Location: ../edit_news.php");
					exit;
				}
			?>
			<input type="hidden" name="id_article" value= <?php echo $id_article; ?> />
            <label for="title">Заголовок:</label>
			<input type="text" id="title" name="title" placeholder="Введите заголовок" required></input>
        </div> 
        <div>
            <label for="content">Описание:</label>
            <textarea id="content" name="description" placeholder="Введите описание" required></textarea> 
        </div>
        <button type="submit">Сохранить изменения</button> 
    </form>
</div>

</body>
</html>