<?php 
    if (isset($_GET['max']) && !empty($_GET['max']) &&
        filter_var($_GET['max'], FILTER_VALIDATE_INT) &&
        $_GET['max'] > 0) {

        $max = $_GET['max'];

        echo "<ul>";
        for ($i = 1; $i <= $max; $i++) {
            if ($i % 3 == 0 && $i % 5 == 0) {
                echo "<li>FizzBuzz</li>";
            } else if ($i % 3 == 0) {
                echo "<li>Fizz</li>";
            } else if ($i % 5 == 0) {
                echo "<li>Buzz</li>";
            } else {
                echo "<li>$i</li>";
            }
        }
        echo "</ul>";
    } else {
        echo "Укажите положительное число (?max=15)";
    }
?>