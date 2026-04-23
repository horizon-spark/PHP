<?php 
    $birthYear = 2004;
    $currentYear = date('Y');
    $age = $currentYear - $birthYear;
    $messageEnd = "лет";

    echo "<p>Вы $birthYear года рождения<p>";

    if ($age % 10 == 1) {
        $messageEnd = "год";
    } else if ($age % 10 < 5 && $age % 10 != 0) {
        $messageEnd = "года";
    }
    echo "<p>Вам $age $messageEnd<p>";
?>