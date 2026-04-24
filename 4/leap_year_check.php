<?php  
    const CURRENT_YEAR = 2026;

    if ((CURRENT_YEAR % 4 == 0 && CURRENT_YEAR % 100 != 0) ||
        CURRENT_YEAR % 400 == 0) {
            echo CURRENT_YEAR . " is a leap year";
        } else {
            echo CURRENT_YEAR . " is not a leap year";
        }
?>