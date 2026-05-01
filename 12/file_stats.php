<?php 
    echo "<style>
            table, th, td {
                border: 1px solid black;
            }
            table {
                border-collapse: collapse;
                text-align: center;
            }
        </style>";

    $size = filesize("counter.txt");
    $mtime = date('d.m.Y h:i:s', filemtime("counter.txt"));
    $is_readable = is_readable("counter.txt") ? "Да" : "Нет";
    $is_writable = is_writable("counter.txt") ? "Да" : "Нет";

    echo "<table>
            <tr>
                <th>Размер</th>
                <th>Дата последнего изменения</th>
                <th>Можно читать</th>
                <th>Можно записывать</th>
            </tr>
            <tr>
                <td>$size</td>
                <td>$mtime</td>
                <td>$is_readable</td>
                <td>$is_writable</td>
            </tr>
        </table>";
?>