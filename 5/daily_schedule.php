<?php 
    date_default_timezone_set("Europe/Moscow");
    $hour = date('H');

    if ($hour <= 5) {
        echo "Ночь (00:00-05:00)<br>" . "Пора спать!";
    } else if ($hour <= 11) {
        echo "Утро (6:00-11:00)<br>" . "Сделайте зарядку!";
    } else if ($hour <= 17) {
        echo "День (12:00-17:00)<br>" . "Время продуктивной работы!";
    } else {
        echo "Вечер (18:00-23:00)<br>" . "Отдых и хобби!";
    }
    echo "<p>Текущее время: " . date("H:i") . "</p>";
?>