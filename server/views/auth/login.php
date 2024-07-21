<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo htmlspecialchars($title_view_auth); ?></title>
<script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
</head>
<body>
  <div>
    <div>
      <h2>Авторизация</h2>
      <?php
        $token = bin2hex(random_bytes(16));
        $_SESSION['token_id'] = $token;
      ?>
      <?php echo "<div>Token: {$token}</div>" ?>
      <form action="/login" method="post" onsubmit="button.disabled = true; return true;">
        <input name="email" type="email" placeholder="Введите Email" required/>
        <input name="password" type="password" placeholder="Введите пароль" required/>
        <input type="hidden" name="token" value="<?php echo $token?>"/>
        <button type="submit" name="button">Войти</button>
      </form>
      <p>Нет аккаунта? <a href="/register">Зарегистрируйтесь</a></p>
       <?php if (!empty($error_view_auth)): ?>
          <div>
            <?php echo htmlspecialchars($error_view_auth); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
</body>
</html>
