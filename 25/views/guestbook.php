<?php 
    function render_view($records, $is_authorised = false) {

        if ($is_authorised) {
            $name = $_SESSION['username'];
            $user_id = $_SESSION['user_id'];

            $saved_message = htmlspecialchars($_POST['message'] ?? '');

            echo "<form action='' method='POST'>
                    <input type='text' name='name'
                        placeholder='Имя' value='$name' 
                        readonly required>
                    <input type='text' name='message' 
                        placeholder='Сообщение' value='$saved_message' 
                        required>
                    <input type='number' name='user_id'
                        placeholder='ID пользователя' value='$user_id' 
                        readonly required>
                    <button type='submit'>Отправить</button>
                </form>";

        } else {
            echo "<p>Авторизуйтесь, чтобы оставлять записи</p>";
        }

        foreach ($records as $record) {
            echo "ID: {$record['id']} | Имя: {$record['name']} |
                Сообщение: {$record['text']} | ID пользователя: {$record['user_id']}";
                
            if ($is_authorised && $user_id == $record['user_id']) {
                echo " | <a href='index.php?page=index&delete={$record['id']}'>
                        Удалить
                    </a><br>";
            } else {
                echo "<br>";
            }
        }
    }
?>