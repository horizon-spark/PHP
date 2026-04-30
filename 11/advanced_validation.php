<?php 
    $errors = [];
    function validate_name() {
        global $errors;
        $name = $_POST['username'];

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

    function validate_password() {
        global $errors;
        $password = $_POST['password'];

        if (strlen($password) < 6) {
            $errors[] = 'Пароль слишком короткий';
        }

        return $_POST;
    }

    function validate_password_confirmation() {
        global $errors;
        $password = $_POST['password'];
        $password_confirm = $_POST['confirm_password'];

        if ($password != $password_confirm) {
            $errors[] = 'Пароли не совпадают';
        }

        return $_POST;
    }

    if (!empty($_POST['username'])) {
        validate_name()
        .validate_email()
        .validate_password()
        .validate_password_confirmation();

        if (empty($errors)) {
            echo "Success";
        } else {
            echo "Failure";
            echo "<ul>";
            foreach($errors as $error) {
                echo "<li>$error</li>";
            }
            echo "</ul>";

            $errors = [];
        }
    }

?>

<form action="" method="POST">
    <input type="text" name="username">
    <input type="email" name="email">
    <input type="password" name="password">
    <input type="password" name="confirm_password">
    <button type="submit">Отправить</button>
</form>