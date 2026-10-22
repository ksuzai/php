<?php
$name = 'Ксения';
$age = 19;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Переменные и вывод</title>
</head>
<body>
	<h1>Переменные и вывод</h1>

	<p>Меня зовут: <?= $name ?><br></p>
	<p>Мне: <?= $age ?> лет<br></p>
	<p>Тип переменной name: <?= gettype($name) ?><br></p>
	<p>Тип переменной age: <?= gettype($age) ?><br></p>

</body>
</html>

<?php
	unset($name);
	unset($age);
?>