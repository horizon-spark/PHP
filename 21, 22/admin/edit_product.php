<?php 
    session_start();

    require_once 'auth_check.php';
    require_once '../../19/db.php';

    if (isset($_GET['id']) &&
        !empty($_GET['id'])) {

        $id = $_GET['id'];

        $sql_get = "SELECT * FROM products
                    WHERE id = $id";
        
        $result_get = $conn->query($sql_get)->fetch();

        if (!$result_get) {
            echo "Товар с id = $id не найден";
            header("Location: ../../19/index.php");
            exit;
        }

        $name_old = $result_get['name'];
        $price_old = $result_get['price'];
        $desc_old = $result_get['description'];
    }

    if (isset($_POST['name']) &&
        isset($_POST['price']) &&
        isset($_POST['description'])) {

        $name_new = $_POST['name'];
        $int_price_new = $_POST['price'];
        $desc_new = $_POST['description'];

        if (!empty($int_price_new) &&
            !empty($int_price_new) &&
            !empty($desc_new) &&
            strlen($desc_new) <= 200) {

            $price_new = (float)$int_price_new;

            $sql_update = "UPDATE products 
                           SET name=:name, 
                                price=:price, 
                                description=:description 
                           WHERE id=:id";
            
            $stmt = $conn->prepare($sql_update);

            $stmt->bindValue(":name", $name_new);
            $stmt->bindValue(":price", $price_new);
            $stmt->bindValue(":description", $desc_new);
            $stmt->bindValue("id", $id);

            $affectedRowsNumber = $stmt->execute();

            if ($affectedRowsNumber > 0) {
                $_SESSION['is_successful_update'] = true;
                header("Location: ../../19/index.php");
            }

        }
    }
?>
<h2>Редактирование товара</h2>

<form action="" method="POST">
    <input type="text" name="name" 
    placeholder="Название товара" 
    value="<?php echo htmlspecialchars($name_old ?? ''); ?>">
    <br><br>
    <input type="number" name="price" 
    placeholder="Цена товара" 
    value="<?php echo htmlspecialchars($price_old ?? ''); ?>">
    <br><br>
    <textarea name="description" rows="4" cols="50" 
    placeholder="Описание товара" 
    value="<?php echo htmlspecialchars($desc_old ?? ''); ?>"></textarea>
    <br><br>
    <button type="submit">Отправить</button>
</form>
