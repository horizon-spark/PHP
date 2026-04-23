<?php 
    $number = 42;

    $str_number = (string) $number;
    $bool_number = (bool) $number;
    $float_number = (float) $number;

    echo gettype($str_number) . ' ' . $str_number . '<br>' .
        gettype($bool_number) . ' ' . $bool_number . '<br>' .
        gettype($float_number) . ' ' . $float_number . '<br>';
?>