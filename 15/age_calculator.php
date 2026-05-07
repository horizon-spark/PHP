<?php require_once 'error_handler.php' ?>
<?php $page_title = "Age calculator" ?>
<?php require_once 'header.php'; ?>
<?php 
    // define('CURRENT_YEAR', 2026);
    const CURRENT_YEAR = 2026;
    const LEGAL_AGE = 18;

    $birthYear = 2009;
    $age = CURRENT_YEAR - $birthYear;
    $messageEnd = "лет";

    echo "<p>Вы $birthYear года рождения<p>";

    if ($age % 10 == 1) {
        $messageEnd = "год";
    } else if ($age % 10 < 5 && $age % 10 != 0) {
        $messageEnd = "года";
    }
    echo "<p>Вам $age $messageEnd<p>";

    if (CURRENT_YEAR - $birthYear >= LEGAL_AGE) {
        echo "Доступ разрешен (совершеннолетний)<br>";
    } else {
        echo "Доступ запрещен (несовершеннолетний)<br>";
    }
?>
<?php require_once 'footer.php'; ?>