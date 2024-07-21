<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo htmlspecialchars($title_view_reg); ?></title>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
</head>
<body>
  <div>
    <div>
      <div>
        <h3>Предупреждение:</h3>
        <p>Никнейм: разрешено использовать только латинские буквы, цифры, тире и знак подчёркивания. Длина логина от 5 до 20 символов (включительно);</p>
        <p>Пароль: должен содержать от 6 до 12 символов. Допустимые символы включают только буквы и цифры.</p>
      </div>
      <h2>Регистрация</h2>
      <?php
        $token = bin2hex(random_bytes(16));
        $_SESSION['token_id'] = $token;
      ?>
      <?php echo "<div>Token: {$token}</div>" ?>
      <form id="form" action="/register" method="post" onsubmit="button.disabled = true; return true;">
        <input name="username" type="text" placeholder="Введите Никнейм" required />
        <input name="email" type="email" placeholder="Введите Email" required />
        <input name="password" type="password" placeholder="Введите пароль" required />
        <input name="password_confirm" type="password" placeholder="Введите пароль еще раз" required />
        <input type="hidden" name="token" value="<?php echo $token?>">
        <button type="submit" name="button">Войти</button>
      </form>
      <p>Уже есть аккаунт? <a href="/login">Вход</a></p>
      <?php if (!empty($error_view_reg)): ?>
        <div>
          <?php echo htmlspecialchars($error_view_reg); ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</body>
</html>
