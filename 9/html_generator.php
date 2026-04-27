<?php 
    $cities = [
    "Бруклин",
    "Акита",
    "Герона",
    "Гуанъюань",
    "Мориока",
    "Перуджа",
    "Куритиба",
    "Кампече",
    "Сибу",
    "Каламата"
    ];

    function printArray($arr, $title = '') {
        $size = count($arr);

        if ($title) {
            echo "<p>$title</p>";
        }

        for ($i = 0; $i < $size; $i++) {
            if ($i == 0) {
                echo "[$arr[$i], ";
            } elseif ($i == $size - 1) {
                echo "$arr[$i]]<br>";
            } else {
                echo "$arr[$i], ";
            }
        }
    }

    function generateSelect($options, $selectedValue) {
        echo "<select>";
        foreach ($options as $option) {
            if ($option == $selectedValue) {
                echo "<option selected>$option</option>";
            } else {
                echo "<option>$option</option>";
            }
        }
        echo "</select>";
    }

    generateSelect($cities, "Акита");
?>