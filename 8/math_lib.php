<?php 
    function getSum($a, $b) {
        return $a + $b;
    }
    function getDifference($a, $b) {
        return $a - $b;
    }
    function getProduct($a, $b) {
        return $a * $b;
    }
    function getQuotient($a, $b) {
        if ($b == 0) {
            return "Ошибка: деление на ноль";
        }
        return $a / $b;
    }
?>