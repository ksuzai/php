<?php
$swap = function(&$x, &$y) {
    $temp = $x;
    $x = $y;
    $y = $temp;
};

$a = 5;
$b = 8;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Анонимная функция swap</title>
</head>
<body>
	<h1>Обмен значений через анонимную функцию</h1>
	<?php
	echo "До вызова: a = $a, b = $b<br>";

	$swap($a, $b);

	echo "После вызова: a = $a, b = $b<br>";
	echo 'Проверка 5 === $b: ' . var_export(5 === $b, true) . '<br>';
	echo 'Проверка 8 === $a: ' . var_export(8 === $a, true) . '<br>';
	?>
</body>
</html>