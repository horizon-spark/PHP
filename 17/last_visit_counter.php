<?php 
    if (!isset($_COOKIE['visits'])) {
        setcookie('visits', 1, time() + 3600 * 24 * 30);
    } else {
        setcookie('visits', $_COOKIE['visits'] + 1, time() + 3600 * 24 * 30);
    }

    $visits = $_COOKIE['visits'];

    echo "Вы посетили эту страницу $visits раз";
?>