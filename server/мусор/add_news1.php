<!DOCTYPE html>
<html>
 <body>
<h1>Добавить новость</h1>
<form method="post" action="inc/addarticle.php">  
<label for="title">Заголовок:</label><input type="text" id="title" name="title"required>
<label for="title">Дата:</label><input type="date" id="date" name="date" required>
<label for="description">Описание:</label><textarea id="description" name="description" required></textarea>
<button type="submit">Опубликовать</button> 
 </form>
 </body>
 </html>