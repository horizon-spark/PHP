<?php 
    require_once 'product_lib.php';

    echo "<style>
            table {
                border: 1px solid black;
                border-collapse: collapse;
            }
            td, th {
                border: 1px solid black;
            }
        </style>";

    echo "Общее количество товаров: " . getProductCount() . "<br>";
    echo "Суммарная стоимость товаров в наличии: " . getTotalSum() . "<br>";
    
    $products = getAllProducts();
    $productsByPrice = getProductsByPrice(30000, 50000);
    $productsByStock = getProductsInStock();

    printProductTable($products, "Таблица со всеми товарами:<br>");
    printProductTable($productsByPrice, "Товары с ценой в диапазоне [30000, 50000]<br>");
    printProductTable($productsByStock, "Товары в наличии");

?>