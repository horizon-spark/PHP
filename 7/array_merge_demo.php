<?php 
    $fruits = ['яблоко', 'банан', 'апельсин'];
    $berries = ['клубника', 'малина', 'ежевика'];

    $mix = array_merge($fruits, $berries);

    echo print_r($mix) . "<br>";

    $mix[] = 'груша';
    unset($mix[1]);

    print_r($mix);
?>