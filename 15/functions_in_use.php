<?php
    require_once 'error_handler.php';
    require_once 'functions.php';

    $a = 6;
    $b = 3;
    $sum = '+';
    $diff = '-';
    $mult = '*';
    $div = '/';

    echo "a + b = " . calculate($a, $b, $sum) . "<br>";
    echo "a - b = " . calculate($a, $b, $diff) . "<br>";
    echo "a * b = " . calculate($a, $b, $mult) . "<br>";
    echo "a / b = " . calculate($a, $b, $div) . "<br>";
    echo "a / 0 = " . calculate($a, 0, $div) . "<br><br>";

    echo "a = $a, b = $b, getMax(a, b) = " . getMax($a, $b) . "<br>";
    echo "a = $a, b = $b, getMin(a, b) = " . getMin($a, $b) . "<br>";
    echo "a = $a, b = $b, getAverage(a, b) = " . getAverage($a, $b) . "<br>";
?>