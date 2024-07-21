<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title); ?></title>
</head>
<body>
    <div>
        <h1><?php echo htmlspecialchars($newsListId['title'])?></h1>
        <div><?php echo htmlspecialchars($newsListId['date'])?></div>
        <p><?php echo htmlspecialchars($newsListId['description'])?></p>
        <a href="/news" class="back">Вернуться на главную</a>
    </div>
</body>
</html>
