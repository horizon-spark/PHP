<?php 
    echo "<style>
            .container {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 10px;
            }
            .card {
                border: 1px solid black;
                border-radius: 5px;
                padding: 0px 0px 10px 10px;
            }
        </style>";

    require_once '../19/db.php';

    $sql = "SELECT id, name, price, description 
            FROM products";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($products) == 0) {
        echo "Товары временно отсутствуют";
    } else {
        echo "<div class='container'>";
        foreach($products as $product) {
            echo "<div class='card'>
                <h3>{$product['name']}</h3>
                Price: <b>{$product['price']}</b><br>
                Description: <i>{$product['description']}</i>
            </div>";
        }
    }
    echo "</div>";
?>