<?php 
    $category = $_GET['category'];
    if (!isset($category) || empty($category)) {
        echo "<p>Выберите категорию</p>";
    } else if ($category == 'news' ||
            $category == 'articles' ||
            $category == 'reviews') {
        echo "<p>Вы в разделе: $category</p>";
    } else {
        echo "<p>Категория не найдена</p>";
    }
?>