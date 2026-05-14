<?php require_once '../header.php'; ?>

<?php 
    session_start();

    if ($_SESSION['auth'] == true) {
        echo "<form action='' method='GET'>
                <input name='logout' hidden>
                <button type'submit'>Выйти</button>
            </form>";

        $content = file_get_contents('messages.json');

        if (empty($content)) {
            echo "<p>Пока нет ни одной записи</p>";
        }

        $lines = array_filter(explode("\n", $content));
        foreach($lines as $index => $line) {
            $log = json_decode($line);
            $message = "ID: $log->id | Имя: $log->name | email: $log->email |
                Дата: " . $log->date . " | Сообщение: $log->message";

            echo "<div class='message'>
                    $message 
                    <a href='admin.php?delete=$index'>Удалить</a>
                </div>";
        }
    } else {
        echo "<form action='' method='POST'>
                <input type='text' name='username' placeholder='username'>
                <input type='password' name='password' placeholder='password'>
                <button type='submit'>Войти</button>
            </form>";
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        header("Location: index.php");
    }

    if (isset($_GET['delete'])) {
        if ($_SESSION['auth'] == true) {
            $delete_index = $_GET['delete'];

            $content = file_get_contents('messages.json');
            $lines = array_filter(explode("\n", $content));
            unset($lines[$delete_index]);

            $output_content = implode("\n", $lines);
            file_put_contents('messages.json', $output_content."\n");

            header("Location: admin.php");

        } else {
            echo "Авторизуйтесь для удаления записей";
        }
    }

    if (isset($_POST['username']) && isset($_POST['password'])) {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            if ($username === 'admin' && $password === '12345') {
                $_SESSION['auth'] = true;

                header('Location: admin.php');

                exit;
            } else {
                echo "<p>Неверный логин или пароль</p>";
            }
        }
    }
    
?>

<?php require_once '../footer.php'; ?>