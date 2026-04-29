<?php 
    $product_name = $_GET['product_name'];
    $quantity = $_GET['quantity'];
    $price = $_GET['price'];

    if (!empty($product_name) &&
        !empty($quantity) &&
        !empty($price) &&
        $quantity > 0) {
            $total = $quantity * $price;
            echo "Заказ: $product_name, 
                Количество: $quantity, 
                Итого: $total руб";
        } 
?>

<form action='' method='GET'>
    <input type='text' name='product_name' 
        placeholder='Введите название продукта'>
    <input type='number' name='quantity' 
        placeholder='Введите количество'>
    <input type='number' name='price' 
        placeholder='Введите цену'>
    <button type='submit'>Отправить</button>
</form>