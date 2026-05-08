<?php
    session_start();

    $goods = ['Яблоки', 'Бананы', 'Апельсины'];
    
    if (isset($_POST['cart'])) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [$_POST['cart']];
        } else if (!in_array($_POST['cart'], $_SESSION['cart'])) {
            $_SESSION['cart'][] = $_POST['cart'];
        }
    }

    if (isset($_POST['reset'])) {
        $_SESSION = [];
    }

    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];

        echo "<p>Товары, добавленные в корзину: </p><ul>";
        foreach ($cart as $good) {
            echo "<li>$good</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Корзина пуста</p>";
    }

    foreach($goods as $good) {
        echo "<form action='' method='POST'>
                $good
                <input name='cart' value=$good hidden>
                <button type='submit'>Добавить в корзину</button>
            </form>";
    }
?>
<form action="" method="POST">
    <input name="reset" value="1" hidden>
    <button type="submit">Очистить корзину</button>
</form>
    