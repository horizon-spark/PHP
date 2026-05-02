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
    
    $fp = fopen("data.csv", 'r');

    if ($fp) {
        echo "<table>
                <th>Имя</th>
                <th>Возраст</th>
                <th>Город</th>";

        while (!feof($fp)) {
            $words = array_filter(explode(",", fgets($fp)));

            echo "<tr>";
            foreach ($words as $word) {
                echo "<td>$word</td>";
            }
            echo "</tr>";
        }

        echo "</table>";
        fclose($fp);
    }
?>