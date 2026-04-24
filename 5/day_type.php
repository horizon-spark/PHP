<?php 
    $dayNum = date('N');

    switch(true)
    {
        case ($dayNum >= 1 && $dayNum <= 5):
            echo "Будний день. Пора работать!";
            break;
        case ($dayNum >= 6 && $dayNum <= 7):
            echo "Выходной день. Можно отдохнуть!";
            break;
        default:
            echo "Ошибка";
            break;
    }

    echo "<p>До ближайших выходных " . 6 - $dayNum . " дней</p>";
?>