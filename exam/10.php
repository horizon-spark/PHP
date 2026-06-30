<form action="" method="post">
    <input type="text" name="numbers"
        placeholder="Введите числа, разделенные пробелами, например: 34 7 23 89 12">
    <button type="submit">Отправить</button>
</form>

<?php 
    if (isset($_POST['numbers']) && !empty($_POST['numbers'])) {
        $numbers = explode(' ', $_POST['numbers']);

        if (count(array_filter($numbers, 'is_numeric')) !== count($numbers)) {
            echo "В массиве содержатся нечисловые элементы";
            exit();
        }
        
        $sum = 0;
        $min = 999999;
        $max = -999999;

        echo "Введенный массив: ";
        foreach ($numbers as $number) {
            echo "$number ";

            $sum += $number;

            if ($min > $number) {
                $min = $number;
            }
            if ($max < $number) {
                $max = $number;
            }
        }

        $average = $sum / count($numbers);

        echo "<p>Минимальный элемент: $min</p>";
        echo "<p>Максимальный элемент: $max</p>";
        echo "<p>Среднее арифметическое: $average</p>";
    } else {
        echo "Введите числа через пробел";
    }
?>