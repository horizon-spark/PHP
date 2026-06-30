<?php 
    if (isset($_GET['height']) && !empty($_GET['height']) &&
        filter_var($_GET['height']) &&
        $_GET['height'] >= 1 && $_GET['height'] <= 20) {

        $height = $_GET['height'];
        
        for ($step = 1; $step <= $height; $step++) {
            for ($i = 0; $i < $step; $i++) {
                echo "#";
            }
            echo "<br>";
        }
    } else {
        echo "Введите высоту от 1 до 20 (?height=5)";
    }
?>