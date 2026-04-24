<?php 
    // const PI = 3.14159;
    define('PI', 3.14159);

    $radius = 5;
    $length = 2 * PI * $radius;

    echo sprintf("Длина окружности: %.2f", $length);
?>