<?php 
    session_start();

    require_once 'db.php';

    echo "<style>
            table, th, td {
                border: 1px solid black;
                padding: 10px;
            }
            table {
                border-collapse: collapse;
            }
        </style>";

    if (isset($_SESSION['is_successful_insert'])) {
        echo "<h3>Успешное добавление записи</h3>";
        unset($_SESSION['is_successful_insert']);
    }

    if (isset($_SESSION['is_successful_update'])) {
        echo "<h3>Успешное изменение записи</h3>";
        unset($_SESSION['is_successful_update']);
    }

    if (isset($_SESSION['is_successful_delete'])) {
        echo "<h3>Успешное удаление записи</h3>";
        unset($_SESSION['is_successful_delete']);
    }

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
                    <th></th>
                    <th></th>
                </tr>";

        while($row = $result->fetch()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['price']}</td>
                    <td>{$row['description']}</td>
                    <td>
                        <a href='../21,%2022/admin/edit_product.php?id={$row['id']}'>
                            Редактировать
                        </a>
                    </td>
                    <td>
                        <a href='../21,%2022/admin/delete_product.php?id={$row['id']}'
                           class='deleteLink'>
                            Удалить
                        </a>    
                    </td>
                </tr>";
        }

        echo "</table><br>";
        echo "<a href='../21,%2022/admin/add_product.php'>
                Добавить запись
            </a>";

    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
?>
<script src='../21,%2022/admin/confirmDelete.js'></script>