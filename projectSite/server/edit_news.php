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
    <form> 
        <div>
            <label for="title">Заголовок:</label>
            <input type="text" id="title" value="Новость 1"> 
        </div> 
        <div>
            <label for="content">Описание:</label>
            <textarea id="content">Текст новости 1...</textarea> 
        </div>
        <button type="submit">Сохранить изменения</button> 
    </form>
</div>

</body>
</html>