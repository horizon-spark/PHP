<?php 
    $counter = 0;

    function incrementCounter() {
        global $counter;
        $counter++;
    }

    echo "Счетчик до вызовов функции: $counter<br>";

    incrementCounter();
    incrementCounter();
    incrementCounter();

    echo "Счетчик после трех вызовов функции: $counter<br>"; 

?>