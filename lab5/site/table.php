<?php
declare(strict_types=1);

/**
 * Получает положительное целое число из POST-запроса.
 *
 * @param string $key     Имя поля
 * @param int    $default Значение по умолчанию
 * @return int Положительное целое число или значение по умолчанию
 */
function getPositiveInt(string $key, int $default): int
{
	$value = abs((int)($_POST[$key] ?? 0));
	return $value > 0 ? $value : $default;
}

/**
 * Получает строку цвета из POST-запроса.
 *
 * @param string $key     Имя поля
 * @param string $default Значение по умолчанию
 * @return string Очищенная строка цвета
 */
function getColor(string $key, string $default): string
{
	$value = trim(strip_tags((string)($_POST[$key] ?? '')));
	return $value !== '' ? $value : $default;
}

$cols  = 10;
$rows  = 10;
$color = '#ffff00';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$cols  = getPositiveInt('cols', 10);
	$rows  = getPositiveInt('rows', 10);
	$color = getColor('color', '#ffff00');
}
?>
<form method="post" action="<?=htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES, 'UTF-8')?>">
	<label>Количество колонок: </label>
	<br>
	<input name="cols" type="text" value="<?=htmlspecialchars((string)$cols, ENT_QUOTES, 'UTF-8')?>">
	<br>
	<label>Количество строк: </label>
	<br>
	<input name="rows" type="text" value="<?=htmlspecialchars((string)$rows, ENT_QUOTES, 'UTF-8')?>">
	<br>
	<label>Цвет: </label>
	<br>
	<input name="color" type="color" value="<?=htmlspecialchars($color, ENT_QUOTES, 'UTF-8')?>" list="listColors">
	<datalist id="listColors">
		<option>#ff0000</option>
		<option>#00ff00</option>
		<option>#0000ff</option>
	</datalist>
	<br>
	<br>
	<input type="submit" value="Создать">
</form>
<br>
<!-- Таблица -->
<?php drawTable($cols, $rows, $color); ?>
<!-- Таблица -->