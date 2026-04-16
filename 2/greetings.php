<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $name = "Дмитрий";
        date_default_timezone_set('Europe/Moscow');
        $hour = date('H');
        $message;

        if ($hour < 6) {
            $message = "Доброй ночи";
        } else if ($hour < 12) {
            $message = "Доброе утро";
        } else if ($hour < 18) {
            $message = "Добрый день";
        } else {
            $message = "Добрый вечер";
        }

        echo $message . ', ' . $name;
    ?>
</body>
</html>