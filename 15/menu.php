<?php 
    $menu = ['Главная' => '#', 'О сайте' => '#', 'Контакты' => '#'];

    echo "<nav>";
    foreach ($menu as $title => $link) {
        echo "<a href=$link>$title</a>";
    }
    echo "</nav>";
?>