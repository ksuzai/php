<?php
declare(strict_types=1);

/**
 * Выводит информацию о загруженном файле.
 *
 * @param array $file Массив данных файла из $_FILES
 * @return void
 */
function printFileInfo(array $file): void
{
	echo '<ul>';
	echo '<li>Имя файла: ' . htmlspecialchars($file['name'], ENT_QUOTES, 'UTF-8') . '</li>';
	echo '<li>Размер: ' . $file['size'] . ' байт</li>';
	echo '<li>Временный файл: ' . htmlspecialchars($file['tmp_name'], ENT_QUOTES, 'UTF-8') . '</li>';
	echo '<li>Тип (mime_content_type): ' . htmlspecialchars((string)mime_content_type($file['tmp_name']), ENT_QUOTES, 'UTF-8') . '</li>';
	echo '<li>Код ошибки: ' . $file['error'] . '</li>';
	echo '</ul>';
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fupload'])) {
	$file = $_FILES['fupload'];

	if ($file['error'] === UPLOAD_ERR_OK) {
		ob_start();
		printFileInfo($file);
		$message = ob_get_clean();

		$mimeType = mime_content_type($file['tmp_name']);
		
		if ($mimeType === 'image/jpeg') {
			$uploadDir = __DIR__ . '/upload';
			if (!is_dir($uploadDir)) {
				mkdir($uploadDir, 0755, true);
			}
			$newName = md5_file($file['tmp_name']) . '.jpg';
			$destination = $uploadDir . '/' . $newName;

			if (move_uploaded_file($file['tmp_name'], $destination)) {
				$message .= '<p style="color:green;">Файл успешно загружен и сохранён как ' . $newName . '</p>';
			} else {
				$message .= '<p style="color:red;">Ошибка при перемещении файла.</p>';
			}
		} else {
			$message .= '<p style="color:red;">Разрешена загрузка только файлов JPEG.</p>';
		}
	} else {
		$message = '<p style="color:red;">Ошибка загрузки. Код: ' . $file['error'] . '</p>';
	}
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Загрузка файла на сервер</title>
</head>
<body>
	<div>
		<?=$message?>
	</div>
	<form enctype="multipart/form-data" action="<?=htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8')?>" method="post">
		<p>
			<input type="hidden" name="MAX_FILE_SIZE" value="10485760">
			<input type="file" name="fupload"><br>
			<button type="submit">Загрузить</button>
		</p>
	</form>
</body>
</html>