<?php 
    function logError($errorMessage) {
        $fp = fopen("errors.log", 'a');

        if ($fp) {
            fwrite($fp, "$errorMessage\n");
            fclose($fp);
        }
    }

    logError("Error: Divide by 0");
    logError("Error: File does not exist");
?>