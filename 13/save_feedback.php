<?php 
    if (isset($_POST['name']) &&
        isset($_POST['email']) &&
        isset($_POST['message'])) {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];

            if (!empty($name) &&
                !empty($email) && 
                !empty($message)) {

                    $log = "Имя: $name | Email: $email |
                    Сообщение: $message | Дата: " . 
                    date('Y-m-d H:i:s') . "\n";

                    $is_successful = file_put_contents("messages.txt", $log, FILE_APPEND);

                    if ($is_successful) {
                        echo "Сообщение сохранено";
                    }
                }
        }
?>

<form action="" method="POST">
    <input type="text" name="name"
        value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
    <input type="email" name="email"
        value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
    <input type="textarea" name="message"
        value="<?= htmlspecialchars($_POST['message'] ?? '') ?>">
    <button type="submit">Отправить</button>
</form>

<a href="view_messages.php">Просмотр отзывов</a>