<?php 
    function getMax($a, $b) {
        return $a > $b ? $a : $b;
    }

    function getMin($a, $b) {
        return $a < $b ? $a : $b;
    }

    function getAverage($a, $b) {
        return ($a + $b) / 2;
    }

    function calculate($a, $b, $operation) {
        switch($operation) 
        {
            case '+':
                return $a + $b;
            case '-':
                return $a - $b;
            case '*':
                return $a * $b;
            case '/':
                if ($b == 0) {
                    return "Ошибка: деление на 0";
                }
                return $a / $b;
            default:
                return "Ошибка: операция не поддерживается";
        }
    }
?>