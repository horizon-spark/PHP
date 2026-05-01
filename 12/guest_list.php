<?php 
    $guests = file("guests.txt");

    echo "<ol>";
    foreach ($guests as $guest) {
        echo "<li>$guest</li>";
    }
    echo "</ol>";
?>