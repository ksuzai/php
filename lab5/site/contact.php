<?php
declare(strict_types=1);

/**
 * Отправляет электронное письмо через функцию mail().
 *
 * @param string $to      Адрес получателя
 * @param string $subject Тема письма
 * @param string $body    Текст письма
 * @param string $from    Адрес отправителя
 * @return bool Успешно ли отправлено письмо
 */
function sendEmail(string $to, string $subject, string $body, string $from): bool
{
	$headers = [
		'From' => $from,
		'Reply-To' => $from,
		'Content-Type' => 'text/plain; charset=utf-8',
		'MIME-Version' => '1.0'
	];

	$headersString = '';
	foreach ($headers as $key => $value) {
		$headersString .= $key . ': ' . $value . "\r\n";
	}

	return mail($to, $subject, $body, $headersString);
}

$mailStatus = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$subject = trim(strip_tags($_POST['subject'] ?? ''));
	$body = trim(strip_tags($_POST['body'] ?? ''));

	if ($subject !== '' && $body !== '') {
		$myEmail = 'kseniazaiats@gmail.com'; 
		$fromEmail = 'admin@center.ogu';

		$subject = htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');
		$body = htmlspecialchars($body, ENT_QUOTES, 'UTF-8');

		if (sendEmail($myEmail, $subject, $body, $fromEmail)) {
			$mailStatus = '<p style="color:green;">Сообщение успешно отправлено!</p>';
		} else {
			$mailStatus = '<p style="color:red;">Ошибка при отправке сообщения.</p>';
		}
	} else {
		$mailStatus = '<p style="color:red;">Заполните все поля формы.</p>';
	}
}
?>

<h3>Адрес</h3>
<address>123456 Москва, Малый Американский переулок 21</address>

<h3>Задайте вопрос</h3>

<?=$mailStatus?>

<form method="post" action="<?=htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES, 'UTF-8')?>">
	<label>Тема письма: </label>
	<br>
	<input name="subject" type="text" size="50" required>
	<br>
	<label>Содержание: </label>
	<br>
	<textarea name="body" cols="50" rows="10" required></textarea>
	<br>
	<br>
	<input type="submit" value="Отправить">
</form>