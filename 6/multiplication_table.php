<?php 
    $rows = 10;
    $cols = 10;

    echo "<table>";
    for ($tr = 1; $tr <= $rows; $tr++) {
        echo "<tr>";
        for ($tc = 1; $tc <= $cols; $tc++) {
            $td = $tr * $tc;
            echo "<td style='border-right: 1px solid black; 
            border-bottom: 1px solid black'>$tr * $tc = $td</td>";
        }
        echo "</tr>";
    }
?>