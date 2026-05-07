<?php require_once 'error_handler.php' ?>
<?php $page_title = "Catalog" ?>
<?php require_once 'header.php'; ?>
<?php 
    $product1 = [
        "name" => "headphones", 
        "price" => 5000, 
        "description" => "Sound quality!", 
        "in_stock" => true
    ];
    $product2 = [
        "name" => "keyboard", 
        "price" => 3000, 
        "description" => "Typing quality!", 
        "in_stock" => false
    ];
    $product3 = [
        "name" => "mouse", 
        "price" => 2000, 
        "description" => "Fidgeting quality!", 
        "in_stock" => true
    ];

    $catalog = [$product1, $product2, $product3];

    foreach ($catalog as $product) {
        echo "<div class='product-card'>
                <h3>{$product['name']}</h3>
                <p class='price'>{$product['price']}</p>
                <p>{$product['description']}</p>";
        if ($product["in_stock"]) {
            echo "<span class='in-stock'>В наличии</span>";
        } else {
            echo "<span class='out-of-stock'>Нет в наличии</span>";
        }
        echo "</div>";
    }
?>
<?php require_once 'footer.php'; ?>