<?php
	require_once 'inc/lib.inc.php';
	require_once 'inc/data.inc.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Контакты</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <!-- Верхняя часть страницы -->
    <?php require_once 'inc/top.inc.php'; ?>
    <!-- Верхняя часть страницы -->
  </header>
  <section>
    <h1>Обратная связь</h1>
    <h3>Адрес</h3>
    <address>123456 Москва, Малый Американский переулок 21</address>
    <h3>Задайте вопрос</h3>
    <form method='post'>
      <label>Тема письма: </label>
      <br>
      <input name='subject' type='text' size="50">
      <br>
      <label>Содержание: </label>
      <br>
      <textarea name='body' cols="50" rows="10"></textarea>
      <br>
      <br>
      <input type='submit' value='Отправить'>
    </form>
  </section>
  <nav>
    <!-- Навигация -->
    <?php require_once 'inc/menu.inc.php'; ?>
    <!-- Навигация -->
  </nav>
  <footer>
    <!-- Нижняя часть страницы -->
    <?php require_once 'inc/bottom.inc.php'; ?>
    <!-- Нижняя часть страницы -->
  </footer>
</body>
</html>