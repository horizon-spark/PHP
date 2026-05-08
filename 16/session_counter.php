<?php 
    session_start();

    if (!isset($_SESSION['page_views'])) {
        $_SESSION['page_views'] = 0;
    } else {
        $_SESSION['page_views']++;
    }

    $counter = $_SESSION['page_views'] + 1;

    echo "<p>Вы посмотрели эту страницу $counter раз за текущую сессию</p>";
?>