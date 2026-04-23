<?php 
    $firstName = "Дмитрий";
    $lastName = "Кадарметов";
    $age = 21;
    echo "Здравствуйте, " . $firstName . " " . $lastName . 
        " Ваш возраст: " . $age . " год<br>";
    echo "Здравствуйте, $firstName $lastName 
        Ваш возраст: $age год<br>";
    echo sprintf("Здравствуйте, %s %s Ваш возраст: %d год<br>",
        $firstName, $lastName, $age);
?>