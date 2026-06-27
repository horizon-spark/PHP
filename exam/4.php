<?php 
    if (isset($_POST['numbers']) && !empty($_POST['numbers'])) {
        $numbers = explode(',', $_POST['numbers']);
        $odd = [];
        $even = [];

        foreach ($numbers as $number) {
            if ($number % 2 == 0) {
                $even[] = $number;
            } else {
                $odd[] = $number;
            }
        }

        echo "<h3>Четные числа:</h3>";
        echo "<ul>";
        foreach ($even as $num) {
            echo "<li>$num</li>";
        }
        echo "</ul>";

        echo "<h3>Нечетные числа:</h3>";
        echo "<ul>";
        foreach ($odd as $num) {
            echo "<li>$num</li>";
        }
        echo "</ul>";
    } else {
        echo "Введите числа через запятую";
    }
?>

<form action="" method="post">
    <input type="text" name="numbers" 
        placeholder="Введите числа, например: 4,7,12,9,3">
    <button type="submit">Отправить</button>
</form>