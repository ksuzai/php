<?php
	$constants = get_defined_constants(true);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Определённые константы PHP</title>
</head>
<body>
	<h1>Определённые константы PHP</h1>
	<?php
	foreach ($constants as $category => $items) {
		echo '<h2>' . htmlspecialchars($category, ENT_QUOTES, 'UTF-8') . '</h2>';
		echo '<table border="1" cellpadding="4" cellspacing="0">';
		echo '<tr><th>Константа</th><th>Значение</th></tr>';
		foreach ($items as $name => $value) {
			echo '<tr>';
			echo '<td>' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . '</td>';
			echo '<td>' . htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8') . '</td>';
			echo '</tr>';
		}
		echo '</table>';
	}
	?>
</body>
</html>