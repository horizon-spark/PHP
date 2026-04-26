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

    echo "<p><b>До сортировки:</b></p>";
    foreach($cities as $city) {
        echo "<p>$city</p>";
    }

    sort($cities);

    echo "<p><b>После сортировки:</b></p>";
    foreach($cities as $city) {
        echo "<p>$city</p>";
    }
?>