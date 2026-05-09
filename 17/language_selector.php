<?php 
    if (isset($_POST['language'])) {
        $language = $_POST['language'];

        if (!empty($language)) {
            setcookie('language', $language, time() + 3600 * 24 * 30);
        }
    }

    $language = 'ru';
    if (isset($_COOKIE['language'])) {
        $language = $_COOKIE['language'];
    }

    switch ($language)
    {
        case 'en':
            echo "Hello, welcome!";
            break;
        case 'de':
            echo "Hallo, Willkommen!";
            break;
        default:
            echo "Привет, добро пожаловать!";
    }
?>
<form action="" method="POST">
    <select name="language">
        <option value="ru">Русский</option>
        <option value="en">Английский</option>
        <option value="de">Немецкий</option>
    </select>
    <button type="submit">Выбрать</button>
</form>