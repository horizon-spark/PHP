<?php 
    echo "<style>
            table, th, td {
                border: 1px solid black;
                padding: 10px;
            }
            table {
                border-collapse: collapse;
            }
        </style>";

    require_once 'db.php';

    try {
        $sql = "SELECT * FROM products
                ORDER BY id DESC";
        
        $result = $conn->query($sql);
        
        echo "<table>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>price</th>
                    <th>description</th>
                </tr>";

        while($row = $result->fetch()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['price']}</td>
                    <td>{$row['description']}</td>
                </tr>";
        }

        echo "</table>";

    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
?>