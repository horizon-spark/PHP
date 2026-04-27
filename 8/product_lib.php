<?php 
    $catalog = [
    ['name' => 'Ноутбук', 'price' => 75000, 'in_stock' => true],
    ['name' => 'Смартфон', 'price' => 45000, 'in_stock' => false],
    ['name' => 'Планшет', 'price' => 30000, 'in_stock' => true]
    ];

    function getAllProducts() {
        global $catalog;
        return $catalog;
    }

    function getProductCount() {
        global $catalog;
        return count($catalog);
    }

    function getTotalSum() {
        global $catalog;

        $sum = 0;
        foreach ($catalog as $product) {
            if ($product['in_stock']) {
                $sum += $product['price'];
            }
        }

        return $sum;
    }

    function getProductsByPrice($minPrice, $maxPrice) {
        global $catalog;
        $filtered = [];
        foreach ($catalog as $product) {
            if ($product['price'] >= $minPrice &&
                $product['price'] <= $maxPrice) {
                    $filtered[] = $product;
                }
        }
        return $filtered;
    }

    function getProductsInStock() {
        global $catalog;
        $filtered = array_filter($catalog, function($product) {
            return $product['in_stock'];
        });

        return $filtered;
    }

    function printProductTable($products, $title = '') {
        echo $title;
        echo "<table>
                <tr>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>В наличии</th>
                </tr>";
        foreach ($products as $product) {
            echo "<tr>
                    <td>{$product['name']}</td>
                    <td>{$product['price']}</td>";
            if ($product['in_stock']) {
                echo "<td>Да</td>";
            } else {
                echo "<td>Нет</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
?>