<?php
declare(strict_types=1);

require_once __DIR__ . '/inc/lib.inc.php';
require_once __DIR__ . '/inc/data.inc.php';

/**
 * Возвращает приветствие в зависимости от текущего часа суток.
 *
 * @param int $hour Текущий час (0–23)
 * @return string Приветствие
 */
function getWelcome(int $hour): string
{
	if ($hour >= 0 && $hour < 6) {
		return 'Доброй ночи';
	}
	if ($hour >= 6 && $hour < 12) {
		return 'Доброе утро';
	}
	if ($hour >= 12 && $hour < 18) {
		return 'Добрый день';
	}
	if ($hour >= 18 && $hour < 23) {
		return 'Добрый вечер';
	}
	return 'Доброй ночи';
}

$now = time();
$hour = (int)getdate($now)['hours'];
$welcome = getWelcome($hour);

// Инициализация заголовков страницы
$title = 'Сайт нашей школы';
$header = "$welcome, Гость!";
$id = strtolower(strip_tags(trim($_GET['id'] ?? '')));
switch ($id) {
	case 'about':
		$title = 'О сайте';
		$header = 'О нашем сайте';
		break;
	case 'contact':
		$title = 'Контакты';
		$header = 'Обратная связь';
		break;
	case 'table':
		$title = 'Таблица умножения';
		$header = 'Таблица умножения';
		break;
	case 'calc':
		$title = 'Он-лайн калькулятор';
		$header = 'Калькулятор';
		break;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?=$title?></title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header>
		<!-- Верхняя часть страницы -->
		<?php require_once __DIR__ . '/inc/top.inc.php'; ?>
		<!-- Верхняя часть страницы -->
	</header>

	<section>
		<!-- Заголовок -->
		<h1><?=$header?></h1>
		<!-- Заголовок -->
		<!-- Область основного контента -->
		<?php
		switch ($id) {
			case 'about':
				include __DIR__ . '/about.php';
				break;
			case 'contact':
				include __DIR__ . '/contact.php';
				break;
			case 'table':
				include __DIR__ . '/table.php';
				break;
			case 'calc':
				include __DIR__ . '/calc.php';
				break;
			default:
				include __DIR__ . '/inc/index.inc.php';
		}
		?>
		<!-- Область основного контента -->
	</section>

	<nav>
		<!-- Навигация -->
		<?php require_once __DIR__ . '/inc/menu.inc.php'; ?>
		<!-- Навигация -->
	</nav>

	<footer>
		<!-- Нижняя часть страницы -->
		<?php require_once __DIR__ . '/inc/bottom.inc.php'; ?>
		<!-- Нижняя часть страницы -->
	</footer>
</body>
</html>