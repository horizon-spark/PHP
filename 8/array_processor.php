<?php 
    function processArray($arr, $operation) {
        switch($operation)
        {
            case 'sum':
                $sum = 0;
                foreach ($arr as $item) {
                    $sum += $item;
                }
                return $sum;
            case 'product':
                $prod = 1;
                foreach ($arr as $item) {
                    $prod *= $item;
                }
                return $prod;
            case 'average':
                $sum = 0;
                $len = count($arr);
                foreach ($arr as $item) {
                    $sum += $item;
                }
                return $sum / $len;
            default:
                return "Ошибка: операция не поддерживается";
        }
    }

    function printArray($arr) {
        $size = count($arr);

        for ($i = 0; $i < $size; $i++) {
            if ($i == 0) {
                echo "[$arr[$i], ";
            } elseif ($i == $size - 1) {
                echo "$arr[$i]]<br>";
            } else {
                echo "$arr[$i], ";
            }
        }
    }

    $arr = [1, 2, 3, 4, 5, 6];
    
    echo "Исходный массив: ";
    printArray($arr);
    echo "Сумма элементов: " . processArray($arr, "sum") . "<br>";
    echo "Произведение элементов: " . processArray($arr, "product") . "<br>";
    echo "Среднее арифметическое элементов: " . processArray($arr, "average") . "<br>";
    echo "Неизвестная операция: " . processArray($arr, "unknown_operation") . "<br>";
?>