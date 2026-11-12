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
$num1 = '';
$num2 = '';
$operator = '+';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$num1 = $_POST['num1'] ?? '';
	$num2 = $_POST['num2'] ?? '';
	$operator = $_POST['operator'] ?? '+';

	$validNum1 = filter_var($num1, FILTER_VALIDATE_FLOAT);
	$validNum2 = filter_var($num2, FILTER_VALIDATE_FLOAT);
	$validOperator = trim(strip_tags((string)$operator));

	if ($validNum1 !== false && $validNum2 !== false && $validOperator !== '') {
		$result = calculate((float)$validNum1, $validOperator, (float)$validNum2);
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
	<input type="number" step="any" name="num1" id="num1" required value="<?=htmlspecialchars((string)$num1, ENT_QUOTES, 'UTF-8')?>"></p>

	<p><label for="operator">Оператор</label><br>
	<select name="operator" id="operator">
		<option value="+" <?= $operator === '+' ? 'selected' : '' ?>>+</option>
		<option value="-" <?= $operator === '-' ? 'selected' : '' ?>>-</option>
		<option value="*" <?= $operator === '*' ? 'selected' : '' ?>>*</option>
		<option value="/" <?= $operator === '/' ? 'selected' : '' ?>>/</option>
	</select></p>

	<p><label for="num2">Число 2</label><br>
	<input type="number" step="any" name="num2" id="num2" required value="<?=htmlspecialchars((string)$num2, ENT_QUOTES, 'UTF-8')?>"></p>

	<button type="submit">Считать!</button>

</form>