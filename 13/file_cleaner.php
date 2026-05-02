<?php 
    $content = file("messages.txt");
    $keyWord = "Spam";

    var_dump($content);

    if ($content) {
        $filteredLines = array_filter($content, function($line) {
            $words = explode("|", $line);
            foreach ($words as $word) {
                if (stripos($word, $keyWord)) {
                    return false;
                }
            }
            return true;
        });

        file_put_contents("messages.txt", implode("", $filteredLines));
    }

    // Не работает, но не понятно, почему. Спросить!
?>

