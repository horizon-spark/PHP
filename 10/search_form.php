<?php 
    if (isset($_GET['query'])) {
        if ($_GET['query'] != "") {
            echo "<p>Результаты поиска по запросу: {$_GET['query']}</p>";
        } else {
            echo "<p>Введите поисковый запрос</p>";
        }
    } else {
        echo "<p>Приглашение ко вводу</p>";
    }
?>
<form action="" method="GET">
    <input type="text" name="query">
    <button type="submit">Отправить</button>
</form>