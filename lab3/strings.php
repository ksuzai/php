<?php
	$login    = ' User ';
	$password = 'megaP@ssw0rd';
	$name     = 'иван';
	$email    = 'ivan@petrov.ru';
	$code     = '<?=$login?>';
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Использование функций обработки строк</title>
</head>
<body>

<?php
	$login = mb_strtolower(trim($login));
	echo 'Логин: ' . $login . '<br>';

	function isStrongPassword($pass)
	{
		if (mb_strlen($pass) < 8) {
			return false;
		}
		if (!preg_match('/[A-Z]/', $pass)) {
			return false;
		}
		if (!preg_match('/[a-z]/', $pass)) {
			return false;
		}
		if (!preg_match('/[0-9]/', $pass)) {
			return false;
		}
		return true;
	}

	if (isStrongPassword($password)) {
		echo 'Пароль достаточно сложный.<br>';
	} else {
		echo 'Пароль НЕ соответствует требованиям.<br>';
	}

	$name = mb_convert_case($name, MB_CASE_TITLE, 'UTF-8');
	echo 'Имя: ' . $name . '<br>';

	if (filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {
		echo 'E-mail корректен: ' . $email . '<br>';
	} else {
		echo 'E-mail НЕ корректен.<br>';
	}

	echo 'Код: ' . htmlspecialchars($code, ENT_QUOTES, 'UTF-8') . '<br>';
?>
</body>
</html>