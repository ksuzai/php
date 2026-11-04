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
  <title>Таблица умножения</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <!-- Верхняя часть страницы -->
    <?php require_once 'inc/top.inc.php'; ?>
    <!-- Верхняя часть страницы -->
  </header>
  <section>
    <h1>Таблица умножения</h1>
    <form>
      <label>Количество колонок: </label>
      <br>
      <input name='cols' type='text' value=''>
      <br>
      <label>Количество строк: </label>
      <br>
      <input name='rows' type='text' value=''>
      <br>
      <label>Цвет: </label>
      <br>
      <input name='color' type='color' value='#ff0000' list="listColors">
      <datalist id="listColors">
        <option>#ff0000</option>
        <option>#00ff00</option>
        <option>#0000ff</option>
      </datalist>
      <br>
      <br>
      <input type='submit' value='Создать'>
    </form>
    <br>
    <!-- Таблица -->
    <?php getTable($cols, $rows, $color); ?>
    <!-- Таблица -->
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