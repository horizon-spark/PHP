<?php 
    function render_view($records, $errors = 0, $success_message = 0) {
        if ($errors) {
            foreach ($errors as $error) {
                echo "<p>$error</p>";
            }
        }
    
        if ($success_message) {
            echo "<p>$success_message</p>";
        }

        $saved_name = htmlspecialchars($_POST['name'] ?? '');
        $saved_message = htmlspecialchars($_POST['message'] ?? '');
        $saved_user_id = htmlspecialchars($_POST['user_id'] ?? '');

        echo "<form action='' method='POST'>
                <input type='text' name='name'
                    placeholder='Имя' value='$saved_name' 
                    required>
                <input type='text' name='message' 
                    placeholder='Сообщение' value='$saved_message' 
                    required>
                <input type='number' name='user_id'
                    placeholder='ID пользователя' value='$saved_user_id' 
                    required>
                <button type='submit'>Отправить</button>
            </form>";

        foreach ($records as $record) {
            echo "ID: {$record['id']} | Имя: {$record['name']} |
                Сообщение: {$record['text']} | ID пользователя: {$record['user_id']} |
                <a href='index.php?delete={$record['id']}'>
                    Удалить
                </a><br>";
        }
    }
?>