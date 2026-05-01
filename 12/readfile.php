<?php 
    function read_file($filename, $mode = 'r') {
        $fp = fopen($filename, $mode);

        if (!$fp) {
            echo "Не удалось открыть файл";
            return;
        }

        $content = [];
        
        while (!feof($fp)) {
            $content[] = fgets($fp);
        }
            
        foreach ($content as $line) {
            echo "<p>$line</p>";
        }

        fclose($fp);
    }

    read_file('data.txt');
?>