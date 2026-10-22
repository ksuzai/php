<?php
define('my_const', 'Привет!');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Константы</title>
</head>
<body>
	<h1>Константы</h1>
	<?php
	if (defined('my_const')){
	    echo "Значение константы my_const:". my_const."<br>";
	} else{
	    echo "Значение константы my_const не определена.<br>";
	}
	echo "Текущая версия PHP:". PHP_VERSION."<br>";
	echo "Директория скрипта:". __DIR__."<br>";
	
	?>
</body>
</html>