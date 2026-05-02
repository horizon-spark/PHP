<?php 
    if (isset($_POST['name']) && isset($_POST['message'])) {
        $name = $_POST['name'];
        $message = $_POST['message'];

        if (!empty($name) && !empty($message)) {
            $record = "Имя: $name | Дата: " . date("Y-m-d H:i:s") .
            " | Сообщение: $message\n";

            file_put_contents("guestbook.txt", $record);
        }
    }
?>

<form method="POST" action="">
    <input type="text" name="name">
    <input type="text" name="message">
    <button type="submit">Отправить</button>
</form>