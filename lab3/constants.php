<?php
declare(strict_types=1);

function formatConstantValue(mixed $value): string
{
	if (is_array($value)) {
		return 'Array';
	}
	if (is_bool($value)) {
		return $value ? 'true' : 'false';
	}
	if ($value === null) {
		return 'null';
	}
	if (is_float($value)) {
		if (is_nan($value)) {
			return 'NAN';
		}
		if (is_infinite($value)) {
			return $value > 0 ? 'INF' : '-INF';
		}
	}
	return (string)$value;
}

$constants = get_defined_constants(true);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Определённые константы PHP</title>
	<style>
		body {
			font-family: sans-serif;
			margin: 20px;
		}
		h1 {
			color: #333;
		}
		h2 {
			color: #2A4F6F;
			margin-top: 30px;
		}
		table {
			border-collapse: collapse;
			width: 100%;
			max-width: 800px;
			margin-bottom: 20px;
		}
		th, td {
			border: 1px solid #ccc;
			padding: 8px 12px;
			text-align: left;
		}
		th {
			background-color: #f4f4f4;
			font-weight: bold;
		}
		tr:nth-child(even) {
			background-color: #fafafa;
		}
	</style>
</head>
<body>
	<h1>Определённые константы PHP</h1>
	<?php
	foreach ($constants as $category => $items) {
		echo '<h2>' . htmlspecialchars((string)$category, ENT_QUOTES, 'UTF-8') . '</h2>';
		echo '<table>';
		echo '<tr><th>Константа</th><th>Значение</th></tr>';
		foreach ($items as $name => $value) {
			echo '<tr>';
			echo '<td>' . htmlspecialchars((string)$name, ENT_QUOTES, 'UTF-8') . '</td>';
			echo '<td>' . htmlspecialchars(formatConstantValue($value), ENT_QUOTES, 'UTF-8') . '</td>';
			echo '</tr>';
		}
		echo '</table>';
	}
	?>
</body>
</html>