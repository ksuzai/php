<?php
declare(strict_types=1);

/**
 * Выводит таблицу умножения.
 *
 * @param int    $cols  Количество колонок
 * @param int    $rows  Количество строк
 * @param string $color Цвет заголовков (первая строка/столбец)
 * @return void
 */
function drawTable(int $cols = 5, int $rows = 5, string $color = '#ff0000'): void
{
	echo '<table>';
	for ($tr = 1; $tr <= $rows; $tr++) {
		echo '<tr>';
		for ($td = 1; $td <= $cols; $td++) {
			if ($tr == 1 || $td == 1) {
				echo '<th style="background-color: ' . htmlspecialchars($color, ENT_QUOTES, 'UTF-8') . ';">' . ($tr * $td) . '</th>';
			} else {
				echo '<td>' . ($tr * $td) . '</td>';
			}
		}
		echo '</tr>';
	}
	echo '</table>';
}

/**
 * Выводит список ссылок навигации.
 *
 * @param array<string, string> $items Ассоциативный массив «ссылка => подпись»
 * @return void
 */
function getMenu(array $items = []): void
{
	echo '<ul>';
	foreach ($items as $link => $title) {
		echo '<li><a href="' . htmlspecialchars($link, ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($title, ENT_QUOTES, 'UTF-8') . '</a></li>';
	}
	echo '</ul>';
}
?>