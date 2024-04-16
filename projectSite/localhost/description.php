<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="styles/description.css">
  <title>Create Advertisement</title>
</head>
<body>
  <div class="navbar">
    <a href="index.php">Главная</a>
    <a href="category.php">Категории</a>
    <a href="search.php">Поиск</a>
  </div>

  <div class="container">
    <div class="title-container">
      <h1>Создать объявление</h1>
    </div>
    <form action="" method="post">
      <label for="title">Название вашего софта:</label>
      <input type="text" id="title" name="title" required />

      <label for="description">Описание вашего софта:</label>
      <textarea id="description" name="description" rows="5" required></textarea>
      <label for="category">Выберите категорию:</label>
      <select id="category" name="category" required>
        <option value="games">Игры</option>
        <option value="movies">Фильмы</option>
        <option value="software">Софт</option>
      </select>
      <input type="submit" value="Выложить на сайт" />
    </form>
  </div>
</body>

</html>