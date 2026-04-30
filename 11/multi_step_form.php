<?php 
    $errors = [];

    function validate_name() {
        global $errors;
        $name = $_POST['name'];

        if (strlen($name) <= 3) {
            $errors[] = 'Имя слишком короткое';
        }

        return $_POST;
    }

    function validate_email() {
        global $errors;
        $email = $_POST['email'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Некорректный формат email';
        }

        return $_POST;
    }

    if (isset($_POST['name']) && isset($_POST['email'])) {
        validate_name()
        .validate_email();
        
        if (empty($errors)) {
            echo "Первый шаг завершен!";
            $_POST['step'] = 'something';
        } else {
            echo "Ошибка";
            echo "<ul>";
            foreach($errors as $error) {
                echo "<li>$error</li>";
            }
            echo "</ul>";

            $errors = [];
        }
    }

    if (isset($_POST['step'])) {
        echo "<p>Второй шаг</p>";
    } else {
        echo "<form action='' method='POST'>
                <input type='text' name='name'>
                <input type='email' name='email'>
                <button type='submit'>Отправить</button>
            </form>";
    }
?>