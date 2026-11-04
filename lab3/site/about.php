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
  <title>О сайте</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <!-- Верхняя часть страницы -->
    <?php require_once 'inc/top.inc.php'; ?>
    <!-- Верхняя часть страницы -->
  </header>
  <section>
    <h1>О нашем сайте</h1>
    <p>
      Сайт создан на общественных началах и управляется на некоммерческой основе. Все фотографии и материалы предоставлены и используются с ведома и при участии администрации школы.
    </p>
    <h3>Цели создания проекта</h3>
    <ol>
      <li>поднятие престижа нашей школы.</li>
      <li>для информирования родителей будущих учеников нашей школы.</li>
      <li>для возобновления утраченных связей между выпускниками и учителями, с предоставлением им информационного пространства для общения.</li>
      <li>для общения учеников во внеурочное время.</li>
    </ol>
    <h3>Советы и предупреждения</h3>
    <p>
      Сайт оптимизирован под все браузеры. Наилучшее качество просмотра достигается при разрешении экрана монитора - 1280 на 1024 точек.
    </p>
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