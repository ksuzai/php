<?php
declare(strict_types=1);

/**
 * Выполняет арифметическую операцию над двумя числами.
 *
 * @param float  $num1     Первое число
 * @param string $operator Оператор (+, -, *, /)
 * @param float  $num2     Второе число
 * @return float|string Результат вычисления или сообщение об ошибке
 */
function calculate(float $num1, string $operator, float $num2): float|string
{
	switch ($operator) {
		case '+':
			return $num1 + $num2;
		case '-':
			return $num1 - $num2;
		case '*':
			return $num1 * $num2;
		case '/':
			if ($num2 == 0) {
				return 'Ошибка: деление на ноль!';
			}
			return $num1 / $num2;
		default:
			return 'Ошибка: неизвестный оператор!';
	}
}

$result = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$num1 = filter_var($_POST['num1'] ?? '', FILTER_VALIDATE_FLOAT);
	$num2 = filter_var($_POST['num2'] ?? '', FILTER_VALIDATE_FLOAT);
	$operator = trim(strip_tags($_POST['operator'] ?? ''));

	if ($num1 !== false && $num2 !== false && $operator !== '') {
		$result = calculate((float)$num1, $operator, (float)$num2);
	} else {
		$result = 'Ошибка: введите корректные числа!';
	}
}
?>

<?php if ($result !== null): ?>
	<p><strong>Результат: <?=htmlspecialchars((string)$result, ENT_QUOTES, 'UTF-8')?></strong></p>
<?php endif; ?>

<form action="<?=htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES, 'UTF-8')?>" method="post">

	<p><label for="num1">Число 1</label><br>
	<input type="text" name="num1" id="num1" required></p>

	<p><label for="operator">Оператор</label><br>
	<select name="operator" id="operator">
		<option value="+" selected>+</option>
		<option value="-">-</option>
		<option value="*">*</option>
		<option value="/">/</option>
	</select></p>

	<p><label for="num2">Число 2</label><br>
	<input type="text" name="num2" id="num2" required></p>

	<button type="submit">Считать!</button>

</form>