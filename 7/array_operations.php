<?php 
    const N = 10;
    $numbers;
    for ($i = 0; $i < N; $i++) {
        $numbers[] = rand(1, 100);
    }

    $sum = array_sum($numbers);
    $average = $sum / N;
    $max = max($numbers);
    $min = min($numbers);

    echo print_r($numbers) . "<br>";
    echo "Сумма элементов: $sum<br>";
    echo "Среднее арифметическое: $average<br>";
    echo "Максимальный элемент: $max<br>";
    echo "Минимальный элемент: $min";
?>