<?php 
    session_start();

    require_once 'auth_check.php';
    require_once '../../19/db.php';

    if (isset($_GET['id']) &&
        filter_var($_GET['id'], FILTER_VALIDATE_INT) !== false) {

        $id = $_GET['id'];

        $sql_get = "SELECT * FROM products
                    WHERE id = $id";
        
        $result_get = $conn->query($sql_get)->fetch();

        if (!$result_get) {
            echo "Товар с id = $id не найден";
            header("Location: ../../19/index.php");
            exit;
        }

        $sql_delete = "DELETE FROM products
                       WHERE id=:id";

        $stmt = $conn->prepare($sql_delete);
        $stmt->bindValue(":id", $id);

        $affectedRowsNumber = $stmt->execute();

        if ($affectedRowsNumber > 0) {
            $_SESSION['id_successful_delete'] = true;
            header("Location: ../../19/index.php");
        }
    }
?>