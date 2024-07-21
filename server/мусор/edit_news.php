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
			<input type="hidden" name="id_article" />
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