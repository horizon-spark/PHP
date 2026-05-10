<?php require_once '../header.php'; ?>

<?php 
    if (isset($_POST['name']) && isset($_POST['message'])) {
        if (!empty($_POST['name']) && !empty($_POST['message'])) {
            $name = htmlspecialchars($_POST['name']);
            $message = htmlspecialchars($_POST['message']);

            $log = "Имя: $name | Дата: " . date("Y-m-d H:i:s") . 
                " | Сообщение: $message\n";

            $is_success = file_put_contents('messages.txt', $log, FILE_APPEND);

            if ($is_success) {
                header("Location: index.php");
            }
        }
    }
?>

<form action="" method="POST">
    <input type="text" name="name"
        placeholder="Имя" required>
    <input type="text" name="message" 
        placeholder="Сообщение" required>
    <button type="submit">Отправить</button>
</form>

<?php 
    $content = file_get_contents('messages.txt');

    if (empty($content)) {
        echo "<p>Пока нет ни одной записи. Будьте первым!</p>";
    }

    $messages = explode("\n", $content);
    foreach($messages as $message) {
        echo "<div class='message'>$message</div>";
    }
?>

<?php require_once '../footer.php'; ?>