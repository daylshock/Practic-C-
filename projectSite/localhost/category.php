<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="styles/category.css">
  <title>Categories</title>
</head>
<body>
  <div class="navbar">
    <a href="index.php">Главная</a>
    <a href="search.php">Поиск</a>
  </div>

  <div class="container">
    <h1>Категории</h1>
    <ul class="categories">
      <li>
        <input type="checkbox" id="games" />
        <label for="games">Игры</label>
        <ul class="subcategory">
          <li><a href="shablon.php">God Of War</a></li>
          <li><a href="#">Сапер</a></li>
        </ul>
      </li>
      <li>
        <input type="checkbox" id="movies" />
        <label for="movies">Фильмы</label>
        <ul class="subcategory">
          <li><a href="#">Стена 1982</a></li>
          <li><a href="#">Остров проклятых</a></li>
        </ul>
      </li>
      <li>
        <input type="checkbox" id="software" />
        <label for="software">Софт</label>
        <ul class="subcategory">
          <li><a href="#">IO Unlocker</a></li>
          <li><a href="#">Photoshop</a></li>
        </ul>
      </li>
    </ul>
  </div>
  <a href="description.php" class="create-ad-button">+</a>
</body>

</html>