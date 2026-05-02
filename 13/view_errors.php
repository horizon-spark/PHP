<?php 
    $fp = fopen("errors.log", 'r');

    if ($fp) {
        while (!feof($fp)) {
            echo fgets($fp) . "<br>";
        }
    }
?>