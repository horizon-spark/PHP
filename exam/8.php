<form action="" method="post">
    <input type=text name="names"
        placeholder="Введите названия продуктов, например Хлеб,Яйца">
    <button type="submit">Отправить</button>
</form>

<?php 
    $products = [
        ['name' => 'Хлеб', 'price' => 45],
        ['name' => 'Молоко', 'price' => 80],
        ['name' => 'Яйца', 'price' => 70],
        ['name' => 'Сыр', 'price' => 150]
    ];

    if (isset($_POST['names']) && !empty($_POST['names'])) {
        $names = array_filter(explode(',', $_POST['names']));
        $sum = 0;
        $is_found = false;

        echo "<h3>Список выбранных товаров:</h3><ol>";
        foreach ($names as $name) {
            foreach ($products as $product) {
                if ($product['name'] == $name) {
                    $sum += $product['price'];
                    $is_found = true;
                    break;
                }
            }

            if ($is_found) {
                echo "<li>$name</li>";
            } else {
                echo "<p>$name - товар не найден</p>";
            }

            $is_found = false;
        }
        echo "</ol>";
        echo "<h4>Итоговая сумма: $sum";
    } else {
        echo "Введите названия товаров через запятую";
    }
?>
