<?php 
    $regular_expression = '^[0-9+]+$';

    if (!empty($_POST['phone_number'])) {
        $phone_number = $_POST['phone_number'];

        if (str_replace(['0', '1', '2', '3', '4', '5', 
        '6', '7', '8', '9', '+', ' '], '', $phone_number) == '' &&
        strlen($phone_number) >= 10 &&
        strlen($phone_number) <= 15) {
            echo "Номер успешно отправлен";
        } else {
            echo "Номер введен некорректно";
        }
    }
?>

<form action="" method="POST">
    <input type="text" name="phone_number">
    <button type="submit">Отправить</button>
</form>