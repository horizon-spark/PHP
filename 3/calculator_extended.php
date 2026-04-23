<?php 
    $a = 5;
    $b = 6;
    $operation = '*';
    $result;
    $error = false;
    $error_message;

    switch($operation) {
        case '+':
            $result = $a + $b;
            break;
        case '-':
            $result = $a - $b;
            break;
        case '*':
            $result = $a * $b;
            break;
        case '/':
            if ($b == 0) {
                $error = true;
                $error_message = 'деление на 0';
            } else {
                $result = $a / $b;
            }
            break;
        default:
            $error = true;
            $error_message = 'операция задана некорректно';
    }
    if ($error) {
        echo "Ошибка: $error_message";
    } else {
        echo "a = $a<br>b = $b<br>a $operation b = $result";
    }
?>