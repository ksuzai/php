<?php
declare(strict_types=1);

/**
 * Получает список файлов-изображений в текущей директории.
 *
 * @return array<int, string> Массив имён файлов
 */
function getImageFiles(): array
{
	$files = scandir(__DIR__);
	if ($files === false) {
		return [];
	}
	
	$images = [];
	$allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
	
	foreach ($files as $file) {
		if ($file === '.' || $file === '..' || $file === 'index.php') {
			continue;
		}
		$ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
		if (in_array($ext, $allowedExtensions, true)) {
			$images[] = $file;
		}
	}
	return $images;
}

$images = getImageFiles();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Галерея изображений</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f4f4f4;
			margin: 0;
			padding: 20px;
		}
		h1 {
			text-align: center;
			color: #333;
		}
		.gallery {
			display: flex;
			flex-wrap: wrap;
			gap: 20px;
			justify-content: center;
		}
		.gallery-item {
			background: #fff;
			padding: 10px;
			border-radius: 8px;
			box-shadow: 0 4px 6px rgba(0,0,0,0.1);
			transition: transform 0.2s;
		}
		.gallery-item:hover {
			transform: scale(1.05);
		}
		.gallery-item img {
			display: block;
			max-width: 250px;
			max-height: 250px;
			height: auto;
			border-radius: 4px;
			object-fit: cover;
		}
	</style>
</head>
<body>

<h1>Наша Галерея</h1>

<div class="gallery">
	<?php if (empty($images)): ?>
		<p>В галерее пока нет изображений.</p>
	<?php else: ?>
		<?php foreach ($images as $image): ?>
			<div class="gallery-item">
				<img src="<?=htmlspecialchars($image, ENT_QUOTES, 'UTF-8')?>" alt="<?=htmlspecialchars($image, ENT_QUOTES, 'UTF-8')?>">
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
</div>

</body>
</html>