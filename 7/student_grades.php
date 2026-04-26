<?php 
    $students = ["student1" => 64, 
        "student2" => 85, 
        "student3" => 54, 
        "student4" => 91, 
        "student5" => 76
    ];

    function moreThanEighty($var)
    {
        return $var > 80;
    }

    print_r(array_filter($students, "moreThanEighty"));
?>