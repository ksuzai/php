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
  <title>Калькулятор</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <!-- Верхняя часть страницы -->
    <?php require_once 'inc/top.inc.php'; ?>
    <!-- Верхняя часть страницы -->
  </header>
  <section>
    <h1>Калькулятор школьника</h1>
    <form>
      <label>Число 1:</label>
      <br>
      <input name='num1' type='text'>
      <br>
      <label>Оператор: </label>
      <br>
      <input name='operator' type='text'>
      <br>
      <label>Число 2: </label>
      <br>
      <input name='num2' type='text'>
      <br>
      <br>
      <input type='submit' value='Считать'>
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