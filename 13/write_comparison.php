<?php 
    file_put_contents('file1.txt', "Hello, world!\n", FILE_APPEND | LOCK_EX);

    $fp = fopen('file2.txt', 'a');
    if ($fp) {
        fwrite($fp, "Hello, world!\n");
        fclose($fp);
    }

    echo "При помощи file_put_contents: " . filesize("file1.txt") . "<br>";
    echo "При помощи fopen: " . filesize("file2.txt") . "<br>";
?>