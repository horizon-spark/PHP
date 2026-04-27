<?php 
    require_once 'math_functions_lib.php';

    $a = 7;
    $b = 12;

    echo "a = $a, b = $b, max = " . getMax($a, $b) . "<br>";
    echo "a = $a, b = $b, min = " . getMin($a, $b) . "<br>";
    echo "a = $a, b = $b, aver = " . getAverage($a, $b) . "<br>";

?>