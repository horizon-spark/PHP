<?php 
    function printArray($arr, $title = '') {
        $size = count($arr);

        if ($title) {
            echo "<p>$title</p>";
        }

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

    function sum($acc, $item) {
        $acc += $item;
        return $acc;
    }

    $arr = [];
    for ($i = 0; $i < 20; $i++) {
        $arr[] = rand(1, 50);
    }

    $revesed = array_reverse($arr);

    printArray($arr, "Исходный массив");

    sort($arr);
    printArray($arr, "Отсортированный массив");

    printArray($revesed, "Перевернутый исходный массив");

    echo "<p>Сумма элементов массива: " . array_reduce($arr, "sum") . "</p>";

    $unique = [];
    foreach ($arr as $item) {
        if (in_array($item, $unique)) {
            continue;
        }
        $unique[] = $item;
    }

    printArray($unique, "Уникальные значения");

    $even = array_filter($arr, function($item) {
        return $item % 2 == 0;
    });

    printArray($even, "Четные значения");
?>