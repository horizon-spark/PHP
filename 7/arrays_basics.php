<?php 
    $colors_old = array("red", "green", "blue");
    $colors = ["red", "green", "blue"];

    $student = ["name" => "Дмитрий", 
        "surname" => "Кадарметов",
        "group" => "БИВТ-ВП-24"];

    echo $colors[1] . "<br>";
    echo $student["name"] . "<br>";

    $colors[] = "yellow";
    $student["age"] = 21;
    $student["group"] = "БИВТ-ВП-23";
    unset($colors[1]);

    echo print_r($colors) . "<br>";
    echo print_r($student) . "<br>";
?>