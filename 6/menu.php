<?php 
    $menu = ['Главная' => 'index.php',
    'Новости' => 'news_list.php',
    'Контакты' => 'contact.php'];

    echo "<ul>";
    foreach ($menu as $title => $link) {
        echo "<li style='display:inline;padding:10px'>
                <a href='$link'>$title</a>
            </li>";
    }
    echo "</ul>";
?>