<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Мой первый PHP-сайт</title>
</head>
<body>
    <h1>Добро пожаловать на мой сайт!</h1>
    <p>Сегодня: <?php echo date('d.m.Y'); ?></p>
    <p>Текущее время: 
	<?php
		date_default_timezone_set('Europe/Moscow');
		echo date('H:i:s'); 
	?>
    </p>
</body>
</html>
