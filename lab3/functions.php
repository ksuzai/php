<?php
	$extensions = get_loaded_extensions();
	sort($extensions);
	$total = 0;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Функции загруженных модулей</title>
</head>
<body>
	<h1>Функции загруженных модулей</h1>
	<?php
	foreach ($extensions as $ext) {
		$funcs = get_extension_funcs($ext);

		echo '<h2>' . htmlspecialchars($ext, ENT_QUOTES, 'UTF-8') . '</h2>';

		if ($funcs === false || count($funcs) === 0) {
			echo '<p>Функции отсутствуют.</p>';
			continue;
		}

		sort($funcs);
		$total += count($funcs);

		echo '<ul>';
		foreach ($funcs as $func) {
			echo '<li>' . htmlspecialchars($func, ENT_QUOTES, 'UTF-8') . '</li>';
		}
		echo '</ul>';
	}

	echo '<h2>Всего функций: ' . $total . '</h2>';
	?>
</body>
</html>