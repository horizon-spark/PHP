<?php 
    $num = 42;
    $str = "42";
    $bool = true;

    echo "42 == '42' : " . ($num == $str ? 'true' : 'false') . "<br>";
    echo "42 === '42': " . ($num === $str ? 'true' : 'false') . "<br>";
    echo "42 == true : " . ($num == $bool ? 'true' : 'false') . "<br>";
    echo "42 === true: " . ($num === $bool ? 'true' : 'false') . "<br>";
?>