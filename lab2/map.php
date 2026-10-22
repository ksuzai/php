<?php
function map(array $array, callable $callback): array
{
    $result = [];

    foreach ($array as $key => $value) {
        $result[$key] = $callback($value);
    }

    return $result;
}

$numbers = [1, 2, 3, 4, 5];
$squares = map($numbers, fn($x) => $x * $x);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Функция map</title>
</head>
<body>
	<h1>Своя функция map</h1>

	<p>Исходный массив:</p>
	<pre><?php print_r($numbers); ?></pre>

	<p>Квадраты элементов:</p>
	<pre><?php print_r($squares); ?></pre>

	<p>Исходный массив не изменился:</p>
	<pre><?php print_r($numbers); ?></pre>
</body>
</html>