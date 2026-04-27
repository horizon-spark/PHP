<?php 
    require_once "math_lib.php";

    $a = 5;
    $b = 13;

    echo "$a + $b = " . getSum($a, $b) . "<br>";
    echo "$a - $b = " . getDifference($a, $b) . "<br>";
    echo "$a * $b = " . getProduct($a, $b) . "<br>";
    echo "$a / $b = " . getQuotient($b, $a) . "<br>";
    echo "$a / 0 = " . getQuotient($a, 0) . "<br>";
?>