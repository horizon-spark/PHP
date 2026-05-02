<?php 
    $content = file_get_contents("messages.txt");

    if ($content) {
        $logs = explode("\n", $content);

        foreach ($logs as $log) {
            echo "<p>$log</p>";
        }

    } else {
        echo "Сообщений пока нет";
    }
?>

<a href="save_feedback.php">Назад к форме</a>