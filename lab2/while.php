<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Цикл while</title>
</head>
<body>
    <h1>Цикл while</h1>
	<?php
	$var = 'ПРИВЕТ';

	$i = 0;
	while ($i < mb_strlen($var, 'UTF-8')) {
	    echo mb_substr($var, $i, 1, 'UTF-8') . "<br>";
	    $i++;
	}
	?>
</body>
</html>