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

    if (isset($_GET['number']) && !empty($_GET['number'])) {
        $number = $_GET['number'];

        if ($number >= 1 && $number <= 10) {
            echo "<table>
                    <tr>
                        <th>i</th>
                        <th>i * $number</th>
                    </tr>";
            for ($i = 1; $i <= 10; $i++) {
                $mult = $i * $number;
                echo "<tr>
                        <td>$i</td>
                        <td>$mult</td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "Введите число от 1 до 10";
        }
    } else {
        echo "Укажите число в адресной строке (?number=5)";
    }
?>