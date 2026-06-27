<?php 
    function is_prime($num) {
        if ($num === 1) {
            return false;
        }

        for ($i = 2; $i < $num; $i++) {
            if ($num % $i === 0) {
                return false;
            }
        }
        return true;
    }

    if (isset($_GET['number']) && !empty($_GET['number']) &&
        filter_var($_GET['number'], FILTER_VALIDATE_INT) &&
        $_GET['number'] > 0) {

        $number = (int)$_GET['number'];
        $message = is_prime($number) ? "Число простое" : "Число составное";

        echo "<p>$message</p>";
    } else {
        echo "Введите целое положительное число (?number=17)";
    }

?>