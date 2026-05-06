<?php   
    // Не работает - спросить, как нужно делать
    if (isset($_GET['download']) && isset($_GET['filename'])) {
        if (!empty($_GET['download'] && !empty($_GET['filename']))) {
            $filename = $_GET['filename'];

            header("Content-Length: ".filesize($filename));
            header("Content-Disposition: attachment; filename=".$filename); 
            header("Content-Type: application/x-force-download; name=\"".$filename."\"");
            dfile($filename);
        }
    }

    $files = scandir("uploads");

    echo "<table>
            <tr>
                <th>Имя файла</th>
                <th>Размер</th>
                <th>Дата загрузки</th>
                <th>Ссылка для скачивания</th>
                <th>Ссылка для удаления</th>
            </tr>";
    foreach ($files as $filename) {
        if ($filename === '.' || $filename === '..') {
            continue;
        }
        $size = filesize($filename);
        $download_date = date("Y-m-d H:i:s", filemtime($filename));

        echo "<tr>
                <td>$filename</td> 
                <td>$size</td> 
                <td>$download_date</td>
                <td><a href='./file_manager.php?download=true&filename=$filename'>Скачать</a></td>
                <td><a href='./file_manager.php?delete=true&filename=$filename'>Удалить</a></td>
            <tr>";
    }
    echo "</table>";
?>