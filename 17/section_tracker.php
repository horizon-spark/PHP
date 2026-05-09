<?php 
    if (isset($_GET['section'])) {
        $last_section = $_GET['section'];

        setcookie('last_section', $last_section, time() + 3600 * 24 * 30);
    }

    if (isset($_POST['delete_cookies'])) {
        setcookie('last_section', "", time() - 1);
    }

    if (isset($_COOKIE['last_section'])) {
        $last_section = $_COOKIE['last_section'];

        echo "<p>В прошлый раз вы были в разделе: $last_section</p>";
    } else {
        echo "<p>Добро пожаловать! Выберите раздел</p>";
    }
?>

<nav>
    <a href="section_tracker.php?section=home">Главная</a>
    <a href="section_tracker.php?section=news">Новости</a>
    <a href="section_tracker.php?section=contacts">Контакты</a>
</nav>
<br>
<form action="" method="POST">
    <input name="delete_cookies" hidden>
    <button type="submit">Удалить куки</button>
</form>