<?php 
    if (!empty($_POST['age'])) {
        $age = $_POST['age'];

        if (filter_var($age, FILTER_VALIDATE_INT) &&
        $age >= 18 &&
        $age <= 100) {
            echo "Доступ разрешен";
        }
    }
?>

<form action="" method="POST">
    <input type="number" name="age">
    <button type="submit">Отправить</button>
</form>