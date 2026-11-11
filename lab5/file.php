<?php
declare(strict_types=1);

const DB_FILE = __DIR__ . '/db/users.txt';

/**
 * Фильтрует и очищает входную строку.
 *
 * @param string $value Входная строка
 * @return string Очищенная строка
 */
function sanitizeInput(string $value): string
{
	$value = trim($value);
	$value = strip_tags($value);
	return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

/**
 * Добавляет нового пользователя в файл базы данных.
 *
 * @param string $fname Имя
 * @param string $lname Фамилия
 * @return void
 */
function addUserToFile(string $fname, string $lname): void
{
	if (!is_dir(__DIR__ . '/db')) {
		mkdir(__DIR__ . '/db', 0755, true);
	}
	$stringToWrite = $fname . '|' . $lname . PHP_EOL;
	file_put_contents(DB_FILE, $stringToWrite, FILE_APPEND | LOCK_EX);
}

// ЗАДАНИЕ 1
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$fname = sanitizeInput($_POST['fname'] ?? '');
	$lname = sanitizeInput($_POST['lname'] ?? '');

	if ($fname !== '' && $lname !== '') {
		addUserToFile($fname, $lname);
	}

	// Перезапрос текущей страницы для избавления от POST-данных
	header('Location: ' . $_SERVER['PHP_SELF']);
	exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Работа с файлами</title>
</head>
<body>

<h1>Заполните форму</h1>

<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
	Имя: <input type="text" name="fname"><br>
	Фамилия: <input type="text" name="lname"><br>
	<br>
	<input type="submit" value="Отправить!">
</form>

<?php
// ЗАДАНИЕ 2
if (file_exists(DB_FILE)) {
	$lines = file(DB_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	if ($lines !== false) {
		foreach ($lines as $index => $line) {
			$parts = explode('|', $line);
			echo '<p>' . ($index + 1) . ': ' . ($parts[0] ?? '') . ' ' . ($parts[1] ?? '') . '</p>';
		}
	}
	echo '<p>Размер файла: ' . filesize(DB_FILE) . ' байт.</p>';
}
?>

</body>
</html>