<?php 
    if (isset($_POST['name']) &&
        isset($_POST['age']) &&
        isset($_POST['city'])) {

        $name = $_POST['name'];
        $age = $_POST['age'];
        $city = $_POST['city'];

        if (!empty($name) &&
            !empty($age) && 
            !empty($city)) {

            $record = "$name,$age,$city\n";

            file_put_contents("data.csv", $record, FILE_APPEND);
        }
    }
?>

<form method="POST" action="">
    <input type="text" name="name" placeholder="name">
    <input type="number" name="age" placeholder="age">
    <input type="text" name="city" placeholder="city">
    <button type="submit">Отправить</button>
</form>