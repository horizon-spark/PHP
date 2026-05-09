<?php 
    $products = ["Keyboard", "Gaming Mouse", "Laptop", 
        "Gamepad", "TV"];

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $current_cookie = $_COOKIE['viewed_products'] ?? '';

        setcookie('viewed_products', $current_cookie . ",$id", time() + 3600 * 24 * 30);
    }

    if (isset($_COOKIE['viewed_products'])) {
        $last_three = array_slice(explode(',', $_COOKIE['viewed_products']), -3);

        echo "<p>Последние просмотренные товары:</p>";
        foreach ($last_three as $id) {
            echo "<p>$products[$id]</p>";
        }
    } else {
        echo "<p>Здесь будут просмотренные вами товары</p>";
    }

    foreach ($products as $id => $product) {
        echo "<p>
                $product 
                <a href='product_view_history.php?id=$id'>Подробнее</a>
            </p>";
    }
?>