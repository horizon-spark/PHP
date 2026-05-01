<?php 
    $f = fopen("big.txt", 'r');
    $index = 1;

    while (!feof($f)) {
        $str = fgets($f);

        if ($index % 100 == 0) {
            echo "<p>$str</p>";
        }

        $index++;
    }
?>