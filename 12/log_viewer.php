<?php 
    $logs = file("access.log");

    $last_five = array_slice($logs, -5);
    foreach ($last_five as $log) {
        echo "<p>$log</p>";
    }
?>