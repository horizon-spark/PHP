<?php 
    if (file_exists("counter.txt")) {
        $content = file_get_contents("counter.txt");
        $content_int = (int)$content;
        $content_int++;

        file_put_contents("counter.txt", $content_int);
        echo "<p>Эта страница была просмотрена $content_int раз</p>";
    } else {
        file_put_contents("counter.txt", 0);
        echo "<p>Файл counter.txt был создан, чтобы увидеть содержимое
            перезагрузите страницу</p>";
    }
?>