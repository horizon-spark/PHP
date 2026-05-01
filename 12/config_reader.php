<?php 
    $config = file_get_contents("config.txt");

    $entries = explode("\n", $config);
    $array = [];

    foreach ($entries as $entry) {
        [$key, $value] = explode("=", $entry);
        $array[$key] = $value;
    }

    foreach ($array as $key => $value) {
        echo "<p>$key:$value</p>";
    }
?>