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
                    <a href='admin.php?edit=$index'>Редактировать</a>
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

    if (isset($_GET['edit'])) {
        if ($_SESSION['auth'] == true) {
            $edit_index = $_GET['edit'];

            $content = file_get_contents('messages.json');
            $lines = array_filter(explode("\n", $content));

            $edit_line_data = json_decode($lines[$edit_index]) ?? 0;

            if (!$edit_line_data) {
                echo "Запись с index = $edit_index не найдена";
            } else {
                echo "<form action='' method='POST'>
                        <input 
                            type='text' 
                            name='name'
                            placeholder='Имя' 
                            value='$edit_line_data->name'
                            required>
                        <input 
                            type='text' 
                            name='message' 
                            placeholder='Сообщение' 
                            value='$edit_line_data->message'
                            required>
                        <input 
                            type='email' 
                            name='email'
                            placeholder='Email'
                            value='$edit_line_data->email'
                            required>
                        <button type='submit'>Изменить</button>
                    </form>";
            }
        } else {
            echo "Авторизуйтесь для редактирования записей";
        }
    }

    if (isset($_POST['name']) && 
        isset($_POST['message']) &&
        isset($_POST['email'])) {

        if (!empty($_POST['name']) && 
            !empty($_POST['message']) &&
            filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

            $name_new = htmlspecialchars($_POST['name']);
            $message_new = htmlspecialchars($_POST['message']);
            $email_new = htmlspecialchars($_POST['email']);

            $edit_line_data->name = $name_new;
            $edit_line_data->message = $message_new;
            $edit_line_data->email = $email_new;

            $log_new = json_encode($edit_line_data);

            $lines[$edit_index] = $log_new;

            $output_content = implode("\n", $lines);
            file_put_contents('messages.json', $output_content."\n");

            header("Location: admin.php");
        }
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