<?php 
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
    echo "a / 0 = " . calculate($a, 0, $div) . "<br>";
?>