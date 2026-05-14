<?php require_once '../header.php'; ?>

<?php 
    session_start();

    function pagination($lines, $show_by = 5, $current_page = 0) {
        if (count($lines) == 0) {
            return;
        }

        if (count($lines) < $show_by || count($lines) % $show_by == 0) {
            $number_of_pages = (int)(count($lines) / $show_by);
        } else {
            $number_of_pages = (int)(count($lines) / $show_by) + 1;
        }

        for ($i = 0; $i < $number_of_pages; $i++) {
            echo "<form action='' method='get'>
                    <input name='page' value='$i' hidden>";
            if ($i == $current_page) {
                echo "<button type='submit' disabled>$i</button>";
            } else {
                echo "<button type='submit'>$i</button>";
            }
            echo "</form>";
        }
    }

    function show_partition($lines, $show_by = 5) {
        if (count($lines) == 0) {
            return;
        }
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            $partition_start = $page * $show_by;
            $lines_left = count($lines) - $page * $show_by;
            $partition_end = $partition_start + min($show_by, $lines_left);
        } else {
            $partition_start = 0;
            $partition_end = min($show_by, count($lines));
        }
        for ($i = $partition_start; $i < $partition_end; $i++) {
            $log = json_decode($lines[$i]);
            $message = "ID: $log->id | Имя: $log->name | Дата: " . 
                $log->date . " | Сообщение: $log->message";

            echo "<div class='message'>$message</div>";
        }
    }

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
    $current_page = $_GET['page'] ?? 0;

    show_partition($lines, 3);
    pagination($lines, 3, $current_page);

?>

<?php require_once '../footer.php'; ?>