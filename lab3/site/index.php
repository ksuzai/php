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
  <title>Сайт нашей школы</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <!-- Верхняя часть страницы -->
    <?php require_once 'inc/top.inc.php'; ?>
    <!-- Верхняя часть страницы -->
  </header>

  <section>
    <h1>Добро пожаловать на наш сайт!</h1>
    <!-- Область основного контента -->
    <?php require_once 'inc/index.inc.php'; ?>
    <!-- Область основного контента -->
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