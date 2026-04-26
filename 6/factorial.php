<?php 
    for ($i = 1, $res = 1; $i <= 10; $i++) {
        $res *= $i;

        if ($i < 10) {
            echo "$i * ";
        } else {
            echo "$i = $res"; 
        }
    }
?>