<?php 
    const N = 5;
    for ($i = 1; $i <= N; $i++) {
        echo "<p>";
        for ($j = 0; $j < $i; $j++) {
            echo "*";
        }
        echo "</p>";
    }
?>