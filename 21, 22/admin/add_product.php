<?php 
    session_start();

    require_once 'auth_check.php';
    require_once '../../19/db.php';

    if (isset($_SESSION['is_success'])) {
        echo "<h3>Успешная запись в базу данных</h3>";
        unset($_SESSION['is_success']);
    }

    if (isset($_POST['name']) &&
        isset($_POST['price']) &&
        isset($_POST['description'])) {

            $name = $_POST['name'];
            $int_price = $_POST['price'];
            $description = $_POST['description'];

            if (!empty($int_price) &&
                !empty($int_price) &&
                !empty($description) &&
                strlen($description) <= 200) {

                    $price = (float)$int_price;

                    $sql = "INSERT INTO products (name, price, description)
                            VALUES (:name, :price, :desc)";
                    
                    $stmt = $conn->prepare($sql);

                    $stmt->bindValue(":name", $name);
                    $stmt->bindValue(":price", $price);
                    $stmt->bindValue(":desc", $description);

                    $affectedRowsNumber = $stmt->execute();

                    if ($affectedRowsNumber > 0) {
                        $_SESSION['is_successful_insert'] = true;
                        header("Location: ../../19/index.php");
                    }
                }
        }
?>
<h2> Добавление товара</h2>

<form action="" method="POST">
    <input type="text" name="name" 
    placeholder="Название товара" 
    value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>">
    <br><br>
    <input type="number" name="price" 
    placeholder="Цена товара" 
    value="<?php echo htmlspecialchars($_POST['price'] ?? ''); ?>">
    <br><br>
    <textarea name="description" rows="4" cols="50" 
    placeholder="Описание товара" 
    value="<?php echo htmlspecialchars($_POST['description'] ?? ''); ?>"></textarea>
    <br><br>
    <button type="submit">Отправить</button>
</form>
