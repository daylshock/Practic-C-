<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo htmlspecialchars($title); ?></title>
</head>
<body>
<nav>
  <div>
    <a href="/news"><img src="template/image/navbar_cat.jpg" alt="" width="30" height="24"></a>
        <div>
          <ul>
            <li>
              <a href="/news">Главная</a>
            </li>
            <div>
                <?php if (empty($_SESSION['user'])): ?>
                    <li>
                      <a href="/login">Вход</a>
                    </li>
                    <li>
                      <a href="/register">Регистрация</a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="/#">Добавить новость</a>
                    </li>
                    <li>
                      <a href="#">
                        <?php echo htmlspecialchars($_SESSION['user']['username']); ?>
                      </a>
                      <ul>
                        <li><a href="/logout">Выход</a></li>
                      </ul>
                    </li>
                <?php endif; ?>
        </ul>
            </div>   

        </div>
  </div>
</nav>
    <div>
        <div>
            <h1><?php echo $title;?></h1>
        </div>
        <?php if (!empty($_SESSION['successfully_message'])): ?>
            <div>
                <?php echo htmlspecialchars($_SESSION['successfully_message']); ?>
            </div>
            <?php unset($_SESSION['successfully_message']); ?>
        <?php endif; ?>
        <div>
            <div>
                <div>
                    <h2>Новости</h2>
                    <?php foreach ($newsList as $newsItem): ?>
                        <div>
                            <strong>ID:</strong> <?php echo htmlspecialchars($newsItem['id_article']); ?>
                        </div>
                        <div>
                            <strong>Заголовок:</strong> <?php echo htmlspecialchars($newsItem['title']); ?>
                        </div>
                        <div>
                            <strong>Дата:</strong> <?php echo htmlspecialchars($newsItem['date']); ?>
                        </div>
                        <div>
                            <strong>Описание:</strong> <?php echo htmlspecialchars($newsItem['description']); ?>
                        </div>
                        <div>
                            <a href="/id-article/<?php echo $newsItem['id_article']; ?>">Посмотреть подробнее</a>
                        </div>
                        <hr>
                    <?php endforeach; ?> 
                </div>
            </div>
        </div>
    </div>
    <div>
        <div>
            <h3>Создатель</h3>
            <p>Имя: Тишка</p>
            <p>Телефон: +7 (123) 456-78-90</p>
            <p>Email: example@example.com</p>
        </div>
    </div>
</body>
</html>
