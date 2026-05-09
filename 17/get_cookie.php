<?php 
    if (isset($_COOKIE['username'])) {
        $username = $_COOKIE['username'];
        $last_visit = $_COOKIE['last_visit'];

        echo "Добро пожаловать $username! Ваш последний визит был: $last_visit";

    } else {
        echo "Вы не посещали сайт ранее или куки были удалены";
        echo "<a href='set_cookie.php'>Получить куки</a>";
    }
?>