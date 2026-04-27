<?php 
    function counter() {
        static $count = 0;
        $count++;
        echo "counter = $count<br>";
    }

    counter();
    counter();
    counter();
    counter();
    counter();
?>