<?php require_once '../header.php'; ?>

<?php 
    session_start();

    $counter = $_SESSION['counter'] ?? 1;

    if (isset($_POST['name']) && isset($_POST['message'])) {
        if (!empty($_POST['name']) && !empty($_POST['message'])) {
            $name = htmlspecialchars($_POST['name']);
            $message = htmlspecialchars($_POST['message']);

            $log = json_encode(['id' => $counter, 'name' => $name, 
                'message' => $message, 'date' => date("Y-m-d H:i:s")]);
            $log .= "\n";
            $counter++;
            $_SESSION['counter'] = $counter;

            $is_success = file_put_contents('messages.json', $log, FILE_APPEND);

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
    $content = file_get_contents('messages.json');

    if (empty($content)) {
        echo "<p>Пока нет ни одной записи. Будьте первым!</p>";
    }

    $lines = array_filter(explode("\n", $content));
    foreach($lines as $line) {
        $log = json_decode($line);
        $message = "ID: $log->id | Имя: $log->name | Дата: " . 
            $log->date . " | Сообщение: $log->message";

        echo "<div class='message'>$message</div>";
    }
?>

<?php require_once '../footer.php'; ?>