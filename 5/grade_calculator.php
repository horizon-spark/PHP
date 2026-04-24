<?php 
    $score = 80;

    if ($score >= 90 && $score <= 100) {
        echo "Отлично";
    } elseif ($score >= 75 && $score <= 89) {
        echo "Хорошо";
    } elseif ($score >= 50 && $score <= 74) {
        echo "Удовлетворительно";
    } elseif ($score >= 0 && $score <= 49) {
        echo "Неудовлетворительно";
    } else {
        echo "Ошибка: балл вне диапазона 0 - 100";
    }
?>