<?php
	$now = time();
	$birthday = mktime(0, 0, 0, 12, 15, 2006);
	$hour = getdate($now)['hours'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Использование функций даты и времени</title>
</head>
<body>
	<h1>Использование функций даты и времени</h1>
	<?php
	if ($hour >= 0 && $hour < 6) {
		$welcome = 'Доброй ночи';
	} elseif ($hour >= 6 && $hour < 12) {
		$welcome = 'Доброе утро';
	} elseif ($hour >= 12 && $hour < 18) {
		$welcome = 'Добрый день';
	} elseif ($hour >= 18 && $hour < 23) {
		$welcome = 'Добрый вечер';
	} else {
		$welcome = 'Доброй ночи';
	}
	echo $welcome . '<br>';

	setlocale(LC_TIME, 'ru_RU.UTF-8');

	$formatter = new IntlDateFormatter(
		'ru_RU',
		IntlDateFormatter::LONG,
		IntlDateFormatter::MEDIUM,
		null,
		IntlDateFormatter::GREGORIAN,
		"d MMMM y 'года', EEEE HH:mm:ss"
	);
	echo 'Сегодня ' . datefmt_format($formatter, $now) . '<br>';

	echo 'До моего дня рождения осталось ' . '<br>';

	$birthMonth = (int)date('n', $birthday);
	$birthDay   = (int)date('j', $birthday);

	$birthdayThisYear = mktime(0, 0, 0, $birthMonth, $birthDay, (int)date('Y', $now));
	if ($birthdayThisYear < $now) {
		$birthdayThisYear = mktime(0, 0, 0, $birthMonth, $birthDay, (int)date('Y', $now) + 1);
	}

	$diff = $birthdayThisYear - $now;

	$days    = floor($diff / 86400);
	$hours   = floor(($diff % 86400) / 3600);
	$minutes = floor(($diff % 3600) / 60);
	$seconds = $diff % 60;

	echo $days . ' дн. ' . $hours . ' ч. ' . $minutes . ' мин. ' . $seconds . ' сек.';
	?>
</body>
</html>